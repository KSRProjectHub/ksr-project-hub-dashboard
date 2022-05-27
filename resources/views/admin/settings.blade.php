@extends('layouts.adminApp')

@section('content')
<div class="container-fluid pt-4 px-4">
    <h2>Admin Settings</h2>
    <div class="col-sm-12 col-xl-6">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Reset Password</h6>
            <form action="{{ route('update.password') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="password" name="oldPassword" class="form-control @error('oldPassword') is-invalid @enderror"
                        placeholder="Old Password">
                    <a type="button"  onclick=" "><span class="input-group-text" id="basic-addon2"><i class="bi-eye-fill"></i></span></a>
                
                    @error('oldPassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    @error('error')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                    
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror"
                        placeholder="New Password">
                    <a href=""  type="button"><span class="input-group-text" id="basic-addon2"><i class="bi-eye-fill"></i></span></a>
                    @error('new_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="new_password_confirmation" class="form-control @error('new_password_confirmation') is-invalid @enderror"
                        placeholder="Confirm New Password">
                    <a href="" type="button"><span class="input-group-text" id="basic-addon2"><i class="bi-eye-fill"></i></span></a>
                    @error('new_password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                
                </div>

                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">
                            {{ __('Update Password') }}
                        </button>
                    </div>
                    <div class="col">
                        <button type="reset" class="btn btn-primary py-3 w-100 mb-4">
                            {{ __('Reset') }}
                        </button>                        
                    </div>
                </div>
                 
            </form>
        </div>
    </div>  
</div>
@endsection