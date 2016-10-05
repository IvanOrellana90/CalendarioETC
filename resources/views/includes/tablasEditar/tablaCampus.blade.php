<table id="tablaCampus" class="table table-bordered table-hover" >
    <thead style="cursor: pointer;">
    <th>Nombre</th>
    <th>Dirección</th>
    </thead>
    <tbody>
    @foreach($campuses as $campus)
        <tr>
            <td>{{ $campus->nombre }}</td>
            <td>{{ $campus->direccion }}</td>
            <td>
                <a href="{{ route('vistaEditarCampus', ['id' => $campus->id]) }}" class="icono">
                    <span  style='cursor: pointer' class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>