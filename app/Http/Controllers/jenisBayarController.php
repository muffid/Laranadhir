<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisBayar;
use RealRashid\SweetAlert\Facades\Alert;

class jenisBayarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisBayar = JenisBayar::orderBy('jenisBayar','asc')->get();
        return view('jenisBayar.jenisBayar',['jenisBayar'=>$jenisBayar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis = array('Pendaftaran','Seragam','Alat Tulis','SPP','Ekstrakurikuler','LKS 1','LKS 2');
        $kelas = array('A','A1','A2','B','B1','B2');
        $tapel = array('2021/2022','2022/2023','2023/2024','2024/2025','2025/2026');

        return view('jenisBayar.tambahJenis',['jenis'=>$jenis,'kelas'=>$kelas,'tapel'=>$tapel]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi/dipilih !!!',
            'unique' => ':attribute tidak boleh ganda',
        ];
        $this->validate($request,[
            'jenis_pembayaran' => 'required',
            'nominal' => 'required',
            'kelas' => 'required',
            'tapel' => 'required',            
        ],$messages);

        $jenisBayar = $request->jenis_pembayaran;
        $nominalx   = $request->nominal;
        $nominal    = str_replace(",","", $nominalx);
        $kelas      = $request->kelas;
        $tapel      = $request->tapel;
        $ket        = $request->keterangan;

        JenisBayar::create([
            'jenisBayar' =>$jenisBayar,
            'nominal'    =>$nominal,
            'kelas'      =>$kelas,
            'tapel'      =>$tapel,
            'ket'        =>$ket
        ]);

        Alert::success('Sukses', 'Data tersimpan');
        return redirect('/jenisPembayaran');
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
        $jenisBayar =JenisBayar::find($id);
        $jenis = array('Pendaftaran','Seragam','Alat Tulis','SPP','Ekstrakurikuler','LKS 1','LKS 2');
        $kelas = array('A','A1','A2','B','B1','B2');
        $tapel = array('2021/2022','2022/2023','2023/2024','2024/2025','2025/2026');

        return view('jenisBayar.editJenis',['jenisBayar'=>$jenisBayar,'jenis'=>$jenis,'kelas'=>$kelas,'tapel'=>$tapel]);
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
        $messages = [
            'required' => ':attribute wajib diisi/dipilih !!!',
            'unique' => ':attribute tidak boleh ganda',
        ];
        $this->validate($request,[
            'nominal' => 'required',       
        ],$messages);

        $jenisBayarreq = $request->jenis_pembayaran;
        $kelas         = $request->kelas;
        $tapel         = $request->tapel;
        $nominalx      = $request->nominal;
        $nominal       = str_replace(",","", $nominalx);

        $jenisBayar = JenisBayar::find($id);
        if($jenisBayarreq == null){
            $jenisBayarreq = $jenisBayar->jenisBayar;
        }
        $jenisBayar->jenisBayar = $jenisBayarreq;

        $jenisBayar->nominal = $nominal;

        if($kelas == null){
            $kelas = $jenisBayar->kelas;
        }
        $jenisBayar->kelas = $kelas;

        if($tapel == null){
            $tapel = $jenisBayar->tapel;
        }
        $jenisBayar->tapel = $tapel;

        $jenisBayar->ket = $request->keterangan;
        $jenisBayar->save();

        Alert::success('Sukses', 'Perubahan tersimpan');
        return redirect('/jenisPembayaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JenisBayar::where('id',$id)->delete();

        Alert::success('Sukses', 'Data Telah Terhapus');
        return redirect('/jenisPembayaran');
    }
}
