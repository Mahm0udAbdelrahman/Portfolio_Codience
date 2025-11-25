<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HowWeWork extends Model
{
    public $fillable = [
        'logo',
        'title_ar',
        'title_en',
        'description_ar',
        'description_en',
        'status',
    ];
}
