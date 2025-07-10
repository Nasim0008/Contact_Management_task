<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {

        if (!$request->session()->has('is_admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Unauthorized access');
        }
        return $next($request);
    }
}
