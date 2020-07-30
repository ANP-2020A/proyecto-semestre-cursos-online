<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['Descrip_Resp','Correct_Resp'];

    /*Relaciones de uno a muchos inversa, una respuesta pertenece a una pregunta*/
    public function preguntas()
    {
        return $this->belongsTo('App\Preguntas');
    }
    public function historial()
    {
        return $this->belongsToMany('App\Historial','select_answers')->withPivot('Select_Resp','Nota_rs');
    }
}
