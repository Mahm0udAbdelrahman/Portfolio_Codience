<?php
namespace App\Http\Controllers\Web;

use App\Models\Setting;
use App\Models\Solution;
use App\Services\Dashboard\TagService;
use App\Http\Requests\Dashboard\Tag\StoreTagRequest;
use App\Models\Category;
use App\Models\FAQ;
use App\Models\HowWeWork;
use App\Models\Project;

class HomeController
{
   public function index()
   {
    $setting =  Setting::first();
      $solutions =  Solution::where('status','active')->get();
      $HowWeWorks =  HowWeWork::where('status','active')->get();
      $categories =  Category::where('status','active')->get();
      $projects =  Project::all();
      $faqs =  FAQ::where('status','active')->get();
       return view('web.pages.home', compact('setting', 'solutions','HowWeWorks','categories','projects','faqs'));
   }

   public function show($id)
   {
       $project = Project::findOrFail($id);
       return view('web.pages.project_detail', compact('project'));
   }

}
