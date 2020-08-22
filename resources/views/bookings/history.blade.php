@extends('layouts.app')

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

            <!-- Patient table -->
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>{{ 'Booking Name' }}</th>
                            <th>{{ 'Description' }}</th>
                            <th>{{ 'Date' }}</th>
                            <th>{{ 'Time' }}</th>
                        </tr>
                        @foreach($all as $row)
                            <tr>
                                <td>{{ $row['event_name'] }}</td>
                                <td>{{ $row['description'] }}</td>
                                <td>{{ $row['date'] }}</td>
                                <td>{{ $row['time'] }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
