@extends('layouts.admin')

@section('header')
    Statistics
@endsection

@section('content')
        <div class="container">
            <a href="{{ route('home') }}" class="btn btn-purple float-right inverted">Back</a>
            <h4 class="pt-3 mb-0">Bookings</h4>
            <div class="row">
                <div class="col pt-2">
                    <div class="card shadow h-100 py-2 ">
                        <!-- Upcoming Bookings Card -->
                        <a href="{{ route('events.index') }}" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold text-success mb-1">Upcoming</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $upcoming }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar-alt fa-2x text-gray-300 text-success pt-2"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col pt-2">
                    <div class="card shadow h-100 py-2">
                        <!-- Bookings Today Card -->
                        <a href="" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold mb-1" style="color: #FF8C00">Today</div>

                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $today }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar-day fa-2x text-gray-300  pt-2" style="color: #FF8C00"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col pt-2">
                    <div class="card shadow h-100 py-2">
                        <!-- Bookings Today Card -->
                        <a href="" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold mb-1 inverted" style="color: #009881">Total</div>

                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $today }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300 pt-2 inverted" style="color: #009881"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <h4 class="pt-3 mb-0">Patients</h4>
            <div class="row">
                <div class="col pt-2">
                    <div class="card shadow h-100 py-2">
                        <!-- Total Patients Card -->
                        <a href="{{ route('patients.index') }}" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold text-primary mb-1">Total Patients</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ Auth::user()->patients->where('Deleted','=','0')->count() }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300 text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col pt-2">
                    <div class="card shadow h-100 py-2">
                        <!-- Total Patients Card -->
                        <a href="{{ route('patients.deleted') }}" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold mb-1 inverted" style="color: #be2820">Deleted Patients</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ Auth::user()->patients->where('Deleted','=','1')->count() }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-trash-alt fa-2x text-gray-300 inverted" style="color: #BE2820"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <h4 class="pt-3 mb-0">Diseases</h4>
            <div class="row">
                <div class="col pt-2">
                    <div class="card shadow h-100 py-2">
                        <!-- Total Patients Card -->
                        <a href="{{ route('patients.index') }}" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold mb-1 inverted" style="color: #206cbe">Arthritis</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $arthritis }}</div>
                                    </div>
                                    <div class="col-auto">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col pt-2">
                    <div class="card shadow h-100 py-2">
                        <!-- Total Patients Card -->
                        <a href="{{ route('patients.deleted') }}" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold mb-1 inverted" style="color: #206cbe">Renal Failure</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $renal_failure }}</div>
                                    </div>
                                    <div class="col-auto">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col pt-2">
                    <div class="card shadow h-100 py-2">
                        <!-- Total Patients Card -->
                        <a href="{{ route('patients.deleted') }}" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold mb-1 inverted" style="color: #206cbe">Dehydration</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dehydration }}</div>
                                    </div>
                                    <div class="col-auto">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col pt-2">
                    <div class="card shadow h-100 py-2">
                        <!-- Total Patients Card -->
                        <a href="{{ route('patients.deleted') }}" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold mb-1 inverted" style="color: #206cbe">Underweight</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $underweight }}</div>
                                    </div>
                                    <div class="col-auto">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col pt-2">
                    <div class="card shadow h-100 py-2">
                        <!-- Total Patients Card -->
                        <a href="{{ route('patients.index') }}" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold mb-1 inverted" style="color: #206cbe">Diabetes</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $diabetes }}</div>
                                    </div>
                                    <div class="col-auto">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col pt-2">
                    <div class="card shadow h-100 py-2">
                        <!-- Total Patients Card -->
                        <a href="{{ route('patients.deleted') }}" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold mb-1 inverted" style="color: #206cbe">HIV</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $hiv }}</div>
                                    </div>
                                    <div class="col-auto">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col pt-2">
                    <div class="card shadow h-100 py-2">
                        <!-- Total Patients Card -->
                        <a href="{{ route('patients.deleted') }}" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold mb-1 inverted" style="color: #206cbe">MAM</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $mam }}</div>
                                    </div>
                                    <div class="col-auto">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col pt-2">
                    <div class="card shadow h-100 py-2">
                        <!-- Total Patients Card -->
                        <a href="{{ route('patients.deleted') }}" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold mb-1 inverted" style="color: #206cbe">Wasted</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $wasted }}</div>
                                    </div>
                                    <div class="col-auto">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col pt-2">
                    <div class="card shadow h-100 py-2">
                        <!-- Total Patients Card -->
                        <a href="{{ route('patients.index') }}" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold mb-1 inverted" style="color: #206cbe">Epilepsy</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $epilepsy }}</div>
                                    </div>
                                    <div class="col-auto">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col pt-2">
                    <div class="card shadow h-100 py-2">
                        <!-- Total Patients Card -->
                        <a href="{{ route('patients.deleted') }}" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold mb-1 inverted" style="color: #206cbe">Pneumonia</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pneumonia }}</div>
                                    </div>
                                    <div class="col-auto">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col pt-2">
                    <div class="card shadow h-100 py-2">
                        <!-- Total Patients Card -->
                        <a href="{{ route('patients.deleted') }}" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold mb-1 inverted" style="color: #206cbe">SAM</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $sam }}</div>
                                    </div>
                                    <div class="col-auto">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col pt-2">
                    <div class="card shadow h-100 py-2">
                        <!-- Total Patients Card -->
                        <a href="{{ route('patients.deleted') }}" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold mb-1 inverted" style="color: #206cbe">Hypertension</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $hypertension }}</div>
                                    </div>
                                    <div class="col-auto">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div><div class="col pt-2">
                    <div class="card shadow h-100 py-2">
                        <!-- Total Patients Card -->
                        <a href="{{ route('patients.deleted') }}" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold mb-1 inverted" style="color: #206cbe">TB</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tb }}</div>
                                    </div>
                                    <div class="col-auto">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col pt-2">
                    <div class="card shadow h-100 py-2">
                        <!-- Total Patients Card -->
                        <a href="{{ route('patients.deleted') }}" style="text-decoration: none; color: black;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold mb-1 inverted" style="color: #206cbe">Stunted</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stunted }}</div>
                                    </div>
                                    <div class="col-auto">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div id="row">
                    <div id="canvas-holder" style="width:420px;float: right;" class="col">
                        <canvas id="com-chart" class="chart-container-style "></canvas>
                    </div>
                    <!-- <div style="width: 50%"><canvas id="canvas" height="450" width="600"></canvas></div>-->
                    <div id="canvas-holder" style="width:400px;float: right;" class="col">
                        <canvas id="paed-chart" class="chart-container-style "></canvas>
                    </div>
                </div>
            </div>

            <script>
                create_chart_Com([{{$diabetes}}, {{$hypertension}}, {{$arthritis}},
                    {{$epilepsy}}, {{$renal_failure}}, {{$tb}},
                    {{$hiv}}, {{$pneumonia}}]);

                create_chart_Paed([{{ $wasted }}, {{ $underweight }}, {{ $stunted }},
                    {{$dehydration}}, {{$sam}}, {{$mam}}]);


                function create_chart_Com(sendData) {
                    var ctx = document.getElementById('com-chart').getContext("2d");
                    if (window.comChart != undefined)
                        window.comChart.destroy();
                    window.comChart = new Chart(ctx, {});

                    window.comChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: ["Diabetese", "Hypertension", "Arthritis",
                                "Epilepsy", "Renal Failure", "TB",
                                "HIV", "Pneumonia"],
                            datasets: [{
                                label: "Population (millions)",
                                backgroundColor: ["#EABFCB", "#2F004F", "#2fbc63",
                                    "#3ea4a4", "#c191a1", "#c5dca0", "#a4508b", "#f5f2b8"],
                                data: sendData
                            }]
                        },
                        options: {
                            title: {
                                display: true,
                                text: '(Non-)Communicable'
                            }
                        }
                    });
                }
                function create_chart_Paed(sendData) {

                    var ctx = document.getElementById('paed-chart').getContext("2d");
                    if(window.paedChart != undefined)
                        window.paedChart.destroy();
                    window.paedChart = new Chart(ctx, {});

                    window.paedChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: ["Wasted", "Underweight",
                                "Stunted", "Dehydration", "SAM",
                                "MAM"],
                            datasets: [{
                                label: "Population (millions)",
                                backgroundColor: ["#95BF8F",
                                    "#5F0A87", "#E2E1B9", "#3E000C",
                                    "#7C6A0A", "#0A1128"],
                                data: sendData
                            }]
                        },
                        options: {
                            title: {
                                display: true,
                                text: 'Paediatrics'
                            }
                        }
                    });
                }
            </script>
            <style>

                @media (min-width:800px) {
                    /* big landscape tablets, laptops, and desktops */
                    .chart-container-style {
                        height:400px;
                        width:400px;
                        margin: 0 auto;
                        text-align: center;

                    }
                }

                @media (min-width:1281px) {
                    /* hi-res laptops and desktops */
                    .chart-container-style {
                        height:400px;
                        width:400px;
                        margin: 0 auto;
                        text-align: center;

                    }
                }
            </style>
        </div>
@endsection

@section('sidebar')
    <h5>Statistics</h5>
    <p>A quick glance at all your information.</p>
@endsection
