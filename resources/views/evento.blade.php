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
            <h3>Detalles del evento</h3>
            @if($user->tipo == 'Ayudante' && ($evento->course->student_id == '' ||  $evento->course->student_id == 0))
                <div>
                    <a id="btnInscribir" class="btn btn-primary btnInscribir" href="{{ route('inscribirAyudante',['user_id' => $user->id, 'course_id' => $evento->course->id]) }}">Inscribirme</a>
                </div>
                @endif
            <!-- Aqui va la tabla! -->
            <table id="" class="table table-bordered table-hover">
                <tbody>
                <tr>
                    <td class="columnaDato">Fecha</td>
                    <td>{{ $evento->fecha }}</td>
                </tr>
                <tr>
                    <td class="columnaDato">Hora</td>
                    <td>{{ $evento->hora }}</td>
                </tr>
                <tr>
                    <td class="columnaDato">Modulo</td>
                    <td>{{ $evento->sala }}</td>
                </tr>
                <tr>
                    <td class="columnaDato">Campus</td>
                    <td>{{ $evento->campus->nombre }}</td>
                </tr>
                <tr>
                    <td class="columnaDato">Nombre del Docente</td>
                    <td>{{ $evento->course->teacher->user->nombre . " " . $evento->course->teacher->user->apellido_paterno }}</td>
                </tr>
                <tr>
                    <td class="columnaDato">Email del Docente</td>
                    <td>{{ $evento->course->teacher->user->email }}</td>
                </tr>
                <tr>
                    <td class="columnaDato">Nombre del Curso</td>
                    <td>{{ $evento->course->nombre }}</td>
                </tr>
                <tr>
                    <td class="columnaDato">Unidad Academica</td>
                    <td>{{ $evento->course->faculty->nombre }}</td>
                </tr>
                <tr>
                    <td class="columnaDato">Numero de estudiantes</td>
                    <td>{{ $evento->course->numero_estudiantes }}</td>
                </tr>
                <tr>
                    <td class="columnaDato">Sigla del Curso</td>
                    <td>{{ $evento->course->sigla }}</td>
                </tr>
                <tr>
                    <td class="columnaDato">Sala</td>
                    <td>{{ $evento->sala }}</td>
                </tr>
                <tr>
                    <td class="columnaDato">Detalle</td>
                    <td>{{ $evento->descripcion }}</td>
                </tr>
                <tr>
                    <td class="columnaDato">N° Tablets</td>
                    <td>{{ ceil($evento->course->numero_estudiantes/5) }}</td>
                </tr>
                @if($evento->course->student_id != '')
                    <tr>
                        <td class="columnaDato">Ayudante</td>
                        <td>{{ $evento->course->student->user->nombre ." ". $evento->course->student->user->apellido_paterno }}</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <a href="{{ route('pdfEvento', ['id' => $evento->id]) }}"> Exportar a PDF </a>
        </div>
    </div>
@endsection