<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $fillable = [
        'name_company',
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'logo',
        'image',
        'description_footer_ar',
        'description_footer_en',
        'address_en',
        'address_ar',
        'email',
        'phone',
        'twitter',
        'facebook',
        'instagram',
        'linkedin',
        'whatsapp'
    ];
}
