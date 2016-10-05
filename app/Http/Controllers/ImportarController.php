<?php

namespace App\Http\Controllers;

use App\Course;
use App\Faculty;
use App\Teacher;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;
use Request;
use Session;
use Excel;
use App\Campus;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Event;
use DateTime;

ini_set('memory_limit', '-1');
set_time_limit(2000);

class ImportarController extends Controller
{
    public $num_facultades = 0;
    public $num_campuses = 0;
    public $num_teacher = 0;
    public $num_courses = 0;
    public $num_eventos = 0;
    public $num_fila = 0;
    public $error = 0;
    public $detalles = array();

    public function getImportar() {

        $detalles = array();

        return view('importar')->with(['detalles' => $detalles]);
    }

    public function upload() {

        $mensaje = "OPS! Ocurrio un problema!";
        $class = "alert-danger";

        // getting all of the post data
        $file = array('archivo' => Input::file('archivo'));
        // setting up rules
        $rules = array('archivo' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors

            return Redirect::to('importar')->withInput()->withErrors($validator);
        } else {
            // checking file is valid.
            if (Input::file('archivo')->isValid()) {
                $destinationPath = 'uploads'; // upload path
                $extension = Input::file('archivo')->getClientOriginalExtension(); // getting archivo extension
                $fileName = Input::file('archivo')->getClientOriginalName(); // renameing archivo


                Input::file('archivo')->move($destinationPath, $fileName); // uploading file to given path

                $file = $destinationPath.'/'.$fileName;

                $this->importarDatos($file);

                File::delete($file);

                $mensaje = "Archivo: ". Input::file('archivo')->getClientOriginalName() ." importado correctamente!";
                $class = "alert-success";

                return view('importar')->with(['message' => $mensaje, 'detalles' => $this->detalles , 'class' => $class]);
            }
            else {
                // sending back with error message.
                $mensaje = "Archivo no valido";
                return Redirect::to('importar')->with(['message' => $mensaje, 'class' => $class]);
            }
        }
    }

    public function importarDatos($file)
    {
        Excel::load($file, function($reader) {
            $results = $reader->get();

            array_push($this->detalles, "Facultades y campuses: ");

            foreach ($results as $result) {
                $this->createFaculty($result->facultad_docente);
                $this->createFaculty($result->facultad_curso);
                $this->createCampus($result->campus_curso);
            }

            $num_total = 0;

            array_push($this->detalles, " Docentes, cursos y eventos ");

            foreach ($results as $result) {

                if(strpos($result->rut_docente,'-') !== false) {
                    $rut_docente = explode('-', $result->rut_docente);
                    $this->createUser($rut_docente, $result);
                } else {
                    array_push($this->detalles, "Fila: " . $num_total . " Dato: 'rut_docente' INVALIDO ");
                }

                $num_total++;
                $this->num_fila++;
            }

            array_push($this->detalles, "");
            array_push($this->detalles, "De un total de ".$num_total." filas:");
            array_push($this->detalles, "");
            array_push($this->detalles, "Se importaron: ".$this->num_facultades." Facultades Nuevas ");
            array_push($this->detalles, "Se importaron: ".$this->num_campuses." Campuses Nuevos ");
            array_push($this->detalles, "Se importaron: ".$this->num_teacher." Profesores Nuevos ");
            array_push($this->detalles, "Se importaron: ".$this->num_courses." Cursos Nuevos ");
            array_push($this->detalles, "Se importaron: ".$this->num_eventos." Eventos Nuevos ");
        });
    }

    public function createCursoEvento($result) {
        $curso = Course::where('sigla', $result->sigla_curso)->first();
        if($curso == null) { // Verificar si el curso se creo con anterioridad
            $user = User::where(DB::raw('CONCAT(rut,"-",rut_v)'), $result->rut_docente)->first();
            if($user != null) {
                $teacher = Teacher::where('user_id', $user->id)->first();
                $curso = new Course();

                $faculty = Faculty::where('nombre', $result->facultad_curso)->first();

                $curso->nombre = $result->nombre_curso;
                $curso->numero_estudiantes = $result->estudiantes_curso;
                $curso->sigla = strtoupper($result->sigla_curso);
                $curso->faculty_id = $faculty->id;
                $curso->teacher_id = $teacher->id;
                $curso->student_id = '';

                // Se validan los datos del evento antes de crear un curso con su evento

                if(true) {
                    if($curso->save()) {
                        array_push($this->detalles, "Curso: ".$result->sigla_curso." creado correctamente -");
                        $this->num_courses++;

                        $campus = Campus::where('nombre', $result->campus_curso)->first();
                        $evento = new Event();

                        if($result->detalles_evento == null)
                            $evento->descripcion = '';
                        else
                            $evento->descripcion = $result->detalles_evento;

                        if(is_string($result->fecha_evento))
                            $evento->fecha = date("Y-m-d",strtotime($result->fecha_evento));
                        else
                            $evento->fecha = date_format($result->fecha_evento,'Y-m-d');

                        if(is_string($result->hora_evento))
                            $evento->hora = date("H:i:s",strtotime($result->hora_evento));
                        else
                            $evento->hora = date_format($result->hora_evento,'H:i:s');

                        $evento->sala = $result->sala_evento;
                        $evento->campus_id = $campus->id;
                        $evento->course_id = $curso->id;

                        if($evento->save()) {
                            array_push($this->detalles, "Evento: ".$evento->fecha." ".$evento->hora." creado correctamente ");
                            $class = "alert-success";
                            $this->num_eventos++;
                        } else {
                            array_push($this->detalles, "OPS! Ocurrio un problema con el Curso: ".$result->sigla_curso);
                            $class = "alert-danger";
                        }
                    } else {
                        array_push($this->detalles, "OPS! Ocurrio un problema con el Curso: ".$result->sigla_curso);
                        $class = "alert-danger";
                    }
                } else {
                    array_push($this->detalles, "Formato Fecha y/o Hora incorecctos. Fila: ".$this->num_fila);
                }
            } else {
                array_push($this->detalles, "No se logro encontrar al Docente con el Rut: ".$result->rut_docente);
            }
        } else {
            array_push($this->detalles, "Ya se encontraba ingresado el Curso: ".$result->sigla_curso." [Recuerde que la sigla debe ser UNICA] ");
        }
    }

    public function createCurso($result) {
        $curso = Course::where('sigla', $result->sigla_curso)->first();
        if($curso == null) {
            $user = User::where(DB::raw('CONCAT(rut,"-",rut_v)'), $result->rut_docente)->first();
            if($user != null) {
                $teacher = Teacher::where('user_id', $user->id)->first();
                $curso = new Course();

                $faculty = Faculty::where('nombre', $result->facultad_curso)->first();

                $curso->nombre = $result->nombre_curso;
                $curso->numero_estudiantes = $result->estudiantes_curso;
                $curso->sigla = strtoupper($result->sigla_curso);
                $curso->faculty_id = $faculty->id;
                $curso->teacher_id = $teacher->id;
                $curso->student_id = '';

                if($curso->save()) {
                    array_push($this->detalles, "Curso: ".$result->sigla_curso." creado correctamente ");
                    $class = "alert-success";
                } else {
                    array_push($this->detalles, "OPS! Ocurrio un problema con el Curso: ".$result->sigla_curso);
                    $class = "alert-danger";
                }
            } else {
                array_push($this->detalles, "No se loggro encontrar al Docente con el Rut: ".$result->rut_docente);
            }
        } else {
            array_push($this->detalles, "Ya se encontraba ingresado el Curso: ".$result->sigla_curso." [Recuerde que la sigla debe ser UNICA] ");
        }
    }

    public function createCampus($campus_name) {
        $campus_nuevo = Campus::where('nombre', $campus_name)->first();
        if($campus_nuevo == null) {
            $campus = new Campus();
            $campus->nombre = $campus_name;
            if($campus->save()) {
                array_push($this->detalles, "Campus: ".$campus_name." creado correctamente! ");
                $class = "alert-success";
                $this->num_campuses++;
            } else {
                array_push($this->detalles, "OPS! Ocurrio un problema al ingresar el Campus: ".$campus_name);
                $class = "alert-danger";
            }
        }
    }

    public function createFaculty($faculty_name) {
        $facultad_nueva = Faculty::where('nombre', $faculty_name)->first();
        if($facultad_nueva == null) {
            $faculty = new Faculty();
            $faculty->nombre = $faculty_name;
            if($faculty->save()) {
                array_push($this->detalles, "Facultad: ".$faculty->nombre." creada correctamente! ");
                $class = "alert-success";
                $this->num_facultades++;
            } else {
                array_push($this->detalles, "OPS! Ocurrio un problema al ingresar la Facultad: ".$faculty->nombre);
                $class = "alert-danger";
            }
        }
    }

    public function createUser($rut_docente, $result) {
        $user_antiguo = User::where('rut', $rut_docente[0])->first();
        if($user_antiguo == null) {
            $user = new User();
            if(strpos($result->apellidos_docente,' ') !== false) {
                $apellido_docente = explode(' ', $result->apellidos_docente);
                $user->apellido_paterno = ucfirst($apellido_docente[0]);
                $user->apellido_materno = ucfirst($apellido_docente[1]);
            } else {
                $user->apellido_paterno = ucfirst($result->apellidos_docente);
            }
            $user->email = strtolower($result->email_docente);
            $user->password = bcrypt($result->nombre.'-'.rand(1000000, 10000000));
            $user->nombre = ucfirst($result->nombre_docente);
            $user->rut = $rut_docente[0];
            $user->rut_v = $rut_docente[1];
            $user->celular = $result->celular_docente;
            $user->tipo = 'Docente';

            if($user->save()) {

                $faculty = Faculty::where('nombre',$result->facultad_docente)->first();
                $teacher = new Teacher();

                $teacher->user_id = $user->id;
                $teacher->anexo = $result->anexo_docente;
                $teacher->faculty_id = $faculty->id;

                if($teacher->save()) {
                    array_push($this->detalles, "Profesor: ".$user->rut." creado correctamente - ");
                    $this->num_teacher++;
                    $this->createCursoEvento($result);
                } else {
                    array_push($this->detalles, "OPS! Ocurrio un problema con el Profesor: ".$user->rut);
                    $class = "alert-danger";
                }
            } else {
                array_push($this->detalles, "OPS! Ocurrio un problema con el Usuario: ".$user->rut);
                $class = "alert-danger";
            }
        } else {
            array_push($this->detalles, "Ya se encontraba ingresado el Docente: ".$result->rut_docente." -");
            $this->createCursoEvento($result);
        }
    }
}