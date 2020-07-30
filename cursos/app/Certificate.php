<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = ['Descrip_cert'];

    /*Relaciones de uno a muchos inversa, un certificado pertenece a un registro*/
    public function registro()
    {
        return $this->belongsTo('App\Registro');
    }
}
