<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\Category\StoreCategoryRequest;
use App\Services\Dashboard\CategoryService;

class CategoryController
{
    public function __construct(public CategoryService $categoryService)
    {}

    public function index()
    {
        $data = $this->categoryService->index();
        return view('admin.categories.index', compact('data'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $storeCategoryRequest)
    {
        $this->categoryService->store($storeCategoryRequest->validated());
        return redirect()->route('Admin.categories.index')->with('success', 'Category created successfully!');
    }

    public function show($id)
    {
        return $this->categoryService->show($id);
    }

    public function edit($id)
    {
        $category = $this->categoryService->show($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update($id, StoreCategoryRequest $storeCategoryRequest)
    {
        $this->categoryService->update($id, $storeCategoryRequest->validated());
        return redirect()->route('Admin.categories.index')->with('success', 'Category created successfully!');

    }

    public function destroy($id)
    {
        $this->categoryService->destroy($id);
        return redirect()->route('Admin.categories.index')->with('success', 'Category created successfully!');

    }

}
