@extends('layouts.master')

@section('titleWeb')
    SistemaCDDOC
@endsection

@section('content')
    <div class="informacionEvento">
        <div class="table-responsive">
            <h3>Perfil de Usuario</h3>
            <table id="" class="table table-bordered table-hover">
                <tbody>
                <tr>
                    <td class="columnaDato">Nombre</td>
                    <td>{{ $user->nombre }}</td>
                </tr>
                <tr>
                    <td class="columnaDato">Apellidos</td>
                    <td>{{ $user->apellido_paterno ." ". $user->apellido_materno }}</td>
                </tr>
                <tr>
                    <td class="columnaDato">Rut</td>
                    <td>{{ $user->rut ."-". $user->rut_v }}</td>
                </tr>
                <tr>
                    <td class="columnaDato">Email</td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td class="columnaDato">Celular</td>
                    <td>{{ $user->calular }}</td>
                </tr>
                <tr>
                    <td class="columnaDato">Rol</td>
                    <td>{{ $user->tipo }}</td>
                </tr>
                @if($user->tipo == 'Docente')
                    <tr>
                        <td class="columnaDato">Anexo</td>
                        <td>{{ $user->teacher->anexo }}</td>
                    </tr>
                    <tr>
                        <td class="columnaDato">Facultad</td>
                        <td>{{ $user->teacher->faculty->nombre }}</td>
                    </tr>
                @endif
                </tbody>
            </table>

            @if($user->tipo == 'Docente')
                @include('includes.eventos.eventosDocente')
            @endif

            @if($user->tipo == 'Ayudante')
                @include('includes.eventos.eventosAyudante')
            @endif

        </div>
    </div>
@endsection