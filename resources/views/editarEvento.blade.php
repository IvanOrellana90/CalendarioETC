@extends('layouts.master')

@section('titleWeb')
    SistemaCDDOC
@endsection

@section('content')
    @if(Auth::user()->tipo == 'Docente')
        @include('includes.modalIngresarCurso')
        @include('includes.modalIngresarEvento')
    @endif

    <div class="informacionEvento">
        <div class="table-responsive">
            <form action = "{{ route('editarEvento') }}" method="post" id="editarForm">

                <input value="{{ $event->id }}" name="id" hidden >

            <div class="col-md-6">
                <div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
                    <label for="fecha">Fecha</label>
                    <div class='input-group date' id='fechaTexto'>
                        <input value ="{{ $event->fecha}}" name="fecha" type='text' class="form-control" id="fecha" value="" required >
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('campus_id') ? 'has-error' : '' }}">
                    <label for="campus_id">Campus</label>
                    <select name="campus_id" id="campus_id" class="form-control" required>
                        <option selected value ="{{ $event->campus->id }}">{{ $event->campus->nombre}}</option>
                        @foreach($campuses as $campus)
                            <option value="{{ $campus->id }}">{{ $campus->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group {{ $errors->has('sala') ? 'has-error' : '' }}">
                    <label for="sala">Sala</label>
                    <input value ="{{ $event->sala}}" class="form-control" type="text" name="sala" id="sala" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('hora') ? 'has-error' : '' }}">
                    <label for="hora">Hora</label>
                    <div class='input-group date' id='horaTexto'>
                        <input value ="{{ $event->hora}}" name="hora" type='text' class="form-control" id="hora" required >
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('course_id') ? 'has-error' : '' }}">
                    <label for="course_id">Curso</label>
                    <select name="course_id" id="course_id" class="form-control" required>
                            <option selected value ="{{ $event->course->id }}">{{ $event->course->nombre}}</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                    <label for="descripcion">Descripcion</label>
                    <textarea class="form-control" type="text" name="descripcion" id="descripcion" required>{{ $event->descripcion}}</textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btnDerecha">Editar</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}">

        </form>
        </div>
    </div>

@endsection