@extends('layouts.assets')

@section('content')

    <div class="cover-home3">

        <div class="container">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <div class="text-center mt-50 pb-50">
                        <h2 class="color-linear d-inline-block">Welcome back !</h2>
                    </div>
                    <div class="box-form-login pb-50">
                        <div class="form-login bg-gray-850 border-gray-800 text-start">

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control bg-gray-850 border-gray-800" id="email" type="email"
                                        name="email" :value="old('email')" required autofocus autocomplete="username"
                                        placeholder="User name">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                </div>
                                <div class="form-group position-relative">
                                    <input class="form-control bg-gray-850 border-gray-800 password" id="password"
                                        placeholder="Password" type="password" name="password" required
                                        autocomplete="current-password">
                                    <span class="viewpass"></span>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                </div>
                                <!-- Remember Me -->
                                <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox"
                                            class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                            name="remember">
                                        <span
                                            class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                                    </label>
                                </div>
                                <div class="form-group mt-4">
                                    <input class="btn btn-linear color-gray-850 hover-up" type="submit" value="Log me in">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection