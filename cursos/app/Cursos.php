<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cursos extends Model
{
    protected $fillable = ['Nombre', 'Descripcion', 'Tipo', 'FechaInicio','Niveles'];
    /*Relacion de uno a muchos, un curso tiene varios niveles*/
    public function nivel()
    {
        return $this->hasMany('App\Nivel');
    }
    /*Relacion de uno a muchos inversa, un curso pertenece a un usuario*/
    public function user()
    {
        return $this->belongsToMany('App\User','registros')->withPivot('avance','calificacion');
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($cursos) {
            $cursos->user_id = Auth::id();
        });
    }
}
