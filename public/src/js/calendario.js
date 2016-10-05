// Calendario Admin

$(document).ready(function() {

    var currentLangCode = 'es';//cambiar el idioma al español

    $('#calendarAdmin').fullCalendar({
        eventClick: function(calEvent, jsEvent, view) {

            $(this).css('background', 'red');
            //al evento click; al hacer clic sobre un evento cambiara de background
            //a color rojo y nos enviara a los datos generales del evento seleccionado

        },

        header: {
            left: 'prev,next today myCustomButton',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },

        monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
        timeFormat: 'HH:mm',
        eventDurationEditable: false,
        eventStartEditable: false,
        defaultTimedEventDuration: '00:30:00',
        aspectRatio: 1.8,
        minTime: '08:00:00',
        maxTime: '22:00:00',
        allDaySlot: false,
        weekends: false,
        defaultView: 'agendaWeek',
        lang:currentLangCode,
        editable: true,
        eventLimit: true,

        events:{
            //para obtener los resultados del controlador y mostrarlos en el calendario
            //basta con hacer referencia a la url que nos da dicho resultado, en el ejemplo
            //en la propiedad url de events ponemos el enlace
            //y listo eso es todo ya el plugin se encargara de acomodar los eventos
            //segun la fecha.
            url:'http://146.155.61.196/calendarioETC/public/eventosAdmin'
        },

        eventRender: function(event, element, view) {
            element.find(".fc-content").attr("data-toggle", "tooltip");
            element.find(".fc-content").attr("data-placement", "top");
            element.find(".fc-content").attr("title", event.description);
        }

    });

    $(function () {
        $('#fechaTexto').datetimepicker({
            format: 'YYYY/MM/DD'
        });
    });

    $(function () {
        $('#horaTexto').datetimepicker({
            format: 'HH:mm'
        });
    });

    $(function () {
        $('#fecha').datetimepicker({
            format: 'YYYY/MM/DD'
        });
    });

    $(function () {
        $('#fecha1').datetimepicker({
            format: 'YYYY/MM/DD'
        });
    });
});


// Calendario Docente

$(document).ready(function() {

    var currentLangCode = 'es';//cambiar el idioma al español

    $('#calendar').fullCalendar({
        eventClick: function(calEvent, jsEvent, view) {

            $(this).css('background', 'red');
            //al evento click; al hacer clic sobre un evento cambiara de background
            //a color rojo y nos enviara a los datos generales del evento seleccionado
        },

        header: {
            left: 'prev,next today myCustomButton',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        
        eventDurationEditable: false,
        eventStartEditable: false,
        defaultTimedEventDuration: '01:30:00',
        aspectRatio: 1.8,
        minTime: '08:00:00',
        maxTime: '22:00:00',
        allDaySlot: false,
        weekends: false,
        defaultView: 'agendaWeek',
        lang:currentLangCode,
        editable: true,
        eventLimit: true,

        events:{
            //para obtener los resultados del controlador y mostrarlos en el calendario
            //basta con hacer referencia a la url que nos da dicho resultado, en el ejemplo
            //en la propiedad url de events ponemos el enlace
            //y listo eso es todo ya el plugin se encargara de acomodar los eventos
            //segun la fecha.
            url:'http://146.155.61.196/calendarioETC/public/eventoDocente'
        },

        eventRender: function(event, element, view) {
            element.find(".fc-content").attr("data-toggle", "tooltip");
            element.find(".fc-content").attr("data-placement", "top");
            element.find(".fc-content").attr("title", event.description);
        }

    });

    $(function () {
        $('#fecha').datetimepicker({
            format: 'YYYY/MM/DD'
        });
    });

    $(function () {
        $('#fecha1').datetimepicker({
            format: 'YYYY/MM/DD'
        });
    });
});

// Calendario Ayudante

$(document).ready(function() {

    var currentLangCode = 'es';//cambiar el idioma al español

    $('#calendarAyudante').fullCalendar({
        eventClick: function(calEvent, jsEvent, view) {

            $(this).css('background', 'red');
            //al evento click; al hacer clic sobre un evento cambiara de background
            //a color rojo y nos enviara a los datos generales del evento seleccionado
        },

        header: {
            left: 'prev,next today myCustomButton',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },

        eventDurationEditable: false,
        eventStartEditable: false,
        defaultTimedEventDuration: '01:30:00',
        aspectRatio: 1.8,
        minTime: '08:00:00',
        maxTime: '22:00:00',
        allDaySlot: false,
        weekends: false,
        defaultView: 'agendaWeek',
        lang:currentLangCode,
        editable: true,
        eventLimit: true,

        events:{
            //para obtener los resultados del controlador y mostrarlos en el calendario
            //basta con hacer referencia a la url que nos da dicho resultado, en el ejemplo
            //en la propiedad url de events ponemos el enlace
            //y listo eso es todo ya el plugin se encargara de acomodar los eventos
            //segun la fecha.
            url:'http://146.155.61.196/calendarioETC/public/eventosAyudante'
        },

        eventRender: function(event, element, view) {
            element.find(".fc-content").attr("data-toggle", "tooltip");
            element.find(".fc-content").attr("data-placement", "top");
            element.find(".fc-content").attr("title", event.description);
        }

    });

    $(function () {
        $('#fecha').datetimepicker({
            format: 'YYYY/MM/DD'
        });
    });

    $(function () {
        $('#fecha1').datetimepicker({
            format: 'YYYY/MM/DD'
        });
    });
});