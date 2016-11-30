<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminGroup
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ((!Auth::guest() && !$request->user()->hasRole('admin'))
            || Auth::guest()) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
