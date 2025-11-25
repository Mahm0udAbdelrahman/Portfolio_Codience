<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeyFeature extends Model
{
    public $fillable = [
        'project_id',
        'name_en',
        'name_ar',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}
