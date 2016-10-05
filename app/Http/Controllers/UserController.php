<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\Student;
use App\Teacher;
use App\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function postSignUp(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|exists:emails,email|unique:users,email|required|min:5',
            'password' => 'required|min:5',
            'nombre' => 'required|max:80',
            'apellido_paterno' => 'required|max:80',
            'rut' => 'required|max:8|min:7',
            'rut_v' => 'required|max:1',
        ]);

        $email = $request['email'];
        $password = bcrypt($request['password']);
        $nombre = $request['nombre'];
        $apellido_paterno = $request['apellido_paterno'];
        $apellido_materno = $request['apellido_materno'];
        $rut = $request['rut'];
        $rut_v = $request['rut_v'];
        $celular = $request['celular'];
        $tipo = 'Ayudante';

        $user = new User();
        $user->email = $email;
        $user->nombre = $nombre;
        $user->apellido_paterno = $apellido_paterno;
        $user->apellido_materno = $apellido_materno;
        $user->rut = $rut;
        $user->rut_v = $rut_v;
        $user->password = $password;
        $user->celular = $celular;
        $user->tipo = $tipo;

        $mensaje = "OPS! Ocurrio un problema!";
        $class = "alert-danger";

        if($user->save()) {

            $usuario = User::where('email',$user->email)->first();

            $student = new Student();
            $student->user_id = $usuario->id;

            if($student->save()) {
                $mensaje = "Ayudante: ".$usuario->nombre." ".$usuario->apellido_paterno." creado correctamente!";
                $class = "alert-success";

                return redirect()->back()->with(['message' => $mensaje, 'class' => $class]);
            }
        }

        return redirect()->back()->with(['message' => $mensaje, 'class' => $class]);
    }

    public function postSignIn(Request $request)
    {

        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->route('inicio');
        }
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function getInicio()
    {
        $user = Auth::user()->tipo;

        if ($user == 'Docente')
            return  redirect()->route('docente');
        elseif ($user == 'Ayudante')
            return redirect()->route('ayudante');
        elseif ($user == 'Admin')
            return redirect()->route('admin');
        else
            return redirect()->back();
    }

    public function getPerfil()
    {
        $user = User::where('id', Auth::user()->id)->first();
        
        return view('perfil',[
            'user' => $user,
        ]);
    }

    public function getPerfilID($id)
    {
        if(Auth::user()->tipo == 'Admin') {
            $user = User::where('id', $id)->first();
        } else {
            $user = User::where('id', Auth::user()->id)->first();
        }
        
        return view('perfil',[
            'user' => $user,
        ]);
    }

    public function vistaEditarUsuario($id)
    {
        $user = User::where('id', $id)->first();

        return view('editar.editarUsuario',[
            'user' => $user,
        ]);
    }

    public function editar(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'email' => 'required',
            'id' => 'required',
        ]);

        $id = $request['id'];

        $user = User::where('id',$id)->first();

        $input = $request->all();

        $mensaje = "OPS! Ocurrio un problema!";
        $class = "alert-danger";

        if($user->fill($input)->save()) {
            $mensaje = "Usuario: ".$user->rut."-".$user->rut_v." editado correctamente!";
            $class = "alert-success";
        }

        return redirect()->back()->with(['message' => $mensaje, 'class' => $class]);
    }

     
}