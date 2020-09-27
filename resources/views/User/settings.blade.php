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
                                <a href="{{ route('reports.display', $patient->id) }}" class="btn btn-purple btn-m ml-2 inverted" style="text-decoration: none; color: white;">Reports</a>
                                <a href="{{ route('patients.index') }}" class="btn btn-purple btn-m inverted" style="text-decoration: none; color: white;">Back</a>
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
                    <div class="accordion" id="wh">
                        <div class="card">
                            <div class="card-header" id="headingWH" type="button" data-toggle="collapse" data-target="#collapseWH" aria-expanded="true" aria-controls="collapseWH">
                                <h2 class="btn text-purple text-bold inverted" >
                                    Demographics
                                </h2>
                            </div>
                            <div id="collapseWH" class="collapse hide" aria-labelledby="headingWH" data-parent="#wh">
                                <div class="p-5">
                                    <div class="form-group">
                                        {{ Form::label('home_language', 'Home Language') }}
                                        <input type="text" class="form-control" name="home_language" value="{{$patient->home_language}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('household_size', 'Household size') }}
                                        <input type="text" class="form-control" name="household_size" value="{{$patient->household_size}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('approx_Income', 'Approximate Income') }}
                                        <input type="text" class="form-control" name="approx_Income" value="{{$patient->approx_Income}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('address_ln1', 'Address Line 1') }}
                                        <input type="text" class="form-control" name="address_ln1" value="{{$patient->address_ln1}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('address_ln2', 'Address Line 2') }}
                                        <input type="text" class="form-control" name="address_ln2" value="{{$patient->address_ln2}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('city', 'City') }}
                                        <input type="text" class="form-control" name="city" value="{{$patient->city}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('province', 'Province') }}
                                        <input type="text" class="form-control" name="province" value="{{$patient->province}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('zip', 'Zip Code') }}
                                        <input type="text" class="form-control" name="zip" value="{{$patient->zip}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
