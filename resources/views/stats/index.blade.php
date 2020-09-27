@extends('layouts.admin')

@section('header')
    Statistics
@endsection

@section('content')
        <div class="container">
            <a href="{{ route('home') }}" class="btn btn-purple float-right">Back</a>
            <h4 class="pt-3 mb-0">Bookings</h4>
            <div class="row">
                <div class="col pt-2">
                    <div class="card shadow h-100 py-2 ">
                        <!-- Upcoming Bookings Card -->
                        <a href="{{ route('events.index') }}" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold text-success mb-1">Upcoming</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $upcoming }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar-alt fa-2x text-gray-300 text-success pt-2"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col pt-2">
                    <div class="card shadow h-100 py-2">
                        <!-- Bookings Today Card -->
                        <a href="" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold mb-1" style="color: #FF8C00">Today</div>

                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $today }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar-day fa-2x text-gray-300  pt-2" style="color: #FF8C00"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col pt-2">
                    <div class="card shadow h-100 py-2">
                        <!-- Bookings Today Card -->
                        <a href="" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold mb-1" style="color: #009881">Total</div>

                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $today }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300  pt-2" style="color: #009881"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <h4 class="pt-3 mb-0">Patients</h4>
            <div class="row">
                <div class="col pt-2">
                    <div class="card shadow h-100 py-2">
                        <!-- Total Patients Card -->
                        <a href="{{ route('patients.index') }}" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold text-primary mb-1">Total Patients</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ Auth::user()->patients->where('Deleted','=','0')->count() }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300 text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col pt-2">
                    <div class="card shadow h-100 py-2">
                        <!-- Total Patients Card -->
                        <a href="{{ route('patients.index') }}" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold text-primary mb-1">Diabetes</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ Auth::user()->patients->where('Deleted','=','0')->count() }}</div>
                                    </div>
                                    <div class="col-auto">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('sidebar')
    <h5>Statistics</h5>
    <p>A quick glance at all your information.</p>
@endsection
