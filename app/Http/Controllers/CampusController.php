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

class CampusController extends Controller
{
	public function vistaEditarCampus($id)
	{
		$campus = Campus::where('id', $id)->first();

        return view('editar.editarCampus',[
            'campus' => $campus,
        ]);
	}

	public function editar(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'id' => 'required',
        ]);

        $id = $request['id'];

        $campus = Campus::where('id',$id)->first();

        $input = $request->all();

        $mensaje = "OPS! Ocurrio un problema!";
        $class = "alert-danger";

        if($campus->fill($input)->save()) {
            $mensaje = "Campus: ".$campus->nombre." editado correctamente!";
            $class = "alert-success";
        }

        return redirect()->back()->with(['message' => $mensaje, 'class' => $class]);
    }
}