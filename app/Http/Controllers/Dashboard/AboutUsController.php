<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Dashboard\AboutUsService;
use App\Http\Requests\Dashboard\AboutUs\AboutUsRequest;

class AboutUsController extends Controller
{
    public function __construct(public AboutUsService $aboutUsService){}

    public function show()
    {
        $about_us = $this->aboutUsService->show();
        return view("admin.about_us.edit",compact('about_us'));
    }

    public function update(AboutUsRequest $request)
    {
        $this->aboutUsService->update($request->validated());
         return redirect()->back()->with('success', 'Privacy Policy updated successfully!');
    }
}
