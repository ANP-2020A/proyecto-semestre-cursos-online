<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Nivel extends Model
{
    protected $fillable = ['Titulo','Numero', 'Descripcion'];
    /*Relaciones de uno a muchos, un nivel tiene muchos contenidos y preguntas*/


    public function contenido()
    {
        return $this->hasMany('App\Contenido');
    }
    public function preguntas()
    {
        return $this->hasMany('App\Preguntas');
    }
    /*Relaciones de uno a muchos inversa, un nivel pertenece a un curso*/
    public function cursos()
    {
        return $this->belongsTo('App\Cursos');
    }
    public function registro()
    {
        return $this->belongsToMany('App\Registro','historials')->withPivot('FechaHistorial','Calificacion','Comentario');
    }
}
