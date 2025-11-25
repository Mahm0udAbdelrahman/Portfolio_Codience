<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $fillable = [
        'category_id',
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'project_overview_ar',
        'project_overview_en',
        'challenga_ar',
        'challenga_en',
        'solution_ar',
        'solution_en',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function images()
    {
        return $this->hasMany(ProcjectImage::class, 'project_id');
    }

    public function links()
    {
        return $this->hasMany(ProcjectLink::class, 'project_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'project_tags', 'project_id', 'tag_id');
    }

    public function features()
    {
        return $this->hasMany(KeyFeature::class, 'project_id');
    }

}
