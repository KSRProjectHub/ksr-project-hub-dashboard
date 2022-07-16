@extends('layouts.adminApp')

@section('content')
<div class="container mb-3">
    <div class="row p-2">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('users') }}">Projects</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('requestprojects') }}">Requested Projects</a></li>
                </ol>
            </nav>                
        </div>
    </div>
</div>

<div class="container mb-3">
    <div class="row g-4">
        <div class="">
            <div class="bg-light rounded p-4 mb-3">
                <div class="row align-middle mb-3">
                    <div class="col-4">
                        <h6 class="justify-content-start">Request Projects</h6>
                    </div>
                    <div class="col-8">
                        <form method="GET" action="" class="d-flex justify-content-end form-inline">
                            @csrf
                            <div class="form-group">
                                <select type="select" class="form-select @error('title') is-invalid @enderror" id="floatingSelect" aria-label="Floating label select example" name="filterby" value="{{ old('title') }}" required autocomplete="title" autofocus>
                                    <option selected>Select</option>
                                    <option value="cust_id">Customer ID</option>
                                    <option value="email">Email</option>
                                    <option value="Mrs.">Mrs.</option>                                   
                                </select>
     
                            </div>                        
                            <div class="form-group ms-2">
                                <input class="form-control border-1 form-inline" id="floatingText" type="text" id="filter" name="filter" placeholder="Enter name" value="{{$filter}}">
                            </div>

                            <div class="form-group">
                                <button class="butn ms-2" type="submit" data-toggle="tooltip" title="Filter Data"> 
                                    <i class="bi bi-funnel" style="font-size: 1.35em;"></i>
                                </button>                                
                            </div>

                        </form>

                    </div>
                </div>

                <table class="table table-hover w-100">
                    <thead class="justify-content-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">@sortablelink('cust_id', 'Customer ID')</th>
                            <th scope="col">@sortablelink('email', 'Email')</th>
                            <th scope="col">@sortablelink('projectDoc', 'Group Assignment')</th>
                            <th scope="col">@sortablelink('er_digram', 'ER Diagram')</th>
                            <th scope="col">@sortablelink('contactNo', 'Contact No.')</th>
                            <th scope="col">@sortablelink('deadline', 'Deadline')</th>
                            <th scope="col">@sortablelink('status', 'Status')</th>
                            <th scope="col">@sortablelink('created_at', 'Sent Date')</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userDetails as $key=> $items)
                        <tr class="align-middle">
                            <td scope="col">{{$userDetails->firstItem() + $key }}</td>
                            <td>{{$items->cust_id }}</td>
                            <td>{{$items->email }}</td>
                            <td class="text-center">
                                <a href="{{ url('docs')}}/{{$items->cust_id}}/projectDoc/{{$items->projectDoc}}" data-toggle="tooltip" title="{{pathinfo($items->projectDoc, PATHINFO_FILENAME)}}">
                                    <i class="bi bi-file-{{$icons[pathinfo($items->projectDoc, PATHINFO_EXTENSION)]}} fa-2x" style="cursor: pointer;"></i>
                                </a> 
                            </td>
                            <td>
                                @if ($items->er_diagram==null)
                                    <span class="badge bg-dark" style="font-style: italic; font-size: 0.7rem">Not Provided</span>
                                @else
                                <a href="{{ url('docs')}}/{{$items->cust_id}}/er/{{$items->er_diagram }}" data-toggle="tooltip" title="{{pathinfo($items->er_diagram, PATHINFO_FILENAME)}}">
                                    @if (pathinfo($items->er_diagram, PATHINFO_EXTENSION)=='pdf' || pathinfo($items->er_diagram, PATHINFO_EXTENSION)=='docx')
                                        <i class="bi bi-file-{{$icons[pathinfo($items->er_diagram, PATHINFO_EXTENSION)]}} fa-2x" style="cursor: pointer;"></i>
                                    @else
                                        <i class="bi bi-{{$icons[pathinfo($items->er_diagram, PATHINFO_EXTENSION)]}} fa-2x" style="cursor: pointer;"></i>
                                    @endif
                                </a> 
                                    
                                @endif
                                
                            </td>
                            <td>{{$items->contactNo }}</td>
                            <td>{{$items->deadline }}</td>
                            <td>
                                @if ($items->status=="Pending")
                                    <span class="badge bg-dark" style="font-style: italic; font-size: 0.7rem">{{$items->status }}</span>
                                @elseif($items->status=="Accepted")
                                    <span class="badge bg-success" style="font-style: italic; font-size: 0.7rem">{{$items->status }}</span>
                                @elseif($items->status=="Rejected")
                                    <span class="badge bg-danger" style="font-style: italic; font-size: 0.7rem">{{$items->status }}</span>
                                @endif
                                
                            </td>
                            <td>{{$items->created_at }}</td>
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
                        </tr>
                    @endforeach                        
                        
                    </tbody>
                </table>
                {!! $userDetails->appends(Request::except('page'))->render() !!}
                <div class="row justify-content-between">
                    <div class="col-5 justify-content-start">
                        Showing {{ $userDetails->firstItem() }} - {{ $userDetails->lastItem() }} of {{ $userDetails->total() }} Requested projects
                    </div>
                </div> 
                                
            </div> 
        </div>
    </div>
</div>
@endsection