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
        <form id="dayClick" method="post" action="{{ route('events.store') }}">
            @csrf
            <div class="form-group">
                <label>Event Title</label>
                <input type="text" class="form-control" name="title" placeholder="Event title" required>
            </div>
            <div class="form-group">
                <label>Start Date/Time</label>
                <input type="datetime-local" class="form-control" name="start" id="start">
            </div>
            <div class="form-group">
                <label>End Date/Time</label>
                <input type="datetime-local" class="form-control" name="end" id="end">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-purple" name="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        function convert(str) {
            const d = new Date(str);
            let day = '' + d.getDay();
            let month = '' + (d.getMonth()+1);
            let year = '' + d.getFullYear();
            if(day.length < 2) day = '0' + day;
            if(month.length < 2) month = '0' + month;

            let hour = '' + (d.getUTCHours()+2);
            let minutes = '' + d.getUTCMinutes();
            let seconds = '' + d.getUTCSeconds();
            if(hour.length < 2) hour = '0' + hour;
            if(minutes.length < 2) minutes = '0' + minutes;
            if(seconds.length < 2) seconds = '0' + seconds;

            return [year, month, day].join('-')+' '+[hour,minutes,seconds].join(':')
        }

        var calendar = $('#calendar').fullCalendar({
            selectable:true,
            height: 800,
            showNoneCurrentDates: false,
            editable: false,
            defaultView: 'month',
            yearColumns: 3,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'year,month,basicWeek,basicDay'
            },
            events: "{{ route('events.list') }}",
            dayClick:function(date,event,view) {
                $('#start').val(date);
                $('#end').val(convert(date));
                $('#dialog').dialog({
                    title: 'Add Event',
                    width: 600,
                    height: 380,
                    modal: true,
                    show: {effect: 'clip', duration: 350},
                    hide: {effect: 'clip', duration: 250},
                })

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
