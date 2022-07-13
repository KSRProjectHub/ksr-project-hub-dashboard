@extends('layouts.adminApp')

@section('content')
<div class="container mb-3">
    <div class="row p-2">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('userterms.index') }}">Terms and Conditions</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Terms and Conditions List</li>
                </ol>
            </nav>                

        </div>
    </div>
</div>

<div class="container">
    <div class="row g-4">
        <div class="">
            <div class="bg-light rounded p-4 mb-3">
                <div class="row align-middle mb-3">
                    <div class="col-4">
                        <h6 class="justify-content-start">Terms</h6>
                    </div>
                    <div class="col-8">
                        <form method="GET" action="" class="d-flex justify-content-end form-inline">
                            @csrf                            
                            <div class="form-group">
                                <input class="form-control border-1 form-inline" id="floatingText" type="text" id="filter" name="filter" placeholder="Enter Title" value="{{$filter}}">
                            </div>

                            <div class="form-group">
                                <button class="butn ms-2" type="submit" data-toggle="tooltip" title="Filter Data"> 
                                    <i class="bi bi-funnel" style="font-size: 1.35em;"></i>
                                </button>   
                                
                                <a type="button" class="butn2 ms-1 form-inline p-0" href="{{ route('userterms.create') }}" data-toggle="tooltip" title="Add New Terms">
                                    <i class="bi bi-file-earmark-plus" style="font-size: 1.35em;"></i>
                                </a>                                
                            </div>


                        </form>

                    </div>
                </div>

                <table class="table table-hover w-100">
                    <thead class="justify-content-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">@sortablelink('title', 'Title')</th>
                            <th scope="col">@sortablelink('version', 'Version')</th>
                            <th scope="col">@sortablelink('created_at', 'Added')</th>
                            <th scope="col">@sortablelink('updated_at', 'Updated')</th>
                            <th scope="col">@sortablelink('user_id', 'Added By')</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($terms as $key=> $items)
                        <tr class="align-middle">
                            <td scope="col">{{$terms->firstItem() + $key }}</td>
                            <td>{{$items->title }}</td>
                            <td>{{$items->version }}</td>
                            <td>{{$items->created_at }}</td>
                            <td>{{$items->updated_at }}</td>
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
                            <td scope="col">
                                <a type="button" class="btn btn-outline-primary btn-square" href="{{URL::to('admin/userterms/'.$items->id)}}">
                                    <i class="fa-solid fa-eye m-r-5"></i>
                                </a>                                
                                <a class="btn btn-outline-dark btn-square" type="button" href="{{URL::to('admin/userterms/'.$items->id.'/edit')}}">
                                    <i class="fa-solid fa-pencil m-r-5"></i>
                                </a>
                                <a type="button" class="btn btn-outline-danger btn-square" href="userterms/delete/{{$items->id}}">
                                    <span class="fa-layers fa-fw fa-1x">
                                        <i class="fa-solid fa-minus" data-fa-transform="grow-2"></i>
                                    </span>
                                </a>                                    
                            </td>
                            
                        </tr>
                    @endforeach                        
                        
                        
                    </tbody>
                </table>
                {!! $terms->appends(Request::except('page'))->render() !!}
                <div class="row justify-content-between">
                    <div class="col-5 justify-content-start">
                        Showing {{ $terms->firstItem() }} - {{ $terms->lastItem() }} of {{ $terms->total() }} terms
                    </div>
                    <div class="col-7 justify-content-end">
                        {{ $terms->onEachSide(1)->links() }}
                    </div>
                </div> 
                                
            </div> 
        </div>
    </div>
</div>

@endsection