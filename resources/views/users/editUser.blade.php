@extends('layouts.app2')

@section('content')
<div class="container mb-3">
    <h1>Edit {{ $user->name }}</h1>
</div>
<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="bg-light rounded h-100 p-4">
                <h4 class="mb-3">Profile Image</h4>
                <div class="align-items-center ms-2">
                    <div class="position-relative mb-3">

                        @if ($user->profileimage == null)
                            @if ($user->gender == 'm')
                                <img class="rounded-circle mx-auto d-block border-1 image-previewer" src="{{ asset('img/user-images/default/user-male.png')}}" alt="" style="width: 200px; height: 200px;">
                            @elseif($user->gender == 'f')
                                <img class="rounded-circle mx-auto d-block image-previewer" src="{{ asset('img/user-images/default/user-female.png')}}" alt="" style="width: 200px; height: 200px;">
                            @endif                    
                        @else
                            <img class="rounded-circle mx-auto d-block image-previewer" src=" {{ asset('img/user-images/' . $user->profileimage  ) }}" alt="" style="width: 200px; height: 200px;">
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="_userAvatarFile">Upload image</label>
                    <input type="file" class="form-control" name="_userAvatarFile" id="_userAvatarFile">
                </div>
                <div class="mb-3">
                    <p>{{ date_format($user->created_at,'d M Y') }}</p>
                    <p>{{ date_format($user->updated_at,'d M Y') }}</p>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="bg-light rounded h-100 p-4">
                <h4 class="mb-3">Update User Details</h4>
                <form action="{{ route('admin.updateprofile') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-6">

                            <!--First Name -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('fname') is-invalid @enderror" id="floatingText" name="fname" value="{{ $user->fname }}" required autocomplete="fname" autofocus placeholder="john">
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
                                <input type="text" class="form-control @error('lname') is-invalid @enderror" id="floatingText" name="lname" value="{{ $user->lname }}" required autocomplete="lname" autofocus placeholder="doe">
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
                                <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="floatingText" name="fullname" value="{{ $user->fullname }}" required autocomplete="fullname" autofocus placeholder="john doe">
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
                                <select type="select" class="form-select @error('gender') is-invalid @enderror" id="floatingSelect" aria-label="Floating label select example" name="gender" value="{{ $user->gender }}" required autocomplete="gender" autofocus>
                                    <option selected>Select your gender</option>
                                    <option value="{{ $user->gender }}" selected>
                                        @if ($user->gender == "f")
                                            {{ __('Female') }}
                                        @elseif($user->gender == "m")
                                            {{ __('Male') }}
                                        @endif
                                    </option>
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
                                <input type="text" class="form-control @error('nic') is-invalid @enderror" id="floatingText" name="nic" value="{{ $user->nic }}" required autocomplete="nic" placeholder="******V" autofocus>
                                <label for="floatingInput">{{ __('NIC') }}</label>
                                @error('nic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Date Of Birth -->
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control @error('dateOfBirth') is-invalid @enderror" id="floatingText" name="dob" value="{{ $user->dob }}" required autocomplete="dob" autofocus>
                                <label for="floatingInput">{{ __('Date Of Birth') }}</label>
                                @error('dateOfBirth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Password
                            <div class="form-floating mb-3">
                                <input type="password" id="floatingText"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" autofocus placeholder="********">
                                <label for="floatingInput">{{ __('Password') }}</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> -->
                        </div>
                        
                        <div class="col-6">

                            <!-- Email -->
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingText" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus placeholder="name@example.com">
                                <label for="floatingInput">{{ __('Email') }}</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Address -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('address') is-invalid @enderror" id="floatingText" name="address" value="{{ $user->address }}" required autocomplete="address" autofocus placeholder="name@example.com">
                                <label for="floatingInput">{{ __('Address') }}</label>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Phone Number -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('contact_no') is-invalid @enderror" id="floatingText" name="contactNo" value="{{ $user->contactNo }}" required autocomplete="contactNo" autofocus placeholder="XXXXXXXXXX">
                                <label for="floatingInput">{{ __('Contact No') }}</label>
                                @error('contact_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                
                            <!-- Confirm Password
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingText" name="password_confirmation" required autocomplete="new-password" autofocus placeholder="XXXXXXXXXX">
                                <label for="floatingInput">{{ __('Confirm Password') }}</label>
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> -->


                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-left">
                        {{ __('Update') }}
                    </button>
                    <button type="reset" class="btn btn-primary float-left">
                        {{ __('Reset') }}
                    </button>                    
                </form>
            </div>        
        </div>
    </div>

</div>
@endsection