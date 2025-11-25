<?php
namespace App\Http\Controllers\Dashboard;

use App\Services\Web\ContactUsService;
use App\Http\Requests\Dashboard\ContactUs\StoreContactUsRequest;

class ContactUsController
{
    public function __construct(public ContactUsService $contactUsService)
    {}

    public function index()
    {
        $data = $this->contactUsService->index();
        return view('admin.contact_us.index', compact('data'));
    }



    public function show($id)
    {
        return $this->contactUsService->show($id);
    }

    public function edit($id)
    {
        $contact_us = $this->contactUsService->show($id);
        return view('admin.contact_us.edit', compact('contact_us'));
    }

    public function update($id, StoreContactUsRequest $storeContactUsRequest)
    {
        $this->contactUsService->update($id, $storeContactUsRequest->validated());
        return redirect()->route('Admin.contact_us.index')->with('success', 'Category created successfully!');

    }

    public function destroy($id)
    {
        $this->contactUsService->destroy($id);
        return redirect()->route('Admin.contact_us.index')->with('success', 'Category created successfully!');

    }

}
