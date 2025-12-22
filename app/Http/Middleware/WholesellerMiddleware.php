<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WholesellerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('web')->check()) {
            if (Auth::guard('web')->user()->role == "5") {
                return $next($request);
            } else {
                abort(403, 'Unauthorized access');
            }
        } else {
            return redirect()->route('wholeseller.login');
        }
    }
}
