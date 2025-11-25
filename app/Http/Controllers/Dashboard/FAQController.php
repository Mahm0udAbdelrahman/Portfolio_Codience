<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\FAQ\StoreFAQRequest;
use App\Services\Dashboard\FAQService;

class FAQController
{
    public function __construct(public FAQService $FAQService)
    {}

    public function index()
    {
        $data = $this->FAQService->index();
        return view('admin.fqas.index', compact('data'));
    }

    public function create()
    {
        return view('admin.fqas.create');
    }

    public function store(StoreFAQRequest $storeFAQRequest)
    {
        $this->FAQService->store($storeFAQRequest->validated());
        return redirect()->route('Admin.fqas.index')->with('success', 'FAQ created successfully!');
    }

    public function show($id)
    {
        return $this->FAQService->show($id);
    }

    public function edit($id)
    {
        $fqa = $this->FAQService->show($id);
        return view('admin.fqas.edit', compact('fqa'));
    }

    public function update($id, StoreFAQRequest $storeFAQRequest)
    {
        $this->FAQService->update($id, $storeFAQRequest->validated());
        return redirect()->route('Admin.fqas.index')->with('success', 'FAQ created successfully!');

    }

    public function destroy($id)
    {
        $this->FAQService->destroy($id);
        return redirect()->route('Admin.fqas.index')->with('success', 'FAQ created successfully!');

    }

}
