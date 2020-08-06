<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
    protected $fillable = ['name', 'description', 'type', 'date_start','num_level'];
    /*Relacion de uno a muchos, un curso tiene varios niveles*/
    public function level()
    {
        return $this->hasMany('App\Level');
    }
    /*Relacion de uno a muchos inversa, un curso pertenece a un usuario*/

    public function user()
    {
        return $this->belongsToMany('App\User','registers')->withPivot('progress','score');
    }
    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($courses) {
            $courses->user_id = Auth::id();
        });
    }
}
