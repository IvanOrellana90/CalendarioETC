<div class="modal fade" id="editarCurso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form class="form-horizontal" action="{{ route('editarCurso') }}" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="form-group">
                        <label for="curso" class="col-sm-2 control-label"><h4 class="modal-title" id="myModalLabel">Editar</h4></label>
                        <div class="col-md-8">
                            <select name="id" id="curso" class="form-control" required>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="facultad" class="col-sm-2 control-label">Facultad</label>
                        <div class="col-md-8">
                            <select name="facultad" id="facultad" class="form-control" required>
                                @foreach($faculties as $faculty)
                                    <option value="{{ $faculty->id }}">{{ $faculty->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="nombre" id="nombre" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="numero_estudiantes" class="col-sm-2 control-label">Número</label>
                        <div class="col-md-2">
                            <input class="form-control" type="text" name="numero_estudiantes" id="numero_estudiantes" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sigla" class="col-sm-2 control-label">Sigla</label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" name="sigla" id="sigla" >
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </div>
        </div>
    </form>
</div>