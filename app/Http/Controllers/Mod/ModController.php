<?php

namespace App\Http\Controllers\Mod;

use App\Http\Controllers\Controller;
use App\Models\Moderator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Symfony\Component\HttpFoundation\Response;

class ModController extends Controller {

    public static $smod = [
        'imiia75775@gmail.com',
        'annamae.glover@example.com',
        'arnold.weissnat@example.net'
    ];

    public function __construct()
    {
        $this->middleware('moderator');
    }

    public function profile(Moderator $moderator)
    {
        if ( auth()->guard('moderator')->user()->id != $moderator->id ) {
            abort(Response::HTTP_FORBIDDEN);
        }

        return view('moderator.setting.profile', [
            'moderator' => $moderator
        ]);
    }

    public function profileUpdate(Request $request, Moderator $moderator)
    {
        if ( auth()->guard('moderator')->user()->email != $moderator->email ) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('moderators')->ignore($moderator->id),
            ],
            'password' => [
                'nullable',
                'confirmed',
                Rules\Password::defaults()
            ],
        ]);

        $moderator->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $moderator->password,
        ]);

        return redirect()->route('setting.mod.profile', [
            'moderator' => $moderator->email
        ])->with('success', 'Profile updated successfully');
    }


    public function dashboard()
    {
        return view('moderator.index', [
            'moderator' => Auth::guard('moderator')->user(),
        ]);
//        php artisan route:cache; php artisan config:cache; php artisan view:clear; php artisan cache:clear
    }


    public function moderator()
    {
        return view('moderator.setting.mod', [
            'moderator' => Moderator::orderBy('id', 'desc')
                ->where(function ($query) {
                    if ( $search = request()->get('search') ) {
                        $query->where('name', 'like', '%' . $search . '%')
                            ->orWhere('email', 'like', '%' . $search . '%')
                            ->orWhere('status', 'like', '%' . $search . '%')
                            ->orWhere('created_at', 'like', '%' . $search . '%');
                    }
                })
                ->simplePaginate(Moderator::PAGINATION_COUNT),
            'sMod'      => in_array(auth()->guard('moderator')
                ->user()->email, Moderator::REGULAR_MODERATOR),
        ]);
    }

    public function newMod(Moderator $moderator)
    {
        if ( !in_array(auth()->guard('moderator')
            ->user()->email, Moderator::REGULAR_MODERATOR) ) {
            abort(Response::HTTP_FORBIDDEN);
        }

        return view('moderator.setting.moderator.new', [
            'moderator' => $moderator,
        ]);
    }

    public function createMod(Request $request)
    {
        $request->validate([
            'name'     => [
                'required',
                'string',
                'max:255'
            ],
            'email'    => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:moderators'
            ],
            'status'   => [
                'required'
            ],
            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults()
            ],
        ]);

        $moderator = Moderator::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'status'   => $request->status,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('setting.mod')
            ->with('success', 'Moderator ' . $moderator->name . ' created successfully.');

    }

    public function editMod(Moderator $moderator)
    {
        if ( $moderator->email === Moderator::ULTRA_MODERATOR ) {
            abort(Response::HTTP_FORBIDDEN);
        }

        if ( !in_array(auth()->guard('moderator')
            ->user()->email, Moderator::REGULAR_MODERATOR) ) {
            abort(Response::HTTP_FORBIDDEN);
        }

        return view('moderator.setting.moderator.edit', [
            'moderator' => $moderator
        ]);

    }

    public function updateMod(Request $request, Moderator $moderator)
    {
        $request->validate([
            'name'     => [
                'required',
                'string',
                'max:255'
            ],
            'email'    => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('moderators')->ignore($moderator->id)

            ],
            'status'   => [
                'required'
            ],
            'password' => [
                'nullable',
                'confirmed',
                Rules\Password::defaults()
            ],
        ]);


        $moderator->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'status'   => $request->status,
            'password' => $request->password ? Hash::make($request->password) : $moderator->password,

        ]);


        return redirect()->route('setting.mod')
            ->with('success', 'Moderator ' . $moderator->name . ' updated successfully');
    }

    public function deleteMod(Moderator $moderator)
    {

        if ( !in_array(auth()->guard('moderator')
            ->user()->email, Moderator::REGULAR_MODERATOR) ) {
            abort(Response::HTTP_FORBIDDEN);
        }

        if ( $moderator->email === Moderator::ULTRA_MODERATOR ) {
            abort(Response::HTTP_FORBIDDEN);
        }

        if ( $moderator->email === auth()->guard('moderator')->user()->email ) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $moderator->delete();

        return redirect()->back()
            ->with('success', 'Moderator ' . $moderator->name . ' deleted successfully');


    }


}
