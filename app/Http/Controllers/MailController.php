<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Html\FormFacade;
use App\User;
use Mail;

class MailController extends Controller
{
    public function index()
    {
        return \View::make('contacto');
    }

    public function confirmacionDocente()
    {

        $users = User::where('rut','17698379')->get();

        foreach ($users as $user) {

            $title = "Recordatorio curso: **";
            $content = "El curso: ** Esta programado para: **";
            $email = $user->email;

            Mail::send('emails.confirmacionDocente', ['title' => $title, 'content' => $content], function($message) use ($user)
            {
                $message->subject("Recordatorio: Evaluación Temprana de Curso (ETC)");
                $message->to($user->email);
            });

        }
    }

    public function send(Request $request)
    {
       //guarda el valor de los campos enviados desde el form en un array

        $contactEmail = $request['email'];
        $contactSubject = $request['subject'];
        $contactBody = $request['body'];

        $data = array(
            'email'=>$contactEmail, 
            'subject'=>$contactSubject, 
            'body'=>$contactBody
        );

       Mail::send('emails.message', $data, function($message) use ($contactEmail, $contactBody, $contactSubject)
        {   
            $message->from($contactEmail);

            $message->subject($contactSubject);

            $message->to(env('CONTACT_MAIL'), env('CONTACT_NAME'));
        });

       return \View::make('success');
   }

   public function tomaAyudante($teacher_id)
   {

        $user = User::where('id', Auth::user()->id)->first();
        $teacher = Teacher::where('id', $teacher_id)->first();

        $title = "Inscripción alumno: ".$user->rut."-".$user->rut_v;
        $content = 'El alumno: '.$user->rut."-".$user->rut_v.'se ha inscrito como ayudante para su curso:';

        Mail::send('emails.send', ['title' => $title, 'content' => $content], function ($message)
        {

            $message->from('trinidadgonzalez@uc.cl', 'Trinidad Gonzalez');

            $message->to('ivan990@gmail.com');

        });

        return response()->json(['message' => 'Request completed']);

   }
}