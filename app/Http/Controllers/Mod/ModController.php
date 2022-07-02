<?php

namespace App\Http\Controllers\Mod;

use App\Http\Controllers\Controller;
use App\Models\Moderator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Symfony\Component\HttpFoundation\Response;

class ModController extends Controller {

    public function __construct()
    {
        $this->middleware('moderator');
    }

    public function profile(Moderator $moderator)
    {

        if ( auth()->guard('moderator')->user()->id === $moderator->id ) {
            return view('moderator.setting.profile', [
                'moderator' => $moderator
            ]);
        } else {
            abort(Response::HTTP_FORBIDDEN);
        }
    }

    public function profileUpdate(Request $request, Moderator $moderator)
    {
        if ( auth()->guard('moderator')->user()->id === $moderator->id ) {
            $request->validate([
                'name'  => 'required|string|max:255',
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('moderators')->ignore($moderator->id),
                ],
            ]);
            $moderator->update($request->all());

            return redirect()->route('setting.mod.profile', [
                'moderator' => $moderator->email
            ])->with('success', 'Profile updated successfully');
        } else {
            abort(Response::HTTP_FORBIDDEN);
        }
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
        ]);
    }

    public function newMod(Moderator $moderator)
    {
        if ( auth()->guard('moderator')->user()->email === 'imiia75775@gmail.com' ) {
            return view('moderator.setting.moderator.new', [
                'moderator' => $moderator
            ]);
        } else {
            abort(Response::HTTP_FORBIDDEN);
        }
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

        event(new Registered($moderator));

        return redirect()->route('setting.mod')
            ->with('success', 'Moderator ' . $moderator->name . ' created successfully.');

    }

    public function editMod(Moderator $moderator)
    {

        if ( auth()->guard('moderator')->user()->email === 'imiia75775@gmail.com' ) {
            return view('moderator.setting.moderator.edit', [
                'moderator' => $moderator
            ]);
        }
//        if ( auth()->guard('moderator')->user()->id === $moderator->id ) {
//            return view('moderator.setting.moderator.edit', [
//                'moderator' => $moderator
//            ]);
//        }
        else {
            abort(Response::HTTP_FORBIDDEN);
        }


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

//        if ( $request->password != null ) {
//            $moderator->update([
//                'password' => Hash::make($request->password),
//            ]);
//        }

        return redirect()->route('setting.mod')
            ->with('success', 'Moderator ' . $moderator->name . ' updated successfully');
    }

    public function deleteMod(Moderator $moderator)
    {
        if ( auth()->guard('moderator')->user()->email === 'imiia75775@gmail.com' ) {
            $moderator->delete();

            return redirect()->back()
                ->with('success', 'Moderator ' . $moderator->name . ' deleted successfully');
        } else {
            abort(Response::HTTP_FORBIDDEN);
        }

    }


}
