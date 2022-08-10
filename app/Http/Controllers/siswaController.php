<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response as FacadeResponse;
use Intervention\Image\ImageManager;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SiswasImport;
use App\Siswa;
use Image;
use File;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::orderBy('tapel','desc')
                ->orderBy('kelas','asc')
                ->orderBy('nama','asc')
                ->where('status','aktif')->get();
        return view('masterSiswa.siswa',['siswa'=>$siswa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = array('A','A1','A2','B','B1','B2');
        $tapel = array('2021/2022','2022/2023','2023/2024','2024/2025','2025/2026');
        return view('/masterSiswa.siswaTambah',['tapel'=>$tapel,'kelas'=>$kelas]);
    }

    
    public function getDownload(){

        $file = public_path()."/file_siswa/template_siswa.xlsx";
        $headers = array('Content-Type: application/xlsx',);
        return FacadeResponse::download($file, 'template_siswaUpload.xlsx',$headers);
    }

    public function importExcel(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
     
        // menangkap file excel
        $file = $request->file('file');
     
        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();
     
        // upload ke folder file_siswa di dalam folder public 
        $file->move('file_siswa',$nama_file);
     
        // import data
        Excel::import(new SiswasImport, public_path('/file_siswa/'.$nama_file));
     
        // notifikasi dengan session
        /*Session::flash('sukses','Data Siswa Berhasil Diimport!');*/

        Alert::success('Sukses', 'Data tersimpan');
     
        // alihkan halaman kembali
        return redirect('/siswa');
    }

    public function uploadFoto(Request $request)
    {
        // menyimpan data file yang diupload ke variabel $file
        $images = $request->file('files');
        if($request->hasfile('files')){
            foreach($images as $item){
                $nama_file = $item->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = public_path('images/'.$nama_file);
                $img = Image::make($item->path());
                $img->resize(100, 100, function($constraint){
                    $constraint->aspectRatio();
                });
                $img->save($tujuan_upload);
                //$file->move($tujuan_upload,$nama_file);
            }
        }
        Alert::success('Sukses', 'Data tersimpan');
        return redirect('/siswa');
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
            'noInduk' => 'required|unique:siswas',
            'nisn' => 'required|unique:siswas',
            'kelas' => 'required',
            'tapel' => 'required',
            'jenis_kelamin' => 'required',            
        ],$messages);
        
        $nama    = $request->nama;
        $noInduk = $request->noInduk;
        $nisn    = $request->nisn;
        $jenkel  = $request->jenis_kelamin;
        $kelas   = $request->kelas;
        $tapel   = $request->tapel;

        // menyimpan data file yang diupload ke variabel $file
        // ------------------------------------------------------
        if($request->hasfile('foto')){
            $file = $request->file('foto');
            $nama_file = $noInduk.".".$file->extension();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = public_path('images/'.$nama_file);
            $img = Image::make($file->path());
            $img->resize(100, 100, function($constraint){
                $constraint->aspectRatio();
            });
            $img->save($tujuan_upload);
            //$file->move($tujuan_upload,$nama_file);
        }else{
            $nama_file='user.png';
        }
        //------------------------------------------------------

        Siswa::create([
            'nama'    =>$nama,
            'noInduk' =>$noInduk,
            'nisn'    =>$nisn,
            'jenkel'  =>$jenkel,
            'kelas'   =>$kelas,
            'tapel'   =>$tapel,
            'foto'    =>$nama_file,
            'status'  =>'aktif'
        ]);

        Alert::success('Sukses', 'Data tersimpan');
        return redirect('/siswa');
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
        $siswa = Siswa::find($id);
        return view('masterSiswa.siswaEdit',['siswa'=>$siswa]);
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
            'nama' => 'required',
            'noInduk' => 'required',
            'nisn' => 'required',
            'kelas' => 'required',
            'tapel' => 'required',
            'jenis_kelamin' => 'required',            
        ],$messages);

        $siswa = Siswa::find($id);
        $siswa->nama = $request->nama;
        $siswa->noInduk = $request->noInduk;
        $siswa->nisn = $request->nisn;
        $siswa->jenkel = $request->jenis_kelamin;
        $siswa->kelas = $request->kelas;
        $siswa->tapel = $request->tapel;

        // menyimpan data file yang diupload ke variabel $file
        if($request->hasfile('foto')){
            $file = $request->file('foto');
            $nama_file = $request->noInduk.".".$file->extension();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = public_path('images/'.$nama_file);
            $img = Image::make($file->path());
            $img->resize(100, 100, function($constraint){
                $constraint->aspectRatio();
            });
            $img->save($tujuan_upload);
            $siswa->foto = $nama_file;
        }
        $siswa->save();

        Alert::success('Sukses', 'Perubahan tersimpan');
        return redirect('/siswa');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // hapus file
        $siswa = Siswa::where('id',$id)->first();
        File::delete('images/'.$siswa->foto);
 
        // hapus data
        Siswa::where('id',$id)->delete();
 
        /*Session::flash('sukses','Perubahan Data Telah Tersimpan!');*/
        Alert::success('Sukses', 'Data Telah Terhapus');
        return redirect()->back()->with('sukses','Data Telah Terhapus');
    }

    public function luluskan()
    {
        $siswa = Siswa::orderBy('tapel','desc')
                    ->orderBy('kelas','desc')
                    ->orderBy('nama','asc')
                    ->where('status','aktif')
                    ->get();
        return view('masterSiswa.luluskansiswa',['siswa'=>$siswa]);
    }

    public function prosesLulus($id)
    {
        $siswa = Siswa::find($id);
        $siswa->status = 'lulus';
        $siswa->save();

        return redirect('/siswa');
    }

    public function siswaLulus()
    {
        $siswa = Siswa::orderBy('nama','asc')
                 ->where('status','lulus')->get();
        return view('masterSiswa.siswaLulus',['siswa'=>$siswa]);
    }
}
