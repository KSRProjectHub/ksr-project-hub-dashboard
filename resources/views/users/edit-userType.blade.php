@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Edit {{ $userType->userType }}
                </div>
                <div class="card-body">

                    <!-- 
                    @if(Session::has('user_type_updated'))
                        <div class="alert alert-info" role="alert">
                            {{ Session::get('user_type_updated') }}
                        </div>
                    @endif
                    -->
                    <form action="{{ route('update.userTypes') }}" class="p-3" method="POST">
                        @csrf
                        <input type="hidden" class="form-control" id="userTypeId" name="id" value="{{ $userType->id }}">
                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-8 mb-3">
                                <input type="text" class="form-control" id="updateUserType" value="{{ $userType->userType }}" name="userType">
                            </div>
                            <div class="row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save Changes') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection