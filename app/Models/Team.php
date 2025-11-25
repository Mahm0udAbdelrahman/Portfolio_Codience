<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public $fillable = [
        'image',
        'name_ar',
        'name_en',
        'position_ar',
        'position_en',
        'description_ar',
        'description_en',
        'twitter',
        'facebook',
        'instagram',
        'linkedin',
        'youtube',
        'whatsapp'
    ];
}
