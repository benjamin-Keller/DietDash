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
                        <table class="table table-bordered table-striped
                                        table-responsive-sm
                                        table-responsive-md
                                        table-responsive-lg">
                            <thead>
                                <tr>
                                    <th>{{ 'Age' }}</th>
                                    <th>{{ 'Gender' }}</th>
                                    <th>{{ 'Comments' }}</th>
                                    <th>{{ 'Date' }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($history as $row)
                                <tr>
                                    <td>{{ $row['age'] }}</td>
                                    <td>{{ $patient->Gender }}</td>
                                    <td>{{ $row['comment']  }}</td>
                                    <td>{{ $row['date'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br />
                        <h4 id="Anthro">Anthropometry</h4>
                        <table class="table table-bordered table-striped
                            table-responsive-sm
                            table-responsive-md
                            table-responsive-lg">
                            <thead>
                                <tr>
                                    <th>{{ 'Height (m)' }}</th>
                                    <th>{{ 'Weight (kg)' }}</th>
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
                                        <td>{{ $row['height'] }}</td>
                                        <td>{{ $row['weight'] }}</td>
                                        <td>{{ round($row['bmi'], 1) }}</td>
                                        <td>{{ $row['bmi_class'] }}</td>
                                        <td>{{ $row['date'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    <table class="table table-bordered table-striped
                            table-responsive-sm
                            table-responsive-md
                            table-responsive-lg">
                            <thead>
                                <tr>
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
                        <table class="table table-bordered table-striped
                            table-responsive-sm
                            table-responsive-md
                            table-responsive-lg">
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
                        <table class="table table-bordered table-striped
                            table-responsive-sm
                            table-responsive-md
                            table-responsive-lg">
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
                        <table class="table table-bordered table-striped
                            table-responsive-sm
                            table-responsive-md
                            table-responsive-lg">
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
                        <table class="table table-bordered table-striped
                            table-responsive-sm
                            table-responsive-md
                            table-responsive-lg">
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
                                        <option class='dropdown-item' value='null' selected>Select Macro-nutrients</option>
                                        <option class='dropdown-item' value='high_fat'>High fat</option>
                                        <option class='dropdown-item' value='high_protein'>High protein</option>
                                        <option class='dropdown-item' value='high_carb'>High carb</option>
                                        <option class='dropdown-item' value='low_carb'>Low carb</option>
                                    </select>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>


                <div class="card-body">
                    <!-- General information -->
                    <table class="table table-bordered table-striped
                            table-responsive-sm
                            table-responsive-md
                            table-responsive-lg">
                        <thead><tr><th>Gender</th><th>Weight</th><th>Height</th><th>Age</th></tr></thead>
                        <tbody><tr><td>{{ $patient->Gender }}</td><td>{{ $patient_info->weight }}</td><td>{{ $patient_info->height }}</td><td>{{ $patient_info->age }}</td></tr></tbody>
                    </table>

                    <!-- Inset Piechart here -->


                    <!-- Total Estimated Energy -->

                    <!-- Javascript to display below -->
                    <script>
                        $('#macro').ready(function () {
                            document.getElementById("macro-nutrients")
                                .innerHTML ="<p class=\"pt-3\">\n" +
                                "<strong>Macro-nutrients:</strong> <br />\n" +
                                "<strong>Total Estimated Energy (TEE):</strong><br /><br />\n" +
                                "<strong>Estimated Carbohydrates Requirements:</strong> <br />\n" +
                                "<strong>Estimated Fat Requirements:</strong> <br />\n" +
                                "<strong>Estimated Protein Requirements:</strong> \n" +
                                "</p>";
                        });
                        $('#macro').on('change', function() {
                            switch(this.value) {
                                case 'high_fat':
                                document.getElementById("macro-nutrients")
                                       .innerHTML ="<p class=\"pt-3\">\n" +
                                       "<strong>Macro-nutrients:</strong> 55/30/15<br />\n" +
                                       "<strong>Total Estimated Energy (TEE):</strong> {{ $TEE_text }}<br /><strong>Energy Requirements:</strong> {{ $TEE_Total }}<br /><br />\n" +
                                       "<strong>Estimated Carbohydrates Requirements:</strong> {{ round($TEE_Carb_55*4, 2) }}kcal @ {{ round($TEE_Carb_55, 2) }}g<br />\n" +
                                       "<strong>Estimated Fat Requirements:</strong> {{ round($TEE_Fat_30*9, 2) }}kcal @ {{ round($TEE_Fat_30, 2) }}g<br />\n" +
                                       "<strong>Estimated Protein Requirements:</strong> {{ round($TEE_Prot_15*4, 2) }}kcal @ {{ round($TEE_Prot_15, 2) }}g (required for individual: {{ 0.8 * $patient_info->weight}}g)\n" +
                                       "</p>";
                                    create_chart([{{ round($TEE_Carb_55*4, 2) }},{{ round($TEE_Fat_30*9, 2) }}, {{ round($TEE_Prot_15*4, 2) }}]);

                                    break;
                               case 'high_protein':
                                   document.getElementById("macro-nutrients")
                                       .innerHTML ="<p class=\"pt-3\">\n" +
                                       "<strong>Macro-nutrients:</strong> 55/25/20<br />\n" +
                                       "<strong>Total Estimated Energy (TEE):</strong> {{ $TEE_text }}<br /><strong>Energy Requirements:</strong> {{ $TEE_Total }}<br /><br />\n" +
                                       "<strong>Estimated Carbohydrates Requirements:</strong> {{ round($TEE_Carb_55*4, 2) }}kcal @ {{ round($TEE_Carb_55, 2) }}g<br />\n" +
                                       "<strong>Estimated Fat Requirements:</strong> {{ round($TEE_Fat_25*9, 2) }}kcal @ {{ round($TEE_Fat_25, 2) }}g<br />\n" +
                                       "<strong>Estimated Protein Requirements:</strong> {{ round($TEE_Prot_20*4, 2) }}kcal @ {{ round($TEE_Prot_20, 2) }}g (required for individual: {{ 0.8 * $patient_info->weight}}g)\n" +
                                       "</p>";
                                   create_chart([{{ round($TEE_Carb_55*4, 2) }},{{ round($TEE_Fat_25*9, 2) }}, {{ round($TEE_Prot_20*4, 2) }}]);
                                   break;
                               case 'high_carb':
                                   document.getElementById("macro-nutrients")
                                       .innerHTML ="<p class=\"pt-3\">\n" +
                                       "<strong>Macro-nutrients:</strong> 60/25/15<br />\n" +
                                       "<strong>Total Estimated Energy (TEE):</strong> {{ $TEE_text }}<br /><strong>Energy Requirements:</strong> {{ $TEE_Total }}<br /><br />\n" +
                                       "<strong>Estimated Carbohydrates Requirements:</strong> {{ round($TEE_Carb_60*4, 2) }}kcal @ {{ round($TEE_Carb_60, 2) }}g<br />\n" +
                                       "<strong>Estimated Fat Requirements:</strong> {{ round($TEE_Fat_25*9, 2) }}kcal @ {{ round($TEE_Fat_25, 2) }}g<br />\n" +
                                       "<strong>Estimated Protein Requirements:</strong> {{ round($TEE_Prot_15*4, 2) }}kcal @ {{ round($TEE_Prot_15, 2) }}g (required for individual: {{ 0.8 * $patient_info->weight}}g)\n" +
                                       "</p>";
                                   create_chart([{{ round($TEE_Carb_60*4, 2) }},{{ round($TEE_Fat_25*9, 2) }}, {{ round($TEE_Prot_15*4, 2) }}]);

                                   break;
                               case 'low_carb':
                                   document.getElementById("macro-nutrients")
                                       .innerHTML ="<p class=\"pt-3\">\n" +
                                       "<strong>Macro-nutrients:</strong> 45/30/25<br />\n" +
                                       "<strong>Total Estimated Energy (TEE):</strong> {{ $TEE_text }}<br /><strong>Energy Requirements:</strong> {{ $TEE_Total }}<br /><br />\n" +
                                       "<strong>Estimated Carbohydrates Requirements:</strong> {{ round($TEE_Carb_45*4, 2) }}kcal @ {{ round($TEE_Carb_45, 2) }}g<br />\n" +
                                       "<strong>Estimated Fat Requirements:</strong> {{ round($TEE_Fat_30*9, 2) }}kcal @ {{ round($TEE_Fat_30, 2) }}g<br />\n" +
                                       "<strong>Estimated Protein Requirements:</strong> {{ round($TEE_Prot_25*4, 2) }}kcal @ {{ round($TEE_Prot_25, 2) }}g (required for individual: {{ 0.8 * $patient_info->weight}}g)\n" +
                                       "</p><br />";
                                   create_chart([{{ round($TEE_Carb_45*4, 2) }},{{ round($TEE_Fat_30*9, 2) }}, {{ round($TEE_Prot_25*4, 2) }}]);

                                   break;
                               case '':
                                   document.getElementById("macro-nutrients")
                                       .innerHTML ="<p class=\"pt-3\">\n" +
                                       "<strong>Macro-nutrients:</strong> <br />\n" +
                                       "<strong>Total Estimated Energy (TEE):</strong><br /><br />\n" +
                                       "<strong>Estimated Carbohydrates Requirements:</strong> <br />\n" +
                                       "<strong>Estimated Fat Requirements:</strong> <br />\n" +
                                       "<strong>Estimated Protein Requirements:</strong> \n" +
                                       "</p>";
                                   break;

                                   default:
                                   document.getElementById("macro-nutrients")
                                       .innerHTML ="<p class=\"pt-3\">\n" +
                                       "<strong>Macro-nutrients:</strong> <br />\n" +
                                       "<strong>Total Estimated Energy (TEE):</strong><br /><br />\n" +
                                       "<strong>Estimated Carbohydrates Requirements:</strong> <br />\n" +
                                       "<strong>Estimated Fat Requirements:</strong> <br />\n" +
                                       "<strong>Estimated Protein Requirements:</strong> \n" +
                                       "</p>";
                                   break;
                           }
                        });
                    </script>

                    <style>
                        @media (min-width:360px) {
                            /* big landscape tablets, laptops, and desktops */
                            .chart-container-style {
                                height:80vh;
                                width:80vw;
                                margin: 0 auto;
                                text-align: center;
                            }
                        }
                        @media (min-width:800px) {
                            /* big landscape tablets, laptops, and desktops */
                            .chart-container-style {
                                height:80vh;
                                width:80vw;
                                margin: 0 auto;
                                text-align: center;

                            }
                        }
                        @media (min-width:1025px) {
                            /* big landscape tablets, laptops, and desktops */
                            .chart-container-style {
                                height:40vh;
                                width:40vw;
                                margin: 0 auto;
                                text-align: center;

                            }
                        }
                        @media (min-width:1281px) {
                            /* hi-res laptops and desktops */
                            .chart-container-style {
                                height:40vh;
                                width:40vw;
                                margin: 0 auto;
                                text-align: center;

                            }
                        }
                    </style>

                    <div id="macro-nutrients"></div>
                    <div class="pb-3">
                        <div id="" class="chart-container-style">
                            <canvas id="macro-chart" class="chart-container-style"></canvas>
                        </div>
                    </div>


                    <script>
                        function create_chart(sendData) {
                            var ctx = document.getElementById('macro-chart').getContext("2d");
                            if(window.myChart != undefined)
                                window.myChart.destroy();
                            window.myChart = new Chart(ctx, {});

                            window.myChart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Carbohydrates", "Fats", "Proteins"],
                                    datasets: [{
                                        label: "Population (millions)",
                                        backgroundColor: ["#79B473", "#7A6490","#007EA7"],
                                        data: sendData
                                    }]
                                },
                                options: {
                                    title: {
                                        display: true,
                                        text: 'Macronutrient chart for {{$patient->FirstName}} {{$patient->LastName}}'
                                    }
                                }
                            });
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
