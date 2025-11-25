<?php
namespace App\Http\Controllers\Web;

use App\Services\Web\ContactUsService;
use App\Http\Requests\Web\ContactUs\StoreContactUsRequest;

class ContactUsController
{
    public function __construct(public ContactUsService $categoryService)
    {}


    public function store(StoreContactUsRequest $storeContactUsRequest)
    {
        $this->categoryService->store($storeContactUsRequest->validated());
        return redirect()->route('web.home')->with('success', 'ContactUs created successfully!');
    }



}
