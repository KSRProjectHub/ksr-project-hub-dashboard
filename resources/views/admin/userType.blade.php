@extends('layouts.adminApp')

@section('content')
<div class="container">

    <div class="row bg-info">
        <div class="container">
            <div class="bg-light rounded h-100 p-4">
                <div class="row">
                    <div class="col-6">
                        <h6 class="justify-content-start">Job Roles</h6>
                    </div>
                    <div class="col-6">
                        <form method="POST" action="" class="d-flex mb-2 justify-content-end">
                            @csrf
                            <input class="form-control border-1 w-50" name="userType" type="text" placeholder="Add Job Role">
                            <button type="submit" class="btn btn-primary ms-2">ADD</button>
                        </form>
                    </div>
                </div>
                
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
                                        <a href="#" type="button"  data-toggle="modal" data-target="#ModalEdit{{$item->id}}" class="p-2"><i class="bi-pencil-fill"></i></button>
                                        <a href="deleteUserType/{{ $item->id }}" type="button" class=""><i class="btn-trash-color bi-trash-fill"></i></a>
                                    </td>
                                    @include('admin.edit-jobrole')
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                <!-- Modal -->
                

               

            </div>
        </div>  
    </div>
    
</div>
@endsection