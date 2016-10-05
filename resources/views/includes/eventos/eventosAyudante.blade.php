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
    @foreach($user->student->courses as $course)
        @foreach($course->events as $evento)
            <tr>
                <td>{{ $evento->fecha }}</td>
                <td>{{ $evento->hora }}</td>
                <td>{{ $evento->course->nombre}}</td>
                <td>{{ $evento->sala}}</td>
                <td>{{ $evento->campus->nombre }}</td>
                <td class=iconos>
                    <div class='divIconos'>
                        <a href="{{ route('borrarInscripcion', ['student_id' => $evento->course->student_id, 'course_id' => $evento->course->id]) }}" class="icono">
                            <span  style='cursor: pointer' class='glyphicon glyphicon-trash' aria-hidden='true'></span>
                        </a>
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