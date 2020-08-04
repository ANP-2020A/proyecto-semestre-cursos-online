<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = ['description'];

    /*Relaciones de uno a muchos inversa, un certificado pertenece a un registro*/
    public function register()
    {
        return $this->belongsTo('App\Register');
    }
}
