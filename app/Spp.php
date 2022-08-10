<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    protected $fillable =['idsiswa','tapel','bulan','tanggal','biaya','ket','cekbulan'];

    public function siswa()
    {
        return $this->belongsTo('App\Siswa','idsiswa');
    }
}
