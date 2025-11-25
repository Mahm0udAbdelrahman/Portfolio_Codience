<?php
namespace App\Repositories\Dashboard;

use App\Models\AboutUs;

class AboutUsRepository
{
    public function __construct(public AboutUs $model){}

    public function show()
   {

      return $this->model->first();
     }
     public function update($data)
     {


         $setting = $this->model->first();

         if ($setting) {
             $setting->update($data);
         } else {
            $this->model->create($data);
         }

         return $setting;

}



}
