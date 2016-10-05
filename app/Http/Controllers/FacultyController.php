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
use App\Campus;

class FacultyController extends Controller
{
	public function vistaEditarFacultad($id)
	{
		$faculty = Faculty::where('id', $id)->first();

        return view('editar.editarFacultad',[
            'faculty' => $faculty,
        ]);
	}

	public function editar(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'id' => 'required',
        ]);

        $id = $request['id'];

        $faculty = Faculty::where('id',$id)->first();

        $input = $request->all();

        $mensaje = "OPS! Ocurrio un problema!";
        $class = "alert-danger";

        if($faculty->fill($input)->save()) {
            $mensaje = "Facultad: ".$faculty->nombre." editada correctamente!";
            $class = "alert-success";
        }

        return redirect()->back()->with(['message' => $mensaje, 'class' => $class]);
    }
}