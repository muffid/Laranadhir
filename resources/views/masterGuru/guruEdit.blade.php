@extends('layout.master')

@section('navbrand')
<a class="navbar-brand" href="#"> Data Guru & Karyawan </a>
@endsection

@section('guru')
    class="active"
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form method="POST" action="/guruUpdate/{{$guru->id}}" class="form-horizontal" enctype="multipart/form-data">
                    	@csrf
                        <div class="card-header card-header-text" data-background-color="rose">
                            <h4 class="card-title">Form Tambah Guru</h4>
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
                                <label class="col-sm-2 label-on-left">Nama</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" name="nama" class="form-control" value="{{$guru->nama}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">NUPTK</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" name="nuptk" class="form-control" value="{{$guru->nuptk}}">           
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Jabatan</label>
                                <div class="col-sm-10">
                                    <select class="selectpicker" name="jabatan" data-style="btn btn-primary " title="Sebagai..." data-size="5">
                                        <option value="Guru">Guru</option>
                                        <option value="Karyawan">Karyawan</option>
                                    </select> 
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Jenis Kelamin</label>
                                <div class="col-sm-10 checkbox-radios">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="jenis_kelamin" value="L">Laki-laki
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="jenis_kelamin" value="P">Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Ket</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" name="ket" class="form-control" value="{{$guru->ket}}">           
                                    </div>
                                </div>
                            </div>
                        </br>
                            <div class="row">
                        		<div class="col-sm-2"></div>
	                        	<div class="col-md-3 col-sm-4">
	                                <legend>Upload Foto</legend>
	                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
	                                    <div class="fileinput-new thumbnail img-circle">
	                                        <img src="{{url('/images/'.$guru->foto)}}" alt="...">
	                                    </div>
	                                    <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
	                                    <div>
	                                        <span class="btn btn-round btn-rose btn-file">
	                                            <span class="fileinput-new">Add Photo</span>
	                                            <span class="fileinput-exists">Change</span>
	                                            <input type="file" name="foto" />
	                                        </span>
	                                        <br />
	                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
	                                    </div>
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