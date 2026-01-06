<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureStaffLoggedIn
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->get('staff_logged_in')) {
            return redirect()->route('staff.login');
        }

        return $next($request);
    }
}
