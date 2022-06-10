@extends('layouts.adminApp')

@section('content')
<div class="container mb-3">
    <div class="row p-2">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('users') }}">Users</a></li>
                    <li class="breadcrumb-item">Info</li>
                    <li class="breadcrumb-item">{{ $user->getUserType() }}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $user->fname.' '.$user->lname }}</li>
                </ol>
            </nav>                

        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="bg-light rounded h-100 p-4">
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
                <hr>

                <div class="mb-3">
                    <div class="row">
                        <div class="col-4">
                            <p><strong>{{ __('Registered Date') }}</strong></p>
                            <p><strong>{{ __('Last Updated') }}</strong></p>
                        </div>
                        <div class="col-8">
                            <p>{{$user->created_at->diffForHumans()}} ({{ date_format($user->created_at,'d M Y') }} - {{$user->created_at->format('h:i:s A') }})</p>
                            <p>{{$user->updated_at->diffForHumans()}} ({{ date_format($user->updated_at,'d M Y') }} - {{$user->updated_at->format('h:i:s A') }})</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="bg-light rounded h-100 p-4">
                <h4 class="mb-3">Personal Details</h4><hr>

                <p>
                    <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                        <i class="fa fa-user me-2 fa-stack-1x"></i>
                    </span>
                   {{$user->title}} {{ $user->fname.' '.$user->lname }} ({{ $user->fullname }})<br>
 
                    <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                        <i class="fa fa-mobile-screen me-2 fa-stack-1x"></i>
                    </span>
                    {{ $user->contactNo }}<br>
                    
                    @if ($user->gender == 'f')
                        <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                            <i class="bi bi-gender-female me-2 fa-stack-1x"></i>
                        </span>
                        Female
                    @elseif($user->gender == 'm')
                        <span class="fa-stack fa" style="color: rgb(9, 9, 87)"> 
                            <i class="bi bi-gender-male me-2 fa-stack-1x"></i>
                        </span>   
                        Male
                    @endif<br>
                        
                    <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                        <i class="fa fa-location-dot me-2 fa-stack-1x"></i>
                    </span>
                    {{ $user->address }}<br>

                    <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                        <i class="fa fa-at me-2 fa-stack-1x"></i>
                    </span>
                   <a href="mailto:{{ $user->email }}"> {{ $user->email }}</a><br>
 
                    <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                        <i class="fa fa-cake-candles me-2 fa-stack-1x"></i>
                    </span>
                    {{ \Carbon\Carbon::parse($user->dob)->format('Y M d') }}<br>

                    @if ($user->marital_status == "Single")
                        @if ($user->gender == 'f')
                            <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                                <i class="fa fa-person-dress me-2 fa-stack-1x"></i>
                            </span>
                        @elseif($user->gender == 'm')
                            <span class="fa-stack fa" style="color: rgb(9, 9, 87)">    
                                <i class="fa fa-person me-2 fa-stack-1x"></i>
                            </span>
                        @endif
                    @elseif($user->marital_status == "Married")
                        <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                            <i class="fa fa-person me-0"></i>
                            <i class="fa fa-person-dress ms-0"></i>
                        </span>                   
                    @elseif($user->marital_status == "Engaged")
                        <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                            <i class="fa fa-ring me-2 fa-stack-1x"></i>
                        </span>
                    @endif
                    {{ $user->marital_status }}<br>

                    <span class="fa-stack fa" style="color: rgb(9, 9, 87)">
                        <i class="fa fa-id-card me-2 fa-stack-1x"></i>
                    </span>
                    {{ $user->nic }}
                </p>                 
            </div>        
        </div>
    </div>

</div>
@endsection