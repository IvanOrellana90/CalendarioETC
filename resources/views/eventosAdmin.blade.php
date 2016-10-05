@extends('layouts.master')

@section('titleWeb')
    SistemaCDDOC
@endsection

@section('content')
    <div class="informacionEvento">
        <div class="table-responsive">
            <h3>Cursos inscritos:</h3>
            <!-- Aqui va la tabla! -->
            <table id="" class="table table-bordered table-hover">
                <thead>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Curso</th>
                <th>Sala</th>
                <th>Campus</th>
                </thead>
                <tbody>
                @foreach($courses as $course)
                    @foreach($course->events as $evento)
                        <tr>
                            <td>{{ $evento->fecha }}</td>
                            <td>{{ $evento->hora }}</td>
                            <td>{{ $evento->course->nombre}}</td>
                            <td>{{ $evento->sala}}</td>
                            <td>{{ $evento->campus->nombre }}</td>
                            <td class=iconos>
                                <div class='divIconos'>
                                    <a href="{{ route('evento', ['id' => $evento->id]) }}" class="icono">
                                        <span  style='cursor: pointer' class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection