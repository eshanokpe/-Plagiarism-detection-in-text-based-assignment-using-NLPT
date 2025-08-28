<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class LecturerMiddleware
{ 
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('lecturer')->check()) {
            return $next($request);
        }

        return redirect()->route('lecturer.login')->with('error', 'You must be logged in as an admin.');
    }
}

