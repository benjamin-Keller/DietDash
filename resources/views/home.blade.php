@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- header -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card shadow h-100 py-2">
                        <!-- Total Patients Card -->
                        <a href="{{ route('patients.index') }}" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary mb-1">Total Patients</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $patients = Auth::user()->patients->where('Deleted','=','0')->count() }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300 text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
                <div class="col">
                    <div class="card shadow h-100 py-2">
                        <!-- Upcoming Bookings Card -->
                        <a href="{{ route('bookings.index') }}" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success mb-1">Upcoming Bookings</div>
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
                <div class="col"><div class="card shadow h-100 py-2">
                        <!-- Bookings Today Card -->
                        <a href="{{ route('bookings.today') }}" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold mb-1" style="color: #FF8C00">Today's Bookings</div>

                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $today }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar-day fa-2x text-gray-300  pt-2" style="color: #FF8C00"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div></div>
                <!-- <div class="col">col</div> -->
            </div>
        </div>
    </div>

    </div>
@endsection
