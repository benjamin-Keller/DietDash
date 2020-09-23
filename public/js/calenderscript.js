// Code goes here
$(document).ready(function() {

    // page is now ready, initialize the calendar...

    var calendar = $('#calendar').fullCalendar({
        // put your options and callbacks here
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'year,month,basicWeek,basicDay'

        },
        timezone: 'local',
        height: "auto",
        selectable: true,
        dragabble: true,
        defaultView: 'year',
        yearColumns: 3,

        durationEditable: true,
        bootstrap: false,

        events: [{
            title: "Some event",
            start: new Date('2017-1-10'),
            end: new Date('2017-1-20'),
            id: 1,
            allDay: true,
            editable: true,
            eventDurationEditable: true,
        }, ],
        select: function(start, end, allDay) {
            var title = prompt('Event Title:');
            if (title) {
                var event = {
                    title: title,
                    start: start.clone(),
                    end: end.clone(),
                    allDay: true,
                    editable: true,
                    eventDurationEditable: true,
                    eventStartEditable: true,
                    color: 'red',
                };


                calendar.fullCalendar('renderEvent', event, true);
            }
        },
    })
});
