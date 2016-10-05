<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
	protected $fillable = ['nombre'];

    public function teachers()
    {
        return $this->hasMany('App\Teacher');
    }

    public function courses()
    {
        return $this->hasMany('App\Course');
    }
}
