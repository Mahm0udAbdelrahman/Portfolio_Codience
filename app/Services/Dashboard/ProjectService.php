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
    // Update main project data
    $this->repository->update($project, $request->only([
        'category_id', 'title_ar', 'title_en', 'description_ar', 'description_en',
        'project_overview_ar', 'project_overview_en', 'challenga_ar', 'challenga_en',
        'solution_ar', 'solution_en',
    ]));

    // ************* TAGS UPDATE *************
    if ($request->has('tag_id')) {
        // لو وصلت بيانات tags: اعمل Sync عادي
        $this->repository->syncTags($project, $request->tag_id ?? []);
    }
    // لو معملتش ارسال أي tags فلا تعمل تعديل = حافظ على القديم ❗

    // ************* IMAGES UPLOAD *************
    $this->uploadImages($request, $project);

    // ************* LINKS UPDATE *************
    if ($request->has('links_dynamic')) {
        // هنضيف الجديد فقط، من غير ما نمسح القديم
        $this->saveLinks($request, $project);
    }
    // لو محصلش إرسال links_dynamic نحافظ على الموجود ❗

    // ************* FEATURES UPDATE *************
    if ($request->has('features_en') && $request->has('features_ar')) {
        // نمسح القديم ونضيف الجديد (لأنها دايمًا بتتغير كاملة)
        $this->repository->deleteFeatures($project);
        $this->saveFeatures($request, $project);
    }

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

        // الحصول على اللينكات الموجودة بالفعل داخل المشروع
        $existingLinks = $project->links->pluck('link')->toArray();

        foreach ($request->links_dynamic as $link) {
            $link = trim($link);
            if ($link !== '' && !in_array($link, $existingLinks)) {
                // أضف فقط لو مش موجود قبل كده
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
