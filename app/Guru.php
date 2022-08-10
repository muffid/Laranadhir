<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = ['user_id','nama','nuptk','jabatan','jenkel','ket','foto','detail'];

    public function gaji()
    {
        return $this->hasOne('App\Gaji');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
