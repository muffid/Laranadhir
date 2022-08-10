<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LapBayar;
use App\Tunggakan;
use App\Spp;
use App\Gaji;
use PDF;

class pdfController extends Controller
{
    public function cetak_pdf1($kelas)
    {
        $lapBayar = LapBayar::where('kelas',$kelas)->get();

        $pdf = PDF::loadview('laporan.lapbayar_pdf',['lapBayar'=>$lapBayar]);
        return $pdf->stream('laporan-pembayaran-pdf');
    }

    public function cetak_pdf2($kelas)
    {
        $lapTunggakan = Tunggakan::where('kelas',$kelas)->get();

        $pdf = PDF::loadview('laporan.laptunggakan_pdf',['lapTunggakan'=>$lapTunggakan]);
        return $pdf->stream('laporan-tunggakan-pdf');
    }

    public function cetak_pdf3($idsiswa)
    {
        $lapspp = Spp::where('idsiswa',$idsiswa)->get();
    
        $pdf = PDF::loadview('laporan.lapspp_pdf',['lapspp'=>$lapspp]);
        return $pdf->stream('laporan-spp-pdf');
    }

    public function cetak_pdf4($idguru)
    {
        $lapgaji = Gaji::where('guru_id',$idguru)->get();
    
        $pdf = PDF::loadview('laporan.lapgaji_pdf',['lapgaji'=>$lapgaji]);
        return $pdf->stream('laporan-gaji-pdf');
    }
}
