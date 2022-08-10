<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    protected $fillable =['guru_id','tapel','bulan','tanggal','gaji','tunjangan','transport','total'];

    public function guru()
    {
        return $this->belongsTo('App\Guru');
    }
}
