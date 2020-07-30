<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preguntas extends Model
{
    protected $fillable = ['descripcion','valor'];
    /*Relaciones de uno a muchos, una pregunta tiene muchas respuestas*/
    public function answer()
    {
        return $this->hasMany('App\Asnwer');
    }
    /*Relaciones de uno a muchos inversa, una pregunta pertenece a un nivel*/
    public function nivel()
    {
        return $this->belongsTo('App\Nivel');
    }
}
