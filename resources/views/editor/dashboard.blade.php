@extends('layouts.adminApp')

@section('content')
<div class="container">
    <div class="container">
        <h1 class="text-uppercase mb-5 ml-2"><strong>Editors Dashboard</strong></h1>
    </div>
    
    <div class="row justify-content-center">
    
        <!-- Start row 1 -->
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="card h-100 hover-shadow shadow p-3">
                    <div class="card-header text-uppercase"><strong>Users - {{ $count }}</strong></div>
                    <div class="card-body">
                        <h1>No of Users</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow p-3">
                    <div class="card-header text-uppercase"><strong>User Categories - {{ $userCount }}</strong></div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                        @foreach ($userTypes as $item)
                            <li class="capitalize">{{ $item->userType }}</li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow p-3">
                    <div class="card-header text-uppercase"><strong>Materials - 0</strong></div>
                    <div class="card-body">
                        <h1>No of Materials</h1>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">PAF</li>
                            <li class="list-group-item">ITPM</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End row 1 -->
        <hr>

        <!-- Start row 2 -->
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="card h-100 shadow p-3">
                    <div class="card-header text-uppercase"><strong>Users - 0</strong></div>
                    <div class="card-body">
                        <h1>No of Users</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow p-3">
                    <div class="card-header text-uppercase"><strong>Projects - 0</strong></div>
                    <div class="card-body">
                        <h1>No of Projects</h1>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">PAF</li>
                            <li class="list-group-item">ITPM</li>
                        </ul>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow p-3">
                    <div class="card-header text-uppercase"><strong>Materials - 0</strong></div>
                    <div class="card-body">
                        <h1>No of Materials</h1>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">PAF</li>
                            <li class="list-group-item">ITPM</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End row 2 -->
    </div>
</div>
@endsection
