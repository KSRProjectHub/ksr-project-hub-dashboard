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
                <div class="row align-middle mb-3">
                    <div class="col-4">
                        <h6 class="justify-content-start">Topics</h6>
                    </div>
                    <div class="col-8">
                        <form method="GET" action="" class="d-flex justify-content-end form-inline">
                            @csrf                            
                            <div class="form-group">
                                <input class="form-control border-1 form-inline" id="floatingText" type="text" id="filter" name="filter" placeholder="Enter topic name" value="{{$filter}}">
                            </div>

                            <div class="form-group">
                                <button class="butn ms-2" type="submit" data-toggle="tooltip" title="Filter Data"> 
                                    <i class="bi bi-funnel" style="font-size: 1.35em;"></i>
                                </button>   
                                
                                <button type="button" class="butn2 ms-1 form-inline p-0" data-bs-toggle="modal" data-bs-target="#ModalAddTopic" data-toggle="tooltip" title="Add New topic">
                                    <i class="bi bi-file-earmark-plus" style="font-size: 1.35em;"></i>
                                </button>                                
                            </div>


                        </form>

                    </div>
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
                            <td>
                                @if ($items->profileimage == null)
                                    @if ($items->gender == 'm')
                                        <img class="img-thumbnail" src="{{ asset('img/user-images/default/user-male.png')}}" alt="" style="width: 60px; height: 60px;" data-toggle="tooltip" title="{{ $items->fullname }} ({{ $items->userType }})">
                                    @elseif($items->gender == 'f')
                                        <img class="img-thumbnail" src="{{ asset('img/user-images/default/user-female.png')}}" alt="" style="width: 60px; height: 60px;" data-toggle="tooltip" title="{{ $items->fullname }} ({{ $items->userType }})">
                                    @endif
                                @else
                                    <img class="img-thumbnail image-previewer" src=" {{ asset('img/user-images/' . $items->profileimage  ) }}" alt="" style="width: 60px; height: 60px;" data-toggle="tooltip" title="{{ $items->fullname }} ({{ $items->userType }})">
                                @endif 
                            </td>
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