<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['description','value'];
    /*Relaciones de uno a muchos, una pregunta tiene muchas respuestas*/
    public function answer()
    {
        return $this->hasMany('App\Answer');
    }
    /*Relaciones de uno a muchos inversa, una pregunta pertenece a un nivel*/
    public function level()
    {
        return $this->belongsTo('App\Level');
    }
}
