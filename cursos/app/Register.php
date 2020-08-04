<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Register extends Model
{
    protected $guarded = ['progress','score'];

    public function certificate()
    {
        return $this->hasMany('App\Certificate');
    }

    public function level()
    {
        return $this->belongsToMany('App\Level','records')->withPivot('date_record','score','comment');
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($registers) {
            $registers->user_id = Auth::id();
        });
    }
}
