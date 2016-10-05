<table id="tablaEvento" class="table table-bordered table-hover" >
    <thead style="cursor: pointer;">
    <th>Fecha</th>
    <th>Hora</th>
    <th>Sala</th>
    <th>Curso</th>
    <th>Campus</th>
    <th>Descripción</th>
    </thead>
    <tbody>
    @foreach($eventos as $evento)
        <tr>
            <td>{{ substr($evento->fecha, 0, 10) }}</td>
            <td>{{ $evento->hora }}</td>
            <td>{{ $evento->sala}}</td>
            <td>{{ $evento->course->nombre }}</td>
            <td>{{ $evento->campus->nombre}}</td>
            <td>{{ $evento->descripcion }}
            <td>
                <a href="{{ route('vistaEditarEvento', ['id' => $evento->id]) }}" class="icono">
                    <span  style='cursor: pointer' class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>