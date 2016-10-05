<div class="modal fade" id="editarEvento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form class="form-horizontal" action="{{ route('editarEvento') }}" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="form-group">
                        <label for="curso" class="col-sm-2 control-label"><h4 class="modal-title" id="myModalLabel">Editar</h4></label>
                        <div class="col-md-8">
                            <select name="id" id="evento" class="form-control" required>
                                @foreach($courses as $course)
                                    @foreach($course->events as $event)
                                        <option value="{{ $event->id }}">{{ substr($event->fecha, 0, 10) ." Modulo: ". $event->modulo }}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                    </div>
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
                        <label for="campus" class="col-sm-2 control-label">Lugar</label>
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
                        <div class='col-md-4 input-group date' id='fecha1'>
                            <input name="textoFecha" type='text' class="form-control" id="textoFecha"  required >
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modulo" class="col-sm-2 control-label">Módulo</label>
                        <div class="col-md-2">
                            <select name="modulo" id="modulo" class="form-control" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="momento" class="col-sm-2 control-label">Momento</label>
                        <div class="col-md-4">
                            <select name="momento" id="momento" class="form-control" required>
                                <option value="Inicio">Inicio</option>
                                <option value="Final">Final</option>
                            </select>
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