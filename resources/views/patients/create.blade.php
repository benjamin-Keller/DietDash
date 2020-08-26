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

                        {{ __('Fill in the following to create a Patient:') }}

                    <hr />
                    <h5 class="font-weight-bold">General Information</h5>
                        {!! Form::open(['action' => 'PatientController@store', 'method' => 'POST', 'autocomplete' => 'off']) !!}
                        @csrf
                        <div class="form-group">
                            <div>{{ Form::label('FirstName', 'First Name') }} <p style="display: inline; color: red">*</p></div>
                            {{ Form::text('FirstName', '', ['class'=> 'form-control']) }}
                        </div>
                        <div class="form-group">
                        <div> {{ Form::label('LastName', 'Last Name') }} <p style="display: inline; color: red">*</p></div>
                            {{ Form::text('LastName', '', ['class'=> 'form-control']) }}
                        </div>
                    <div class="form-group">
                        <div> {{ Form::label('Gender', 'Gender') }} <p style="display: inline; color: red">*</p></div>
                            {{ Form::text('Gender', '', ['class'=> 'form-control']) }}
                        </div>
                        <div class="form-group">
                            <div> {{ Form::label('IdNumber', 'ID Number') }} <p style="display: inline; color: red">*</p></div>
                            {{ Form::text('IdNumber', '', ['class'=> 'form-control']) }}
                        </div>

                    <div class="form-group">
                        {{ Form::label('PhoneNumber', 'Phone Number') }}
                        {{ Form::text('PhoneNumber', '', ['class'=> 'form-control']) }}
                    </div>
                    <div class="form-group">
                       {{ Form::label('Email', 'Email') }}
                        {{ Form::text('Email', '', ['class'=> 'form-control']) }}
                    </div>
                    <hr />
                    <br />

                        {{ Form::submit('Submit', ['class' => 'btn btn-purple']) }}
                        {!! Form::close() !!}
                </div>
                <br />
            </div>
        </div>
    </div>
</div>
@endsection




