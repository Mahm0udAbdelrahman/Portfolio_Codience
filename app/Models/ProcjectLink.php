<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcjectLink extends Model
{
    public $fillable = [
        'project_id',
        'link',

    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
