@extends('layouts.master')

@section('titleWeb')
    SistemaCDDOC
@endsection

@section('content')
    @if(Auth::user()->tipo == 'Docente')
        @include('includes.modalIngresarCurso')
        @include('includes.modalIngresarEvento')
    @endif

    <div class="informacionEvento">
        <div class="table-responsive">
            <form action = "{{ route('editarFacultad') }}" method="post" id="editarForm">

                <input value="{{ $faculty->id }}" name="id" hidden >

            <div class="col-md-12">
                <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                    <label for="nombre">Nombre</label>
                    <input value ="{{ $faculty->nombre}}" class="form-control" type="text" name="nombre" id="nombre" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btnDerecha">Editar</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}">

        </form>
        </div>
    </div>

@endsection