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
            <form action = "{{ route('editarCurso') }}" method="post" id="editarForm">

                <input value="{{ $course->id }}" name="id" hidden >

            <div class="col-md-6">
                <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                    <label for="nombre">Nombre</label>
                    <input value ="{{ $course->nombre}}" class="form-control" type="text" name="nombre" id="nombre" >
                </div>
                <div class="form-group {{ $errors->has('sigla') ? 'has-error' : '' }}">
                    <label for="sigla">Sigla</label>
                    <input value ="{{ $course->sigla}}" class="form-control" type="text" name="sigla" id="sigla" >
                </div>
                <div class="form-group {{ $errors->has('numero_estudiantes') ? 'has-error' : '' }}">
                    <label for="numero_estudiantes">N° Estudiantes</label>
                    <input value ="{{ $course->numero_estudiantes}}" class="form-control" type="text" name="numero_estudiantes" id="numero_estudiantes" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('faculty_id') ? 'has-error' : '' }}">
                    <label for="faculty_id">Facultad</label>
                    <select name="faculty_id" id="faculty_id" class="form-control" required>
                            <option selected value ="{{ $course->faculty->id }}">{{ $course->faculty->nombre}}</option>
                        @foreach($faculties as $faculty)
                            <option value="{{ $faculty->id }}">{{ $faculty->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group {{ $errors->has('teacher_id') ? 'has-error' : '' }}">
                    <label for="teacher_id">Docente</label>
                    <select name="teacher_id" id="teacher_id" class="form-control" required>
                            <option selected value ="{{ $course->teacher->id }}">{{ $course->teacher->user->rut}}</option>
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->user->rut }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group {{ $errors->has('student_id') ? 'has-error' : '' }}">
                    <label for="student_id">Ayudante</label>
                    <select name="student_id" id="student_id" class="form-control">
                        @if($course->student_id != '')
                            <option selected value ="{{ $course->student->id }}">{{ $course->student->user->nombre ." ". $course->student->user->apellido_paterno ." - ". $course->student->user->rut }}</option>
                        @endif
                        <option value="">Ayudante no Definido</option>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}">{{ $student->user->nombre ." ". $student->user->apellido_paterno ." - ". $student->user->rut }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btnDerecha">Editar</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}">

        </form>
        </div>
    </div>

@endsection