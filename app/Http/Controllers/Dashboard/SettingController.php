<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Dashboard\SettingService;
use App\Http\Requests\Dashboard\Setting\SettingRequest;

class SettingController extends Controller
{
    public function __construct(public SettingService $settingService){}

    public function show()
    {
        $setting = $this->settingService->show();
        return view("admin.setting.edit",compact('setting'));
    }

    public function update(SettingRequest $request)
    {
        $this->settingService->update($request->validated());
         return redirect()->back()->with('success', 'Privacy Policy updated successfully!');
    }
}
