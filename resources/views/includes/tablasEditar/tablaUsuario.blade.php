<table id="tablaUsuario" class="table table-bordered table-hover" >
    <thead style="cursor: pointer;">
    <th>Email</th>
    <th>Nombre</th>
    <th>Apellidos</th>
    <th>Rut</th>
    <th>Celular</th>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->email }}</td>
            <td>{{ $user->nombre }}</td>
            <td>{{ $user->apellido_paterno ." ". $user->apellido_materno}}</td>
            <td>{{ $user->rut ."-". $user->rut_v }}</td>
            <td>{{ $user->celular}}</td>
            <td>
                <a href="{{ route('vistaEditarUsuario', ['id' => $user->id]) }}" class="icono">
                    <span  style='cursor: pointer' class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>