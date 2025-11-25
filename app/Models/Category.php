<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $fillable = [
        'logo',
        'name_ar',
        'name_en',
        'status',
    ];
}
