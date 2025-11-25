<?php

namespace App\Services\Web;

use App\Traits\HasImage;
use App\Repositories\Web\ContactUsRepository;



class ContactUsService
{
    use HasImage;
    public function __construct(public ContactUsRepository $contactUsRepository){}

    public function index()
    {
        return $this->contactUsRepository->index();
    }



    public function store($data)
    {

        return $this->contactUsRepository->store($data);
    }

    public function show($id)
    {
        return $this->contactUsRepository->show($id);
    }

    public function update($id,$data)
    {

        return $this->contactUsRepository->update($id,$data);
    }

    public function destroy($id)
    {
        return $this->contactUsRepository->destroy($id);

    }

}
