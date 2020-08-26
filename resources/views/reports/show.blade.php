@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header container-fluid">
                    <div class="row align-middle">
                        <div class="col-sm">
                            <h3 class="float-left">{{ __('Reports') }}</h3>
                        </div>
                        <div class="col-sm">
                            <div class="float-right">
                                <a href="{{ route('reports.display', $patient->id) }}" class="btn btn-primary btn-m ml-2" style="text-decoration: none; color: white;">Calculations</a>
                                <a href="{{ route('patients.index') }}" class="btn btn-primary btn-m" style="text-decoration: none; color: white;">Back</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                        @csrf
                    <h4>General Information</h4>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="FirstName" value="{{$patient->FirstName}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="LastName" value="{{$patient->LastName}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>ID Number</label>
                            <input type="text" class="form-control" name="IdNumber" value="{{$patient->IdNumber}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" name="PhoneNumber" value="{{$patient->PhoneNumber}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="Email" value="{{$patient->Email}}" readonly>
                        </div>
                </div>

                {{--<table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>ID Number</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$patient->FirstName}} {{$patient->LastName}}</td>
                            <td>{{$patient->IdNumber}}</td>
                            <td>{{$patient->PhoneNumber}}</td>
                            <td>{{$patient->Email}}</td>
                        </tr>
                    </tbody>

                </table>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Medical Aid</th>
                        <th>Payment Info</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$patient->MedicalAid}}</td>
                        <td>{{$patient->PaymentInfo}}</td>

                    </tr>
                    </tbody>
                </table>--}}
            </div>
        </div>
    </div>
</div>
@endsection
