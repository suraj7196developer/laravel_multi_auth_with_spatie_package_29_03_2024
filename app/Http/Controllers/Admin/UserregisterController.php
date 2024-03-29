<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\UserRegisterService;
use App\Models\Subunitmaster;
use App\Models\User;
use App\Models\Userregister;
class UserregisterController extends Controller
{
    protected $userservice;

    public function __construct(UserRegisterService $userservice)
    {
        $this->userservice = $userservice;
    }

    public function index()
    {
        $users = $this->userservice->getAllUser();
        
        return view('admin.users.index',compact('users'));
    }

    function getdata()
    {
        return $user = $this->userservice->getAllUserajax();
    }

    function create()
    {
        return $user = $this->userservice->createUser();
    }

    public function store(Request $request)
    {
        $users = $this->userservice->storeUser($request);
        return redirect()->route('all.users')->with('message', 'User Created!');
    }

    function edit($id)
    {
        return $user = $this->userservice->edituser($id);
    }

    public function update(Request $request, $id)
    {
        $users = $this->userservice->updateUser($request, $id);
        return redirect()->route('all.users')->with('info', 'User Updated!');
    }

    public function delete(Request $request, $id)
    {
        $user = $this->userservice->deleteUser($request, $id);
        return back()->with('error', 'User Deleted!');
    }

    /*GET SUBUNITS ACCORDING TO UNIT SELECTION*/
    public function SelectSubunit($unit_id)
    {   
        $subunits = Subunitmaster::where('unit_id', $unit_id)
        ->orderBy('subunit_name', 'ASC')
        ->get();
        return json_encode($subunits);
    }
}
