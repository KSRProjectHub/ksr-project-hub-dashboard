@extends('layouts.adminApp')

@section('content')
<div class="container mb-3">
    <div class="row p-2">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('users') }}">Projects</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('get.topics') }}">Topics</a></li>
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
                    <h6>Topics</h6>
                    <a class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#ModalAddTopic">
                       <!-- <div class="fa-2x">
                            <i class="fa-brands fa-add" data-fa-transform="shrink-3.5 up-1.6 right-1.25" data-fa-mask="fa fa-user-shield" data-fa-mask-id="user-shield"></i>
                        </div>-->
                        <i class="fa-solid fa-file-circle-plus fa-1x" data-fa-transform="grow-4"></i>
                    </a>
                    <form class="form-inline" method="GET">
                        @csrf
                        <div class="form-group mb-2">
                          <label for="filter" class="col-sm-2 col-form-label">Filter</label>
                          <input type="text" class="form-control" id="filter" name="filter" placeholder="Topic" value="{{$filter}}">
                        </div>
                        <button type="submit" class="btn btn-default mb-2">Filter</button>
                    </form>                   
                </div>

                <table class="table table-hover w-100">
                    <thead class="justify-content-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">@sortablelink('topic', 'Topic')</th>
                            <th scope="col">@sortablelink('user_id', 'Added By')</th>
                            <th scope="col">@sortablelink('created_at', 'Added Date')</th>
                            <th scope="col">@sortablelink('updated_at', 'Updated Date')</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topics as $key=> $items)
                        <tr class="align-middle">
                            <td scope="col">{{$topics->firstItem() + $key }}</td>
                            <td>{{$items->topic }}</td>
                            <td>{{$items->full_name }} ({{ $items->userType }})</td>
                            <td>{{$items->created_at }}</td>
                            <td>{{$items->updated_at }}</td>
                            <td scope="col">
                                <a class="btn btn-outline-dark btn-square" type="button" data-bs-toggle="modal" data-bs-target="#ModalEditTopic{{$items->id}}">
                                    <i class="fa-solid fa-pencil m-r-5"></i>
                                </a>
                                <a type="button" class="btn btn-outline-danger btn-square" href="delete-topic/{{ $items->id }}">
                                    <span class="fa-layers fa-fw fa-1x">
                                        <i class="fa-solid fa-file-circle-minus" data-fa-transform="grow-2"></i>
                                    </span>
                                </a>
                            </td>
                            @include('projects.modals.topics.update')
                        </tr>
                    @endforeach                        
                        @include('projects.modals.topics.add')
                        
                    </tbody>
                </table>
                {!! $topics->appends(Request::except('page'))->render() !!}
                <div class="row justify-content-between">
                    <div class="col-5 justify-content-start">
                        Showing {{ $topics->firstItem() }} - {{ $topics->lastItem() }} of {{ $topics->total() }} Topics
                    </div>
                    <div class="col-7 justify-content-end">
                        {{ $topics->onEachSide(1)->links() }}
                    </div>
                </div> 
                                
            </div> 
        </div>
    </div>
</div>
@endsection