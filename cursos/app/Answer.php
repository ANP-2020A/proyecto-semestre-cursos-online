<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['description','correct'];

    /*Relaciones de uno a muchos inversa, una respuesta pertenece a una pregunta*/
    public function question()
    {
        return $this->belongsTo('App\Question');
    }
    public function record()
    {
        return $this->belongsToMany('App\Record','select_answers')->withPivot('selection','value');
    }
}
