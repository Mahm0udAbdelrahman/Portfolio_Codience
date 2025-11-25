<?php
namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use App\Models\Project;
use App\Models\Tag;
use App\Services\Dashboard\ProjectService;
use Illuminate\Http\Request;

class ProjectController
{

    public function __construct(public ProjectService $projectService)
    {}

    public function index()
    {
        $data = Project::with(['category', 'tags', 'images'])->latest()->paginate();
        return view('admin.projects.index', compact('data'));
    }

    public function create()
    {
        return view('admin.projects.create', [
            'categories' => Category::all(),
            'tags'       => Tag::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id'    => 'required|exists:categories,id',
            'title_ar'       => 'required|string|max:255',
            'title_en'       => 'required|string|max:255',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'features_en'    => 'nullable|array',
            'features_ar'    => 'nullable|array',
        ]);

        $this->projectService->store($request);
        return redirect()->route('Admin.projects.index')->with('success', __('Project Created Successfully'));
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', [
            'project'    => $project,
            'categories' => Category::all(),
            'tags'       => Tag::all(),
        ]);
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'category_id'    => 'required|exists:categories,id',
            'title_ar'       => 'required|string|max:255',
            'title_en'       => 'required|string|max:255',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'features_en'    => 'nullable|array',
            'features_ar'    => 'nullable|array',
        ]);

        $this->projectService->update($request, $project);
        return redirect()->route('Admin.projects.index')->with('success', __('Project Updated Successfully'));
    }

    public function destroy($id)
    {
        Project::findOrFail($id)->delete();
        return redirect()->route('Admin.projects.index')->with('success', __('Project Deleted Successfully'));
    }

}
