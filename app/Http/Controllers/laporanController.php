<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LapBayar;
use App\Tunggakan;
use App\Spp;
use App\Siswa;
use App\Guru;
use App\Gaji;

class laporanController extends Controller
{
    public function pembayaran()
    {
        $kelas = array('A','A1','A2','B','B1','B2');
        return view('laporan.laporanbayar',['kelas'=>$kelas]);
    }

    public function caribayar(Request $request)
    {
        $kelas = array('A','A1','A2','B','B1','B2');
        $cari = $request->kelas;

        $lapBayar = LapBayar::where('kelas','like',"%".$cari."%")->get();
        return view('laporan.laporanbayar2',['kelas'=>$kelas,'lapBayar'=>$lapBayar]);
    }

    public function tunggakan()
    {
         $kelas = array('A','A1','A2','B','B1','B2');
        return view('laporan.laporantunggakan',['kelas'=>$kelas]);
    }

    public function caritunggakan(Request $request)
    {
        $kelas = array('A','A1','A2','B','B1','B2');
        $cari = $request->kelas;

        $lapTunggakan = Tunggakan::where('kelas','like',"%".$cari."%")->get();
        return view('laporan.laporantunggakan2',['kelas'=>$kelas,'lapTunggakan'=>$lapTunggakan]);
    }

    public function spp()
    {
        return view('laporan.laporanspp');
    }

    public function carispp(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table siswa sesuai pencarian data
        $siswa = Siswa::where('noInduk','like',"%".$cari."%")->first();
        // mencari id siswa pada tabel siswa
        $idsiswa = Siswa::where('noInduk','like',"%".$cari."%")->value('id');

        //menampilkan spp dimana idsiswa spp sama dengan id siswa
        $spp = Spp::where('idsiswa',$idsiswa)->get();

        return view('laporan.laporanspp2',['siswa'=>$siswa,'spp'=>$spp]);
    }

    public function gaji()
    {
        return view('laporan.laporangaji');
    }

    public function carigaji(Request $request)
    {
         // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table guru sesuai pencarian data
        $guru = Guru::where('nama','like',"%".$cari."%")->first();
        // mencari id guru pada tabel guru
        $idguru = Guru::where('nama','like',"%".$cari."%")->value('id');

        //menampilkan gaji dimana idguru gaji sama dengan id guru
        $gaji = Gaji::where('guru_id',$idguru)->get();

        return view('laporan.laporangaji2',['guru'=>$guru,'gaji'=>$gaji]);
    }
}
