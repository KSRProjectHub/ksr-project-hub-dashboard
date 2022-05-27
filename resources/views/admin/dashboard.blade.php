@extends('layouts.adminApp')

@section('content')
 <!--
<div class="container">
    <div class="container">
        <h1 class="text-uppercase ml-2 text-center"><strong>Admin Dashboard</strong></h1>
        <h5 class="text-uppercase mb-5 ml-2"><strong>Welcome {{ Auth::user()->name }} !</strong></h5>
    </div>
    
    <div class="row justify-content-center">
    
        Start row 1
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
        End row 1 
        <hr>
    </div>
</div>
-->

        <!-- Sale & Revenue Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-line fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Registered Users</p>
                            <h6 class="mb-0">{{ $count }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-bar fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Sale</p>
                            <h6 class="mb-0">$1234</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-area fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Today Revenue</p>
                            <h6 class="mb-0">$1234</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Revenue</p>
                            <h6 class="mb-0">$1234</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sale & Revenue End -->
@endsection
