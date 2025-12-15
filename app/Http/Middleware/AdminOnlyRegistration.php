<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOnlyRegistration
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
        // Allow registration if no users exist (first-time setup)
        if (\App\Models\User::count() === 0) {
            return $next($request);
        }

        // Allow registration if user is authenticated and is admin
        if (Auth::check() && Auth::user()->role->name === 'admin') {
            return $next($request);
        }

        // Redirect non-admin users away from registration
        return redirect()->route('login')
            ->with('error', 'Only administrators can create new user accounts.');
    }
}