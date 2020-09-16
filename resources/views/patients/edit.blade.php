@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header container-fluid">
                    <div class="row align-middle">
                        <div class="col-sm">
                            <h3 class="float-left">{{ __('Patients') }}</h3>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('inc.messages')

                    <h4>Edit Patient Record</h4>

                    <form method="post" action="{{action('PatientController@update', $id)}}" autocomplete="off">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH" />
                        <div class="form-group">
                            {{ __('First Name:') }}
                            <input type="text" class="form-control" name="FirstName" value="{{$patient->FirstName}}" placeholder="Enter First Name">
                        </div>
                        <div class="form-group">
                            {{ __('Last Name:') }}
                            <input type="text" class="form-control" name="LastName" value="{{$patient->LastName}}" placeholder="Enter Last Name">
                        </div>
                        <div class="form-group">
                            {{ Form::label('Gender', 'Gender') }}
                            <div class="">
                                <select id='Gender' name='Gender' class="form-control" required>
                                    @if($patient->Gender == 'Male')
                                    <option value=''>Select Gender</option>
                                    <option value='Male' selected>Male</option>
                                    <option value='Female'>Female</option>
                                    @elseif($patient->Gender == 'Female')
                                        <option value=''>Select Gender</option>
                                        <option value='Male'>Male</option>
                                        <option value='Female' selected>Female</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ __('Phone Number:') }}
                            <input type="text" class="form-control" name="PhoneNumber" value="{{$patient->PhoneNumber}}" placeholder="Enter Phone Number">
                        </div>
                        <div class="form-group">
                            {{ __('Email Address:') }}
                            <input type="text" class="form-control" name="Email" value="{{$patient->Email}}" placeholder="Enter Email">
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
                                            <input type="text" class="form-control" name="home_language" value="{{$patient->home_language}}" placeholder="Enter Home Language">
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('household_size', 'Household size') }}
                                            <input type="text" class="form-control" name="household_size" value="{{$patient->household_size}}" placeholder="Enter Household size">
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('approx_Income', 'Approximate Income') }}
                                            <input type="text" class="form-control" name="approx_Income" value="{{$patient->approx_Income}}" placeholder="Enter Approximate Income">
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('address_ln1', 'Address Line 1') }}
                                            <input type="text" class="form-control" name="address_ln1" value="{{$patient->address_ln1}}" placeholder="Enter Address Line 1">
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('address_ln2', 'Address Line 2') }}
                                            <input type="text" class="form-control" name="address_ln2" value="{{$patient->address_ln2}}" placeholder="Enter Address Line 2">
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('city', 'City') }}
                                            <input type="text" class="form-control" name="city" value="{{$patient->city}}" placeholder="Enter City">
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('province', 'Province') }}
                                            <input type="text" class="form-control" name="province" value="{{$patient->province}}" placeholder="Enter Province">
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('zip', 'Zip Code') }}
                                            <input type="text" class="form-control" name="zip" value="{{$patient->zip}}" placeholder="Enter Zip Code">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-purple inverted" value="Edit">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




