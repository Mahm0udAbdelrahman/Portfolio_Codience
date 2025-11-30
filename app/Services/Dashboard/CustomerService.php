<?php

namespace App\Services\Dashboard;

use App\Traits\HasImage;
use App\Repositories\Dashboard\CustomerRepository;



class CustomerService
{
    use HasImage;
    public function __construct(public CustomerRepository $customerRepository){}

    public function index()
    {
        return $this->customerRepository->index();
    }



    public function store($data)
    {

        return $this->customerRepository->store($data);
    }

    public function show($id)
    {
        return $this->customerRepository->show($id);
    }

    public function update($id,$data)
    {
        
        return $this->customerRepository->update($id,$data);
    }

    public function destroy($id)
    {
        return $this->customerRepository->destroy($id);

    }

}
