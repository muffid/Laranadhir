@extends('layout.master')

@section('navbrand')
<a class="navbar-brand" href="#"> Pembayaran SPP </a>
@endsection

@section('transaksi')
    class="active"
@endsection

@section('spp')
    class="active"
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
        	<div class="col-md-12">
                <div class="card">
                    <form method="get" action="{{url('/spp/cariSiswa')}}" class="form-horizontal">
                        <div class="card-header card-header-text" data-background-color="rose">
                            <h4 class="card-title">Cari Siswa</h4>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <label class="col-sm-2 label-on-left">No. Induk</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <input type="text" class="form-control" name="cari" placeholder="Masukkan no.induk" value="{{ old('cari') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                                <button type="submit" class="btn btn-fill btn-rose">Cari</button>
                                        </div>
                                        </form>

                                        <div class="col-md-4">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <input type="text" class="form-control" placeholder="Nama Siswa">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <input type="text" class="form-control" placeholder="Kelas">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection