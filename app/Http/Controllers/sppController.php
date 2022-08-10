<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Siswa;
use App\JenisBayar;
use App\Spp;
use App\Kas;

class sppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('spp.spp');
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table siswa sesuai pencarian data
        $siswa = Siswa::where('noInduk','like',"%".$cari."%")->first();
        $kelas = Siswa::where('noInduk','like',"%".$cari."%")->value('kelas');
        $idsiswa = Siswa::where('noInduk','like',"%".$cari."%")->value('id');
        $tapelsiswa = Siswa::where('noInduk','like',"%".$cari."%")->value('tapel');

        $nominaljenisBayar = JenisBayar::where('jenisBayar','SPP')
                     ->where('kelas',$kelas)
                     ->where('tapel',$tapelsiswa)
                     ->value('nominal');
        $biayaspp = $nominaljenisBayar;

        $spp = Spp::where('idsiswa',$idsiswa)->get();
        if(empty($siswa)){
            Alert::error('Jangan nyari yang sudah nggak ada', 'carilah yang benar benar ada saja, yang pengertian, nggak papa nggak sempurna yang penting bisa idup bahagia');
            return redirect()->back()->with('sukses','Data Telah Terhapus');
        }
        return view('spp.tabelSpp',['siswa'=>$siswa,'biayaspp'=>$biayaspp,'spp'=>$spp]);

    }

    public function buatTabel(Request $request)
    {
        //variabel untuk menampung inputan dari form
        $id     = $request->id;
        $noInduk = $request->noInduk;
        $nama   = $request->nama;
        $kelas  = $request->kelas;
        $tapel  = $request->tapel;
        /*dd($tahun);*/
        $biaya  = $request->biaya;
        $tanggal = $request->tanggal;

        // Membuat Array untuk menampung bulan bahasa indonesia
            $bulanIndo = array(
                '01' => 'Januari',
                '02' => 'Februari',
                '03' => 'Maret',
                '04' => 'April',
                '05' => 'Mei',
                '06' => 'Juni',
                '07' => 'Juli',
                '08' => 'Agustus',
                '09' => 'September',
                '10' => 'Oktober',
                '11' => 'November',
                '12' => 'Desember'
                );
        $cektapelspp=Spp::where('idsiswa',$id)->value('tapel');
        $cektapelsiswa= $tapel;
        if($cektapelsiswa != $cektapelspp)
        {
            for($i=0; $i<12; $i++){
                $jatuhtempo = date("Y-m-d", strtotime("+$i month", strtotime($tanggal)));

                $bulan = $bulanIndo[date('m', strtotime($jatuhtempo))]." ".date('Y',strtotime($jatuhtempo));
                $cekbulan = date('Y', strtotime($jatuhtempo))."-".date('m',strtotime($jatuhtempo));
                Spp::create([
                    'idsiswa' => $id,
                    'tapel' => $tapel,
                    'bulan' => $bulan,
                    'cekbulan'=> $cekbulan,
                    'biaya' => $biaya
                    ]); 
            }
        return back();
        }else{
            return back();
        }
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tglBayar = date("Y/m/d");
        //proses ke tabel spp
        DB::table('spps')
            ->where('id',$id)
            ->update(['tanggal' =>$tglBayar,'ket'=>'LUNAS']);

        //Input ke Kas
        $tapel         = Spp::where('id',$id)->value('tapel');
        $newTanggal    = Spp::where('id',$id)->value('tanggal');
        $bulan         = Spp::where('id',$id)->value('bulan');
        $idsiswa       = Spp::where('id',$id)->value('idsiswa');
        $nama          = Siswa::where('id',$idsiswa)->value('nama');
        $totalterbayar = Spp::where('id', $id)->value('biaya');

        $debet      = Kas::sum('debet');
        $kredit     = Kas::sum('kredit');
        $totalkas   = $debet-$kredit;
        $totalkasfix   = $totalkas+$totalterbayar;
        Kas::create([
            'tapel' => $tapel,
            'tanggal' => $newTanggal,
            'uraian' =>'Pembayaran SPP bulan'.' '.$bulan. 'a.n'.' '.$nama,
            'debet' => $totalterbayar,
            'total' => $totalkasfix
        ]);

        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
