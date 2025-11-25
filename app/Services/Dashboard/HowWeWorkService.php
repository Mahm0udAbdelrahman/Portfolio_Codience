<?php

namespace App\Services\Dashboard;

use App\Traits\HasImage;
use App\Repositories\Dashboard\HowWeWorkRepository;



class HowWeWorkService
{
    use HasImage;
    public function __construct(public HowWeWorkRepository $howWeWorkRepository){}

    public function index()
    {
        return $this->howWeWorkRepository->index();
    }



    public function store($data)
    {
        if (isset($data['logo'])) {
            $data['logo'] =  $this->saveImage($data['logo'], 'how_we_works');
        }
        return $this->howWeWorkRepository->store($data);
    }

    public function show($id)
    {
        return $this->howWeWorkRepository->show($id);
    }

    public function update($id,$data)
    {
        if (isset($data['logo'])) {
            $how_we_work = $this->howWeWorkRepository->show($id);
            $data['logo'] =  $this->updateImage($data['logo'], 'how_we_works', $how_we_work->logo);
        }
        return $this->howWeWorkRepository->update($id,$data);
    }

    public function destroy($id)
    {
        return $this->howWeWorkRepository->destroy($id);

    }

}
