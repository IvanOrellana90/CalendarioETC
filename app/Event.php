<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = ['fecha','sala','descripcion','hora','campus_id','course_id'];
    protected $hidden = ['id'];

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function campus()
    {
        return $this->belongsTo('App\Campus');
    }
}
