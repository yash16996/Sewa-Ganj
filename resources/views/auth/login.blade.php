@extends('frontend.layouts.master')
@section('content')
    <div id="login-section" class="wrapper">
        <div class="section-authentication-cover">
            <div class="container">
                <div class="row">
                    <div class="col-6 d-flex justify-content-center align-items-center" style="height: 80svh">

                        {{-- form portion --}}
                        <div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center"
                            style="width: 30rem">
                            <div class="rounded-0 m-3 shadow-none bg-transparent">
                                <div class="text-center mb-4">
                                    <img width="100" src="{{ asset('assets/frontend/home/img/logo2.png') }}"
                                        alt="">
                                    <p class="mb-0">Please log in to your account</p>
                                </div>
                                <div class="form-body">
                                    <form class="row g-3" method="POST" action="{{ route('login') }}">
                                        @csrf

                                        {{-- email field --}}
                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">Email</label>
                                            <input type="email" placeholder="Email" name="email" class="form-control"
                                                id="inputEmailAddress" :value="{{ old('email') }}" required autofocus
                                                autocomplete="username">
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>

                                        {{-- password field --}}
                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">Password</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password" placeholder="Password" name="password"
                                                    class="form-control border-end-0" id="inputChoosePassword" required
                                                    autocomplete="current-password">
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>
                                        </div>

                                        {{-- remember me --}}
                                        <div class="col-md-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>

                                        {{-- forget password field --}}
                                        <div class="col-md-6 text-end">
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}">
                                                    {{ __('Forgot your password?') }}
                                                </a>
                                            @endif
                                        </div>

                                        {{-- submit button --}}
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary">Log in</button>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="text-center ">
                                                <p class="mb-0">Don't have an account yet? <a
                                                        href="{{ route('register') }}">Register here</a>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- illustration  --}}
                    <div class="col-6 d-flex justify-content-center align-items-center">
                        <div
                            class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex">


                            <div class="card-body">
                                <img id="login-hero-img" src="{{ asset('assets/frontend/home/img/illustration-1.jpg') }}"
                                    class="img-fluid auth-img-cover-login" width="650" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--end row-->

        </div>
    </div>
@endsection
