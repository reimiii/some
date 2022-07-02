<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Moderator {

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if ( !Auth::guard('moderator')->check() ) {
            return redirect()->route('moderator.login')
                ->with('error', 'You must be logged in as a moderator to access this page.');
        }

        if ( Auth::guard('moderator')->user()->status == 'non-active' || Auth::guard('moderator')->user()->status == '' ) {

            Auth::guard('moderator')->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('moderator.login')
                ->with('error', 'Your account has been deactivated.');
        }

        return $next($request);
    }

}
