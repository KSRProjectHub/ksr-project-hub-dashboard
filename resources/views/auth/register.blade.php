@extends('layouts.appLogin')

@section('content')
<div class="container-xxl position-relative bg-white d-flex p-0">

    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    

                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="{{ url('/')}}" class="">
                            <h3 class="uppercase text-primary">
                                {{__('ksr projecthub')}}
                                {{__('ADMIN PANEL')}}
                            </h3> 
                        </a>
                        
                        <h3 class="uppercase">{{ __('signup') }}</h3>
                    </div>
                
                    
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <!-- Name -->
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="floatingText" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="john doe">
                                        <label for="floatingInput">{{ __('Name') }}</label>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <!-- NIC -->
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control @error('nic') is-invalid @enderror" id="floatingText" name="nic" value="{{ old('nic') }}" required autocomplete="nic" autofocus placeholder="*********V">
                                        <label for="floatingInput">{{ __('NIC') }}</label>
                                        @error('nic')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Date Of Birth -->
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control @error('dateOfBirth') is-invalid @enderror" id="floatingText" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>
                                        <label for="floatingInput">{{ __('Date Of Birth') }}</label>
                                        @error('dateOfBirth')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Password -->
                                    <div class="form-floating mb-3">
                                        <input type="password" id="floatingText"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" autofocus placeholder="********">
                                        <label for="floatingInput">{{ __('Password') }}</label>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="col-6">

                                    <!-- Email -->
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingText" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@example.com">
                                        <label for="floatingInput">{{ __('Email') }}</label>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Address -->
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="floatingText" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="name@example.com">
                                        <label for="floatingInput">{{ __('Address') }}</label>
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Phone Number -->
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control @error('contact_no') is-invalid @enderror" id="floatingText" name="contactNo" value="{{ old('contact_no') }}" required autocomplete="contactNo" autofocus placeholder="XXXXXXXXXX">
                                        <label for="floatingInput">{{ __('Contact No') }}</label>
                                        @error('contact_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <!-- Phone Number -->
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="floatingText" name="password_confirmation" required autocomplete="new-password" autofocus placeholder="XXXXXXXXXX">
                                        <label for="floatingInput">{{ __('Confirm Password') }}</label>
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary float-left">
                                {{ __('Register') }}
                            </button>
                        </form>
                    
                </div>        
                        <div class="row mb-3"> 
                            <div class="col-6">
                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4 text-md-end">
                                        
                                    </div>
                                </div>
                            </div>
                
                        </div>
            </div>
        </div>
    </div>
</div>
@endsection
