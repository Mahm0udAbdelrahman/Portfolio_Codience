<?php
namespace App\Http\Controllers\Dashboard;

use App\Services\Dashboard\TagService;
use App\Http\Requests\Dashboard\Tag\StoreTagRequest;

class TagController
{
    public function __construct(public TagService $tagService)
    {}

    public function index()
    {
        $data = $this->tagService->index();
        return view('admin.tags.index', compact('data'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(StoreTagRequest $storeTagRequest)
    {
        $this->tagService->store($storeTagRequest->validated());
        return redirect()->route('Admin.tags.index')->with('success', 'Tag created successfully!');
    }

    public function show($id)
    {
        return $this->tagService->show($id);
    }

    public function edit($id)
    {
        $tag = $this->tagService->show($id);
        return view('admin.tags.edit', compact('tag'));
    }

    public function update($id, StoreTagRequest $storeTagRequest)
    {
        $this->tagService->update($id, $storeTagRequest->validated());
        return redirect()->route('Admin.tags.index')->with('success', 'Tag created successfully!');

    }

    public function destroy($id)
    {
        $this->tagService->destroy($id);
        return redirect()->route('Admin.tags.index')->with('success', 'Tag created successfully!');

    }

}
