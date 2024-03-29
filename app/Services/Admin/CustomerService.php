<?php
 
namespace App\Services\Admin;
use App\Models\Customers;
use Illuminate\Http\Request;
use DataTables;
use Input;
use DB;
use Excel;

class CustomerService
{
	public function getAllCustomer(){
        return view('admin.customers.index');
    }

    public function getAllCustomerajax(){
        $customer = Customers::select('id', 'CustomerName', 'Address', 'City', 'PostalCode', 'Country');
        return Datatables::of($customer)
        ->addColumn('action', function($customer){
            $hostwithHttp = request()->getSchemeAndHttpHost();
            return '<a href="'.$hostwithHttp.'/admin/customers/edit/'.$customer->id.'" class="btn btn-xs btn-primary edit" id="'.$customer->id.'"><i class="bi bi-pencil-square"></i> Edit</a> <a href="'.$hostwithHttp.'/admin/customers/delete/'.$customer->id.'" class="btn btn-xs btn-danger delete" id="delete"><i class="bi bi-backspace-reverse-fill"></i> Delete</a>';
        })
        ->addColumn('checkbox', '<input type="checkbox" name="customer_checkbox[]" class="customer_checkbox" value="{{$id}}" />')
        ->rawColumns(['checkbox','action'])
        ->make(true);
    }

    public function createcontact(){
    	return view('admin.customers.create');
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
        return view('admin.customers.edit', compact('customer'));
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