<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Http\Requests\StoreGuruRequest;
use App\Http\Requests\UpdateGuruRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{

    public function index()
    {
        if (Auth::guard('guru')->check()) {
            return redirect()->route('guru.dashboard');
        }

        if (Auth::guard('moderator')->check()) {
            return redirect()->route('moderator.dashboard');
        }

        if (Auth::guard('web')->check()) {
            return redirect()->route('dashboard');
        }

        return view('guru.auth.login');
    }

    public function dashboard()
    {
        return view('guru.index');
    }


    public function store(StoreGuruRequest $request)
    {
        $request->authenticateGuru();
        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::GURU_HOME);
    }


    public function destroy(Request $guru)
    {
            Auth::guard('guru')->logout();

            $guru->session()->invalidate();
            $guru->session()->regenerateToken();

            return redirect('/guru/login');
    }
}
