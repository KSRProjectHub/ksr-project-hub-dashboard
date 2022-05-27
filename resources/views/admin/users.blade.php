@extends('layouts.adminApp')

@section('content')

<div class="container">
    <div class="container m-3 px-4 pt-2 h-25">
        <div class="row g-4 border px-2 w-100 rounded justify-content-between">

            <h3>{{ __('Users') }}</h3>
            <div class="btn-group w-50" role="group">
                <a  href="{{ route('admin.users') }}"  type="button" class="btn btn-outline-primary col-4 {{ (request()->is('admin/users*')) ? 'active' : '' }}"><i class="bi-grid-3x3-gap-fill me-2"></i></a>
                <a  href="{{ route('admin.usersGrid') }}" type="button" class="btn btn-outline-primary col-4 {{ (request()->is('admin/usersGrid')) ? 'active' : '' }}"><i class="fa-solid fa-grid ms-2"></i></a>                    
            </div>
            
        </div>
        
    </div> 
    <div class="row bg-primary p-2 mb-3">
        <div class="container">

            <div class="bg-light rounded h-100 p-4">
                <div class="row">
                    <div class="col-6">
                       
                    </div>
                    <div class="col-6">
                        <form method="GET" action="{{ route('admin.search') }}" class="d-flex mb-2 justify-content-end">
                            @csrf
                            <input class="form-control border-1 w-50" name="qry" type="text" placeholder="Search">
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
                                    <td>{{$loop->index + 1 }}</td>
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
                {{ $user->onEachSide(1)->links() }}
                
            </div>
        </div>
    </div>

    
</div>
@endsection