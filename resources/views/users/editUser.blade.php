@extends('layouts.adminApp')

@section('content')
<div class="container mb-3">
    <h4>Edit {{$user->getUserType() }}  {{ $user->fname.' '.$user->lname }}</h4>
</div>
<div class="container bg-info">
    <div class="row">
        <div class="col-3">
            <div class="bg-light rounded h-100 p-4">
                <div class="align-items-center ms-2">
                    <div class="position-relative mb-3">

                        @if ($user->profileimage == null)
                            @if ($user->gender == 'm')
                                <img class="rounded-circle mx-auto d-block border-1 image-previewer" src="{{ asset('img/user-images/default/user-male.png')}}" alt="" style="width: 100px; height: 100px;">
                            @elseif($user->gender == 'f')
                                <img class="rounded-circle mx-auto d-block image-previewer" src="{{ asset('img/user-images/default/user-female.png')}}" alt="" style="width: 100px; height: 100px;">
                            @endif                    
                        @else
                            <img class="rounded-circle mx-auto d-block image-previewer" src=" {{ asset('img/user-images/' . $user->profileimage  ) }}" alt="" style="width: 100px; height: 100px;">
                        @endif
                    </div>
                </div>
                <hr>

                <div class="mb-3">
                    <p><strong>{{ __('Registered Date') }}</strong> </p> 
                    <p>{{$user->created_at->diffForHumans()}} 
                    ({{ date_format($user->created_at,'d M Y') }} - {{$user->created_at->format('h:i:s A') }})</p>
                    <!-- <p>{{$user->updated_at->diffForHumans()}} {{ date_format($user->updated_at,'d M Y') }}</p> -->
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="bg-light rounded h-100 p-4">
                <h4 class="mb-3">Update User Details</h4>
                <form action="{{ route('update.user', $user->id) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            <!-- Title -->
                            <div class="form-floating mb-3">
                                <select type="select" class="form-select @error('title') is-invalid @enderror" id="floatingSelect" aria-label="Floating label select example" name="title" value="{{ $user->title }}" required autocomplete="title" autofocus>
                                    <option>Select Title</option>
                                    <option value="Miss." {{ $user->title == "Miss." ? 'selected': ''}}>Miss.</option>
                                    <option value="Mr." {{ $user->title == "Mr." ? 'selected': ''}}>Mr.</option>
                                    <option value="Mrs." {{ $user->title == "Mrs." ? 'selected': ''}}>Mrs.</option>                                   
                                </select>
                                <label for="floatingSelect">{{ __('Title') }}</label>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
        
                        <div class="col-5">
        
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
        
                        <div class="col-4">
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
                        <div class="col-3">
                            <!-- Add job role  -->
                            <div class="form-floating mb-3">
                                <select type="select" class="form-select @error('jobRole') is-invalid @enderror" id="floatingSelect" aria-label="Floating label select example" name="role_id" value="{{ $user->getUserType() }}" required autocomplete="role" autofocus>
                                    <option >Select Role</option>
                                    @foreach ($userRoles as $roles)
                                        <option value="{{ $roles->id }}" {{ $roles->id == $user->role_id ? 'selected': ''}}>{{ $roles->userType }}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">{{ __('Role') }}</label>
                                @error('jobRole')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                    
                        </div>
        
                        <div class="col-6">
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
        
                        <div class="col-3">
                            <!-- Gender -->
                            <div class="form-floating mb-3">
                                <select type="select" class="form-select @error('gender') is-invalid @enderror" id="floatingSelect" aria-label="Floating label select example" name="gender" value="{{ $user->gender }}" required autocomplete="gender" autofocus>
                                    <option selected>Select gender</option>
                                    <option value="f" {{ $user->gender == "f" ? 'selected': ''}}>Female</option>
                                    <option value="m" {{ $user->gender == "m" ? 'selected': ''}}>Male</option>                                   
                                </select>
                                <label for="floatingSelect">{{ __('Gender') }}</label>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
        
                    </div>
                    
                    <div class="row">
                        <div class="col-4">
                            <!-- NIC -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('nic') is-invalid @enderror" id="floatingText" name="nic" value="{{ $user->nic }}"  minlength="10" maxlength="12"  autofocus placeholder="**********V" autocomplete="" required>
                                <label for="floatingInput">{{ __('NIC') }}</label>
                                @error('nic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
        
                        <div class="col-4">
                            <!-- Date Of Birth -->
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control @error('dob') is-invalid @enderror" id="floatingText" name="dob" value="{{ $user->dob }}" required autocomplete="dob" autofocus>
                                <label for="floatingInput">{{ __('Date Of Birth') }}</label>
                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
        
                        <div class="col-4">
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
                        </div>
                    </div>  
                    
                    <div class="row">
                        <div class="col-6">
                            <!-- Marital Status -->
                            <div class="form-floating mb-3">
                                <select type="select" class="form-select @error('marital_status') is-invalid @enderror" id="floatingSelect" aria-label="Floating label select example" name="marital_status" value="{{ $user->marital_status }}" required autocomplete="marital_status" autofocus>
                                    <option selected>Select Marital Status</option>
                                    <option value="Single" {{ $user->marital_status == "Single" ? 'selected': ''}}>Single</option>
                                    <option value="Married" {{ $user->marital_status == "Married" ? 'selected': ''}}>Married</option>
                                    <option value="Engaged" {{ $user->marital_status == "Engaged" ? 'selected': ''}}>Engaged</option>                                   
                                </select>
                                <label for="floatingSelect">{{ __(' Marital Status') }}</label>
                                @error('marital_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-6">
                            <!-- Phone Number -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('contact_no') is-invalid @enderror" id="floatingText" name="contactNo" value="{{ $user->contactNo }}" required autocomplete="contactNo" maxlength="10" autofocus placeholder="XXXXXXXXXX">
                                <label for="floatingInput">{{ __('Contact No') }}</label>
                                @error('contact_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                
                        </div>
        
                    </div>
        
                    <div class="row">
                        <div class="col-6">
                            <!-- Address -->
                            <div class="form-floating mb-3">
                                <textarea type="text" class="form-control @error('address') is-invalid @enderror" id="floatingTextarea" name="address" value="{{ $user->address }}" required autocomplete="address" autofocus placeholder="Colombo" style="height: 132px; resize: none">{{ $user->address }}</textarea>
                                <label for="floatingInput">{{ __('Address') }}</label>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <!-- Password -->
                            <div class="form-floating mb-3">
                                <input type="password" id="floatingText"  class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" autofocus placeholder="********" disabled>
                                <label for="floatingInput">{{ __('Password') }}</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                                                
                            <!-- Confirm Password -->
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingText" name="password_confirmation" autocomplete="new-password" autofocus placeholder="XXXXXXXXXX" disabled>
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