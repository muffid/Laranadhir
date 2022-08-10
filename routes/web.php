<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/logins','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logouts','AuthController@logout');
Route::get('/forgot', 'PasswordController@forgot');
Route::get('/register','AuthController@register'); 
Route::post('/postregister','AuthController@postregister');


Route::group(['middleware' => ['auth','checkRole:admin']],function(){
	
	Route::get('/data_sekolah','dataSekolahController@index');
	Route::get('/data_sekolah/kabupaten','dataSekolahController@getkabupaten')->name('kabupaten');
	Route::get('/data_sekolah/kecamatan','dataSekolahController@getkecamatan')->name('kecamatan');
	Route::get('/data_sekolah/desa','dataSekolahController@getdesa')->name('desa');
	Route::post('/data_sekolah/store','dataSekolahController@store');
	Route::post('/data_sekolah/update/{id}','dataSekolahController@update');

	Route::get('/siswa','siswaController@index');
	Route::get('/siswaTambah','siswaController@create');
	Route::post('/siswa/import_excel','siswaController@importExcel');
	Route::get('/siswa/download_templates','siswaController@getDownload');
	Route::post('/siswa/upload_foto','siswaController@uploadFoto');
	Route::post('/siswaStore','siswaController@store');
	Route::get('/siswaEdit/{id}','siswaController@edit');
	Route::post('/siswaUpdate/{id}','siswaController@update');
	Route::get('/siswaHapus/{id}','siswaController@destroy');
	Route::get('/luluskan','siswaController@luluskan');
	Route::get('/prosesLulus/{id}','siswaController@prosesLulus');

	Route::get('/guru','guruController@index');
	Route::get('/guruTambah','guruController@create');
	Route::post('/guru/upload_foto','guruController@uploadFoto');
	Route::post('/guruStore','guruController@store');
	Route::get('/guruEdit/{id}','guruController@edit');
	Route::post('/guruUpdate/{id}','guruController@update');
	Route::get('/guruHapus/{id}','guruController@destroy');

	Route::get('change-password','PasswordController@index');
	Route::post('change-password','PasswordController@store')->name('change.password');

	Route::get('/jenisPembayaran','jenisBayarController@index');
	Route::get('/jenisBayar/tambah','jenisBayarController@create');
	Route::post('/jenisBayar/store','jenisBayarController@store');
	Route::get('/jenisBayar/edit/{id}','jenisBayarController@edit');
	Route::post('/jenisBayar/update/{id}','jenisBayarController@update');
	Route::get('/jenisBayar/hapus/{id}','jenisBayarController@destroy');

	Route::get('/transaksi','transaksiController@index');
	Route::get('/transaksi/cariSiswa','transaksiController@cari');
	Route::get('/transaksi/proses','transaksiController@create');

	Route::get('/spp','sppController@index');
	Route::get('/spp/cariSiswa','sppController@cari');
	Route::post('/spp/buat_tabel/{id}','sppController@buatTabel');
	Route::get('/spp/proses/{id}','sppController@create');

	Route::get('/gaji','gajiController@index');
	Route::get('/gaji/bayar/{id}','gajiController@bayar');
	Route::post('/gaji/store','gajiController@store');

	Route::get('/laporanbayar','laporanController@pembayaran');
	Route::get('/laporanbayar/carikelasb','laporanController@caribayar');
	Route::get('/laporanbayar/cetak_pdf/{kelas}','pdfController@cetak_pdf1');

	Route::get('/laporantunggakan','laporanController@tunggakan');
	Route::get('/laporantunggakan/carikelas','laporanController@caritunggakan');
	Route::get('/laporantunggakan/cetak_pdf/{kelas}','pdfController@cetak_pdf2');

	Route::get('/laporanspp','laporanController@spp');
	Route::get('/laporanspp/carispp','laporanController@carispp');
	Route::get('/laporanspp/cetak_pdf/{idsiswa}','pdfController@cetak_pdf3');

	Route::get('/laporangaji','laporanController@gaji');
	Route::get('/laporangaji/carigaji','laporanController@carigaji');
	Route::get('/laporangaji/cetak_pdf/{idguru}','pdfController@cetak_pdf4');

	Route::get('/siswa/lulus','siswaController@siswaLulus');
});

Route::group(['middleware' => ['auth','checkRole:admin,user']],function(){
	Route::get('/','dashboardController@index');

	Route::get('/profil','penggunaController@profil');
	Route::get('/detail_gaji','penggunaController@viewgaji');
	Route::post('/profilku','penggunaController@update_profil');
});

