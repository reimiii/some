<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class StoreModeratorRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'    => [
                'required',
                'string',
                'email'
            ],
            'password' => [
                'required',
                'string'
            ],
        ];
    }

    public function authenticateMod()
    {
        $this->ensureIsNotRateLimited();

        if ( !Auth::guard('moderator')
            ->attempt(array_merge($this->only('email', 'password'), [ 'status' => 'active' ]),
                $this->boolean('remember'))
        ) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email'  => 'Invalid email or password. Please try again.',
                'status' => 'Or you have been deactivated.',
            ]);
        }

        RateLimiter::clear($this->throttleKey());

    }

    public function ensureIsNotRateLimited()
    {
        if ( !RateLimiter::tooManyAttempts($this->throttleKey(), 5) ) {
            return;
        }
        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => "You have been locked out for $seconds seconds. Please try again later.",

        ])->status(423);


    }

    public function throttleKey()
    {
        return Str::lower($this->input('email')) . '|' . $this->ip();
    }

}
