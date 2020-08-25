@extends('layouts.app')

@section('scripts')
    $(document).ready(function(){ $('#history').DataTable(); });
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
                                <a href="{{ route('bookings.today') }}" class="btn btn-primary btn-m" style="text-decoration: none; color: white;">Today</a>
                                <a href="{{ route('bookings.index') }}" class="btn btn-primary btn-m" style="text-decoration: none; color: white;">Back</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <!-- Booking History table -->
            <div class="row pt-3">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped
                                table-responsive-sm
                                table-responsive-md
                                table-responsive-lg" id="history">
                        <thead>
                        <tr>
                            <th>{{ 'Booking Name' }}</th>
                            <th>{{ 'Description' }}</th>
                            <th>{{ 'Date' }}</th>
                            <th>{{ 'Time' }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($all as $row)
                            <tr>
                                <td>{{ $row['event_name'] }}</td>
                                <td>{{ $row['description'] }}</td>
                                <td>{{ $row['date'] }}</td>
                                <td>{{ $row['time'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
