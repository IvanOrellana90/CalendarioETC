<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function courses()
    {
        return $this->hasMany('App\Course');
    }

    public function faculty()
    {
        return $this->belongsTo('App\Faculty');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
