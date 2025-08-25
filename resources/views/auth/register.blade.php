@extends('frontend.layouts.master')
@section('content')
    <!-- ======================== Register Section Start ===================== -->
    {{-- <section class="wsus__login padding-y-120">
        <div class="container">
            <div class="row">
                <div class="col-xxl-5 col-xl-6 col-md-9 col-lg-7 m-auto">
                    <div class="wsus__login_area">
                        <h2>{{ __('Welcome!') }}</h2>
                        <p>{{ __('Register to continue') }}</p>

                    </div>
                </div>
            </div>
        </div>
    </section> --}}
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
                                    <p class="mb-0">Please Register in to your account</p>
                                </div>
                                <div class="form-body">
                                    <form method="POST" class="row g-3" action="{{ route('register') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-12 mt-2">
                                                <div class="wsus__login_input">
                                                    <label class="form-label">{{ __('Name') }}</label>
                                                    <input class="form-control" type="text" placeholder="Name" id="name" name="name"
                                                        :value="{{ old('name') }}" required autofocus autocomplete="name">
                                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-xl-12 mt-2">
                                                <div class="wsus__login_input">
                                                    <label>{{ __('Email') }}</label>
                                                    <input class="form-control" type="email" placeholder="Email" id="email" name="email"
                                                        :value="{{ old('email') }}" required autocomplete="username">
                                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-xl-12 mt-2">
                                                <div class="wsus__login_input">
                                                    <label class="form-label">{{ __('password') }}</label>
                                                    <input class="form-control" type="password" placeholder="Password" id="password"
                                                        name="password" required autocomplete="new-password">
                                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-xl-12 mt-2">
                                                <div class="wsus__login_input">
                                                    <label class="form-label">{{ __('Confirm password') }}</label>
                                                    <input class="form-control" type="password" placeholder="Confirm Password"
                                                        name="password_confirmation" id="password_confirmation" required
                                                        autocomplete="new-password">
                                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                                </div>
                                            </div>

                                            <div class="col-xl-12 mt-2">
                                                <div class="d-grid">
                                                    <button type="submit"
                                                        class="btn btn-primary">{{ __('Register') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <p class="create_account mt-2">{{ __('Have an account ?') }} <a
                                            href="{{ route('login') }}">{{ __('Log In') }}</a></p>

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

<!-- ======================== Register Section End ===================== -->
