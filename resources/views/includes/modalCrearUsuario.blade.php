<div class="modal fade" id="crearUsaurio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form class="form-horizontal" action="{{ route('signup') }}" method="post">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Crear Usuario</h4>
                </div>
                <div class="modal-body">
                    <div class="boxCrear">
                        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                            <label for="nombre">Nombre</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ Request::old('nombre') }}" required>
                        </div>
                        <div class="form-group {{ $errors->has('apellido_paterno') ? 'has-error' : '' }}">
                            <label for="apellido_paterno">Apellido Paterno</label>
                            <input class="form-control" type="text" name="apellido_paterno" id="apellido_paterno" value="{{ Request::old('apellido_paterno') }}" required>
                        </div>
                        <div class="form-group {{ $errors->has('apellido_materno') ? 'has-error' : '' }}">
                            <label for="apellido_materno">Apellido Materno</label>
                            <input class="form-control" type="text" name="apellido_materno" id="apellido_materno" value="{{ Request::old('apellido_materno') }}">
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">Email</label>
                            <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}" required>
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}" required>
                            <label for="password">Password</label>
                            <input class="form-control" type="text" name="password" id="password" value="{{ Request::old('password') }}" >
                        </div>
                        <div class="form-group {{ $errors->has('rut') ? 'has-error' : '' }}">
                            <div class="row">
                                <div class="col-md-10">
                                    <label for="rut">Rut</label>
                                    <input class="form-control" type="text" name="rut" id="rut" value="{{ Request::old('rut') }}" required>
                                </div>
                                <div class="col-md-2 margenUp {{ $errors->has('rut_v') ? 'has-error' : '' }}">
                                    <input class="form-control" type="text" name="rut_v" id="rut_ver" value="{{ Request::old('rut_v')}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('celular') ? 'has-error' : '' }}" required>
                            <label for="celular">Celular</label>
                            <input class="form-control" type="text" name="celular" id="celular" value="{{ Request::old('celular') }}" >
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                    <button class="btn btn-primary" name="ingresar" type="submit">Ingresar</button>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                </div>
            </div>
        </div>
    </form>
</div>