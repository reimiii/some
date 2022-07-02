<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Guru
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
        if ( !Auth::guard('guru')->check() ) {
            return redirect()->route('guru.login')
                ->with('error', 'You must be logged in as a guru to access this page.');
        }

        if ( Auth::guard('guru')->user()->status == 'suspended' ) {

            Auth::guard('guru')->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('guru.login')
                ->with('error', 'Your account has been deactivated.');
        }

        return $next($request);
    }
}
