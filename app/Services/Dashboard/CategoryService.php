<?php

namespace App\Services\Dashboard;

use App\Traits\HasImage;
use App\Repositories\Dashboard\CategoryRepository;



class CategoryService
{
    use HasImage;
    public function __construct(public CategoryRepository $categoryRepository){}

    public function index()
    {
        return $this->categoryRepository->index();
    }



    public function store($data)
    {
        if (isset($data['logo'])) {
            $data['logo'] =  $this->saveImage($data['logo'], 'categories');
        }
        return $this->categoryRepository->store($data);
    }

    public function show($id)
    {
        return $this->categoryRepository->show($id);
    }

    public function update($id,$data)
    {
        if (isset($data['logo'])) {
            $oldCategory = $this->categoryRepository->show($id);
            $data['logo'] =  $this->updateImage($data['logo'], 'categories', $oldCategory->logo);
        }
        return $this->categoryRepository->update($id,$data);
    }

    public function destroy($id)
    {
        return $this->categoryRepository->destroy($id);

    }

}
