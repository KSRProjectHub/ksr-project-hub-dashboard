@extends('layouts.adminApp')

@section('content')
<div class="container mb-2">
    <div class="row p-2">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Profile</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ Auth::user()->fname.' '.Auth::user()->lname }} ({{ Auth::user()->getUserType() }})</li>
                </ol>
            </nav>                

        </div>
    </div>
</div>
<div class="container mb-3">

    <div class="bg-light rounded h-100 p-4">
        <div class="row">    
            <div class="col-3 border-end">
                <div class="ms-2">
                    <div class="position-relative mb-3">
                        @if (Auth::user()->profileimage == null)
                            @if (Auth::user()->gender == 'm')
                                <img class="rounded-circle mx-auto d-block border-1 image-previewer" src="{{ asset('img/user-images/default/user-male.png')}}" alt="" style="width: 150px; height: 150px;">
                            @elseif(Auth::user()->gender == 'f')
                                <img class="rounded-circle mx-auto d-block image-previewer" src="{{ asset('img/user-images/default/user-female.png')}}" alt="" style="width: 150px; height: 150px;">
                            @endif                    
                        @else
                            <img class="rounded-circle mx-auto d-block image-previewer" src=" {{ asset('img/user-images/' . Auth::user()->profileimage  ) }}" alt="" style="width: 150px; height: 150px;">
                        @endif
                    </div>
                </div>  
                <div class="mb-3">
                    <label class="form-label" for="_userAvatarFile">Upload image</label>
                    <input type="file" class="form-control" name="_userAvatarFile" id="_userAvatarFile">
                </div>                    
                    
            </div>

            <div class="col-9">

                <div class="row border-bottom mb-3">
                    <div class="col-6">
                        <p>
                            <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                                <i class="fa fa-user me-2 fa-stack-1x"></i>
                            </span>
                           {{Auth::user()->title}} {{ Auth::user()->fname.' '.Auth::user()->lname }}<br>

                           <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                            <i class="fa fa-user me-2 fa-stack-1x"></i>
                                </span>
                            {{ Auth::user()->fullname }}<br>

                            <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                                <i class="fa fa-mobile-screen me-2 fa-stack-1x"></i>
                            </span>
                            {{ Auth::user()->contactNo }}<br>
                            
                            @if (Auth::user()->gender == 'f')
                                <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                                    <i class="bi bi-gender-female me-2 fa-stack-1x"></i>
                                </span>
                                Female
                            @elseif(Auth::user()->gender == 'm')
                                <span class="fa-stack fa" style="color: rgb(9, 9, 87)"> 
                                    <i class="bi bi-gender-male me-2 fa-stack-1x"></i>
                                </span>   
                                Male
                            @endif<br>

                            <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                                <i class="fa fa-location-dot me-2 fa-stack-1x"></i>
                            </span>
                            {{ Auth::user()->address }}<br>                                
                            
                        </p>   
                    </div>
                    <div class="col-6">
                        <p>
                            <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                                <i class="fa fa-at me-2 fa-stack-1x"></i>
                            </span>
                           <a href="mailto:{{ Auth::user()->email }}"> {{ Auth::user()->email }}</a><br>
         
                            <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                                <i class="fa fa-cake-candles me-2 fa-stack-1x"></i>
                            </span>
                            {{ \Carbon\Carbon::parse(Auth::user()->dob)->format('Y M d') }}<br>
        
                            @if (Auth::user()->marital_status == "Single")
                                @if (Auth::user()->gender == 'f')
                                    <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                                        <i class="fa fa-person-dress me-2 fa-stack-1x"></i>
                                    </span>
                                @elseif(Auth::user()->gender == 'm')
                                    <span class="fa-stack fa" style="color: rgb(9, 9, 87)">    
                                        <i class="fa fa-person me-2 fa-stack-1x"></i>
                                    </span>
                                @endif
                            @elseif(Auth::user()->marital_status == "Married")
                                <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                                    <i class="fa fa-person me-0"></i>
                                    <i class="fa fa-person-dress ms-0"></i>
                                </span>                   
                            @elseif(Auth::user()->marital_status == "Engaged")
                                <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                                    <i class="fa fa-ring me-2 fa-stack-1x"></i>
                                </span>
                            @endif
                            {{ Auth::user()->marital_status }}<br>
        
                            <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                                <i class="fa fa-id-card me-2 fa-stack-1x"></i>
                            </span>
                            {{ Auth::user()->nic }}                            
                        </p>
                    </div>
                </div>

                <div class="mb-3">
                    <p>{{ date_format(Auth::user()->created_at,'d M Y') }}</p>
                    <p>{{ date_format(Auth::user()->updated_at,'d M Y') }}</p>
                </div>                    
            </div>

        </div>
    </div>

</div> 

<div class="container">
    <div class="bg-light rounded h-100 p-4">
        <h4 class="mb-3">Update User Details</h4>
        <form method="POST" action="{{ route('admin.updateprofile')}}">
            @csrf
            
            <div class="row">

                <div class="col-6">

                    <!--First Name -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('fname') is-invalid @enderror" id="floatingText" name="fname" value="{{ Auth::user()->fname }}" required autocomplete="fname" autofocus placeholder="john">
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
                        <input type="text" class="form-control @error('lname') is-invalid @enderror" id="floatingText" name="lname" value="{{ Auth::user()->lname }}" required autocomplete="lname" autofocus placeholder="doe">
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

                <div class="col-8">
                    <!-- Full Name -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="floatingText" name="fullname" value="{{ Auth::user()->fullname }}" required autocomplete="fullname" autofocus placeholder="john doe">
                        <label for="floatingInput">{{ __('Name with Initials') }}</label>
                        @error('fullname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> 
                </div>

                <div class="col-4">
                    <!-- Gender -->
                    <div class="form-floating mb-3">
                        <select type="select" class="form-select @error('gender') is-invalid @enderror" id="floatingSelect" aria-label="Floating label select example" name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus>
                            <option selected>Select your gender</option>
                            <option value="f" {{ Auth::user()->gender == "f" ? 'selected': ''}}>Female</option>
                            <option value="m" {{ Auth::user()->gender == "m" ? 'selected': ''}}>Male</option>                                   
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
                        <input type="text" class="form-control @error('nic') is-invalid @enderror" id="floatingText" name="nic" value="{{ Auth::user()->nic }}"  minlength="10" maxlength="12"  autofocus placeholder="**********V" autocomplete="" required>
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
                        <input type="date" class="form-control @error('dob') is-invalid @enderror" id="floatingText" name="dob" value="{{ Auth::user()->dob }}" required autocomplete="dob" autofocus>
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
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingText" name="email" value="{{ Auth::user()->email }}" required autocomplete="email" disabled>
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
                        <select type="select" class="form-select @error('marital_status') is-invalid @enderror" id="floatingSelect" aria-label="Floating label select example" name="marital_status" value="{{ old('marital_status') }}" required autocomplete="marital_status" autofocus>
                            <option selected>Select Marital Status</option>
                            <option value="Single" {{ Auth::user()->marital_status == "Single" ? 'selected': ''}}>Single</option>
                            <option value="Married" {{ Auth::user()->marital_status == "Married" ? 'selected': ''}}>Married</option>
                            <option value="Engaged" {{ Auth::user()->marital_status == "Engaged" ? 'selected': ''}}>Engaged</option>                                   
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
                        <input type="text" class="form-control @error('contact_no') is-invalid @enderror" id="floatingText" name="contactNo" value="{{ Auth::user()->contactNo }}" required autocomplete="contactNo" maxlength="10" autofocus placeholder="XXXXXXXXXX">
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
                <div class="col-12">
                    <!-- Address -->
                    <div class="form-floating mb-3">
                        <textarea type="text" class="form-control @error('address') is-invalid @enderror" id="floatingTextarea" name="address" value="{{ Auth::user()->address }}" required autocomplete="address" autofocus placeholder="Colombo" style="height: 132px; resize: none">{{ Auth::user()->address }}</textarea>
                        <label for="floatingInput">{{ __('Address') }}</label>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="row justify-content-between uppercase">
                <div class="col-6">
                    <button type="submit" class="btn btn-success float-left  btn-block w-25 uppercase">
                        {{ __('Update') }}
                    </button>
                    <button type="reset" class="btn btn-warning float-left  btn-block w-25 uppercase"">
                        {{ __('Reset') }}
                    </button>
                         
                </div>
                <div class="col-6">
                      
                </div>
          
            </div>
          
           
        </form>        
    </div>
</div>

@endsection