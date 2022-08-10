<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $table = "sekolahs";
    protected $fillable = ['id','kepsek','nip','sekolah','alamat','kelurahan','kecamatan','kabupaten','provinsi'];

    public function province()
    {
    	return $this->belongsTo('Laravolt\Indonesia\Models\Province');
    }
}
