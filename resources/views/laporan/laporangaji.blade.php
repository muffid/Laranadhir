@extends('layout.master')

@section('navbrand')
<a class="navbar-brand" href="#"> Laporan Gaji Guru & Karyawan </a>
@endsection

@section('laporan')
    class="active"
@endsection

@section('lapgaji')
    class="active"
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <form method="get" action="{{url('/laporangaji/carigaji')}}" class="form-horizontal">
                        @csrf
                        <div class="card-header card-header-text" data-background-color="rose">
                            <h4 class="card-title">Cari Guru/Karyawan</h4>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <label class="col-sm-3 label-on-left">Nama</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <input type="text" class="form-control" name="cari" placeholder="Masukkan nama" value="{{ old('cari') }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                                <button type="submit" class="btn btn-fill btn-rose">Cari</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title">Laporan Gaji dan Tunjangan</h4>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>Bulan</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                        <th>Admin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td> 
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <form method="get" action="" class="form-horizontal">
                        @csrf
                        <div class="card-header card-header-text" data-background-color="rose">
                            <h4 class="card-title">NUPTK : </h4>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <label class="col-sm-3 label-on-left">Nama</label>
                                <div class="col-sm-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" name="nama" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 label-on-left">NUPTK</label>
                                <div class="col-sm-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" name="nuptk" class="form-control">
                                    </div>
                                </div>
                            </div>
                            </br>
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-md-5 col-sm-5">
                                    <legend>Foto Profil</legend>
                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail img-circle">
                                            <img src="{{url('material/assets/img/placeholder.jpg')}}" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                        
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection