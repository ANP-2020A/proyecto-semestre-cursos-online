<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $fillable = ['FechaHistorial', 'Calificacion','Comentario'];
    public function answer()
    {
        return $this->belongsToMany('App\Answer','select_answers')->withPivot('Select_Resp','Nota_rs');;
    }
}
