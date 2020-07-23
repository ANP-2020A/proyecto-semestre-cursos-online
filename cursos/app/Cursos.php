<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    protected $fillable = ['Nombre', 'Descripcion', 'Tipo', 'FechaInicio','Niveles'];
}
