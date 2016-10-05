<?php

namespace App\Http\Controllers;

use App\Campus;
use App\Course;
use App\Event;
use App\Faculty;
use Illuminate\Support\Facades\Auth;

class DocenteController extends Controller
{
    public function getHome()
    {
        $campuses = Campus::all();
        $faculties = Faculty::all();
        $courses = Course::where('teacher_id', Auth::user()->id)->get();

        return view('docenteInicio',[
            'faculties' => $faculties,
            'campuses' => $campuses,
            'courses' => $courses
        ]);
    }
}