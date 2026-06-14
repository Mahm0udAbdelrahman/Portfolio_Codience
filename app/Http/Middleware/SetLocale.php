<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('locale')) {
            App::setLocale(session('locale'));
        } elseif ($request->hasCookie('locale')) {
            $locale = $request->cookie('locale');
            if (in_array($locale, ['en', 'ar'])) {
                App::setLocale($locale);
                session(['locale' => $locale]);
            }
        } else {
            // Detect locale from browser or fallback to default
            $preferred = $request->getPreferredLanguage(['en', 'ar']);
            $locale = $preferred ?: config('app.locale', 'en');
            App::setLocale($locale);
            session(['locale' => $locale]);
        }

        return $next($request);
    }
}
