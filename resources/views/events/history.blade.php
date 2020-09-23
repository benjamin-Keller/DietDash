@extends('layouts.admin')

@section('scripts')
    $(document).ready(function(){ $('#history').DataTable({
        "lengthMenu": [ 5, 10, 25, 50, 75, 100 ],
        "order": [[ 2, "desc" ],[ 3, "asc" ]],
        });
    });
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header container-fluid">
                    <div class="row align-middle">
                        <div class="col-sm">
                            <h3 class="float-left">{{ __("Booking History") }}</h3>
                        </div>
                        <div class="col-sm">
                            <div class="float-right">
                                <a href="{{ route('events.index') }}" class="btn btn-purple btn-m inverted" style="text-decoration: none; color: white;">Back</a>
                            </div>
                        </div>
                    </div>
                </div>


            <!-- Booking History table -->

                <div class="card-body container-fluid">
                @include('inc.messages')

                <!-- Patient table -->
                    <div class="row">
                        <div class="col-md-12">
                            <table id="history" class="table table-bordered table-striped
                                    table-responsive-sm
                                    table-responsive-md
                                    table-responsive-lg">
                                <tr>
                                    <th>{{ 'Event Name' }}</th>
                                    <th>{{ 'Patient Name' }}</th>
                                    <th>{{ 'Start Date' }}</th>
                                    <th>{{ 'End Date' }}</th>
                                </tr>
                                @foreach($all as $row)
                                    <tr>
                                        <td>{{ $row['title'] }}</td>
                                        <td>{{ $row['patient_name'] }}</td>
                                        <td>{{ $row['start'] }}</td>
                                        <td>{{ $row['end'] }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
