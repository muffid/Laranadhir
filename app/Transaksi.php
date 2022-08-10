<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable =['nama','noInduk','kelas','pendaftaran','seragam','atk','spp','ekskul','tanggal','tapel','lks1','lks2','ketpendaftaran','ketseragam','ketatk','ketekskul','ketlks1','ketlks2'];
}
