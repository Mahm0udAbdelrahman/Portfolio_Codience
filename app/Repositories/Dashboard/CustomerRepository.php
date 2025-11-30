<?php

namespace App\Repositories\Dashboard;

use App\Models\Customer;

class CustomerRepository
{
    public function __construct(public Customer $model){}

    public function index()
    {
        return $this->model->paginate();
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    public function update($id,$data)
    {
        $customer = $this->show($id);

        $customer->update($data);

        return $customer;
    }

    public function destroy($id)
    {
        $customer = $this->show($id);
        return $customer->delete();
    }

}
