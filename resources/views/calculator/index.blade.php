@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header container-fluid">
                    <div class="row align-middle">
                        <div class="col-sm">
                            <h3 class="float-left">{{ __('Calculator') }}</h3>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        @include('inc.messages')

                        {{ __('Fill in the following to calculate:') }}

                        {!! Form::open(['action' => 'CalculatorController@store', 'method' => 'POST', 'autocomplete' => 'off']) !!}

                            <div class="form-group">
                                <div class="">
                                    <select id='patient_name' name='patient_name' class="form-control">
                                        <option value='null' selected>Select Patient</option>
                                        @foreach ($patient as $key => $value)
                                            <option value='{{ $key }}'>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        <div class="form-group">
                                {{ Form::label('age', 'Age') }}
                                {{ Form::text('age', '', ['class'=> 'form-control', 'placeholder' => 'Age']) }}
                        </div>
                        <div class="form-group">
                                {{ Form::label('weight', 'Weight (kg)') }}
                                {{ Form::text('weight', '', ['class'=> 'form-control', 'placeholder' => 'Weight']) }}
                        </div>
                        <div class="form-group">
                                {{ Form::label('height', 'Height (m)') }}
                                {{ Form::text('height', '', ['class'=> 'form-control', 'placeholder' => 'Height']) }}
                        </div>
                        <hr />
                        <div class="form-group">
                                {{ Form::label('waist', 'Waist Circumference (cm)') }}
                                {{ Form::text('waist', '', ['class'=> 'form-control', 'placeholder' => 'Waist Circumference']) }}
                        </div>
                        <div class="form-group">
                                {{ Form::label('hip', 'Hip Circumference (cm)') }}
                                {{ Form::text('hip', '', ['class'=> 'form-control', 'placeholder' => 'Hip Circumference']) }}
                        </div>
                        <hr />
                        <div class="form-group">
                                {{ Form::label('muac', 'MUAC (cm)') }}
                                {{ Form::text('muac', '', ['class'=> 'form-control', 'placeholder' => 'MUAC']) }}
                        </div>
                        <div class="form-group">
                                {{ Form::label('tricept_skinfold', 'Tricept Skinfold (mm)') }}
                                {{ Form::text('tricept_skinfold', '', ['class'=> 'form-control', 'placeholder' => 'Tricept Skinfold']) }}
                        </div>
                        <hr />
                        <div class="form-group">
                            {{ Form::label('sodium', 'Sodium (mmol/l)') }}
                            {{ Form::text('sodium', '', ['class'=> 'form-control', 'placeholder' => 'Sodium']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('potassium', 'Potassium (mmol/l)') }}
                            {{ Form::text('potassium', '', ['class'=> 'form-control', 'placeholder' => 'Potassium']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('chloride', 'Chloride (mmol/l)') }}
                            {{ Form::text('chloride', '', ['class'=> 'form-control', 'placeholder' => 'Chloride']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('urea', 'Urea (mmol/l)') }}
                            {{ Form::text('urea', '', ['class'=> 'form-control', 'placeholder' => 'Urea']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('creatinine', 'Creatinine (mmol/l)') }}
                            {{ Form::text('creatinine', '', ['class'=> 'form-control', 'placeholder' => 'Creatinine']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('egfr', 'eGFR (mmol/l)') }}
                            {{ Form::text('egfr', '', ['class'=> 'form-control', 'placeholder' => 'eGFR']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('hba1c', 'HbA1c (%)') }}
                            {{ Form::text('hba1c', '', ['class'=> 'form-control', 'placeholder' => 'HbA1c']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('uric_acid', 'Uric Acid (mmol/l)') }}
                            {{ Form::text('uric_acid', '', ['class'=> 'form-control', 'placeholder' => 'Uric Acid']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('cholesterol', 'Cholesterol (mmol/l)') }}
                            {{ Form::text('cholesterol', '', ['class'=> 'form-control', 'placeholder' => 'Cholesterol']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('triglycerides', 'Triglycerides (mmol/l)') }}
                            {{ Form::text('triglycerides', '', ['class'=> 'form-control', 'placeholder' => 'Triglycerides']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('hdl', 'HDL') }}
                            {{ Form::text('hdl', '', ['class'=> 'form-control', 'placeholder' => 'HDL']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('ldl', 'LDL (<30y)') }}
                            {{ Form::text('ldl', '', ['class'=> 'form-control', 'placeholder' => 'LDL']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('vldl', 'VLDL') }}
                            {{ Form::text('vldl', '', ['class'=> 'form-control', 'placeholder' => 'VLDL']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('total_protein', 'Total Protein') }}
                            {{ Form::text('total_protein', '', ['class'=> 'form-control', 'placeholder' => 'Total Protein']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('albumin', 'Albumin') }}
                            {{ Form::text('albumin', '', ['class'=> 'form-control', 'placeholder' => 'Albumin']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('calcium', 'Calcium') }}
                            {{ Form::text('calcium', '', ['class'=> 'form-control', 'placeholder' => 'Calcium']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('phosphorus', 'Phosphorus') }}
                            {{ Form::text('phosphorus', '', ['class'=> 'form-control', 'placeholder' => 'Phosphorus']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('magnesium', 'Magnesium') }}
                            {{ Form::text('magnesium', '', ['class'=> 'form-control', 'placeholder' => 'Magnesium']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('copper', 'Copper') }}
                            {{ Form::text('copper', '', ['class'=> 'form-control', 'placeholder' => 'Copper']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('zinc', 'Zinc') }}
                            {{ Form::text('zinc', '', ['class'=> 'form-control', 'placeholder' => 'Zinc']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('bilirubin_total', 'Bilirubin Total') }}
                            {{ Form::text('bilirubin_total', '', ['class'=> 'form-control', 'placeholder' => 'Bilirubin Total']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('bilirubin_conj', 'Bilirubin Conj') }}
                            {{ Form::text('bilirubin_conj', '', ['class'=> 'form-control', 'placeholder' => 'Bilirubin Conj']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('bilirubin_unconj', 'Bilirubin Unconj') }}
                            {{ Form::text('bilirubin_unconj', '', ['class'=> 'form-control', 'placeholder' => 'Bilirubin Unconj']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('ast', 'AST') }}
                            {{ Form::text('ast', '', ['class'=> 'form-control', 'placeholder' => 'AST']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('alt', 'ALT') }}
                            {{ Form::text('alt', '', ['class'=> 'form-control', 'placeholder' => 'ALT']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('ldh', 'LDH') }}
                            {{ Form::text('ldh', '', ['class'=> 'form-control', 'placeholder' => 'LDH']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('ggt', 'GGT') }}
                            {{ Form::text('ggt', '', ['class'=> 'form-control', 'placeholder' => 'GGT']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('alp', 'ALP') }}
                            {{ Form::text('alp', '', ['class'=> 'form-control', 'placeholder' => 'ALP']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('wbc', 'WBC') }}
                            {{ Form::text('wbc', '', ['class'=> 'form-control', 'placeholder' => 'WBC']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('rbc', 'RBC') }}
                            {{ Form::text('rbc', '', ['class'=> 'form-control', 'placeholder' => 'RBC']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('haemoglobin', 'Haemoglobin') }}
                            {{ Form::text('haemoglobin', '', ['class'=> 'form-control', 'placeholder' => 'Haemoglobin']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('haematocrit', 'Haematocrit') }}
                            {{ Form::text('haematocrit', '', ['class'=> 'form-control', 'placeholder' => 'Haematocrit']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('mcv', 'MCV') }}
                            {{ Form::text('mcv', '', ['class'=> 'form-control', 'placeholder' => 'MCV']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('mch', 'MCH') }}
                            {{ Form::text('mch', '', ['class'=> 'form-control', 'placeholder' => 'MCH']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('mchc', 'MCHC') }}
                            {{ Form::text('mchc', '', ['class'=> 'form-control', 'placeholder' => 'MCHC']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('platelet_count', 'Platelet Count') }}
                            {{ Form::text('platelet_count', '', ['class'=> 'form-control', 'placeholder' => 'Platelet Count']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('crp', 'CRP') }}
                            {{ Form::text('crp', '', ['class'=> 'form-control', 'placeholder' => 'CRP']) }}
                        </div>
                        <hr />
                        <div class="form-group">
                            {{ Form::label('comment', 'Comments') }}
                            {{ Form::text('comment', '', ['class'=> 'form-control', 'placeholder' => 'Enter any comments here']) }}
                        </div>

                        <hr />
                        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
