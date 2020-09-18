@extends('layouts.admin')

@section('scripts')
    $(document).ready(function() {
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();


    var calendar = $('#calendar').fullCalendar({
    editable: true,
    header: {
    left: 'prev,next today',
    center: 'title',
    right: 'month,agendaWeek,agendaDay'
    },


    events: "events.php",


    eventRender: function(event, element, view) {
    if (event.allDay === 'true') {
    event.allDay = true;
    } else {
    event.allDay = false;
    }
    },
    selectable: true,
    selectHelper: true,
    select: function(start, end, allDay) {
    var title = prompt('Event Title:');


    if (title) {
    var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
    $.ajax({
    url: 'add_events.php',
    data: 'title='+ title+'&start='+ start +'&end='+ end,
    type: "POST",
    success: function(json) {
    alert('Added Successfully');
    }
    });
    calendar.fullCalendar('renderEvent',
    {
    title: title,
    start: start,
    end: end,
    allDay: allDay
    },
    true
    );
    }
    calendar.fullCalendar('unselect');
    },


    editable: true,
    eventDrop: function(event, delta) {
    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
    $.ajax({
    url: 'update_events.php',
    data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
    type: "POST",
    success: function(json) {
    alert("Updated Successfully");
    }
    });
    },
    eventClick: function(event) {
    var decision = confirm("Do you really want to do that?");
    if (decision) {
    $.ajax({
    type: "POST",
    url: "delete_event.php",
    data: "&id=" + event.id,
    success: function(json) {
    $('#calendar').fullCalendar('removeEvents', event.id);
    alert("Updated Successfully");}
    });
    }
    },
    eventResize: function(event) {
    var start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
    var end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
    $.ajax({
    url: 'update_events.php',
    data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
    type: "POST",
    success: function(json) {
    alert("Updated Successfully");
    }
    });
    }

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
                            <h3 class="float-left">{{ __('Bookings') }}</h3>
                        </div>

                        <div class="col-sm">
                            <div class="float-right">
                                <a href="{{ route('bookings.today') }}" class="btn btn-purple btn-m inverted" style="text-decoration: none; color: white;">Today</a>
                                <a href="{{ route('bookings.history') }}" class="btn btn-purple btn-m inverted" style="text-decoration: none; color: white;">Booking History</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body container-fluid">
                    {{ Form::open(array('route' => 'bookings.add', 'method'=> 'POST', 'files' => 'true', 'autocomplete' => 'off')) }}
                    {{Form::token()}}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            @include('inc.messages')
                        </div>

                        <div class="col-xs-4 col-sm-4 col-sm-4">
                            <div class="form-group">
                                {{ Form::label('event_name', 'Event Name:') }}
                                <div class="">
                                    {{ Form::text('event_name', null, ['class'=> 'form-control']) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-sm-4">
                            <div class="form-group">
                                {{ Form::label('description', 'Description:') }}
                                <div class="">
                                    {{ Form::text('description', null, ['class'=> 'form-control']) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-sm-3">
                            <div class="form-group">
                                {{ Form::label('date', 'Date:') }}
                                <div class="">
                                    {{ Form::date('date', null, ['class'=> 'form-control']) }}
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-3 col-sm-3 col-sm-3">
                            <div class="form-group">
                                {{ Form::label('time', 'Time:') }}
                                <div class="">
                                    {{ Form::Time('time', null, ['class'=> 'form-control']) }}
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-3 col-sm-3 col-sm-3">
                            <div class="form-group">
                                {{ Form::label('patient_name', 'Patient Name:') }}
                                <div class="">
                                    <select id='patient_name' name='patient_name' class="form-control">
                                        <option value='null' selected>Select Patient</option>
                                        @foreach ($patient as $key => $value)
                                            <option value='{{ $value }}'>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-1 col-sm-1 col-md-1 text-center">&nbsp;<br />
                            {{ Form::submit('Add Booking', ['class'=>'btn btn-purple mt-2 inverted']) }}
                        </div>
                    </div>
                    {{Form::close() }}
                </div>

                <!-- Booking table -->
                <div class="row">
                    <div class="col-md-12 pr-4 pl-4">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>{{ 'Booking Name' }}</th>
                                <th>{{ 'Description' }}</th>
                                <th>{{ 'Patient' }}</th>
                                <th>{{ 'Date' }}</th>
                                <th>{{ 'Time' }}</th>
                                <th>{{ 'Edit' }}</th>
                            </tr>
                            @foreach($bookings as $row)
                                <tr>
                                    <td>{{ $row['event_name'] }}</td>
                                    <td>{{ $row['description'] }}</td>
                                    <td>{{ $row['patient_name'] }}</td>
                                    <td>{{ $row['date'] }}</td>
                                    <td>{{ $row['time'] }}</td>
                                    <td><a href="" style="color: #ff1744;"><i class="far fa-trash-alt"></i></a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 pr-4 pl-4">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
