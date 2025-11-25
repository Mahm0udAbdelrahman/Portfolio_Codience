<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ContactUsController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Route::get('/', function () {
//     return view('web.pages.home');
// });

Route::group(
    [
        'prefix'     => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ], function () {
Route::get('/', [HomeController::class, 'index'])->name('web.home');
Route::get('/project_detail/{id}', [HomeController::class, 'show'])->name('web.project_detail');

Route::post('/contact_us/store', [ContactUsController::class, 'store'])->name('web.contact_us.store');
   });

require __DIR__ . '/dashboard.php';
