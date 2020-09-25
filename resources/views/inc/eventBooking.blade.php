<div class="row">
    <div class="col-md-12 pr-4 pl-4">
        <div class="container pb-3">
            <div id="calendar"></div>
        </div>
    </div>
</div>

<!-- dayClick Dialog -->
<div id="dialog">
    <div id="dialog-body">
        <form id="dayClick" method="post" action="{{ route('events.store') }}" autocomplete="false">
            @csrf
            <input type="hidden" id="event_id" name="event_id">

            <div class="form-group">
                <label>Event Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Event title" required>
            </div>
            <div class="form-group">
                <label>Patient</label>
                <select id='patient_name' name='patient_name' class="form-control">
                    <option value='' selected>Select Patient</option>
                    @foreach ($patient_event as $key => $value)
                        <option value='{{ $value }}'>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Start Date/Time (24 hour)</label>
                <input type="text" class="form-control" name="start" id="start">
            </div>
            <div class="form-group">
                <label>End Date/Time (24 hour)</label>
                <input type="text" class="form-control" name="end" id="end">
            </div>
            <div class="form-group" id="deleteGroup">
                <label>Delete?</label>
                <select id='delete' name='delete' class="form-control">
                    <option value='0' selected>No</option>
                    <option value='1'>Yes</option>
                </select>
            </div>

            <div class="form-group float-left">
                <button type="submit" class="btn btn-purple" name="submit" id="update">Submit</button>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#addEventButton').on('click', function () {
            $('#update').html('Submit');
            $('#deleteGroup').hide();

            $('#dialog').dialog({
                title: 'Add Event',
                width: 400,
                height: 480,
                modal: true,
                show: {effect: 'clip', duration: 350},
                hide: {effect: 'clip', duration: 250},
            })
        });
        var calendar = $('#calendar').fullCalendar({
            timeFormat: 'HH:mm',
            eventColor: '#800080',
            eventTextColor: '#FFFFFF',
            selectable:false,
            weekNumbers: true,
            durationEditable: true,
            height: 800,
            showNoneCurrentDates: false,
            editable: false,
            defaultView: 'month',
            themeSystem: 'bootstrap',
            yearColumns: 2,
            header: {
                left: 'year,month,basicWeek,listWeek',
                center: 'title',
                right: 'prevYear,prev,next,nextYear'
            },
            footer: {
                right: 'prev,next'
            },
            events: "{{ route('events.list') }}",
            dayClick:function(date,event,view) {
                var startTime = 8;
                var timeModifier = 1;
                $('#start').val(moment(date).add(startTime, 'hours').format('YYYY-MM-DD HH:mm:ss'));
                $('#end').val(moment(date).add(startTime+timeModifier, 'hours').format('YYYY-MM-DD HH:mm:ss'));
                $('#update').html('Submit');
                $('#deleteGroup').hide();
                $('#dialog').dialog({
                    title: 'Add Event',
                    width: 400,
                    height: 480,
                    modal: true,
                    show: {effect: 'clip', duration: 350},
                    hide: {effect: 'clip', duration: 250},
                })
            },
            eventClick:function (event, calEvent) {
                $('#title').val(event.title);
                $('#start').val(moment(event.start).format('YYYY-MM-DD HH:mm:ss'));
                $('#end').val(moment(event.end).format('YYYY-MM-DD HH:mm:ss'));
                $('#patient_name').val(event.patient_name);
                $('#event_id').val(event.id);
                $('#update').html('Update');

                $('#dialog').dialog({
                    title: 'Edit Event',
                    width: 400,
                    height: 550,
                    modal: true,
                    show: {effect: 'clip', duration: 350},
                    hide: {effect: 'clip', duration: 250},
                });
            },
        })
    });

</script>
@section('head')
    <style>
        #dialog{
            display: none;
        }
        .ui-dialog-titlebar-close {
            background: url("http://code.jquery.com/ui/1.10.3/themes/smoothness/images/ui-icons_888888_256x240.png") repeat scroll -93px -128px rgba(0, 0, 0, 0);
            border: medium none;
        }
        .ui-dialog-titlebar-close:hover {
            background: url("http://code.jquery.com/ui/1.10.3/themes/smoothness/images/ui-icons_222222_256x240.png") repeat scroll -93px -128px rgba(0, 0, 0, 0);
        }
    </style>
    <link href="{{ asset('css/fullcalendar.css') }}" rel="stylesheet" />
@endsection

@section('footer')

    <!-- Moment -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
    <!-- FullCalendar -->
    <script src="{{ asset('js/fullcalendar.js') }}"></script>
@endsection
