@extends('layouts.adminApp')

@section('content')
<div class="container">
    <div class="row g-2 w-100 rounded mb-0">
        <form method="POST" action="{{ route('users.addnewuser') }}">
            @csrf
            
            <div class="row">
                <div class="col-6">

                    <!--First Name -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('fname') is-invalid @enderror" id="floatingText" name="fname" value="{{ old('fname') }}" required autocomplete="fname" autofocus placeholder="john">
                        <label for="floatingInput">{{ __('First Name') }}</label>
                        @error('fname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                        
                </div>

                <div class="col-6">
                    <!-- Last Name -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('lname') is-invalid @enderror" id="floatingText" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus placeholder="doe">
                        <label for="floatingInput">{{ __('Last Name') }}</label>
                        @error('lname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>                                      
                </div>
                    
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Full Name -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="floatingText" name="fullname" value="{{ old('fullname') }}" required autocomplete="fullname" autofocus placeholder="john doe">
                        <label for="floatingInput">{{ __('Name with Initials') }}</label>
                        @error('fullname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> 
                </div>
            </div>
            
            <div class="row">
                <div class="col-6">
                    <!-- Gender -->
                    <div class="form-floating mb-3">
                        <select type="select" class="form-select @error('gender') is-invalid @enderror" id="floatingSelect" aria-label="Floating label select example" name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus>
                            <option selected>Select your gender</option>
                            <option value="f">Female</option>
                            <option value="m">Male</option>                                   
                        </select>
                        <label for="floatingSelect">{{ __('Gender') }}</label>
                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                            
                    <!-- NIC -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('nic') is-invalid @enderror" id="floatingText" name="nic" value="{{ old('nic') }}"  minlength="10" maxlength="12"  autofocus placeholder="**********V" autocomplete="" required>
                        <label for="floatingInput">{{ __('NIC') }}</label>
                        @error('nic')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Date Of Birth -->
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control @error('dob') is-invalid @enderror" id="floatingText" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>
                        <label for="floatingInput">{{ __('Date Of Birth') }}</label>
                        @error('dob')
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
                        <input type="text" class="form-control @error('contact_no') is-invalid @enderror" id="floatingText" name="contactNo" value="{{ old('contact_no') }}" required autocomplete="contactNo" maxlength="10" autofocus placeholder="XXXXXXXXXX">
                        <label for="floatingInput">{{ __('Contact No') }}</label>
                        @error('contact_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                        
                    <!-- Confirm Password -->
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingText" name="password_confirmation" required autocomplete="new-password" autofocus placeholder="XXXXXXXXXX">
                        <label for="floatingInput">{{ __('Confirm Password') }}</label>
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    

                    <!-- Add job role  -->
                    <div class="form-floating mb-3">
                        <select type="select" class="form-select @error('jobRole') is-invalid @enderror" id="floatingSelect" aria-label="Floating label select example" name="role_id" value="{{ old('role') }}" required autocomplete="role" autofocus>
                            <option selected>Select Role</option>
                            @foreach ($userRoles as $roles)
                                <option value="{{ $roles->id }}">{{ $roles->userType }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">{{ __('jobRole') }}</label>
                        @error('jobRole')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>
            </div>

            <button type="submit" class="btn btn-success float-left">
                {{ __('Add') }}
            </button>
            <button type="reset" class="btn btn-warning float-left">
                {{ __('Reset') }}
            </button>
            <a href={{route('users') }} type="button" class="btn btn-outline-secondary float-left">
                <i class="fa-solid fa-angle-left"></i> {{ __('Back') }}
            </a>            
        </form>
    </div>      
</div>
    
@endsection