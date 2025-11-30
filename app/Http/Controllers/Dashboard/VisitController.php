<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class VisitController extends Controller
{
     public function index()
    {

        $totalVisits = Visit::count();


        $visitsByCountry = Visit::select('country', DB::raw('count(*) as total'))
            ->groupBy('country')
            ->orderBy('total', 'desc')
            ->get();


        $visitsByBrowser = Visit::select('browser', DB::raw('count(*) as total'))
            ->groupBy('browser')
            ->orderBy('total', 'desc')
            ->get();


        $visitsByPage = Visit::select('page', DB::raw('count(*) as total'))
            ->groupBy('page')
            ->orderBy('total', 'desc')
            ->limit(10)
            ->get();

        return view('admin.visits.index', compact(
            'totalVisits',
            'visitsByCountry',
            'visitsByBrowser',
            'visitsByPage'
        ));
    }
}
