<h3>Eventos</h3>
<!-- Aqui va la tabla! -->
<table id="tablaAdmin" class="table table-bordered table-hover" >
    <thead style="cursor: pointer;">
    <th>Fecha</th>
    <th>Hora</th>
    <th>Sala</th>
    <th>Curso</th>
    <th>Tablets</th>
    <th>Campus</th>
    <th>Rut</th>
    <th>Docente</th>
    <th>Ayudante</th>
    </thead>
    <tbody>
    @foreach($eventos as $evento)
        <tr>
            <td>{{ substr($evento->fecha, 0, 10) }}</td>
            <td>{{ $evento->hora }}</td>
            <td>{{ $evento->sala}}</td>
            <td>{{ $evento->course->nombre }}</td>
            <td>{{ ceil($evento->course->numero_estudiantes/5)}}</td>
            <td>{{ $evento->campus->nombre}}</td>
            <td>{{ $evento->course->teacher->user->rut."-".$evento->course->teacher->user->rut_v }}</td>
            <td>
                <a href="{{ route('perfilID', ['id' => $evento->course->teacher->user->id]) }}" class="icono">
                    {{ $evento->course->teacher->user->nombre ." ". $evento->course->teacher->user->apellido_paterno }}
                </a>
            </td>
            @if($evento->course->student_id != '')
                <td>
                    <a href="{{ route('perfilID', ['id' => $evento->course->student->user->id]) }}" class="icono">
                        {{ $evento->course->student->user->nombre ." ". $evento->course->student->user->apellido_paterno }}
                    </a>
                </td>
            @else
                <td>No Inscrito</td>
            @endif
            <td class=iconos>
                <div class='divIconos'>
                    <a href="{{ route('borrarEvento', ['id' => $evento->id]) }}" class="icono">
                        <span  style='cursor: pointer' class='glyphicon glyphicon-trash' aria-hidden='true'></span>
                    </a>
                    <a href="{{ route('evento', ['id' => $evento->id]) }}" class="icono">
                        <span  style='cursor: pointer' class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
                    </a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>