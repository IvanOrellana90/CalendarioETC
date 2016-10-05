<?php

namespace App\Http\Controllers;

use App\Campus;
use App\Course;
use App\Event;
use App\Faculty;
use App\Student;
Use App\User;
use Illuminate\Support\Facades\Auth;
use PhpParser\PrettyPrinter\Standard;

class AyudanteController extends Controller
{
    public function getHome()
    {
        $student = User::where('id',Auth::user()->id)->get();

        return view('ayudanteInicio',[
            'student' => $student
        ]);
    }
}