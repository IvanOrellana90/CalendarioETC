<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $fillable = ['nombre','numero_estudiantes','sigla','faculty_id','teacher_id','student_id'];

    public function events()
    {
        return $this->hasMany('App\Event');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }

    public function faculty()
    {
        return $this->belongsTo('App\Faculty');
    }

    public function student()
    {
        return $this->belongsTo('App\Student', 'student_id');
    }
}
