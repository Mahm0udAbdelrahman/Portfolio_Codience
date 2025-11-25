<?php

namespace App\Repositories\Dashboard;
;

use App\Models\Project;
use App\Models\ProcjectImage;
use App\Models\ProcjectLink;

class ProjectRepository
{
    public function create(array $data)
    {
        return Project::create($data);
    }

    public function update(Project $project, array $data)
    {
        return $project->update($data);
    }

    public function syncTags(Project $project, array $tags = [])
    {
        $project->tags()->sync($tags);
    }

    public function saveImage(Project $project, $name)
    {
        return ProcjectImage::create([
            'project_id' => $project->id,
            'image'      => $name,
        ]);
    }

    public function deleteLinks(Project $project)
    {
        $project->links()->delete();
    }

    public function saveLink(Project $project, $link)
    {
        return ProcjectLink::create([
            'project_id' => $project->id,
            'link'       => $link,
        ]);
    }

     public function saveFeature($project, $name_en, $name_ar)
    {
        return $project->features()->create([
            'name_en' => $name_en,
            'name_ar' => $name_ar,
        ]);
    }

    public function deleteFeatures($project)
    {
        $project->features()->delete();
    }
}
