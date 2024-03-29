<?php
 
namespace App\Services\User;
use App\Models\Customers;
use Illuminate\Http\Request;
use DataTables;
use Input;
use DB;
use Excel;

class UserCustomerService
{
	public function getAllCustomer(){
        return view('userdashboard.customers.index');
    }

    public function getAllCustomerajax(){
        $customer = Customers::select('id', 'CustomerName', 'Address', 'City', 'PostalCode', 'Country');
        return Datatables::of($customer)
        ->addColumn('edit', function($customer){
            $hostwithHttp = request()->getSchemeAndHttpHost();
            return '<a href="'.$hostwithHttp.'/customers/edit/'.$customer->id.'" class="btn btn-xs btn-primary edit" id="'.$customer->id.'"><i class="bi bi-pencil-square"></i> Edit</a>';
        })
        ->addColumn('delete', function($customer){
            $hostwithHttp = request()->getSchemeAndHttpHost();
            return '<a href="'.$hostwithHttp.'/customers/delete/'.$customer->id.'" class="btn btn-xs btn-danger delete" id="delete"><i class="bi bi-backspace-reverse-fill"></i> Delete</a>';
        })
        ->rawColumns(['edit','delete'])
        ->make(true);
    }

    public function createcontact(){
    	return view('userdashboard.customers.create');
    }

    public function customerStore(Request $request){
        $request->validate([
            'CustomerName' => 'required',
            'Address' => 'required',
            'City' => 'required',
            'PostalCode' => 'required',
            'Country' => 'required'
        ]);

        $customer = new Customers();
        $customer->CustomerName = $request->CustomerName;
        $customer->Address = $request->Address;
        $customer->City = $request->City;
        $customer->PostalCode = $request->PostalCode;
        $customer->Country = $request->Country;
        $customer->save();
        return $customer;
    }

    public function editcontact($id){
        $customer = Customers::whereId($id)->first();
        return view('userdashboard.customers.edit', compact('customer'));
    }

    public function customerUpdate(Request $request, $id){
        $request->validate([
            'CustomerName' => 'required',
            'Address' => 'required',
            'City' => 'required',
            'PostalCode' => 'required',
            'Country' => 'required'
        ]);

        $customer = Customers::whereId($id)->first();
        $customer->CustomerName = $request->CustomerName;
        $customer->Address = $request->Address;
        $customer->City = $request->City;
        $customer->PostalCode = $request->PostalCode;
        $customer->Country = $request->Country;
        $customer->save();
        return $customer;
    }

    public function deleteCustomer(Request $request, $id){
        $customer = Customers::destroy($id);
        return $customer;
    }
}