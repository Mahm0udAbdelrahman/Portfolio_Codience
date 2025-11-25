<?php
namespace App\Services\Dashboard;

use App\Models\Project;
use App\Repositories\Dashboard\ProjectRepository;
use Illuminate\Http\Request;

class ProjectService
{
    public function __construct(public ProjectRepository $repository)
    {}

    public function store(Request $request)
    {
        $project = $this->repository->create($request->only([
            'category_id', 'title_ar', 'title_en', 'description_ar', 'description_en',
            'project_overview_ar', 'project_overview_en', 'challenga_ar', 'challenga_en',
            'solution_ar', 'solution_en',
        ]));

        if ($request->tag_id) {
            $this->repository->syncTags($project, $request->tag_id);
        }

        $this->uploadImages($request, $project);

        $this->saveLinks($request, $project);

         $this->saveFeatures($request, $project);

        return $project;
    }

    public function update(Request $request, Project $project)
    {
        $this->repository->update($project, $request->only([
            'category_id', 'title_ar', 'title_en', 'description_ar', 'description_en',
            'project_overview_ar', 'project_overview_en', 'challenga_ar', 'challenga_en',
            'solution_ar', 'solution_en',
        ]));

        $this->repository->syncTags($project, $request->tag_id ?? []);

        $this->uploadImages($request, $project);

        $this->repository->deleteLinks($project);
        $this->saveLinks($request, $project);

        $this->repository->deleteFeatures($project);
        $this->saveFeatures($request, $project);

        return $project;
    }

    private function uploadImages($request, $project)
    {
        if ($request->hasFile('images')) {
            foreach ($request->images as $image) {
                $name = time() . rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('storage/projects'), $name);
                $this->repository->saveImage($project, $name);
            }
        }
    }

    private function saveLinks($request, $project)
{
    if ($request->links_dynamic && is_array($request->links_dynamic)) {
        foreach ($request->links_dynamic as $link) {
            $link = trim($link);
            if ($link !== '') {
                $this->repository->saveLink($project, $link);
            }
        }
    }
}


        private function saveFeatures($request, $project)
    {
        if ($request->features_en && $request->features_ar) {
            foreach ($request->features_en as $index => $name_en) {
                $name_en = trim($name_en);
                $name_ar = trim($request->features_ar[$index] ?? '');
                if ($name_en !== '' || $name_ar !== '') {
                    $this->repository->saveFeature($project, $name_en, $name_ar);
                }
            }
        }
    }
}
