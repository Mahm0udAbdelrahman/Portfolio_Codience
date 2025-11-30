<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\Customer\StoreCustomerRequest;
use App\Services\Dashboard\customerService;

class CustomerController
{
    public function __construct(public CustomerService $customerService)
    {}

    public function index()
    {
        $data = $this->customerService->index();
        return view('admin.customers.index', compact('data'));
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(StoreCustomerRequest $storeCustomerRequest)
    {
        $this->customerService->store($storeCustomerRequest->validated());
        return redirect()->route('Admin.customers.index')->with('success', 'Customer created successfully!');
    }

    public function show($id)
    {
       $customer =  $this->customerService->show($id);
         return view('admin.customers.show', compact('customer'));
    }

    public function edit($id)
    {
        $customer = $this->customerService->show($id);
        return view('admin.customers.edit', compact('customer'));
    }

    public function update($id, StoreCustomerRequest $storeCustomerRequest)
    {
        $this->customerService->update($id, $storeCustomerRequest->validated());
        return redirect()->route('Admin.customers.index')->with('success', 'Customer updated successfully!');

    }

    public function destroy($id)
    {
        $this->customerService->destroy($id);
        return redirect()->route('Admin.customers.index')->with('success', 'Customer deleted successfully!');

    }

}
