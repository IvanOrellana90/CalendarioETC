<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
	protected $fillable = ['nombre','direccion'];

    public function events()
    {
        return $this->hasMany('App\Event');
    }
}
