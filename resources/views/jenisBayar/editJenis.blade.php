@extends('layout.master')

@section('navbrand')
<a class="navbar-brand" href="#"> Jenis Pembayaran </a>
@endsection

@section('jenis_bayar')
    class="active"
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form method="POST" action="/jenisBayar/update/{{$jenisBayar->id}}" class="form-horizontal" enctype="multipart/form-data">
                    	@csrf
                        <div class="card-header card-header-text" data-background-color="rose">
                            <h4 class="card-title">Form Edit Jenis Pembayaran</h4>
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
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Jenis Pembayaran</label>
                                <div class="col-sm-10">
                                    <select class="selectpicker" name="jenis_pembayaran" data-style="btn " title="{{$jenisBayar->jenisBayar}}" >
                                        @foreach($jenis as $t)
                                        <option value="{{$t}}">{{$t}}</option>
                                        @endforeach
                                    </select> 
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Nominal</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" name="nominal" onkeyup="this.value=addcommas(this.value);" class="form-control" value="{{$jenisBayar->nominal}}">      
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Kelas</label>
                                <div class="col-sm-10">
									<select class="selectpicker" name="kelas" data-style="btn " title="{{$jenisBayar->kelas}}" >
                                        @foreach($kelas as $t)
                                        <option value="{{$t}}">{{$t}}</option>
                                        @endforeach
                                    </select> 
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Tahun Ajaran</label>
                                <div class="col-sm-10">
                                    <select class="selectpicker" name="tapel" data-style="btn btn-primary " title="{{$jenisBayar->tapel}}" >
                                        @foreach($tapel as $t)
                                        <option value="{{$t}}">{{$t}}</option>
                                        @endforeach
                                    </select> 
                                </div>
                            </div> 
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Keterangan</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" name="keterangan" class="form-control" value="{{$jenisBayar->ket}}">      
                                    </div>
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