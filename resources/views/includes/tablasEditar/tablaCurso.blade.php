<table id="tablaCurso" class="table table-bordered table-hover" >
    <thead style="cursor: pointer;">
    <th>Nombre</th>
    <th>Estudiantes</th>
    <th>Sigla</th>
    <th>Facultad</th>
    <th>Docente</th>
    <th>Ayudante</th>
    </thead>
    <tbody>
    @foreach($courses as $course)
        <tr>
            <td>{{ $course->nombre }}</td>
            <td>{{ $course->numero_estudiantes }}</td>
            <td>{{ $course->sigla }}</td>
            <td>{{ $course->faculty->nombre }}</td>
            <td>{{ $course->teacher->user->rut }}</td>
            @if($course->student_id != '')
                <td> {{ $course->student->user->rut }} </td>
            @else
                <td>No Inscrito</td>
            @endif
            <td>
                <a href="{{ route('vistaEditarCurso', ['id' => $course->id]) }}" class="icono">
                    <span  style='cursor: pointer' class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>