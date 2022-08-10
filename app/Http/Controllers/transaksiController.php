<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Transaksi;
use App\LapBayar;
use App\JenisBayar;
use App\Tunggakan;
use App\Kas;
use Illuminate\Support\Facades\DB; 

class transaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transaksi.transaksi');
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table siswa sesuai pencarian data
        $siswa = Siswa::where('noInduk','like',"%".$cari."%")->first();
        $tapel = array('2021/2022','2022/2023','2023/2024','2024/2025','2025/2026');

        $kelas = Siswa::where('noInduk','like',"%".$cari."%")->value('kelas');
        $tapelsiswa = Siswa::where('noInduk','like',"%".$cari."%")->value('tapel');
        $transaksi = Transaksi::where('noInduk','like',"%".$cari."%")
                     ->where('kelas',$kelas)
                     ->where('tapel',$tapelsiswa)
                     ->get();

        $nominal = array();
        $nominal0 = JenisBayar::where('kelas',$kelas)
                     ->where('tapel',$tapelsiswa)
                     ->where('jenisBayar','Pendaftaran')
                     ->value('nominal');
                     array_push($nominal,$nominal0);
        $nominal1 = JenisBayar::where('kelas',$kelas)
                     ->where('tapel',$tapelsiswa)
                     ->where('jenisBayar','Seragam')
                     ->value('nominal');
                     array_push($nominal,$nominal1);
        $nominal2 = JenisBayar::where('kelas',$kelas)
                     ->where('tapel',$tapelsiswa)
                     ->where('jenisBayar','Alat Tulis')
                     ->value('nominal');
                     array_push($nominal,$nominal2);
        $nominal3 = JenisBayar::where('kelas',$kelas)
                     ->where('tapel',$tapelsiswa)
                     ->where('jenisBayar','Ekstrakurikuler')
                     ->value('nominal');
                     array_push($nominal,$nominal3);
        $nominal4 = JenisBayar::where('kelas',$kelas)
                     ->where('tapel',$tapelsiswa)
                     ->where('jenisBayar','LKS 1')
                     ->value('nominal');
                     array_push($nominal,$nominal4);
        $nominal5 = JenisBayar::where('kelas',$kelas)
                     ->where('tapel',$tapelsiswa)
                     ->where('jenisBayar','LKS 2')
                     ->value('nominal');
                     array_push($nominal,$nominal5);
        
        
        if($transaksi->isEmpty()){
            $tunggakan = array('Pendaftaran','Seragam','Alat Tulis','Ekstrakurikuler','LKS 1','LKS 2');
            
            $totaltunggakan = JenisBayar::where('kelas',$kelas)
                            ->where('tapel',$tapelsiswa)
                            ->whereNotIn('jenisBayar',['SPP'])
                            ->sum('nominal');
            return view('transaksi.transaksixz',['siswa'=>$siswa,'tapel'=>$tapel, 'nominal'=>$nominal,'tunggakan'=>$tunggakan,'totaltunggakan'=>$totaltunggakan]);
        }else{
            $tunggakanx = Tunggakan::where('noInduk','like',"%".$cari."%")
                     ->where('kelas',$kelas)
                     ->where('tapel',$tapelsiswa)
                     ->pluck('tunggakan');
            $tunggakany = explode(",", $tunggakanx);
            $tunggakan = preg_replace("/[^a-zA-Z0-9]/", "", $tunggakany);
            $totaltunggakan = Tunggakan::where('noInduk','like',"%".$cari."%")
                     ->where('kelas',$kelas)
                     ->where('tapel',$tapelsiswa)
                     ->value('total');

            $terbayarx = LapBayar::where('noInduk','like',"%".$cari."%")
                     ->where('kelas',$kelas)
                     ->where('tapel',$tapelsiswa)
                     ->pluck('terbayar');   
            $terbayary = explode(',', $terbayarx);
            $terbayar = preg_replace("/[^a-zA-Z0-9]/", "", $terbayary);
            $totalterbayar = LapBayar::where('noInduk','like',"%".$cari."%")
                     ->where('kelas',$kelas)
                     ->where('tapel',$tapelsiswa)
                     ->value('total');      
        }
        /*dd($tunggakan);*/
        return view('transaksi.transaksix',['siswa'=>$siswa,'tapel'=>$tapel,
            'nominal0'=>$nominal0,
            'nominal1'=>$nominal1,
            'nominal2'=>$nominal2,
            'nominal3'=>$nominal3,
            'nominal4'=>$nominal4,
            'nominal5'=>$nominal5,
            'tunggakan'=>$tunggakan,'totaltunggakan'=>$totaltunggakan,'terbayar'=>$terbayar,'totalterbayar'=>$totalterbayar]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi/dipilih !!!',
            'unique' => ':attribute tidak boleh ganda',
        ];
        $this->validate($request,[
            'tanggal' => 'required',
            'tapel' => 'required',          
        ],$messages);
        
        $id          = $request->id;
        $nama        = $request->nama;
        $noInduk     = $request->noInduk;
        $kelas       = $request->kelas;
        $pendaftaran = $request->pendaftaran;
        $seragam     = $request->seragam;
        $atk         = $request->atk;
        $bulan       = $request->bulan;
        $ekskul      = $request->ekskul;
        
        $tanggalx   = $request->tanggal;
        $pecah      = explode('/', $tanggalx);
        $tanggal    = $pecah[0];
        $bulan      = $pecah[1];
        $tahun      = $pecah[2];
        $newTanggal = $tahun.'/'.$bulan.'/'.$tanggal;
        
        $tapel      = $request->tapel;
        $lks1       = $request->lks1;
        $lks2       = $request->lks2;

        $pendaftaranstatus = Transaksi::where('noInduk',$noInduk)
                         ->where('kelas',$kelas)
                         ->where('tapel',$tapel)
                         ->value('ketpendaftaran');
        if($pendaftaran != null or $pendaftaranstatus =='lunas'){
            $pendaftaranz = 'Pendaftaran';
            $ketpendaftaran = 'lunas';
        }else{
            $ketpendaftaran = null;
            $pendaftaranz = null;
        }

        $seragamstatus = Transaksi::where('noInduk',$noInduk)
                         ->where('kelas',$kelas)
                         ->where('tapel',$tapel)
                         ->value('ketseragam');
        if($seragam != null or $seragamstatus =='lunas'){
            $seragamz = 'Seragam';
            $ketseragam = 'lunas';
        }else{
            $seragamz = null;
            $ketseragam = null;
        }

        $atkstatus = Transaksi::where('noInduk',$noInduk)
                         ->where('kelas',$kelas)
                         ->where('tapel',$tapel)
                         ->value('ketatk');
        if($atk != null or $atkstatus =='lunas'){
            $atkz = 'Alat Tulis';
            $ketatk = 'lunas';
        }else{
            $atkz = null;
            $ketatk = null;
        }

        $ekskulstatus = Transaksi::where('noInduk',$noInduk)
                         ->where('kelas',$kelas)
                         ->where('tapel',$tapel)
                         ->value('ketekskul');
        if($ekskul != null or $ekskulstatus =='lunas'){
            $ekskulz = 'Ekstrakurikuler';
            $ketekskul = 'lunas';
        }else{
            $ekskulz = null;
            $ketekskul = null;
        }

        $lks1status = Transaksi::where('noInduk',$noInduk)
                         ->where('kelas',$kelas)
                         ->where('tapel',$tapel)
                         ->value('ketlks1');
        if($lks1 != null or $lks1status =='lunas'){
            $lks1z = 'LKS 1';
            $ketlks1 = 'lunas';
        }else{
            $lks1z = null;
            $ketlks1 = null;
        }

        $lks2status = Transaksi::where('noInduk',$noInduk)
                         ->where('kelas',$kelas)
                         ->where('tapel',$tapel)
                         ->value('ketlks2');
        if($lks2 != null or $lks2status =='lunas'){
            $lks2z = 'LKS 2';
            $ketlks2 = 'lunas';
        }else{
            $lks2z = null;
            $ketlks2 = null;
        }
        
        //input ke tabel transaksi
        $transaksisiswa = Transaksi::where('noInduk',$noInduk)
                         ->where('kelas',$kelas)
                         ->where('tapel',$tapel)
                         ->get();
        if($transaksisiswa->isEmpty()){
        Transaksi::create([
            'nama'        =>$nama,
            'noInduk'     =>$noInduk,
            'kelas'       =>$kelas,
            'pendaftaran' =>$pendaftaran,
            'seragam'     =>$seragam,
            'atk'         =>$atk,
            'ekskul'      =>$ekskul,
            'tanggal'     =>$newTanggal,
            'tapel'       =>$tapel,
            'lks1'        =>$lks1,
            'lks2'        =>$lks2,
            'ketpendaftaran' =>$ketpendaftaran,
            'ketseragam'     =>$ketseragam,
            'ketatk'         =>$ketatk,
            'ketekskul'      =>$ketekskul,
            'ketlks1'        =>$ketlks1,
            'ketlks2'        =>$ketlks2
        ]);
        }else{
            DB::table('transaksis')
                ->where('noInduk',$noInduk)
                 ->where('kelas',$kelas)
                 ->where('tapel',$tapel)
                 ->update(array(
                    'ketpendaftaran' =>$ketpendaftaran,
                    'ketseragam'     =>$ketseragam,
                    'ketatk'         =>$ketatk,
                    'ketekskul'      =>$ketekskul,
                    'ketlks1'        =>$ketlks1,
                    'ketlks2'        =>$ketlks2
                ));
        }

        //input ke tabel laporan pembayaran
        $terbayar = array($pendaftaranz,$seragamz,$atkz,$ekskulz,$lks1z,$lks2z);
        $totalterbayar = $pendaftaran+$seragam+$atk+$ekskul+$lks1+$lks2;

        $siswaterbayar = LapBayar::where('noInduk',$noInduk)
                         ->where('kelas',$kelas)
                         ->where('tapel',$tapel)
                         ->get();
        if($siswaterbayar->isEmpty()){
            LapBayar::create([
                'nama'        =>$nama,
                'noInduk'     =>$noInduk,
                'kelas'       =>$kelas,
                'tapel'       =>$tapel,
                'terbayar'    =>implode(",", $terbayar),
                'total'       =>$totalterbayar
            ]);
            Tunggakan::create([
                'nama'        =>$nama,
                'noInduk'     =>$noInduk,
                'kelas'       =>$kelas,
                'tapel'       =>$tapel,
                'tunggakan'   =>'kosong',
                'total'       =>'1'
            ]);
        }else{
            $totalLapBayar = LapBayar::where('noInduk',$noInduk)
                         ->where('kelas',$kelas)
                         ->where('tapel',$tapel)
                         ->value('total');
            $updateTotal = $totalLapBayar+$totalterbayar;
            DB::table('lap_bayars')
                ->where('noInduk',$noInduk)
                ->where('kelas',$kelas)
                ->where('tapel',$tapel)
                ->update(array(
                    'terbayar'=> implode(",", $terbayar),
                    'total' => $updateTotal
                ));
        }

        //Input ke Kas
        $debet      = Kas::sum('debet');
        $kredit     = Kas::sum('kredit');
        $totalkas   = $debet-$kredit;
        $totalkasfix = $totalkas+$totalterbayar;
        Kas::create([
            'tapel' => $tapel,
            'tanggal' => $newTanggal,
            'uraian' =>'Pembayaran a.n'.' '.$nama,
            'debet' => $totalterbayar,
            'total' => $totalkasfix
        ]);

        //input ke tabel tunggakan
        $statusdaftar = Transaksi::where('noInduk',$noInduk)
                        ->where('kelas',$kelas)
                        ->where('tapel',$tapel)
                        ->value('ketpendaftaran');
        if($statusdaftar == null){
            $utgpendaftaran = JenisBayar::where('jenisBayar','Pendaftaran')
                            ->where('kelas',$kelas)
                            ->where('tapel',$tapel)
                            ->value('nominal');
            $ket1 = 'Pendaftaran'; 
        }else{
            $utgpendaftaran = null;
            $ket1 = null; 
        }

        $statusseragam = Transaksi::where('noInduk',$noInduk)
                        ->where('kelas',$kelas)
                        ->where('tapel',$tapel)
                        ->value('ketseragam');

        if($statusseragam == null){
            $utgseragam = JenisBayar::where('jenisBayar','Seragam')
                            ->where('kelas',$kelas)
                            ->where('tapel',$tapel)
                            ->value('nominal');
            $ket2 = 'Seragam';

        }else{
            $utgseragam = null;
            $ket2 = null;
        }
        
        $statusatk = Transaksi::where('noInduk',$noInduk)
                        ->where('kelas',$kelas)
                        ->where('tapel',$tapel)
                        ->value('ketatk');
        if($statusatk == null){
            $utgatk = JenisBayar::where('jenisBayar','Alat Tulis')
                            ->where('kelas',$kelas)
                            ->where('tapel',$tapel)->value('nominal');
            $ket3 = 'Alat Tulis';
        }else{
            $utgatk = null;
            $ket3 = null;
        }

        $statusekskul = Transaksi::where('noInduk',$noInduk)
                        ->where('kelas',$kelas)
                        ->where('tapel',$tapel)
                        ->value('ketekskul');
        if($statusekskul == null){
            $utgekskul =JenisBayar::where('jenisBayar','Ekstrakurikuler')
                            ->where('kelas',$kelas)
                            ->where('tapel',$tapel)->value('nominal');
            $ket4 = 'Ekstrakurikuler';
        }else{
            $utgekskul = null;
            $ket4 = null;
        }

        $statuslks1 = Transaksi::where('noInduk',$noInduk)
                        ->where('kelas',$kelas)
                        ->where('tapel',$tapel)
                        ->value('ketlks1');
        if($statuslks1 == null){
            $utglks1 = JenisBayar::where('jenisBayar','LKS 1')
                            ->where('kelas',$kelas)
                            ->where('tapel',$tapel)->value('nominal');
            $ket5 = 'LKS 1';
        }else{
            $utglks1 = null;
            $ket5 = null;
        }

        $statuslks2 = Transaksi::where('noInduk',$noInduk)
                        ->where('kelas',$kelas)
                        ->where('tapel',$tapel)
                        ->value('ketlks2');
        if($statuslks2 == null){
            $utglks2 = JenisBayar::where('jenisBayar','LKS 2')
                            ->where('kelas',$kelas)
                            ->where('tapel',$tapel)->value('nominal');
            $ket6 = 'LKS 2';
        }else{
             $utglks2 = null;
            $ket6 = null;
        }

        $tunggakan = array($ket1,$ket2,$ket3,$ket4,$ket5,$ket6);
        $totaltunggakan = $utgpendaftaran+$utgseragam+$utgatk+$utgekskul+$utglks1+$utglks2;

        DB::table('tunggakans')
                ->where('noInduk',$noInduk)
                ->where('kelas',$kelas)
                ->where('tapel',$tapel)
                ->update(array(
                    'tunggakan'=> implode(",", $tunggakan),
                    'total' => $totaltunggakan
                ));
        
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
