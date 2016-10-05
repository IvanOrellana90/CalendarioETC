<!DOCTYPE html>

<html>
<head>
    <title>@yield('titleWeb')</title>
    <!-- Latest compiled and minified CSS y JQuery -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- FullCalendar -->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('fullcalendar/fullcalendar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('fullcalendar/fullcalendar.print.css')}}" media="print">
    <link rel="stylesheet" href="{{URL::to('fullcalendar/lib/cupertino/jquery-ui.min.css')}}">
    <!-- DateTime -->
    <link href="{{ URL::to('src/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ URL::to('src/css/default.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">

    @if(Auth::user()->tipo == 'Docente')
        @include('includes.menuDocente')
        <script type="text/javascript">
            var url = "{{ URL('eventosAdmin')}}";
        </script>
    @elseif(Auth::user()->tipo == 'Admin')
        @include('includes.menuAdmin')
        <script type="text/javascript">
            var url = "{{ URL('eventoDocente')}}";
        </script>
    @elseif(Auth::user()->tipo == 'Ayudante')
        @include('includes.menuAyudante')
        <script type="text/javascript">
            var url = "{{ URL('eventosAyudante')}}";
        </script>
    @endif

    @yield('menu')
    @include('includes.mensajes')

    @yield('content')

</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ URL::to('src/js/jquery.js') }}"></script>
<script src="{{ URL::to('fullcalendar/lib/moment.min.js') }}"></script>
<script src="{{ URL::to('src/js/bootstrap.min.js') }}"></script>
<!-- Calendario -->
<script src="{{ URL::to('fullcalendar/lib/jquery-ui.custom.min.js') }}"></script>
<script src="{{ URL::to('fullcalendar/fullcalendar.js') }}"></script>
<script src="{{ URL::to('fullcalendar/lang-all.js') }}"></script>
<script src="{{ URL::to('src/js/bootstrap-datetimepicker.js') }}"></script>
<script src="{{ URL::to('src/js/calendario.js') }}"></script>
<!-- Metodos personalizados -->
<script src="{{ URL::to('src/js/jquery.tablesorter.min.js') }}"></script>
<script src="{{ URL::to('src/js/default.js') }}"></script>

</body>
</html>