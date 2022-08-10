@extends('layout.master')

@section('navbrand')
<a class="navbar-brand" href="#"> Laporan SPP </a>
@endsection

@section('laporan')
    class="active"
@endsection

@section('lapspp')
    class="active"
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <form method="get" action="{{url('/laporanspp/carispp')}}" class="form-horizontal">
                        @csrf
                        <div class="card-header card-header-text" data-background-color="rose">
                            <h4 class="card-title">Cari Siswa</h4>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <label class="col-sm-3 label-on-left">No. Induk</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <input type="text" class="form-control" name="cari" placeholder="Masukkan no.induk" value="{{ old('cari') }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                                <button type="submit" class="btn btn-fill btn-rose">Cari</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <form method="get" action="" class="form-horizontal">
                        @csrf
                        <div class="card-header card-header-text" data-background-color="rose">
                            <h4 class="card-title">No.Induk : {{$siswa->noInduk}}</h4>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <label class="col-sm-3 label-on-left">Nama</label>
                                <div class="col-sm-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" name="nama" class="form-control" value="{{$siswa->nama}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 label-on-left">NISN</label>
                                <div class="col-sm-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" name="nisn" class="form-control" value="{{$siswa->nisn}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 label-on-left">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" name="jenkel" class="form-control" value="{{$siswa->jenkel}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 label-on-left">Kelas</label>
                                <div class="col-sm-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" name="kelas" class="form-control" value="{{$siswa->kelas}}">
                                    </div>
                                </div>
                            </div>
                            </br>
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-md-5 col-sm-5">
                                    <legend>Foto Siswa</legend>
                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">
                                            <img src="{{ url('/images/'.$siswa->foto)}}" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title">Laporan SPP</h4>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>Bulan</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1 @endphp
                                    @foreach($spp as $g)
                                    <tr>
                                        <td class="text-center">{{$i++}}</td>
                                        <td>{{$g->bulan}}</td>
                                        <td>@comma($g->biaya)</td>
                                        <td>{{$g->ket}}</td>
                                        <td></td> 
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-5"></div>
                <div class="col-md-2"><a href="/laporanspp/cetak_pdf/{{$siswa->id}}" class="btn btn-rose">Cetak</a></div>
            </div>
        </div>
    </div>
</div>
@endsection