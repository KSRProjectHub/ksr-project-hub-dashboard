@extends('layouts.adminApp')

@section('content')

<div class="container">
    <div class="row p-2 mb-3">
    
        <div class="container">
            <div class="row g-2 w-100 rounded mb-0">

                <div class="d-flex align-items-center  me-2 justify-content-between">
                    <h3 class="ms-2">{{ __('Users') }}({{ $user->count()}})</h3>
                    
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true"><i class="fa fa-list"></i></button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab"
                                aria-controls="pills-profile" aria-selected="false"><i class="bi-grid-3x3-gap-fill"></i></button>
                        </li>
                    </ul>                
                </div>

            </div>
        </div>
    </div>    
    <div class="row p-2 mb-3">
        <div class="container">

            <div class="bg-light rounded h-100 p-4">

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="row">
                            <div class="col-6">
                                <a href="{{ route('users.addUser') }}" class="btn btn-success" type="button" > Add New User</a>
                            </div>
                            <div class="col-6">
                                <form method="GET" action="{{ route('admin.search') }}" class="d-flex mb-2 justify-content-end">
                                    @csrf
                                    <input class="form-control border-1 w-50" name="qry" type="text" placeholder="Search">
                                    <button type="submit" class="btn btn-primary ms-2">Search</button>
                                </form>
                            </div>
                        </div>
                        @if ($userCount== 0)
                            <p>{{ __('No Entries Found') }}</p>
                        @else                        
                            <table class="table table-hover">
                                <thead class="justify-content-center">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Last Seen</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Modify</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($user as $key=> $item)
                                            <tr>
                                                <td scope="col">{{$user->firstItem() + $key }}</td>
                                                <td>
                                                    @if ($item->profileimage == null)
                                                        @if ($item->gender == 'm')
                                                            <img class="rounded-circle" src="{{ asset('img/user-images/default/user-male.png')}}" alt="" style="width: 60px; height: 60px;">
                                                        @elseif($item->gender == 'f')
                                                            <img class="rounded-circle" src="{{ asset('img/user-images/default/user-female.png')}}" alt="" style="width: 60px; height: 60px;">
                                                        @endif
                                                    @else
                                                        <img class="rounded-circle image-previewer" src=" {{ asset('img/user-images/' . $item->profileimage  ) }}" alt="" style="width: 60px; height: 60px;">
                                                    @endif
                                                </td>
                                                <td>{{$item->fname. ' ' .$item->lname }}</td>
                                                <td>{{$item->email }}</td>
                                                <td>{{$item->getUserType() }}</td>
                                                <td>
                                                    {{ Carbon\Carbon::parse($item->last_seen)->diffForHumans() }}
                                                </td>
                                                <td>
                                                    @if(Cache::has('user-is-online-' .$item->email))
                                                        <span class="text-success">Online</span>
                                                    @else
                                                        <span class="text-secondary">Offline</span>
                                                    @endif
                                                </td>
                                                
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" type="button" class="ms-3" data-toggle="dropdown" aria-expanded="false" data-bs-toggle="tooltip" data-bs-placement="top" title="more"><i style="color: rgb(0, 0, 0)" class="fa-solid fa-ellipsis-vertical me-2"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="users/viewUser/{{ $item->id }}"><i class="fa fa-eye m-r-5"></i> View</a>
                                                            <a class="dropdown-item" href="users/edituser/{{ $item->id }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                             @can('users_delete')
                                                                <a class="dropdown-item" href="deleteUser/{{ $item->id }}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                            @endcan
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <div class="row justify-content-between">
                                <div class="col-5 justify-content-start">
                                    Showing {{ $user->firstItem() }} - {{ $user->lastItem() }} of {{ $user->total() }}
                                </div>
                                <div class="col-7 justify-content-end">
                                    {{ $user->onEachSide(1)->links() }}
                                </div>
                            </div>
                        
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="bg-light rounded h-100 p-4">
                            <div class="row staff-grid-row">
                                @foreach ($user as $item)
                                    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                                        <div class="profile-widget">
                                            <div class="profile-img mb-3">
                                                <a href="profile.html" class="avatar">
                                                @if ($item->profileimage == null)
                                                    @if ($item->gender == 'm')
                                                        <img class="rounded-circle" src="{{ asset('img/user-images/default/user-male.png')}}" alt="" style="width: 80px; height: 80px;">
                                                    @elseif($item->gender == 'f')
                                                        <img class="rounded-circle" src="{{ asset('img/user-images/default/user-female.png')}}" alt="" style="width: 80px; height: 80px;">
                                                    @endif                                                    
                                                @else
                                                    <img class="rounded-circle" src=" {{ asset('img/user-images/' . $item->profileimage  ) }}" alt="" style="width: 80px; height: 80px;">
                                                @endif

                                                </a>
                                            </div>
                                            <div class="dropdown profile-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i style="color: gray" class="fa-solid fa-ellipsis-vertical me-2"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                            <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">{{ $item->fname }}</a></h4>
                                            <div class="small text-muted uppercase">{{ $item->userType }}</div>
                                            @if(Cache::has('user-is-online-' .$item->email))
                                                <span class="text-success">Online</span>
                                            @else
                                                <span class="text-secondary">Offline</span>
                                            @endif
                                            <div class="small text-muted">{{ $item->created_at }}</div>
                                        </div>
                                    </div>
            
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                </div>
                

                
            </div>
        </div>
    </div>

    
</div>
@endsection