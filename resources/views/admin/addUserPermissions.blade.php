@extends('layouts.adminApp')

@section('content')
<div class="container mb-3">
    <div class="row p-2">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('users') }}">Users</a></li>
                    <li class="breadcrumb-item">User Permissions</li>
                    <li class="breadcrumb-item active" aria-current="page">Add</li>
                </ol>
            </nav>                

        </div>
    </div>
</div>

<div class="container-fluid mb-3">
    <div class="row g-4">
        <div class="">
            <div class="bg-light rounded p-4 mb-3">
                <div class="d-flex justify-content-between">
                    <h6>User Permissions</h6>
                    <a class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#ModalAdd">
                       <!-- <div class="fa-2x">
                            <i class="fa-brands fa-add" data-fa-transform="shrink-3.5 up-1.6 right-1.25" data-fa-mask="fa fa-user-shield" data-fa-mask-id="user-shield"></i>
                        </div>-->
                        <span class="fa-layers fa-fw fa-1x mt-2">
                            <i class="fa fa-user-shield"></i>
                            <i class="fas fa-add" data-fa-transform="shrink-4 up-8 right-7"></i>
                        </span>
                    </a>                    
                </div>

                <table class="table table-hover w-100">
                    <thead class="justify-content-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User</th>
                            <th scope="col">User Role</th>
                            <th scope="col" class="text-center">Add</th>
                            <th scope="col" class="text-center">Update</th>
                            <th scope="col" class="text-center">Delete</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($uPermission as $key => $userRIds)
                            <tr class="align-middle">
                                <td>{{$uPermission->firstItem() + $key }}</td>
                                <td>{{$userRIds->full_name }}</td>
                                <td>{{$userRIds->userType }}</td>
                                <td class="text-center">
                                    @if ($userRIds->add==1)
                                        <i class="fa-solid fa-check green"></i>
                                    @else
                                        <i class="fa-solid fa-xmark red"></i>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($userRIds->update==1)
                                        <i class="fa-solid fa-check green"></i>
                                    @else
                                        <i class="fa-solid fa-xmark red"></i>
                                    @endif
                                </td>
                                <td scope="col" class="text-center">
                                    @if ($userRIds->delete==1)
                                        <i class="fa-solid fa-check green"></i>
                                    @else
                                        <i class="fa-solid fa-xmark red"></i>
                                    @endif
                                </td>
                                <td scope="col">
                                    <a type="button" class="btn btn-outline-dark btn-square"  data-toggle="modal" data-target="#ModalEdit{{ $userRIds->id }}"><i class="fa-solid fa-pencil m-r-5"></i></a>
                                    <a type="button" class="btn btn-outline-danger" href="users/delete/{{ $userRIds->id }}">
                                        <span class="fa-layers fa-fw fa-1x">
                                            <i class="fa fa-user-shield"></i>
                                            <i class="fas fa-minus" data-fa-transform="shrink-4 up-8 right-7"></i>
                                        </span>
                                    </a>
                                </td>
                                @include('admin.addPerms')
                                @include('admin.getPerms')
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row justify-content-between">
                    <div class="col-5 justify-content-start">
                        Showing {{ $uPermission->firstItem() }} - {{ $uPermission->lastItem() }} of {{ $uPermission->total() }} permissions
                    </div>
                    <div class="col-7 justify-content-end">
                        {{ $uPermission->onEachSide(1)->links() }}
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>

@endsection