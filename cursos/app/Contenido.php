<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    protected $fillable = ['Descripcion'];
/*Relacion de uno a muchos inversa, contenido pertenece a un nivel*/
    public function nivel()
    {
        return $this->belongsTo('App\Nivel');
    }
}
