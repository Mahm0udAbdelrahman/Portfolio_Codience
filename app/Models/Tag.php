<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $fillable = [
        'name_ar',
        'name_en',
        'status',
    ];


    Public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_tags', 'tag_id', 'project_id');
    }
}
