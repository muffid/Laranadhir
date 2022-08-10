<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LapBayar extends Model
{
    protected $fillable =['nama','noInduk','kelas','tapel','terbayar','total'];
}
