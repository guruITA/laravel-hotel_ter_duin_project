<?php

namespace App\Http\Middleware;

use Closure;

class checkLogin
{
    public function handle($request, Closure $next)
    {
        if (!$request->session()->has('username')) {

            return redirect('/login');
        }

        $response = $next($request);

        // Disable caching
        $response->header('Cache-Control', 'no-cache, no-store, must-revalidate');
        $response->header('Pragma', 'no-cache');
        $response->header('Expires', '0');

        return $response;
    }
}