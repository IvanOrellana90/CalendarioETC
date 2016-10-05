<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    protected $fillable = ['nombre','email','password','apellido_paterno','apellido_materno','rut','rut_v','celular','tipo'];

    public function teachers()
    {
        return $this->hasMany('App\Teacher');
    }

    public function teacher()
    {
        return $this->hasOne('App\Teacher');
    }

    public function students()
    {
        return $this->hasMany('App\Student');
    }

    public function student()
    {
        return $this->hasOne('App\Student');
    }

    public function admins()
    {
        return $this->hasMany('App\Admin');
    }
}

