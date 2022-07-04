<!doctype html>
<html lang="en" class="light-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    @include('assets.css')

    @include('assets.js')

    <title>Moderator Login</title>
</head>

<body>

<!--start wrapper-->
<div class="container">
    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto mt-5">
            <div class="card radius-10">
                <div class="card-body p-4">

                    <div class="text-center">
                        <h4>Guru</h4>
                        <p>Sign In to your account</p>
                    </div>
                    @if( $errors->any() )
                        @foreach( $errors->all() as $error )
                            <div class="alert alert-dismissible fade show py-2 border-0 border-start border-4 border-danger">
                                <div class="d-flex align-items-center">
                                    <div class="fs-3 text-danger">
                                        <ion-icon name="close-circle-sharp" role="img"
                                                  class="md hydrated"
                                                  aria-label="close circle sharp"></ion-icon>
                                    </div>
                                    <div class="ms-3">
                                        <div class="text-danger">
                                            {{ $error }}
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif


                    <form class="form-body row g-3"
                          action="{{ route('guru.login.post') }}"
                          method="post">
                        @csrf
                        <div class="col-12">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="inputEmail">
                        </div>
                        <div class="col-12">
                            <label for="inputPassword" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control"
                                   id="inputPassword">
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input"
                                       name="remember"
                                       type="checkbox" role="switch"
                                       id="flexSwitchCheckRemember">
                                <label class="form-check-label" for="flexSwitchCheckRemember">Remember
                                    Me</label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark">Sign In</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end wrapper-->


</body>

</html>



{{--<x-guest-layout>--}}
{{--    <x-auth-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <h1 class="uppercase">Guru</h1>--}}
{{--            @if(session()->has('error'))--}}
{{--                <div class="alert alert-success">--}}
{{--                    {{ session()->get('error') }}--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            @if ($errors->any())--}}
{{--                <div class="alert alert-danger">--}}
{{--                    <ul>--}}
{{--                        @foreach ($errors->all() as $error)--}}
{{--                            <li>{{ $error }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </x-slot>--}}

{{--        <!-- Session Status -->--}}
{{--        <x-auth-session-status class="mb-4" :status="session('status')"/>--}}


{{--    <!-- Validation Errors -->--}}
{{--        <x-auth-validation-errors class="mb-4" :errors="$errors"/>--}}

{{--        <form method="POST" action="{{ route('guru.login.post') }}">--}}
{{--        @csrf--}}

{{--        <!-- Email Address -->--}}
{{--            <div>--}}
{{--                <x-label for="email" :value="__('Email')"/>--}}

{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email"--}}
{{--                         :value="old('email')" required autofocus/>--}}
{{--            </div>--}}

{{--            <!-- Password -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password" :value="__('Password')"/>--}}

{{--                <x-input id="password" class="block mt-1 w-full"--}}
{{--                         type="password"--}}
{{--                         name="password"--}}
{{--                         required autocomplete="current-password"/>--}}
{{--            </div>--}}

{{--            <!-- Remember Me -->--}}
{{--            <div class="block mt-4">--}}
{{--                <label for="remember_me" class="inline-flex items-center">--}}
{{--                    <input id="remember_me" type="checkbox"--}}
{{--                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"--}}
{{--                           name="remember">--}}
{{--                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                @if (Route::has('password.request'))--}}
{{--                    <a class="underline text-sm text-gray-600 hover:text-gray-900"--}}
{{--                       href="{{ route('password.request') }}">--}}
{{--                        {{ __('Forgot your password?') }}--}}
{{--                    </a>--}}
{{--                @endif--}}

{{--                <x-button class="ml-3">--}}
{{--                    {{ __('Log in') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-auth-card>--}}
{{--</x-guest-layout>--}}
