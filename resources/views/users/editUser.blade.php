@extends('layouts.app2')

@section('content')
<div class="container mb-3">
    <h1>Edit {{ $user->name }}</h1>
</div>
<div class="container">
    @if(Session::has('user_updated'))
        <div class="alert alert-info" role="alert">
            {{ Session::get('user_updated') }}
        </div>
    @endif
    <form method="POST" action="{{ route('update.user')}}">
        @csrf
        <div class="row mb-3">
            <div class="col-6 bg-info">

                <input type="hidden" class="form-control" id="userId" name="id" value="{{ $user->id }}">
                <!-- Name -->
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}"  required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Email -->
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                    <div class="col-md-8">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="col-6 bg-warning">

                <!-- User Type -->
                <div class="row mb-3">
                    <label for="userType" class="col-md-4 col-form-label text-md-end">{{ __('User Category') }}</label>

                    <div class="col-md-8">
                        <select id="userType" type="text" class="form-select @error('userType') is-invalid @enderror" aria-label="Default select example" name="userType" required autocomplete="userType" autofocus>
                            <option class="text-muted" value="{{$user->userType}}" selected>{{ $user->userType }}</option>
                            @foreach ($uTypes as $items)
                                <option value="{{ $items->userType }}">{{ $items->userType }}</option>
                            @endforeach
                        </select>
                        @error('userType')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- NIC -->
                <div class="row mb-3">
                    <label for="nic" class="col-md-4 col-form-label text-md-end">{{ __('NIC') }}</label>

                    <div class="col-md-8">
                        <input id="nic" type="text" class="form-control @error('nic') is-invalid @enderror" name="nic" value="{{ $user->nic }}" required autocomplete="nic">

                        @error('nic')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3 bg-danger">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary float-left">
                            {{ __('Update') }}
                        </button>
                        <button type="reset" class="btn btn-primary float-left">
                            {{ __('Reset') }}
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>
@endsection