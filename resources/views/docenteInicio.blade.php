@extends('layouts.master')

@section('titleWeb')
    SistemaCDDOC
@endsection

@section('content')
    <div class="jumbotron">
        @include('includes.modalIngresarCurso')
        @include('includes.modalEditarCurso')
        @include('includes.modalIngresarEvento')
        @include('includes.modalEditarEvento')
        <div id="calendar"></div>
    </div>
@endsection


