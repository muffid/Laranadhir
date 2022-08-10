<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Guru;
use App\Kas;

class dashboardController extends Controller
{
    public function index()
    {
        $jumlah_siswa = Siswa::count();
        $jumlah_guru = Guru::count();

        $month = date('m');
        $date = date('d');

        $income_thismonth = Kas::whereMonth('created_at',$month)->sum('debet');
        $income_today = Kas::whereDay('created_at',$date)->sum('debet');
        return view('dashboard.dashboard',['income_today'=>$income_today,'income_thismonth'=>$income_thismonth,'jumlah_siswa'=>$jumlah_siswa,'jumlah_guru'=>$jumlah_guru]);
    }
}
