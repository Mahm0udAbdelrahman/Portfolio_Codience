<?php
namespace App\Http\Middleware;

use App\Models\Visit;
use Closure;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class TrackVisitors
{
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();


        $exists = Visit::where('ip', $ip)->exists();

        if (! $exists) {

            $position = Location::get($ip);

            Visit::create([
                'ip'       => $ip,
                'device'   => $request->header('User-Agent'),
                'browser'  => $this->getBrowser($request->header('User-Agent')),
                'country'  => $position?->countryName ?? '',
                'page'     => $request->fullUrl(),
                'referrer' => $request->headers->get('referer'),
            ]);
        }

        return $next($request);
    }

    private function getBrowser($userAgent)
    {
        if (strpos($userAgent, 'Chrome') !== false) {
            return 'Chrome';
        }

        if (strpos($userAgent, 'Firefox') !== false) {
            return 'Firefox';
        }

        if (strpos($userAgent, 'Safari') !== false) {
            return 'Safari';
        }

        if (strpos($userAgent, 'MSIE') !== false) {
            return 'Internet Explorer';
        }

        return 'Unknown';
    }
}
