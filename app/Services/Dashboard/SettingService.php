<?php
namespace App\Services\Dashboard;

use App\Traits\HasImage;
use App\Repositories\Dashboard\SettingRepository;


class SettingService
{

     use HasImage;
    public function __construct(public SettingRepository $settingRepository){}

    public function show()
   {

      return $this->settingRepository->show();
     }
     public function update($data)
     {
           if (isset($data['logo'])) {
            $data['logo'] =  $this->saveImage($data['logo'], 'setting');
        }

           if (isset($data['image'])) {
            $data['image'] =  $this->saveImage($data['image'], 'setting');
        }

         return $this->settingRepository->update($data);
    }



}
