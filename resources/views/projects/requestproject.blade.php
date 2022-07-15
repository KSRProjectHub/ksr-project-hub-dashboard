@extends('layouts.adminApp')

@section('content')
<div class="container mb-3">
    <div class="row p-2">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('users') }}">Projects</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('requestprojects') }}">Requested Projects</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('requestprojects') }}">Project ID</a></li>
                </ol>
            </nav>                
        </div>
    </div>
</div>

@endsection