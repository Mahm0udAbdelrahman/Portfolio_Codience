<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\FAQController;
use App\Http\Controllers\Dashboard\TagController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\VisitController;
use App\Http\Controllers\Dashboard\AboutUsController;
use App\Http\Controllers\Dashboard\ProjectController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CustomerController;
use App\Http\Controllers\Dashboard\SolutionController;
use App\Http\Controllers\Dashboard\ContactUsController;
use App\Http\Controllers\Dashboard\HowWeWorkController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix'     => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ], function () {

        Route::get('/admin/login', [AuthController::class, 'login'])->name('login');
        Route::post('/admin/login', [AuthController::class, 'loginAction'])->name('loginAction');

        Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'Admin.'], function () {
            // home
            Route::get('/home', [HomeController::class, 'index'])->name('home');
            Route::get('/delete/{model}/{id}', [HomeController::class, 'confirmDelete'])->name('confirmDelete');
            Route::get('logout', [AuthController::class, 'logout'])->name('logout');
            Route::resource('customer', CustomerController::class);
            Route::resource('categories', CategoryController::class);
            Route::resource('contact_us', ContactUsController::class);
            Route::get('setting/show', [SettingController::class, 'show'])->name('setting.show');
            Route::put('setting/update', [SettingController::class, 'update'])->name('setting.update');

            Route::get('about_us/show', [AboutUsController::class, 'show'])->name('about_us.show');
            Route::put('about_us/update', [AboutUsController::class, 'update'])->name('about_us.update');

            Route::resource('fqas', FAQController::class);
            Route::resource('solutions', SolutionController::class);
            Route::resource('how_we_works', HowWeWorkController::class);
             Route::resource('tags', TagController::class);
             Route::resource('projects', ProjectController::class);

            Route::get('visits', [VisitController::class, 'index'])->name('visits.index');


        });
    });
Route::get('/notifications/count', function () {
    return response()->json([
        'unread_count' => auth()->user()->unreadNotifications()->count(),
    ]);
})->name('notifications.count');
