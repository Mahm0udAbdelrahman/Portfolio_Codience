<?php
namespace App\Repositories\Dashboard;

use App\Models\Customer;

class CustomerRepository
{
    public function __construct(public Customer $model)
    {}

    public function index($data)
    {
        $query = $this->model->query();

        if ($data->filled('search')) {
            $search = $data->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('phone', 'like', "%$search%");
            });
        }

        return $query->paginate(10);
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    public function update($id, $data)
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
