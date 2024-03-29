<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\CustomerService;

class CustomersController extends Controller
{
    protected $customerservice;

    public function __construct(CustomerService $customerservice)
    {
        $this->customerservice = $customerservice;
    }

    function index()
    {
        return $customer = $this->customerservice->getAllCustomer();
    }

    function getdata()
    {
        return $customer = $this->customerservice->getAllCustomerajax();
    }

    public function store(Request $request)
    {
        $customer = $this->customerservice->customerStore($request);
        return redirect()->route('all.customers')->with('message', 'Customer Created!');
    }

    public function create()
    {
        return $customer = $this->customerservice->createcontact();
    }

    public function edit($id)
    {
        return $customer = $this->customerservice->editcontact($id);
    }

    public function update(Request $request, $id)
    {
        $customer = $this->customerservice->customerUpdate($request, $id);
        return redirect()->route('all.customers')->with('message', 'Customer Updated!');
    }

    public function delete(Request $request, $id)
    {
        $customer = $this->customerservice->deleteCustomer($request, $id);
        return back()->with('error', 'Customer Deleted!');
    }
}
