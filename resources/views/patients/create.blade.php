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

                    <div class="accordion" id="wh">
                        <div class="card">
                            <div class="card-header" id="headingWH" type="button" data-toggle="collapse" data-target="#collapseWH" aria-expanded="true" aria-controls="collapseWH">
                                <h2 class="btn text-purple text-bold" >
                                    Demographics
                                </h2>
                            </div>
                            <div id="collapseWH" class="collapse show" aria-labelledby="headingWH" data-parent="#wh">
                                <div class="pt-3 pr-5 pb-3 pl-5">
                                    <h3>General</h3>

                                    <div class="form-group">
                                        {{ Form::label('home_language', 'Home Language') }}
                                        {{ Form::text('home_language', '', ['class'=> 'form-control']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('household_size', 'Household size') }}
                                        {{ Form::text('household_size', '', ['class'=> 'form-control']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('approx_Income', 'Approximate Income') }}
                                        {{ Form::text('approx_Income', '', ['class'=> 'form-control']) }}
                                    </div>
                                    <hr />
                                    <h3>Address</h3>
                                    <div class="form-group">
                                        {{ Form::label('address_ln1', 'Address Line 1') }}
                                        {{ Form::text('address_ln1', '', ['class'=> 'form-control']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('address_ln2', 'Address Line 2') }}
                                        {{ Form::text('address_ln2', '', ['class'=> 'form-control']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('city', 'City') }}
                                        {{ Form::text('city', '', ['class'=> 'form-control']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('province', 'Province') }}
                                        {{ Form::text('province', '', ['class'=> 'form-control']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('zip', 'Zip Code') }}
                                        {{ Form::text('zip', '', ['class'=> 'form-control']) }}
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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




