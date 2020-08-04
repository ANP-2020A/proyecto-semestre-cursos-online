<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['description'];
    /*Relacion de uno a muchos inversa, contenido pertenece a un nivel*/
    public function level()
    {
        return $this->belongsTo('App\Level');
    }
}
