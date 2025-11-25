<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    public $fillable = [
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'image',
        'sub_title_one_en',
        'sub_title_one_ar',
        'sub_description_one_en',
        'sub_description_one_ar',
        'sub_title_two_en',
        'sub_title_two_ar',
        'sub_description_two_en',
        'sub_description_two_ar',
    ];
}
