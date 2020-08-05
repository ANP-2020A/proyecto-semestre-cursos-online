<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\Auth;

class Level extends Model
{
    protected $fillable = ['title','number', 'description'];
    /*Relaciones de uno a muchos, un nivel tiene muchos contenidos y preguntas*/


    public function course()
    {
        return $this->belongsTo('App\Course');
    }
    public function content()
    {
        return $this->hasMany('App\Content');
    }
    public function question()
    {
        return $this->hasMany('App\Question');
    }
    /*Relaciones de uno a muchos inversa, un nivel pertenece a un curso*/

    public function register()
    {
        return $this->belongsToMany('App\Register','records')->withPivot('date_record','score','comment');
    }
}
