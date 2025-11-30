<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visit;
use Stevebauman\Location\Facades\Location;

class TrackVisitors
{
    public function handle(Request $request, Closure $next)
    {
    
        $position = Location::get($request->ip());

        Visit::create([
            'ip' => $request->ip(),
            'device' => $request->header('User-Agent'),
            'browser' => $this->getBrowser($request->header('User-Agent')),
            'country' => $position?->countryName,
            'page' => $request->fullUrl(),
            'referrer' => $request->headers->get('referer')
        ]);

        return $next($request);
    }

    private function getBrowser($userAgent)
    {
        if(strpos($userAgent, 'Chrome') !== false) return 'Chrome';
        if(strpos($userAgent, 'Firefox') !== false) return 'Firefox';
        if(strpos($userAgent, 'Safari') !== false) return 'Safari';
        if(strpos($userAgent, 'MSIE') !== false) return 'Internet Explorer';
        return 'Unknown';
    }
}
