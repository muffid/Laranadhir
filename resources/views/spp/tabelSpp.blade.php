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
                                                <input type="text" class="form-control" placeholder="Nama Siswa" value="{{$siswa->nama}}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <input type="text" class="form-control" placeholder="Kelas" value="{{$siswa->kelas}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="purple">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">SPP</h4>
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                            <form method="POST" action="/spp/buat_tabel/{{$siswa->id}}">
                                @csrf
                                <input type="hidden" name="id" value="{{$siswa->id}}">
                                <input type="hidden" name="noInduk" value="{{$siswa->noInduk}}">
                                <input type="hidden" name="nama" value="{{$siswa->nama}}">
                                <input type="hidden" name="kelas" value="{{$siswa->kelas}}">
                                <input type="hidden" name="tapel" value="{{$siswa->tapel}}">
                                <input type="hidden" name="biaya" value="{{$biayaspp}}">
                                <div class="form-group label-floating is-empty">
                                    <div class="col-md-3">
                                        <label class="">Masukkan tanggal awal SPP :</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label"></label>
                                        <input type="text" class="form-control" name="tanggal" placeholder="contoh: 2021/07/10" required="true">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info">Buat Tabel Pembayaran SPP</button>
                            </form>
                        </div>
                        </br>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Bulan</th>
                                        <th>Biaya</th>
                                        <th>Tanggal</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Ket</th>
                                        <th class="disabled-sorting text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Bulan</th>
                                        <th>Biaya</th>
                                        <th>Tanggal</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Ket</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @php $i=1 @endphp
                                    @foreach($spp as $g)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$g->bulan}}</td>
                                        <td>@comma($g->biaya)</td>
                                        <td>{{$g->tanggal}}</td>
                                        <td>{{$g->tapel}}</td>
                                        <td>{{$g->ket}}</td>
                                        <td class="td-actions text-right">
                                            <a href="/spp/proses/{{$g->id}}" class="btn btn-success"> 
                                                Bayar</a>
                                        </td>
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
        </div>
        <!-- end row -->
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });


        var table = $('#datatables').DataTable();

        // Edit record
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');

            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function(e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });

        //Like record
        table.on('click', '.like', function() {
            alert('You clicked on Like button');
        });

        $('.card .material-datatables label').addClass('form-group');
    });
</script>
@endpush