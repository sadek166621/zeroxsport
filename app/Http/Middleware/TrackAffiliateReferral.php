<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TrackAffiliateReferral
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('ref')) {
            session(['affiliate_ref' => $request->get('ref')]);
        }

        return $next($request);
    }
}
