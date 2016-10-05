<?php

namespace App\Http\Controllers;

use App\Campus;
use App\Course;
use App\Event;
use App\Faculty;
use App\Student;
use App\User;
use Illuminate\Support\Facades\Auth;
use PhpParser\PrettyPrinter\Standard;

class AdminController extends Controller
{
    public function getHome()
    {
        $admin = User::where('id',Auth::user()->id)->get();

        return view('adminInicio',[
            'admin' => $admin
        ]);
    }

    public function getEditar()
    {
        $users = User::all();
        $eventos = Event::all();
        $courses = Course::all();
        $faculties = Faculty::all();
        $campuses = Campus::all();

        return view('editar',[
            'users' => $users,
            'eventos' => $eventos,
            'campuses' => $campuses,
            'faculties' => $faculties,
            'courses' => $courses 
        ]);
    }
}