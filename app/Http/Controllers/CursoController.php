<?php

namespace App\Http\Controllers;

use App\Course;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Teacher;
use App\Faculty;

class CursoController extends Controller
{
    public function vistaEditarCurso($id)
    {
        $course = Course::where('id', $id)->first();
        $teachers = Teacher::all();
        $faculties = Faculty::all();
        $students = Student::all();

        return view('editar.editarCurso',[
            'teachers' => $teachers,
            'faculties' => $faculties,
            'students' => $students,
            'course' => $course,
        ]);
    }

    public function ingresar(Request $request)
    {
        $this->validate($request, [
            'facultad' => 'required',
            'nombre' => 'required|max:80',
            'numero_estudiantes' => 'required|integer',
            'sigla' => 'required|max:10',
        ]);

        $facultad = $request['facultad'];
        $nombre = $request['nombre'];
        $numero_estudiantes = $request['numero_estudiantes'];
        $sigla = $request['sigla'];
        $docente = Auth::user()->id;


        $course = new Course();
        $course->faculty_id = $facultad;
        $course->nombre = $nombre;
        $course->numero_estudiantes = $numero_estudiantes;
        $course->sigla = $sigla;
        $course->teacher_id = $docente;

        $mensaje = "OPS! Ocurrio un problema!";
        $class = "alert-danger";

        if($course->save()) {
            $mensaje = "Curso: ".$course->nombre." ".$course->sigla." creado correctamente!";
            $class = "alert-success";
        }

        return redirect()->back()->with(['message' => $mensaje, 'class' => $class]);
    }

    public function editar(Request $request)
    {
        $this->validate($request, [
            'faculty_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'nombre' => 'required|max:80',
            'numero_estudiantes' => 'required|integer',
            'sigla' => 'required',
        ]);

        $id = $request['id'];

        $course = Course::where('id',$id)->first();

        $input = $request->all();

        $mensaje = "OPS! Ocurrio un problema!";
        $class = "alert-danger";

        if($course->fill($input)->save()) {
            $mensaje = "Curso: ".$course->nombre." ".$course->sigla." editado correctamente!";
            $class = "alert-success";
        }

        return redirect()->back()->with(['message' => $mensaje, 'class' => $class]);
    }

    public function borrarInscripcion($student_id,$course_id)
    {
        $course = Course::where('id', $course_id)->first();
        $ayudante = Student::where('id', $student_id)->first();

        $mensaje = "OPS! Ocurrio un problema!";
        $class = "alert-danger";

        if($course->student_id == '') {
            $mensaje = "OPS! El curso no cuenta con un ayudante!";
        } else {
            $course->student_id = '';
            if($course->save()) {

                $title = "Desincripción curso: " .$course->sigla;
                $content = "El curso: ".$course->sigla." Fue desincrito por el Ayudante: ".$ayudante->user->rut."-".$ayudante->user->rut_v;
                $subject = "Desincripción: Evaluación Temprana de Curso (ETC)";

                $this->enviarEmailAdmin($title, $content, $subject);
                
                $mensaje = "Curso: ".$course->nombre." ".$course->sigla." desincrito correctamente!";
                $class = "alert-success";
            }
        }

        return redirect()->back()->with(['message' => $mensaje, 'class' => $class]);
    }

    public function inscribirAyudante($user_id,$course_id)
    {
        $course = Course::where('id', $course_id)->first();
        $student = Student::where('user_id', $user_id)->first();

        $mensaje = "OPS! Ocurrio un problema!";
        $class = "alert-danger";

        print_r($user_id);

        $student_id = $student->id;

        if($course->student_id == '') {
            $course->student_id = $student_id;
            if($course->save()) {

                $title = "Inscripción curso: " .$course->sigla;
                $content = "El curso: ".$course->sigla." Fue incrito por el Ayudante: ".$course->student->user->rut."-".$course->student->user->rut_v;
                $subject = "Inscripción: Evaluación Temprana de Curso (ETC)";

                $this->enviarEmailAdmin($title, $content, $subject);

                $mensaje = "Curso: ".$course->nombre." ".$course->sigla." inscrito correctamente!";
                $class = "alert-success";
            }
        } else {
            $mensaje = "OPS! El curso ya cuenta con un ayudante!";
        }

        return redirect()->back()->with(['message' => $mensaje, 'class' => $class]);
    }

    public function tomaAyudante($course)
   {

        $user = User::where('id', Auth::user()->id)->first();
        $destinatario = $course->teacher->user->email;
        echo $destinatario;

        $title = "Inscripción alumno: ".$user->rut."-".$user->rut_v;
        $content = 'El alumno: '.$user->rut."-".$user->rut_v.'se ha inscrito como ayudante para su curso: '.$course->sigla;

        Mail::send('emails.send', ['title' => $title, 'content' => $content, 'destinatario' => $destinatario], function ($message) use ($destinatario)
        {

            $message->from('trinidadgonzalez@uc.cl', 'Trinidad Gonzalez');

            $message->to($destinatario);

        });
   }

   public function enviarEmailAdmin($title, $content, $subject)
   {
        Mail::send('emails.confirmacionDocente', ['title' => $title, 'content' => $content], function($message) use ($subject)
        {
            $message->subject($subject);
            $message->to('etc.cddoc@uc.cl');
        });
   }
}