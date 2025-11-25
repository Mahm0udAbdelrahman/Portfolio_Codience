<?php
namespace App\Http\Controllers\Dashboard;

use App\Services\Dashboard\HowWeWorkService;
use App\Http\Requests\Dashboard\HowWeWork\StoreHowWeWorkRequest;

class HowWeWorkController
{
    public function __construct(public HowWeWorkService $howWeWorkService)
    {}

    public function index()
    {
        $data = $this->howWeWorkService->index();
        return view('admin.how_we_works.index', compact('data'));
    }

    public function create()
    {
        return view('admin.how_we_works.create');
    }

    public function store(StoreHowWeWorkRequest $storeHowWeWorkRequest)
    {
        $this->howWeWorkService->store($storeHowWeWorkRequest->validated());
        return redirect()->route('Admin.how_we_works.index')->with('success', 'HowWeWork created successfully!');
    }

    public function show($id)
    {
        return $this->howWeWorkService->show($id);
    }

    public function edit($id)
    {
        $how_we_work = $this->howWeWorkService->show($id);
        return view('admin.how_we_works.edit', compact('how_we_work'));
    }

    public function update($id, StoreHowWeWorkRequest $storeHowWeWorkRequest)
    {
        $this->howWeWorkService->update($id, $storeHowWeWorkRequest->validated());
        return redirect()->route('Admin.how_we_works.index')->with('success', 'HowWeWork created successfully!');

    }

    public function destroy($id)
    {
        $this->howWeWorkService->destroy($id);
        return redirect()->route('Admin.how_we_works.index')->with('success', 'HowWeWork created successfully!');

    }

}
