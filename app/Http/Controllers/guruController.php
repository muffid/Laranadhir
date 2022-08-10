<?php

namespace App\Http\Controllers;

use App\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use File;
use RealRashid\SweetAlert\Facades\Alert;

class guruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::orderBy('nama','asc')->get();
        return view('masterGuru.guru',['guru'=>$guru]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masterGuru.guruTambah');
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
            'nama' => 'required',
            'nuptk' => 'required|unique:gurus',
            'jabatan' => 'required',
            'jenis_kelamin' => 'required',            
        ],$messages);

        $nama    = $request->nama;
        $nuptk   = $request->nuptk;
        $jabatan = $request->jabatan;
        $jenkel  = $request->jenis_kelamin;
        $ket     = $request->ket;
        $email   = $nuptk.'@gmail.com';

        // menyimpan data file yang diupload ke variabel $file
        if($request->hasfile('foto')){
            $file = $request->file('foto');
            $nama_file = $nuptk.".".$file->extension();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = public_path('images/'.$nama_file);
            $img = Image::make($file->path());
            $img->resize(100, 100, function($constraint){
                $constraint->aspectRatio();
            });
            $img->save($tujuan_upload);
            //$file->move($tujuan_upload,$nama_file);
        }

        $user = new \App\User;
        $user->role ='user';
        $user->name = $nama;
        $user->email = $email;
        $user->password = bcrypt('123user');
        $user->remember_token = Str::random(60);
        $user->save();

        Guru::create([
            'user_id' =>$user->id,
            'nama'    =>$nama,
            'nuptk'   =>$nuptk,
            'jabatan' =>$jabatan,
            'jenkel'  =>$jenkel,
            'ket'     =>$ket,
            'foto'    =>$nama_file
        ]);

        Alert::success('Sukses', 'Data tersimpan'); 
        return redirect('/guru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = Guru::find($id);
        return view('masterGuru.guruEdit',['guru'=>$guru]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi/dipilih !!!',
            'unique' => ':attribute tidak boleh ganda',
        ];
        $this->validate($request,[
            'nama' => 'required',
            'nuptk' => 'required',
            'jabatan' => 'required',
            'jenis_kelamin' => 'required',            
        ],$messages);

        $guru          = Guru::find($id);
        $guru->nama    = $request->nama;
        $guru->nuptk   = $request->nuptk;
        $guru->jabatan = $request->jabatan;
        $guru->jenkel  = $request->jenis_kelamin;
        $guru->ket     = $request->ket;
        // menyimpan data file yang diupload ke variabel $file
        if($request->hasfile('foto')){
            $file = $request->file('foto');
            $nama_file = $nuptk.".".$file->extension();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = public_path('images/'.$nama_file);
            $img = Image::make($file->path());
            $img->resize(100, 100, function($constraint){
                $constraint->aspectRatio();
            });
            $img->save($tujuan_upload);
            $guru->foto = $nama_file;
        }
        $guru->save();

        Alert::success('Sukses', 'Perubahan tersimpan');
        return redirect('/guru');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // hapus file
        $guru = Guru::where('id',$id)->first();
        File::delete('images/'.$guru->foto);
 
        // hapus data
        Guru::where('id',$id)->delete();
 
        /*Session::flash('sukses','Perubahan Data Telah Tersimpan!');*/
        Alert::success('Sukses', 'Data Telah Terhapus');
        return redirect()->back()->with('sukses','Data Telah Terhapus');
    }
}
