@extends('layouts.master')

@section('titleWeb')
    SistemaCDDOC
@endsection

@section('content')
    @if($user->tipo == 'Docente')
        @include('includes.modalIngresarCurso')
        @include('includes.modalIngresarEvento')
    @endif

    <div class="informacionEvento">
        <div class="table-responsive">
            @if($user->tipo == 'Docente')
                @include('includes.eventos.eventosDocente')
            @elseif($user->tipo == 'Ayudante')
                    @include('includes.eventos.eventosAyudante')
            @elseif($user->tipo == 'Admin')
                @include('includes.eventos.eventosAdmin')
            @endif
        </div>
    </div>

@endsection