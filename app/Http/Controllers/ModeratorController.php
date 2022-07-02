<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Moderator;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\StoreModeratorRequest;
use App\Http\Requests\UpdateModeratorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModeratorController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( Auth::guard('moderator')->check() ) {
            return redirect()->route('moderator.dashboard');
        }

        if ( Auth::guard('guru')->check() ) {
            return redirect()->route('guru.dashboard');
        }

        if ( Auth::guard('web')->check() ) {
            return redirect()->route('dashboard');
        }

        return view('moderator.auth.login');
    }


    public function store(StoreModeratorRequest $request)
    {
        $request->authenticateMod();
        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::MODERATOR_HOME);
    }

    public function destroy(Request $moderator)
    {

        Auth::guard('moderator')->logout();

        $moderator->session()->invalidate();
        $moderator->session()->regenerateToken();

        return redirect('/moderator/login');

    }

}
