<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ContactUsController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/', function () {
    return redirect()->route('web.home');
});

// Route to switch language
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session(['locale' => $locale]);
        cookie()->queue('locale', $locale, 60 * 24 * 365);
    }
    return redirect()->back();
})->name('change_language');

Route::group(
    [
        'middleware' => ['track.visitors'],
    ], function () {
        Route::get('/home', [HomeController::class, 'index'])->name('web.home');
        Route::get('/project_detail/{id}', [HomeController::class, 'show'])->name('web.project_detail');

        Route::post('/contact_us/store', [ContactUsController::class, 'store'])->name('web.contact_us.store');
    }
);

require __DIR__ . '/dashboard.php';
