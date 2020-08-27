@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header container-fluid">
                    <div class="row align-middle">
                        <div class="col-sm">
                            <h3 class="float-left">{{ __('Payments') }}</h3>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                        @include('inc.messages')

                        {{ __('Fill in the following to create a Payment:') }}

                    <hr />
                    <h5 class="font-weight-bold">General Information</h5>
                        {!! Form::open(['action' => 'PaymentsController@store', 'method' => 'POST', 'autocomplete' => 'off']) !!}
                        @csrf
                    <div class="form-group">
                        <div class="">
                            <select id='patient_name' name='patient_name' class="form-control">
                                <option value='null' selected>Select Patient</option>
                                @foreach ($patient as $key => $value)
                                    <option value='{{ $value }}'>{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div> {{ Form::label('email', 'Email') }} <p style="display: inline; color: red">*</p></div>
                        {{ Form::text('email', '', ['class'=> 'form-control']) }}
                    </div>
                        <div class="form-group">
                            {{ Form::label('amount', 'Amount') }}
                            {{ Form::text('amount', '', ['class'=> 'form-control']) }}
                        </div>
                        {{ Form::label('payment_info', 'Payment Info') }}
                        <div class="form-group">
                            <select id='payment_info' name='payment_info' class="form-control">
                                <option value='null' selected>Select Payment Type</option>
                                @foreach ($payments as $key => $value)
                                    <option value='{{ $value }}'>{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
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




