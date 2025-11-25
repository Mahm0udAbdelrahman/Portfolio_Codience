<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcjectImage extends Model
{
    public $fillable = [
        'project_id',
        'image',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    
}
