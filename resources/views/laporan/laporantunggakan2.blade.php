@extends('layout.master')

@section('navbrand')
<a class="navbar-brand" href="#"> Laporan Tunggakan </a>
@endsection

@section('laporan')
    class="active"
@endsection

@section('laptunggakan')
    class="active"
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form method="get" action="{{url('/laporantunggakan/carikelas')}}" class="form-horizontal">
                        <div class="card-header card-header-text" data-background-color="rose">
                            <h4 class="card-title">Cari Siswa</h4>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Kelas</label>
                                    <div class="col-sm-5">
                                        <select class="selectpicker" name="kelas" data-style="btn " title="Pilih Kelas" >
                                            @foreach($kelas as $t)
                                            <option value="{{$t}}">{{$t}}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                    <div class="col-md-3">
                                            <button type="submit" class="btn btn-fill btn-rose">Cari</button>
                                    </div>
                            </div>
                        </div>
                    </form>
                </div>        
            </div>
            <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="purple">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Laporan Tunggakan</h4>
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>No.Induk</th>
                                        <th>Kelas</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Tunggakan</th>
                                        <th class="disabled-sorting text-right">Total</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>No.Induk</th>
                                        <th>Kelas</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Tunggakan</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @php $i=1 @endphp
                                    @foreach($lapTunggakan as $g)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$g->nama}}</td>
                                        <td>{{$g->noInduk}}</td>
                                        <td>{{$g->kelas}}</td>
                                        <td>{{$g->tapel}}</td>
                                        <td>{{$g->tunggakan}}</td>
                                        <td>@comma($g->total)</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-5"></div>
                <div class="col-md-2"><a href="/laporantunggakan/cetak_pdf/{{$lapTunggakan[0]->kelas}}" class="btn btn-rose">Cetak</a></div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection