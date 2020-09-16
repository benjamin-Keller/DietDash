@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header container-fluid">
                    <div class="row align-middle">
                        <div class="col-sm">
                            <h3 class="float-left">{{ __("Today's Bookings") }}</h3>
                        </div>
                        <div class="col-sm">
                            <div class="float-right">
                                <a href="{{ route('bookings.index') }}" class="btn btn-purple btn-m inverted" style="text-decoration: none; color: white;">Bookings</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Patient table -->
                <div class="row">
                    <div class="col-md-12 p-4">
                        <table class="table table-bordered table-striped
                                    table-responsive-sm
                                    table-responsive-md
                                    table-responsive-lg">
                            <tr>
                                <th>{{ 'Booking Name' }}</th>
                                <th>{{ 'Description' }}</th>
                                <th>{{ 'Date' }}</th>
                                <th>{{ 'Time' }}</th>
                            </tr>
                            @foreach($today as $row)
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
</div>
@endsection
