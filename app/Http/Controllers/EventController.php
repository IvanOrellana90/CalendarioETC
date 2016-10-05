<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\Auth;
use App\Campus;
use App\Course;
use App\User;
use App\Faculty;

class EventController extends Controller
{
    public function index()
    {
        $data = array(); //declaramos un array principal que va contener los datos
        $id = Event::all()->lists('id'); //listamos todos los id de los eventos
        $lugar = Event::all()->lists('campus'); //lo mismo para lugar y fecha
        $fecha = Event::all()->lists('fecha');
        $count = count($id); //contamos los ids obtenidos para saber el numero exacto de eventos

        //hacemos un ciclo para anidar los valores obtenidos a nuestro array principal $data
        for ($i = 0; $i < $count; $i++) {
            $data[$i] = array(
                "title" => $lugar[$i]->nombre, //obligatoriamente "title", "start" y "url" son campos requeridos
                "start" => $fecha[$i], //por el plugin asi que asignamos a cada uno el valor correspondiente
                "url" => "http://146.155.61.196/calendarioETC/public/evento/" . $id[$i],
                "description" => "Curso: "
                //en el campo "url" concatenamos el el URL con el id del evento para luego
                //en el evento onclick de JS hacer referencia a este y usar el método show
                //para mostrar los datos completos de un evento

            );
        }

        json_encode($data); //convertimos el array principal $data a un objeto Json

        return $data; //para luego retornarlo y estar listo para consumirlo

    }

    public function eventosAdmin()
    {
        $data = array();
        $events = Event::all();
        $i = 0;

        foreach($events as $evento) {

            if($evento->campus->nombre == 'Campus San Joaquín')
                $eventColor = '#5568AD';
            if($evento->campus->nombre == 'Campus Oriente')
                $eventColor = '#FFC400';
            if($evento->campus->nombre == 'Casa Central')
                $eventColor = '#F6832A';
            if($evento->campus->nombre == 'Campus Lo Contador')
                $eventColor = '#EE098F';
            if($evento->campus->nombre == 'Campus Villarrica')
                $eventColor = '#20A460';

            $data[$i] = array(
                "title" => $evento->course->sigla,
                "start" => $evento->fecha ." ". $evento->hora,
                "color" => $eventColor,
                "url" => "http://146.155.61.196/calendarioETC/public/evento/" . $evento->id,
                "description" => "Curso: " .$evento->course->nombre.
                    "\nDocente: " .$evento->course->teacher->user->nombre .
                    " " .$evento->course->teacher->user->apellido_paterno .
                    "\n". $evento->campus->nombre
            );
            $i++;
        }

        json_encode($data);

        return $data;

    }

    public function eventosDocente()
    {
        $data = array();
        $cursos = Course::where('teacher_id', Auth::user()->id)->get();
        $i = 0;
        
        foreach ($cursos as $curso) {
            foreach($curso->events as $evento) {

                if($evento->campus->nombre == 'Campus San Joaquín')
                    $eventColor = '#5568AD';
                if($evento->campus->nombre == 'Campus Oriente')
                    $eventColor = '#FFC400';
                if($evento->campus->nombre == 'Casa Central')
                    $eventColor = '#F6832A';
                if($evento->campus->nombre == 'Campus Lo Contador')
                    $eventColor = '#EE098F';
                if($evento->campus->nombre == 'Campus Villarrica')
                    $eventColor = '#20A460';

                $data[$i] = array(
                    "title" => $evento->course->sigla,
                    "start" => $evento->fecha ." ". $evento->hora,
                    "color" => $eventColor,
                    "url" => "http://146.155.61.196/calendarioETC/public/evento/" . $evento->id,
                    "description" => "Curso: " .$evento->course->nombre.
                        "\nDocente: " .$evento->course->teacher->user->nombre .
                        " " .$evento->course->teacher->user->apellido_paterno .
                        "\n". $evento->campus->nombre
                );
                $i++;
            }
        }

        json_encode($data); 

        return $data; 

    }

    public function eventosAyudante()
    {
        $data = array();
        $cursos = Course::where('student_id', '')->get();
        $i = 0;

        foreach ($cursos as $curso) {
            foreach($curso->events as $evento) {

                if($evento->campus->nombre == 'Campus San Joaquín')
                    $eventColor = '#5568AD';
                if($evento->campus->nombre == 'Campus Oriente')
                    $eventColor = '#FFC400';
                if($evento->campus->nombre == 'Casa Central')
                    $eventColor = '#F6832A';
                if($evento->campus->nombre == 'Campus Lo Contador')
                    $eventColor = '#EE098F';
                if($evento->campus->nombre == 'Campus Villarrica')
                    $eventColor = '#20A460';

                $data[$i] = array(
                    "title" => $evento->course->sigla,
                    "start" => $evento->fecha ." ". $evento->hora,
                    "color" => $eventColor,
                    "url" => "http://146.155.61.196/calendarioETC/public/evento/" . $evento->id,
                    "description" => "Curso: " .$evento->course->nombre.
                        "\nDocente: " .$evento->course->teacher->user->nombre .
                        " " .$evento->course->teacher->user->apellido_paterno .
                        "\n". $evento->campus->nombre
                );
                $i++;
            }
        }

        json_encode($data);

        return $data;

    }

    public function getEvento($id)
    {
        $evento = Event::where('id', $id)->first();
        $campuses = Campus::all();
        $faculties = Faculty::all();
        $courses = Course::where('teacher_id', Auth::user()->id)->get();
        $user = User::where('id', Auth::user()->id)->first();

        return view('evento',[
            'evento' => $evento,
            'faculties' => $faculties,
            'campuses' => $campuses,
            'courses' => $courses,
            'user' => $user
        ]);
    }

    public function getEventos()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $eventos = Event::all();
        $campuses = Campus::all();
        $faculties = Faculty::all();
        $courses = Course::where('teacher_id', Auth::user()->id)->get();

        return view('eventos',[
            'eventos' => $eventos,
            'faculties' => $faculties,
            'campuses' => $campuses,
            'courses' => $courses,
            'user' => $user
        ]);
    }

    public function borrar($id)
    {
        $event = Event::where('id', $id)->first();

        $fecha = substr($event->fecha, 0, 10);

        $mensaje = "OPS! Ocurrio un problema!";
        $class = "alert-danger";

        if($event->delete()) {
            $mensaje = "Evento: ".$fecha." eliminado correctamente!";
            $class = "alert-success";
        }

        return redirect()->back()->with(['message' => $mensaje, 'class' => $class]);
    }

    public function ingresar(Request $request)
    {
        $this->validate($request, [
            'curso' => 'required',
            'campus' => 'required',
            'fecha' => 'required',
            'sala' => 'required',
            'hora' => 'required',
        ]);

        $event = new Event();

        $input = $request->all();

        $mensaje = "OPS! Ocurrio un problema!";
        $class = "alert-danger";

        if($event->fill($input)->save()) {
            $mensaje = "Evento: ".$event->fecha." creado correctamente!";
            $class = "alert-success";
        }

        return redirect()->back()->with(['message' => $mensaje, 'class' => $class]);
    }

    public function editar(Request $request)
    {
        $this->validate($request, [
            'course_id' => 'required',
            'campus_id' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
            'sala' => 'required',
        ]);

        $id = $request['id'];

        $event = Event::where('id',$id)->first();

        $input = $request->all();

        $mensaje = "OPS! Ocurrio un problema!";
        $class = "alert-danger";

        if($event->fill($input)->save()) {
            $mensaje = "Evento: ".$event->fecha." editado correctamente!";
            $class = "alert-success";
        }

        return redirect()->back()->with(['message' => $mensaje, 'class' => $class]);
    }

    public function vistaEditarEvento($id)
    {
        $event = Event::where('id', $id)->first();
        $campuses = Campus::all();
        $faculties = Faculty::all();
        $courses = Course::all();

        return view('editar.editarEvento',[
            'event' => $event,
            'faculties' => $faculties,
            'campuses' => $campuses,
            'courses' => $courses,
        ]);
    }
}
