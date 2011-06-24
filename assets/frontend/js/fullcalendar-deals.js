$(document).ready(function() {

        //$('.user-deals-tabs-menu a').live('click',function(){
        //user-deals-select
        $('.user-deals-select').live('change',function(){
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            $('#users-deals-calendar').fullCalendar({
                // display
                defaultView: 'month',
                aspectRatio: 1.35,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek'
                },
                weekends: true,

                // editing
                //editable: false,
                //disableDragging: false,
                //disableResizing: false,

                allDaySlot: false,
                ignoreTimezone: true,

                // event ajax
                lazyFetching: true,
                startParam: 'start',
                endParam: 'end',

                // time formats
                titleFormat: {
                    month: 'MMMM yyyy',
                    week: "MMM d[ yyyy]{ '&#8212;'[ MMM] d yyyy}",
                    day: 'dddd, MMM d, yyyy'
                },
                columnFormat: {
                    month: 'ddd',
                    week: 'ddd M/d',
                    day: 'dddd M/d'
                },
                timeFormat: { // for event elements
                    '': 'h(:mm)t' // default
                },

                // locale
                isRTL: false,
                firstDay: 0,
                monthNames: ['January','February','March','April','May','June','July','August','September','October','November','December'],
                monthNamesShort: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
                dayNames: ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
                dayNamesShort: ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'],
                buttonText: {
                    prev: '&nbsp;&#9668;&nbsp;',
                    next: '&nbsp;&#9658;&nbsp;',
                    prevYear: '&nbsp;&lt;&lt;&nbsp;',
                    nextYear: '&nbsp;&gt;&gt;&nbsp;',
                    today: 'today',
                    month: 'month',
                    week: 'week',
                    day: 'day'
                },

                // jquery-ui theming
                theme: false,
                buttonIcons: {
                    prev: 'circle-triangle-w',
                    next: 'circle-triangle-e'
                },

                //selectable: false,
                unselectAuto: true,

                dropAccept: '*'//,
                /*events: [
                    {
                        title: 'All Day Event',
                        start: new Date(y, m, 1)
                    },
                    {
                        title: 'Long Event',
                        start: new Date(y, m, d-5),
                        end: new Date(y, m, d-2)
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: new Date(y, m, d-3, 16, 0),
                        allDay: false
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: new Date(y, m, d+4, 16, 0),
                        allDay: false
                    },
                    {
                        title: 'Meeting',
                        start: new Date(y, m, d, 10, 30),
                        allDay: false
                    },
                    {
                        title: 'Lunch',
                        start: new Date(y, m, d, 12, 0),
                        end: new Date(y, m, d, 14, 0),
                        allDay: false
                    },
                    {
                        title: 'Birthday Party',
                        start: new Date(y, m, d+1, 19, 0),
                        end: new Date(y, m, d+1, 22, 30),
                        allDay: false
                    },
                    {
                        title: 'Click for Google',
                        start: new Date(y, m, 28),
                        end: new Date(y, m, 29),
                        url: 'http://google.com/'
                    }
                ]*/
            });
            return false;
        });
});


		
		
	//});