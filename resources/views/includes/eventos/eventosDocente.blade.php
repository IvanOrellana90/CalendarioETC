<h3>Eventos</h3>
<!-- Aqui va la tabla! -->
<table id="" class="table table-bordered table-hover">
    <thead>
    <th>Fecha</th>
    <th>Hora</th>
    <th>Sala</th>
    <th>Curso</th>
    </thead>
    <tbody>
    @foreach($user->teacher->courses as $course)
        @foreach($course->events as $evento)
            <tr>
                <td>{{ substr($evento->fecha, 0, 10) }}</td>
                <td>{{ $evento->hora }}</td>
                <td>{{ $evento->sala}}</td>
                <td>{{ $evento->course->nombre }}</td>
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
    @endforeach
    </tbody>
</table>