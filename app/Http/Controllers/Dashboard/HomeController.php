<?php
namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Nurse;
use App\Models\Banner;
use App\Models\Course;
use App\Models\Patient;
use App\Models\Analysis;
use App\Models\RaysType;
use App\Models\BloodType;
use App\Models\BloodGroup;
use App\Models\OrderPatient;
use App\Models\AnalysisCategory;
use App\Models\Category;
use App\Models\Solution;
use App\Models\Project;
use App\Models\ContactUs;
use App\Models\Visit;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        //====================admin=============
        $users_count             = User::count();
        $categories_count        = Category::count();
        $solutions_count         = Solution::count();
        $projects_count          = Project::count();
        $contact_us_count        = ContactUs::count();
        $visits_count            = Visit::count();
        
        $customers_count            = Customer::count();
        $customers_interested       = Customer::where('status', 'interested')->count();
        $customers_neutral          = Customer::where('status', 'neutral')->count();
        $customers_not_interested   = Customer::where('status', 'not_interested')->count();

        $recent_customers        = Customer::latest()->take(5)->get();
        $recent_messages         = ContactUs::latest()->take(5)->get();

        return view('admin.index', compact(
            'users_count',
            'categories_count',
            'solutions_count',
            'projects_count',
            'contact_us_count',
            'visits_count',
            'customers_count',
            'customers_interested',
            'customers_neutral',
            'customers_not_interested',
            'recent_customers',
            'recent_messages'
        ));
    }

    public function confirmDelete($model, $id)
    {
        $data = app('App\\Models\\' . ucfirst($model))->find($id);
        if ($model == 'role') {
            $data->revokePermissionTo($data->permissions);
        }

        if ($model == 'user') {
            DB::table('model_has_roles')->where('model_id', $id)->delete();

        }

        $data->delete();
        Session::flash('message', ['type' => 'success', 'text' => __('Deleted successfully')]);
        return redirect()->back();
    }

}
