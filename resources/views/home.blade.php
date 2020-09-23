@extends('layouts.admin')

@section('scripts')
    $(document).ready(function(){ $('#patients').DataTable({"lengthMenu": [ 5, 10, 25, 50, 75, 100 ]}); });
    $(document).ready(function(){ $('#bookings').DataTable({"lengthMenu": [ 5, 10, 25, 50, 75, 100 ],"order": [[ 3, "desc" ],[ 4, "asc" ]],}); });
@endsection

@section('header')
    Dashboard
@endsection

@section('content')
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col">
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
                {{--<div class="col">
                    <div class="card shadow h-100 py-2">
                        <!-- Upcoming Bookings Card -->
                        <a href="{{ route('events.index') }}" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold text-success mb-1">Upcoming Bookings</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $upcoming }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar-alt fa-2x text-gray-300 text-success pt-2"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>--}}
                <div class="col"><div class="card shadow h-100 py-2">
                        <!-- Bookings Today Card -->
                        <a href="" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold mb-1" style="color: #FF8C00">Today's Bookings</div>

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

                                                <a href="{{ route('patients.create') }}" class="btn btn-purple btn-m ml-2 inverted" style="text-decoration: none; color: white;">Add Patient</a>
                                                <a href="{{ route('patients.deleted') }}" class="btn btn-m inverted" style="background-color: #be0000; text-decoration: none; color: white;"><i class="far fa-trash-alt"></i></a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                    <div class="pl-5 pr-5 pt-3 pb-3">
                                        @include('inc.messages')

                                        <table class="table table-bordered table-striped
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
                                            <tbody>
                                            @foreach($patients as $row)
                                                <tr>
                                                    <td>{{$row->FirstName}}</td>
                                                    <td>{{$row->LastName}}</td>
                                                    <td>{{$row->Gender}}</td>
                                                    <td>{{$row->IdNumber}}</td>
                                                    <td>{{$row->PhoneNumber}}</td>
                                                    <td>{{$row->Email}}</td>
                                                    <td><a alt="Edit" href="{{url('/patients/edit/'.$row->id)}}"><i class="far fa-edit"></i></a>
                                                        @if(!isset($row->calculator->last()->activeness))
                                                            <a alt="Report" href="{{url('/calculator/')}}" style="color: #00b248;"><i class="fas fa-calculator"></i></a>
                                                        @else
                                                            <a alt="Report" href="{{url('/reports/'.$row->id)}}" style="color: #00b248;"><i class="fas fa-book"></i></a>
                                                        @endif
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
                                    </div>
                                </div>
                                <div class="pl-5 pr-5 pt-3">
                                    @include('inc.eventBooking')


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('sidebar')
    <h5>Dashboard</h5>
    <p>The dashboard is an overview of all your daily information.</p>
@endsection
