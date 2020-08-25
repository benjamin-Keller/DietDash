@extends('layouts.app')

@section('scripts')
    $(document).ready(function(){ $('#patients').DataTable();  });
@endsection

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
                    </div>
                </div>
                <!-- <div class="col">col</div> -->
                <div class="container pt-5">
                    <div class="row">
                        <div class="col-md">
                            <div class="card shadow h-100">
                                <div class="card-header container-fluid">
                                    <div class="row align-middle">
                                        <div class="col-sm">
                                            <h3 class="float-left">{{ __('Patients') }}</h3>
                                        </div>
                                        <div class="col-sm">
                                            <div class="float-right">
                                                <a href="{{ route('patients.create') }}" class="btn btn-primary btn-m ml-2" style="text-decoration: none; color: white;">Add Patient</a>
                                                <a href="{{ route('patients.deleted') }}" class="btn btn-danger btn-m " style="text-decoration: none; color: white;"><i class="far fa-trash-alt"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="pl-5 pr-5 pt-3 pb-3">
                                        @include('inc.messages')

                                        <table class="table table-bordered table-striped w-100
                                        table-responsive-sm
                                        table-responsive-md
                                        table-responsive-lg" id="patients">
                                            <thead>
                                            <tr>
                                                <th>{{ 'First Name' }}</th>
                                                <th>{{ 'Last Name' }}</th>
                                                <th>{{ 'Gender' }}</th>
                                                <th>{{ 'ID Number' }}</th>
                                                <th>{{ 'Phone Number' }}</th>
                                                <th>{{ 'Email Address' }}</th>
                                                <th>{{ 'Edit' }}</th>
                                            </tr>
                                            </thead>
                                            <tbody id="patient">
                                            @foreach($patients as $row)
                                                <tr>
                                                    <td>{{$row->FirstName}}</td>
                                                    <td>{{$row->LastName}}</td>
                                                    <td>{{$row->Gender}}</td>
                                                    <td>{{$row->IdNumber}}</td>
                                                    <td>{{$row->PhoneNumber}}</td>
                                                    <td>{{$row->Email}}</td>
                                                    <td><a alt="Edit" href="{{url('/patients/edit/'.$row->id)}}"><i class="far fa-edit"></i></a>
                                                        <a alt="Report" href="{{url('/reports/'.$row->id)}}" style="color: #00b248;"><i class="fas fa-book"></i></a>
                                                        <a alt="Delete" href="{{url('/patients/delete/'.$row->id)}}" style="color: #ff1744;"><i class="far fa-trash-alt"></i></a></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container pt-5">
                    <div class="row">
                        <div class="col-md">
                            <div class="card shadow h-100">
                                <div class="card-header container-fluid">
                                    <div class="row align-middle">
                                        <div class="col-sm">
                                            <h3 class="float-left">{{ __('Bookings') }}</h3>
                                        </div>
                                        <div class="col-sm">
                                            <div class="float-right">
                                                <a href="{{ url('/bookings') }}" class="btn btn-primary btn-m ml-2" style="text-decoration: none; color: white;">Add Booking</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pl-5 pr-5 pt-3">
                                    @include('inc.messages')

                                    <table class="table table-bordered table-striped" id="bookings">
                                        <tr>
                                            <th>{{ 'Booking Name' }}</th>
                                            <th>{{ 'Description' }}</th>
                                            <th>{{ 'Patient' }}</th>
                                            <th>{{ 'Date' }}</th>
                                            <th>{{ 'Time' }}</th>
                                            <th>{{ 'Edit' }}</th>
                                        </tr>
                                        @foreach($bookings as $row)
                                            <tr>
                                                <td>{{ $row['event_name'] }}</td>
                                                <td>{{ $row['description'] }}</td>
                                                <td>{{ $row['patient_name'] }}</td>
                                                <td>{{ $row['date'] }}</td>
                                                <td>{{ $row['time'] }}</td>
                                                <td><a href="" style="color: #ff1744;"><i class="far fa-trash-alt"></i></a></td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
