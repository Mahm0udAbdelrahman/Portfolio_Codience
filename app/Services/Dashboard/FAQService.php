<?php

namespace App\Services\Dashboard;

use App\Traits\HasImage;
use App\Repositories\Dashboard\FAQRepository;

class FAQService
{
    use HasImage;
    public function __construct(public FAQRepository $fAQRepository){}

    public function index()
    {
        return $this->fAQRepository->index();
    }



    public function store($data)
    {

        return $this->fAQRepository->store($data);
    }

    public function show($id)
    {
        return $this->fAQRepository->show($id);
    }

    public function update($id,$data)
    {

        return $this->fAQRepository->update($id,$data);
    }

    public function destroy($id)
    {
        return $this->fAQRepository->destroy($id);

    }

}
