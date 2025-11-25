<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectTag extends Model
{
    public $fillable = [
        'project_id',
        'tag_id',
    ];
}
