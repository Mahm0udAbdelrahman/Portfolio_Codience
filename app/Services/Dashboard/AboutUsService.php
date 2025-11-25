<?php
namespace App\Services\Dashboard;

use App\Repositories\Dashboard\AboutUsRepository;
use App\Traits\HasImage;


class AboutUsService
{

     use HasImage;
    public function __construct(public AboutUsRepository $aboutUsRepository){}

    public function show()
   {

      return $this->aboutUsRepository->show();
     }
     public function update($data)
     {


           if (isset($data['image'])) {
            $data['image'] =  $this->saveImage($data['image'], 'about_us');
        }

         return $this->aboutUsRepository->update($data);
    }



}
