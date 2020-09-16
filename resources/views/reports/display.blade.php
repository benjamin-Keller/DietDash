@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header container-fluid">
                    <div class="row align-middle">
                        <div class="col-sm">
                            <h3 class="float-left">{{ __($patient->FirstName.' '.$patient->LastName) }}</h3>
                        </div>
                        <div class="col-sm">
                            <div class="float-right">
                                @if($history != null)
                                    <a href="{{action('ReportController@exportFullPDF', $patient->id)}}" class="btn btn-purple btn-m inverted" style="text-decoration: none; color: white;">Export History</a>
                                    <a href="{{action('ReportController@exportPDF', $patient->id)}}" class="btn btn-purple btn-m inverted" style="text-decoration: none; color: white;">Export Latest</a>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-body">
                    <div class="row align-middle pb-3">
                        <div class="btn-group btn-group-toggle inverted" data-toggle="buttons">
                            <a href="#Anthro" class="btn btn-purple btn-m" style="text-decoration: none; color: white;">Anthropometry</a>
                            <a href="#BioChem" class="btn btn-purple btn-m" style="text-decoration: none; color: white;">Biochemestry</a>
                            <a href="#Diet" class="btn btn-purple btn-m" style="text-decoration: none; color: white;">Diet</a>
                        </div>
                    </div>
                    @csrf
                    <!--Anthropometry -->
                        <h4>General</h4>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{ 'Age' }}</th>
                                    <th>{{ 'Gender' }}</th>
                                    <th>{{ 'Height (m)' }}</th>
                                    <th>{{ 'Weight (kg)' }}</th>
                                    <th>{{ 'Comments' }}</th>
                                    <th>{{ 'Date' }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($history as $row)
                                <tr>
                                    <td>{{ $row['age'] }}</td>
                                    <td>{{ $patient->Gender }}</td>
                                    <td>{{ $row['height'] }}</td>
                                    <td>{{ $row['weight'] }}</td>
                                    <td>{{ $row['comment']  }}</td>
                                    <td>{{ $row['date'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br />
                        <h4 id="Anthro">Anthropometry</h4>
                        <table class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>{{ 'BMI' }}</th>
                                    <th>{{ 'BMI Classification' }}</th>
                                    <th>{{ 'Waist Circumference (cm)' }}</th>
                                    <th>{{ 'Hip Circumference (cm)' }}</th>
                                    <th>{{ 'Waist/Hip Ratio' }}</th>
                                    <th>{{ 'Waist/Hip Classification' }}</th>
                                    <th>{{ 'MUAC (cm)' }}</th>
                                    <th>{{ 'Tricep skinfold (mm)' }}</th>
                                    <th>{{ 'Date' }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($history as $row)
                                    <tr>
                                        <td>{{ round($row['bmi'], 1) }}</td>
                                        <td>{{ $row['bmi_class'] }}</td>
                                        <td>{{ $row['waist'] }}</td>
                                        <td>{{ $row['hip'] }}</td>
                                        <td>{{ round($row['wh_ratio'], 2) }}</td>
                                        <td>{{ $row['wh_class'] }}</td>
                                        <td>{{ $row['muac'] }}</td>
                                        <td>{{ $row['tricept_skinfold'] }}</td>
                                        <td>{{ $row['date'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br />
                        <h4 id="BioChem">Biochemestry</h4>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{ 'Sodium' }}</th>
                                    <th>{{ 'Potassium' }}</th>
                                    <th>{{ 'Chloride' }}</th>
                                    <th>{{ 'Urea' }}</th>
                                    <th>{{ 'Creatinine' }}</th>
                                    <th>{{ 'eGFR' }}</th>
                                    <th>{{ 'HbA1c' }}</th>
                                    <th>{{ 'Uric Acid' }}</th>
                                    <th>{{ 'Cholesterol' }}</th>
                                    <th>{{ 'Triglycerides' }}</th>
                                    <th>{{ 'Date' }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($history as $row)
                                    <tr>
                                        <td>{{ $row['sodium'] }}<br /> {{ $row['sodium_class'] }}</td>
                                        <td>{{ $row['potassium'] }}<br /> {{ $row['potassium_class'] }}</td>
                                        <td>{{ $row['chloride'] }}<br /> {{ $row['chloride_class'] }}</td>
                                        <td>{{ $row['urea'] }}<br /> {{ $row['urea_class'] }}</td>
                                        <td>{{ $row['creatinine'] }}<br /> {{ $row['creatinine_class'] }}</td>
                                        <td>{{ $row['egfr'] }}<br /> {{ $row['egfr_class'] }}</td>
                                        <td>{{ $row['hba1c'] }}<br /> {{ $row['hba1c_class'] }}</td>
                                        <td>{{ $row['uric_acid'] }}<br /> {{ $row['uric_acid_class'] }}</td>
                                        <td>{{ $row['cholesterol'] }}<br /> {{ $row['cholesterol_class'] }}</td>
                                        <td>{{ $row['triglycerides'] }}<br /> {{ $row['triglycerides_class'] }}</td>
                                        <td>{{ $row['date'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{ 'HDL' }}</th>
                                    <th>{{ 'LDL' }}</th>
                                    <th>{{ 'VLDL' }}</th>
                                    <th>{{ 'Total Protein' }}</th>
                                    <th>{{ 'Albumin' }}</th>
                                    <th>{{ 'Calcium' }}</th>
                                    <th>{{ 'Phosphorus' }}</th>
                                    <th>{{ 'Magnesium' }}</th>
                                    <th>{{ 'Copper' }}</th>
                                    <th>{{ 'Date' }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($history as $row)
                                    <tr>
                                        <td>{{ $row['hdl'] }}<br /> {{ $row['hdl_class'] }}</td>
                                        <td>{{ $row['ldl'] }}<br /> {{ $row['ldl_class'] }}</td>
                                        <td>{{ $row['vldl'] }}<br /> {{ $row['vldl_class'] }}</td>
                                        <td>{{ $row['total_protein'] }}<br /> {{ $row['total_protein_class'] }}</td>
                                        <td>{{ $row['albumin'] }}<br /> {{ $row['albumin_class'] }}</td>
                                        <td>{{ $row['calcium'] }}<br /> {{ $row['calcium_class'] }}</td>
                                        <td>{{ $row['phosphorus'] }}<br /> {{ $row['phosphorus_class'] }}</td>
                                        <td>{{ $row['magnesium'] }}<br /> {{ $row['magnesium_class'] }}</td>
                                        <td>{{ $row['copper'] }}<br /> {{ $row['copper_class'] }}</td>
                                        <td>{{ $row['date'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{ 'Zinc' }}</th>
                                    <th>{{ 'Bilirubin Total' }}</th>
                                    <th>{{ 'Bilirubin Conj' }}</th>
                                    <th>{{ 'Bilirubin Unconj' }}</th>
                                    <th>{{ 'AST' }}</th>
                                    <th>{{ 'ALT' }}</th>
                                    <th>{{ 'LDH' }}</th>
                                    <th>{{ 'GGT' }}</th>
                                    <th>{{ 'ALP' }}</th>
                                    <th>{{ 'WBC' }}</th>
                                    <th>{{ 'RBC' }}</th>
                                    <th>{{ 'Date' }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($history as $row)
                                    <tr>
                                        <td>{{ $row['zinc'] }}<br /> {{ $row['zinc_class'] }}</td>
                                        <td>{{ $row['bilirubin_total'] }}<br /> {{ $row['bilirubin_total_class'] }}</td>
                                        <td>{{ $row['bilirubin_conj'] }}<br /> {{ $row['bilirubin_conj_class'] }}</td>
                                        <td>{{ $row['bilirubin_unconj'] }}<br /> {{ $row['bilirubin_unconj_class'] }}</td>
                                        <td>{{ $row['ast'] }}<br /> {{ $row['ast_class'] }}</td>
                                        <td>{{ $row['alt'] }}<br /> {{ $row['alt_class'] }}</td>
                                        <td>{{ $row['ldh'] }}<br /> {{ $row['ldh_class'] }}</td>
                                        <td>{{ $row['ggt'] }}<br /> {{ $row['ggt_class'] }}</td>
                                        <td>{{ $row['alp'] }}<br /> {{ $row['alp_class'] }}</td>
                                        <td>{{ $row['wbc'] }}<br /> {{ $row['wbc_class'] }}</td>
                                        <td>{{ $row['rbc'] }}<br /> {{ $row['rbc_class'] }}</td>
                                        <td>{{ $row['date'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{ 'Haemoglobin' }}</th>
                                    <th>{{ 'Haematocrit' }}</th>
                                    <th>{{ 'MCV' }}</th>
                                    <th>{{ 'MCH' }}</th>
                                    <th>{{ 'MCHC' }}</th>
                                    <th>{{ 'Platelet Count' }}</th>
                                    <th>{{ 'CRP' }}</th>
                                    <th>{{ 'Date' }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($history as $row)
                                    <tr>
                                        <td>{{ $row['haemoglobin'] }}<br /> {{ $row['haemoglobin_class'] }}</td>
                                        <td>{{ $row['haematocrit'] }}<br /> {{ $row['haematocrit_class'] }}</td>
                                        <td>{{ $row['mcv'] }}<br /> {{ $row['mcv_class'] }}</td>
                                        <td>{{ $row['mch'] }}<br /> {{ $row['mch_class'] }}</td>
                                        <td>{{ $row['mchc'] }}<br /> {{ $row['mchc_class'] }}</td>
                                        <td>{{ $row['platelet_count'] }}<br /> {{ $row['platelet_count_class'] }}</td>
                                        <td>{{ $row['crp'] }}<br /> {{ $row['crp_class'] }}</td>
                                        <td>{{ $row['date'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>


            </div>
            <div class="card" id="Diet">
                <div class="card-header container-fluid">
                    <div class="row align-middle">
                        <div class="col-sm">
                            <h3 class="float-left">Diet</h3>
                        </div>
                        <div class="col-sm">
                            <div class="float-right">
                                @if($history != null)
                                    <select id='macro' name='macro' class="form-control">
                                        <option value='null' selected>Select Macro-nutrients</option>
                                        <option value='sedentary'>55/30/15</option>
                                        <option value='moderate'>55/25/20</option>
                                        <option value='very'>60/25/15</option>
                                        <option value='very1'>45/30/25</option>
                                    </select>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>


                <div class="card-body">
                    <!-- General information -->
                    <table class="table table-bordered table-striped">
                        <thead><tr><th>Gender</th><th>Weight</th><th>Height</th><th>Age</th></tr></thead>
                        <tbody><tr><td>{{ $patient->Gender }}</td><td>{{ $patient_info->weight }}</td><td>{{ $patient_info->height }}</td><td>{{ $patient_info->age }}</td></tr></tbody>
                    </table>

                    <!-- Inset Piechart here -->


                    <!-- Total Estimated Energy -->

                    <!-- Javascript to display below -->
                        <p class="pt-3">
                            <strong>Macro-nutrients:</strong> 60/25/15<br />
                            <strong>Total Estimated Energy (TEE):</strong> {{ $TEE_text }}<br /><strong>Energy Requirements:</strong> {{ $TEE_Total }}<br /><br />
                            <strong>Estimated Calories Requirements:</strong> {{ round($TEE_Carb_55*4, 2) }}kcal @ {{ round($TEE_Carb_55, 2) }}g<br />
                            <strong>Estimated Fat Requirements:</strong> {{ round($TEE_Fat_30*9, 2) }}kcal @ {{ round($TEE_Fat_30, 2) }}g<br />
                            <strong>Estimated Protein Requirements:</strong> {{ round($TEE_Prot_15*4, 2) }}kcal @ {{ round($TEE_Prot_15, 2) }}g (required for individual: {{ 0.8 * $patient_info->weight}}g)
                        </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
