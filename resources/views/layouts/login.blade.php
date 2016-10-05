<!DOCTYPE html>

<html>
<head>
    <title>Sistema CDDOC</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{URL::to('fullcalendar/lib/cupertino/jquery-ui.min.css')}}">
    <link href="{{ URL::to('src/css/signin.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    @yield('content')
    @include('includes.mensajes')
</div> <!-- /container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ URL::to('src/js/jquery.js') }}"></script>
<script src="{{ URL::to('src/js/bootstrap.min.js') }}"></script>

<!-- Metodos personalizados -->
<script src="{{ URL::to('src/js/default.js') }}"></script>

</body>
</html>