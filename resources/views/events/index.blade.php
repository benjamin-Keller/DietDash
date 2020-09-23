@extends('layouts.admin')

@section('scripts')


@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header container-fluid">
                    <div class="row align-middle">
                        <div class="col-sm">
                            <h3 class="float-left">{{ __('Bookings') }}</h3>
                        </div>

                        <div class="col-sm">
                            <div class="float-right">
                                <button class="btn btn-purple" id="addEventButton">Add Event</button>
                                <a href="{{ route('events.history') }}" class="btn btn-purple btn-m inverted" style="text-decoration: none; color: white;">Booking History</a>
                            </div>
                        </div>
                    </div>
                </div>

                @include('inc.eventBooking')

            </div>
        </div>
    </div>
</div>

@endsection



