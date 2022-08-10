@extends('layout.master')

@section('navbrand')
<a class="navbar-brand" href="#"> Transaksi </a>
@endsection

@section('transaksi')
    class="active"
@endsection

@section('transaksix')
    class="active"
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
        	<div class="col-md-12">
                <div class="card">
                    <form method="get" action="{{url('/transaksi/cariSiswa')}}" class="form-horizontal">
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
                                                <input type="text" name="nama" class="form-control" placeholder="Nama Siswa" value="{{$siswa->nama}}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <input type="text" name="kelas" class="form-control" placeholder="Kelas" value="{{$siswa->kelas}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <form method="get" action="{{url('/transaksi/proses')}}" class="form-horizontal">
                        @csrf
                        <input type="hidden" name="id" value="{{$siswa->id}}">
                        <div class="card-header card-header-text" data-background-color="rose">
                            <h4 class="card-title">No.Induk : {{$siswa->noInduk}}</h4>
                            <input type="hidden" name="noInduk" value="{{$siswa->noInduk}}">
                            <input type="hidden" name="nama" value="{{$siswa->nama}}">
                            <input type="hidden" name="kelas" value="{{$siswa->kelas}}">
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
                            <label><b>Pilih jenis pembayaran dibawah ini:</b></label>
                            <div class="row">
                                <label class="col-sm-3 label-on-left">Pendaftaran</label>
                                <div class="col-sm-9 checkbox-radios">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="pendaftaran" value="{{$nominal[0]}}">@currency($nominal[0])
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 label-on-left">Seragam</label>
                                <div class="col-sm-9 checkbox-radios">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="seragam" value="{{$nominal[1]}}">@currency  ($nominal[1])
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 label-on-left">Alat Tulis</label>
                                <div class="col-sm-9 checkbox-radios">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="atk" value="{{$nominal[2]}}">@currency   ($nominal[2])
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 label-on-left">Ekstrakurikuler</label>
                                <div class="col-sm-9 checkbox-radios">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="ekskul" value="{{$nominal[3]}}"> @currency  ($nominal[2])
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 label-on-left">LKS 1</label>
                                <div class="col-sm-9 checkbox-radios">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="lks1" value="{{$nominal[4]}}"> @currency  ($nominal[3])
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 label-on-left">LKS 2</label>
                                <div class="col-sm-9 checkbox-radios">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="lks2" value="{{$nominal[5]}}"> @currency  ($nominal[4])
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 label-on-left">Tanggal Bayar</label>
                                <div class="col-sm-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" name="tanggal" class="form-control datepicker" value="{{old('tanggal')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 label-on-left">Tahun Ajaran</label>
                                <div class="col-sm-9">
                                    <select class="selectpicker" name="tapel" data-style="btn btn-primary " title="Pilih Tahun Ajaran" data-size="5">
                                        @foreach($tapel as $t)
                                        <option value="{{$t}}">{{$t}}</option>
                                        @endforeach
                                    </select> 
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-8"></label>
                                <div class="col-md-4">
                                    <div class="form-group form-button">
                                        <button type="submit" class="btn btn-fill btn-rose">Simpan</button>
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
                    <h4 class="card-title">Data Transaksi</h4>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>Sudah Dibayar</th>
                                        <th>Belum Dibayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td></td>
                                        <td>{{$tunggakan[0]}}</td> 
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td></td>
                                        <td>{{$tunggakan[1]}}</td> 
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td></td>
                                        <td>{{$tunggakan[2]}}</td> 
                                    </tr>
                                    <tr>
                                        <td class="text-center">4</td>
                                        <td></td>
                                        <td>{{$tunggakan[3]}}</td> 
                                    </tr>
                                    <tr>
                                        <td class="text-center">5</td>
                                        <td></td>
                                        <td>{{$tunggakan[4]}}</td> 
                                    </tr>
                                    <tr>
                                        <td class="text-center">6</td>
                                        <td></td>
                                        <td>{{$tunggakan[5]}}</td> 
                                    </tr>
                                    <tr>
                                        <td class="td-total">
                                            Total
                                        </td>
                                        <td class="text left">
                                            <b> </b>
                                        </td>
                                        <td class="text left">
                                            <b> {{$totaltunggakan}}</b>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
