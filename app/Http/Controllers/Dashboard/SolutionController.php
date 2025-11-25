<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\Solution\StoreSolutionRequest;
use App\Services\Dashboard\SolutionService;

class SolutionController
{
    public function __construct(public SolutionService $solutionService)
    {}

    public function index()
    {
        $data = $this->solutionService->index();
        return view('admin.solutions.index', compact('data'));
    }

    public function create()
    {
        return view('admin.solutions.create');
    }

    public function store(StoreSolutionRequest $storeSolutionRequest)
    {
        $this->solutionService->store($storeSolutionRequest->validated());
        return redirect()->route('Admin.solutions.index')->with('success', 'Solution created successfully!');
    }

    public function show($id)
    {
        return $this->solutionService->show($id);
    }

    public function edit($id)
    {
        $Solution = $this->solutionService->show($id);
        return view('admin.solutions.edit', compact('Solution'));
    }

    public function update($id, StoreSolutionRequest $storeSolutionRequest)
    {
        $this->solutionService->update($id, $storeSolutionRequest->validated());
        return redirect()->route('Admin.solutions.index')->with('success', 'Solution created successfully!');

    }

    public function destroy($id)
    {
        $this->solutionService->destroy($id);
        return redirect()->route('Admin.solutions.index')->with('success', 'Solution created successfully!');

    }

}
