<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use App\Gaji;
use App\Kas;
use Image;
use File;

class gajiController extends Controller
{
    public function index()
    {
        $guru = Guru::all();
        return view('gaji.gaji',['guru'=>$guru]);
    }

    public function bayar($id)
    {
        $tapel = array('2021/2022','2022/2023','2023/2024','2024/2025','2025/2026');
        $bulan = array('Juli','Agustus','September','Oktober','November','Desember',
                        'Januari','Pebruari','Maret','April','Mei','Juni');
        $guru = Guru::where('id',$id)->first();
        return view('gaji.bayarGaji',['guru'=>$guru,'tapel'=>$tapel,'bulan'=>$bulan]);
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi/dipilih !!!',
            'unique' => ':attribute tidak boleh ganda',
        ];
        $this->validate($request,[
            'gaji'    => 'required',
            'tanggal' => 'required',
            'bulan'   => 'required',
            'tapel'   => 'required',            
        ],$messages);

        $id = $request->id; 

        $tanggalx   = $request->tanggal;
        $pecah      = explode('/', $tanggalx);
        $tanggal    = $pecah[0];
        $bulan      = $pecah[1];
        $tahun      = $pecah[2];
        $newTanggal = $tahun.'/'.$bulan.'/'.$tanggal;

        $gajix      = $request->gaji;
        $gaji       = str_replace(",","", $gajix);
        $tunjanganx = $request->tunjangan;
        $tunjangan  = str_replace(",","", $tunjanganx);
        $transportx = $request->transport;
        $transport  = preg_replace("/[^0-9]/", "", $transportx);

       if($gaji==""){
        $gaji = 0;
       }
       if($tunjangan==""){
        $tunjangan = 0;
       }
       if($transport==""){
        $transport = 0;
       }

        $total = (int)$gaji+(int)$tunjangan+(int)$transport;

        Gaji::create([
            'guru_id'   => $id,
            'tapel'     => $request->tapel,
            'bulan'     => $request->bulan,
            'tanggal'   => $newTanggal,
            'gaji'      => $gaji,
            'tunjangan' => $tunjangan,
            'transport' => $transport,
            'total'     => $total
        ]);

        //Input ke Kas
        $debet      = Kas::sum('debet');
        $kredit     = Kas::sum('kredit');
        $totalkas   = $debet-$kredit;
        $totalkasfix   = $totalkas-$total;
        Kas::create([
            'tapel' => $request->tapel,
            'tanggal' => $newTanggal,
            'uraian' =>'Pembayaran Gaji bulan'.' '.$request->bulan.' a.n'.' '.$request->nama,
            'kredit' => $total,
            'total' => $totalkasfix
        ]);
        $gajiguru = Gaji::all();
        return view('gaji.tampilGaji',['gajiguru'=>$gajiguru]);
    }
}
