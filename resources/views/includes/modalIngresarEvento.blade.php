<div class="modal fade" id="ingresarEvento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form class="form-horizontal" action="{{ route('ingresarEvento') }}" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Ingresar Evento</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="curso" class="col-sm-2 control-label">Curso</label>
                        <div class="col-md-8">
                            <select name="curso" id="curso" class="form-control" required>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="campus" class="col-sm-2 control-label">Campus</label>
                        <div class="col-md-8">
                            <select name="campus" id="campus" class="form-control" required>
                                @foreach($campuses as $campus)
                                    <option value="{{ $campus->id }}">Campus {{ $campus->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fecha" class="col-sm-2 control-label">Fecha</label>
                        <div class='col-md-4 input-group date' id='fecha'>
                            <input name="textoFecha" type='text' class="form-control" id="textoFecha"  required >
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modulo" class="col-sm-2 control-label">Hora</label>
                        <div class="col-md-4">
                            <input name="hora" type='text' class="form-control" id="hora"  required >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="momento" class="col-sm-2 control-label">Sala</label>
                        <div class="col-md-4">
                            <input name="sala" type='text' class="form-control" id="sala"  required >
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                </div>
            </div>
        </div>
    </form>
</div>