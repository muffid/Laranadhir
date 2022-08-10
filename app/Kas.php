<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kas extends Model
{
    protected $fillable =['tapel','tanggal','uraian','debet','kredit','total'];
}
