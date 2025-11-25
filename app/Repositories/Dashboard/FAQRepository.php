<?php

namespace App\Repositories\Dashboard;

use App\Models\FAQ;

class FAQRepository
{
    public function __construct(public FAQ $model){}

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
        $category = $this->show($id);

        $category->update($data);

        return $category;
    }

    public function destroy($id)
    {
        $category = $this->show($id);
        return $category->delete();
    }

}
