@extends('layouts.app')

@section('header')

@endsection

@section('scripts')
    $(document).ready(function(){ $('#patients').DataTable(); });
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
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
                            <div class="float-right">
                                <input class="form-control" type="text" id="search" placeholder="Search" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body container-fluid">
                    @include('inc.messages')

                    <!-- Patient table -->
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped" id="patients">
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
    </div>
</div>
@endsection

