@extends('layout.master')

@section('navbrand')
<a class="navbar-brand" href="#"> Data Siswa </a>
@endsection

@section('siswa')
    class="active"
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form method="POST" action="/siswaStore" class="form-horizontal" enctype="multipart/form-data">
                    	@csrf
                        <div class="card-header card-header-text" data-background-color="rose">
                            <h4 class="card-title">Form Tambah Siswa</h4>
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
                                        <input type="text" name="nama" class="form-control" required="true" value="{{old('nama')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">No. Induk</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" name="noInduk" class="form-control" required="true" value="{{old('noInduk')}}">           
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">NISN</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" name="nisn" class="form-control" required="true" value="{{old('nisn')}}">
                                    </div>
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
                                <label class="col-sm-2 label-on-left">Kelas</label>
                                <div class="col-sm-10">
                                    <select class="selectpicker" name="kelas" data-style="btn " title="Pilih Kelas">
                                        @foreach($kelas as $t)
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
                        </br>
                            <div class="row">
                        		<div class="col-sm-2"></div>
	                        	<div class="col-md-3 col-sm-4">
	                                <legend>Upload Foto</legend>
	                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
	                                    <div class="fileinput-new thumbnail img-circle">
	                                        <img src="material/assets/img/placeholder.jpg" alt="...">
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