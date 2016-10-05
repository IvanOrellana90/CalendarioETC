<table id="tablaFacultad" class="table table-bordered table-hover" >
    <thead style="cursor: pointer;">
    <th>Nombre</th>
    </thead>
    <tbody>
    @foreach($faculties as $faculty)
        <tr>
            <td>{{ $faculty->nombre }}</td>
            <td>
                <a href="{{ route('vistaEditarFacultad', ['id' => $faculty->id]) }}" class="icono">
                    <span  style='cursor: pointer' class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>