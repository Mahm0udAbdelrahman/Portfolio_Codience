<?php

namespace App\Services\Dashboard;

use App\Traits\HasImage;
use App\Repositories\Dashboard\TagRepository;

class TagService
{
    use HasImage;
    public function __construct(public TagRepository $tagRepository){}

    public function index()
    {
        return $this->tagRepository->index();
    }



    public function store($data)
    {

        return $this->tagRepository->store($data);
    }

    public function show($id)
    {
        return $this->tagRepository->show($id);
    }

    public function update($id,$data)
    {

        return $this->tagRepository->update($id,$data);
    }

    public function destroy($id)
    {
        return $this->tagRepository->destroy($id);

    }

}
