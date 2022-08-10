@extends('layout.master')

@section('navbrand')
<a class="navbar-brand" href="#"> Gaji Guru & Karyawan </a>
@endsection

@section('transaksi')
    class="active"
@endsection

@section('gaji')
    class="active"
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form method="POST" action="/gaji/store" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header card-header-text" data-background-color="rose">
                            <h4 class="card-title">Form Pembayaran Gaji</h4>
                        </div>
                        <div class="card-content">
                            {{-- menampilkan error validasi --}}
                                @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            <input type="hidden" name="id" value="{{$guru->id}}">
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Nama</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" name="nama" class="form-control" value="{{$guru->nama}}">      
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Jabatan</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" name="jabatan" class="form-control" value="{{$guru->jabatan}}">      
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Gaji Pokok</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" name="gaji" onkeyup="this.value=addcommas(this.value);" class="form-control" required="true" value="{{old('gaji')}}">      
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Tunjangan</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" name="tunjangan" onkeyup="this.value=addcommas(this.value);" class="form-control">      
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Transport</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" name="transport" onkeyup="this.value=addcommas(this.value);" class="form-control">      
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Tanggal</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" name="tanggal" class="form-control datepicker" required="true" value="{{old('tanggal')}}">
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Bulan</label>
                                <div class="col-sm-10">
                                    <select class="selectpicker" name="bulan" data-style="btn btn-primary " title="Pilih Bulan" data-size="5">
                                        @foreach($bulan as $t)
                                        <option value="{{$t}}">{{$t}}</option>
                                        @endforeach
                                    </select> 
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Tahun Ajaran</label>
                                <div class="col-sm-10">
                                    <select class="selectpicker" name="tapel" data-style="btn btn-primary " title="Pilih Tahun Ajaran" data-size="5">
                                        @foreach($tapel as $t)
                                        <option value="{{$t}}">{{$t}}</option>
                                        @endforeach
                                    </select> 
                                </div>
                            </div>                                     
                            <div class="row">
                                <div class="col-sm-7"></div>
                                <label class="col-sm-2 label-on-left"></label>
                                <div class="col-sm-3">
                                    <div class="form-group form-button">
                                        <button type="submit" class="btn btn-fill btn-rose">Simpan</button>
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