@extends('layouts.appLogin')

@section('content')
<div class="container-xxl position-relative bg-white d-flex p-0">
<!--
    <div class="justify-content-center row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">


                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
-->

    <!-- Sign In Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <a href="{{ url('/') }}" class="">
                        <img class="mx-auto d-block rounded-circle mb-4" src="{{ asset('img/logo/KSR.png')}}" alt="" style="width: 80px; height: 80px;">
                    </a>
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        
                        <h3 class="text-primary">
                            {{__('ADMIN PANEL')}}
                        </h3>
                            
                        <h3 class="uppercase">{{ __('Login') }}</h3>
                    </div>
                    <form  method="POST" action="{{ route('login') }}">
                        @csrf                    
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingText" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-4">
                            <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password"  required autocomplete="current-password">
                            <label for="floatingPassword">Password</label>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember"> {{ __('Remember Me') }}</label>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="" href="{{ route('password.request') }}">
                                    {{ __('Forgot Password?') }}
                                </a>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">
                            {{ __('Login') }}
                        </button> 
                    </form>
                    
                    
                    
                    <p class="text-center mb-0">Don't have an Account? <a href="{{ url('/register')}}" target="_blank">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign In End -->
</div>
@endsection