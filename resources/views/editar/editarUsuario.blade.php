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
            <form action = "{{ route('editarUsuario') }}" method="post" id="editarForm">

                <input value="{{ $user->id }}" name="id" hidden >

            <div class="col-md-6">
                <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                    <label for="nombre">Nombre</label>
                    <input class="form-control" type="text" name="nombre" id="nombre" value="{{ $user->nombre }}" required>
                </div>
                <div class="form-group {{ $errors->has('apellido_paterno') ? 'has-error' : '' }}">
                    <label for="apellido_paterno">Apellido Paterno</label>
                    <input class="form-control" type="text" name="apellido_paterno" id="apellido_paterno" value="{{ $user->apellido_paterno }}" required>
                </div>
                <div class="form-group {{ $errors->has('apellido_materno') ? 'has-error' : '' }}">
                    <label for="apellido_materno">Apellido Materno</label>
                    <input class="form-control" type="text" name="apellido_materno" id="apellido_materno" value="{{ $user->apellido_materno }}" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('rut') ? 'has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-10">
                            <label for="rut">Rut</label>
                            <input class="form-control" type="text" name="rut" id="rut" value="{{ $user->rut }}" required>
                        </div>
                        <div class="col-md-2 margenUp {{ $errors->has('rut_v') ? 'has-error' : '' }}">
                            <input class="form-control" type="text" name="rut_v" id="rut_ver" value="{{ $user->rut_v}}" required>
                        </div>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ $user->email }}" >
                </div>
                <div class="form-group {{ $errors->has('celular') ? 'has-error' : '' }}" >
                    <label for="celular">Celular</label>
                    <input class="form-control" type="text" name="celular" id="celular" value="{{ $user->celular }}" >
                </div>
            </div>

            <button type="submit" class="btn btn-primary btnDerecha">Editar</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}">

        </form>
        </div>
    </div>

@endsection