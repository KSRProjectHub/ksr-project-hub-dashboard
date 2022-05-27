@extends('layouts.adminApp')

@section('content')
<div class="container">
    <div class="row bg-primary p-2 mb-3">
        <div class="container">
            <div class="bg-light rounded h-100 p-4">
                <div class="row">
                    <div class="col-6 bg-info">
                        <h6 class="justify-content-start">Users</h6>
                    </div>
                    <div class="col-6 bg-success">
                        <form method="GET" action="{{ route('admin.search') }}" class="d-flex mb-2 justify-content-end">
                            @csrf
                            <input class="form-control border-1 w-50" name="qry" type="search" placeholder="Search">
                            <button type="submit" class="btn btn-primary ms-2">Search</button>
                        </form>
                    </div>
                </div>
                
                <table class="table table-hover">
                    <thead class="justify-content-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Actions</th>
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
                                    <td>{{$loop->iteration }}</td>
                                    <td>{{$item->name }}</td>
                                    <td>{{$item->email }}</td>
                                    <td>{{$item->userType }}</td>
                                    <td>
                                        <a href="users/editUser/{{ $item->id }}" type="button" class="p-2"><i class="bi-eye-fill"></i></a>
                                        <a href="users/editUser/{{ $item->id }}" type="button" class="p-2"><i class="bi-pencil-fill"></i></a>
                                        <a href="deleteUser/{{ $item->id }}" type="button" class=""><i class="btn-trash-color bi-trash-fill"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>

    <div class="row bg-info">
        <div class="container">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">User Roles</h6>
                
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Role</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($userTypeCount== 0)
                            {{ __('No Entries Found') }}
                        @else
                            @foreach ($uTypes as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->userType }}</td>
                                    <td>
                                        <a href="users/edit-userType/{{ $item->id }}" type="button" class="p-2"><i class="bi-pencil-fill"></i></a>
                                        <a href="deleteUserType/{{ $item->id }}" type="button" class=""><i class="btn-trash-color bi-trash-fill"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>  
    </div>
</div>
@endsection