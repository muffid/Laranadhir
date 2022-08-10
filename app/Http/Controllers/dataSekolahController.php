<?php

namespace App\Http\Controllers;

use App\Sekolah;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;
use RealRashid\SweetAlert\Facades\Alert;

class dataSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_sekolah = Sekolah::all();
        $provinces = Province::pluck('name', 'id');
        if(empty($data_sekolah))
        {
            return view('masterData.createDataSekolah',['provinces' => $provinces,]);
        }

        return view ('masterData.dataSekolah', [
            'provinces' => $provinces,
            'data_sekolah' => $data_sekolah,
        ]);
    }

    public function getkabupaten(Request $request)
    {
        $cities = City::where('province_id', $request->get('id'))
            ->pluck('name', 'id');
    
        return response()->json($cities);
    }

    public function getkecamatan(Request $request)
    {
        $district = District::where('city_id', $request->get('id'))
            ->pluck('name', 'id');
    
        return response()->json($district);
    }

    public function getdesa(Request $request)
    {
        $village = Village::where('district_id', $request->get('id'))
            ->pluck('name','id');

        return response()->json($village);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $provinsi = Province::where('id',$request->province)->value('name');
       $kabupaten = City::where('id',$request->city)->value('name');
       $kecamatan = District::where('id',$request->district)->value('name');
       $kelurahan = Village::where('id',$request->village)->value('name');
       Sekolah::create([
        'kepsek'    =>$request->kepsek,
        'nip'       =>$request->nip,
        'sekolah'   =>$request->sekolah,
        'alamat'    =>$request->alamat,
        'kelurahan' =>$kelurahan,
        'kecamatan' =>$kecamatan,
        'kabupaten' =>$kabupaten,
        'provinsi'  =>$provinsi,
       ]);

       Alert::success('Sukses', 'Data tersimpan');
       return redirect('/data_sekolah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function show(Sekolah $sekolah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function edit(Sekolah $sekolah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $provinsi = $request->province;
        $kabupaten = $request->city;
        $kecamatan = $request->district;
        $kelurahan = $request->village;
        if(is_numeric($provinsi))
        {
            $provinsi = Province::where('id',$request->province)->value('name');
        }
        if(is_numeric($kabupaten))
        {
            $kabupaten = City::where('id',$request->city)->value('name');
        }

        if(is_numeric($kecamatan))
        {
            $kecamatan = District::where('id',$request->district)->value('name');
        }
        if(is_numeric($kelurahan))
        {
            $kelurahan = Village::where('id',$request->village)->value('name');
        }

        $sekolah = Sekolah::find($id);
        $sekolah->kepsek = $request->kepsek;
        $sekolah->nip = $request->nip;
        $sekolah->sekolah = $request->sekolah;
        $sekolah->alamat = $request->alamat;
        $sekolah->provinsi = $provinsi;
        $sekolah->kabupaten = $kabupaten;
        $sekolah->kecamatan = $kecamatan;
        $sekolah->kelurahan = $kelurahan;
        $sekolah->save();

        Alert::success('Sukses', 'Perubahan tersimpan');
        return redirect('/data_sekolah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sekolah $sekolah)
    {
        //
    }


}
