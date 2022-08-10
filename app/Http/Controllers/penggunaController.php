<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gaji;
use App\Guru;
use Auth;

class penggunaController extends Controller
{
    public function profil()
    {
        $nama = Auth::user()->name;
        $guru = Guru::where('nama','like',"%".$nama."%")->get();
        return view('pengguna.profil',['guru'=>$guru]);
    }

    public function viewgaji()
    {
        $nama = Auth::user()->name;
        $guru_id = Guru::where('nama','like',"%".$nama."%")->value('id');
        $gajiguru = Gaji::where('guru_id',$guru_id)->get();

        return view('pengguna.detail_gaji',['gajiguru'=>$gajiguru]);
    }

    public function update_profil(Request $request)
    {
        $profilku = $request->profilku;
        $id = Auth::user()->guru->id;
        
        $guru = Guru::find($id);
        $guru->detail = $profilku;
        $guru->save();

        return redirect('/profil');
    }
}
