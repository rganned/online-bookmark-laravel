@extends('layouts.app')

@section('page_title', 'Register')

@section('content')
<!--<div id="auth" class="h-100 d-flex py-5 align-items-center m-auto" style="width: 35%;">
    <div class="container">
        <div class="mb-5 text-center">
            <img src="{{ asset('dashboard/assets/img/logo_purple.png') }}" alt="">
        </div>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="E-Mail" name="email" value="{{ old('email') }}" required autocomplete="email"
                            autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                            name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember"> {{ __('Remember Me') }}</label>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                    @endif
                </form>
            </div>
        </div>
        <div class="links mt-5">
            <a href="/" class="mr-4">Home</a>
            <a href="/about" class="mr-4">About</a>
            <a href="/register">Create a account</a>
        </div>
    </div>
</div>-->

<div id="auth" class="h-100 d-flex py-5 align-items-center m-auto">
    <div class="container">
        <div class="logo mb-5 text-center">
            <img src="{{ asset('dashboard/assets/img/logo_purple.png') }}" alt="">
        </div>
        <div class="row no-gutters">
            <div class="col-md-6">
                <section class="bg-primary text-light p-5 h-100">
                    <h5>Create a account.</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, temporibus distinctio?
                        Suscipit maiores nesciunt fuga distinctio sint, voluptas officiis consequuntur alias nulla, quae
                        doloribus cum recusandae quis explicabo ipsam ab?</p>
                </section>
            </div>
            <div class="col-md-6 ">
                <div class="card card-block h-100">
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="{{ __('E-Mail Address') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password" placeholder="{{ __('Password') }}">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="{{ __('Confirm Password') }}">
                            </div>
                            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
                            <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="links my-5">
                <a href="{{route('index')}}" class="mr-4">Home</a>
                <a href="{{route('about')}}" class="mr-4">About</a>
                <a href="{{route('login')}}">Login</a>
            </div>
    </div>
</div>
@endsection