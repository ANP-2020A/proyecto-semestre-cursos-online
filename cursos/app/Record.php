<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = ['date_record', 'score','comment'];
    public function answer()
    {
        return $this->belongsToMany('App\Answer','select_answers')->withPivot('selection','value');
    }
}
