<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Registro extends Model
{
    protected $guarded = ['avance','calificacion'];

    public function certificate()
    {
        return $this->hasMany('App\Certificate');
    }

    public function nivel()
    {
        return $this->belongsToMany('App\Nivel','historials')->withPivot('FechaHistorial','Calificacion','Comentario');
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($registros) {
            $registros->user_id = Auth::id();
        });
    }
}
