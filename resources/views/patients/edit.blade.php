@extends('layouts.app')

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
                            {{ __('Gender:') }}
                            <input type="text" class="form-control" name="Gender" value="{{$patient->Gender}}" placeholder="Enter Gender">
                        </div>
                        <div class="form-group">
                            {{ __('Phone Number:') }}
                            <input type="text" class="form-control" name="PhoneNumber" value="{{$patient->PhoneNumber}}" placeholder="Enter Phone Number">
                        </div>
                        <div class="form-group">
                            {{ __('Email Address:') }}
                            <input type="text" class="form-control" name="Email" value="{{$patient->Email}}" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Edit">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




