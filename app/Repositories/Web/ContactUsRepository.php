<?php

namespace App\Repositories\Web;

use App\Models\ContactUs;

class ContactUsRepository
{
    public function __construct(public ContactUs $model){}

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
        $contactUs = $this->show($id);

        $contactUs->update($data);

        return $contactUs;
    }

    public function destroy($id)
    {
        $contactUs = $this->show($id);
        return $contactUs->delete();
    }

}
