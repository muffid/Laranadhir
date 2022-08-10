<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = ['id','nama','noInduk','nisn','kelas','jenkel','tapel','foto','status'];

    public function spp()
    {
        return $this->hasOne('App\Spp');
    }
}
