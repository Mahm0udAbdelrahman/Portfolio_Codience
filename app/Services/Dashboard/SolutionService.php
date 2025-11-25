<?php

namespace App\Services\Dashboard;

use App\Traits\HasImage;
use App\Repositories\Dashboard\SolutionRepository;

class SolutionService
{
    use HasImage;
    public function __construct(public SolutionRepository $solutionRepository){}

    public function index()
    {
        return $this->solutionRepository->index();
    }



    public function store($data)
    {
        if (isset($data['logo'])) {
            $data['logo'] =  $this->saveImage($data['logo'], 'solutions');
        }
        return $this->solutionRepository->store($data);
    }

    public function show($id)
    {
        return $this->solutionRepository->show($id);
    }

    public function update($id,$data)
    {
        if (isset($data['logo'])) {
            $solution = $this->solutionRepository->show($id);
            $data['logo'] =  $this->updateImage($data['logo'], 'solutions', $solution->logo);
        }
        return $this->solutionRepository->update($id,$data);
    }

    public function destroy($id)
    {
        return $this->solutionRepository->destroy($id);

    }

}
