@extends('layouts.app2')

@section('content')
<div class="container">

    <div class="row mb-3 p-3">
        <div class="container">
            <div class="row">

                <div class="col-4">
                    <h1 class="mt-3 mb-3">User Roles</h1>
                </div>

                <div class="col-8 d-flex justify-content-end">

                    <form action="{{ route('add.userTypes') }}" class="p-3" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <input type="text" placeholder="Add New Role" class="form-control @error('userType') is-invalid @enderror" id="addUserType" name="userType" >
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-success">{{ __('Add New Role') }}</button>
                            </div>
                        </div>
                        
                        @error('userType')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                    </form>

                </div>
            </div>

            <div class="row">
                
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>User Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($userTypeCount== 0)
                            {{ __('No Entries Found') }}
                        @else
                            @foreach ($uTypes as $item)
                                <tr>
                                    <td>{{ $item->userType }}</td>
                                </tr>
                            @endforeach
                        @endif
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr>
    <div class="container mb-3 pt-3">

        <div class="container">
            <div class="row">
                <div class="col"><h1>Users</h1> </div>
                <div class="col text-md-end">
                    <a href="{{ url('/admin') }}" type="button" class="btn btn-success">{{ __('Add New') }}</a>
                </div>
            </div>
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>User Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($userCount== 0)
                        <tr>
                            <td>{{ __('No Entries Found') }}</td>
                        </tr>
                    @else
                        @foreach ($user as $item)
                            <tr>
                                <td>{{$item->name }}</td>
                                <td>{{$item->userType }}</td>
                            </tr>
                        @endforeach
                    @endif
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection