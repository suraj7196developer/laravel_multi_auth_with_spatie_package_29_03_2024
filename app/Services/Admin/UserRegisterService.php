<?php

namespace App\Services\Admin;
use App\Models\User;
use App\Models\Role;
use App\Models\Siepmaster;
use App\Models\Userregister;
use App\Models\Unitmaster;
use App\Models\Subunitmaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\ErrorFoundException;
use DataTables;
use Input;
use DB;
use Excel;

class UserRegisterService
{
	public function getAllUser(){
		return view('admin.users.index');
	}

	public function getAllUserajax(){
		$user = User::select('id', 'name', 'email', 'number', 'role_id', 'siep_id');
		return Datatables::of($user)
		->addColumn('role', function($user){
			$role_name = Role::where('id', $user->role_id)->pluck('name')->first();
			return  '<span class="badge bg-primary">'.$role_name.'</span>';
		})
		->addColumn('siep', function($user){
			$siep_name = Siepmaster::where('id', $user->siep_id)->pluck('siep_name')->first();
			return  '<span class="badge bg-info">'.$siep_name.'</span>';
		})
		->addColumn('edit', function($user){
			$hostwithHttp = request()->getSchemeAndHttpHost();
			return '<a href="'.$hostwithHttp.'/admin/users/edit/'.$user->id.'" class="btn btn-xs btn-primary edit" id="'.$user->id.'"><i class="bi bi-pencil-square"></i> Edit</a>';
		})
		->addColumn('delete', function($user){
			$hostwithHttp = request()->getSchemeAndHttpHost();
			return '<a href="'.$hostwithHttp.'/admin/users/delete/'.$user->id.'" class="btn btn-xs btn-danger delete" id="delete"><i class="bi bi-backspace-reverse-fill"></i> Delete</a>';
		})
		->rawColumns(['role','siep','edit','delete'])
		->make(true);
	}

	public function createUser(){
		$roles = Role::where('status', 1)->get();
		$siep = Siepmaster::where('status', 1)->get();
		$unit = Unitmaster::where('status', 1)->get();
		$subunit = Subunitmaster::where('status', 1)->get();
		return view('admin.users.create', compact('roles', 'siep', 'unit', 'subunit'));
	}

	public function storeUser(Request $request){

		$request->validate([
			'name' => 'required',
			'email' => 'required|unique:users',
			'role_id' => 'required',
			'siep_id' => 'required',
		]);

		$clinic_role = Role::where('role_id', 607)->pluck('id')->first();
		if($request->role_id ==$clinic_role){
			$clinical_status = 1;
		}else{
			$clinical_status = 0;
		}
		$users = new User();
		$users->name = $request->name;
		$users->email = $request->email;
		$users->email_verified_at = now();
		$users->number = $request->number;
		$users->role_id = $request->role_id;
		$users->siep_id = $request->siep_id;
		$users->password = Hash::make($request->password);
		$users->save();

		Userregister::create([
			'siep_id' => $users->siep_id,
			'user_id' => $users->id,
			'name' => $users->name,
			'role_id' => $users->role_id,
			'unit_id' => $request->unit_id,
			'subunit_id' => $request->subunit_id,
			'clinical_status' => $clinical_status,
		]);

		$userregister = Userregister::latest('id')->pluck('id')->first();
		$users->userregister_id = $userregister;
		$users->save();
		return $users;
	}

	public function edituser($id){
		
		$roles = Role::where('status', 1)->get();
		$siep = Siepmaster::get();
		$unit = Unitmaster::get();
		$subunit = Subunitmaster::get();

		try{
			$user = User::whereId($id)->firstOrFail();
			$userregister = Userregister::where('user_id', $id)->firstOrFail();
		}catch(\Exception $exception){
			throw new ErrorFoundException();
		}
		return view('admin.users.edit', compact('user', 'roles', 'siep', 'userregister', 'unit', 'subunit'));
	}

	public function updateUser(Request $request, $id){

		$request->validate([
			'name' => 'required',
			'email' => 'required',
			'role_id' => 'required',
			'siep_id' => 'required',
		]);

		$users = User::whereId($id)->firstOrFail();
		if($request->password === null)
		{
			$users->name = $request->name;
			$users->email = $request->email;
			$users->number = $request->number;
			$users->role_id = $request->role_id;
			$users->siep_id = $request->siep_id;
		}else{
			$users->name = $request->name;
			$users->email = $request->email;
			$users->number = $request->number;
			$users->role_id = $request->role_id;
			$users->siep_id = $request->siep_id;
			$users->password = Hash::make($request->password);
		}
		$users->save();

		$clinic_role = Role::where('role_id', 607)->pluck('id')->first();
		if($request->role_id ==$clinic_role){
			$clinical_status = 1;
		}else{
			$clinical_status = 0;
		}

		$userregister = Userregister::where('user_id', $id)->firstOrFail();
		$userregister->siep_id = $users->siep_id;
		$userregister->name = $users->name;
		$userregister->role_id = $users->role_id;
		$userregister->unit_id = $request->unit_id;
		$userregister->subunit_id = $request->subunit_id;
		$userregister->clinical_status = $clinical_status;
		$userregister->save();
		return $users;
	}

	public function deleteUser(Request $request, $id){
		$userregister_id = Userregister::where('user_id', $id)->pluck('id')->firstOrFail();
		$userregister = Userregister::destroy($userregister_id);
        $user = User::destroy($id);
        return $user;
    }
}