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
                    <div class="card-header card-header-icon" data-background-color="purple">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Data Siswa</h4>
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                            <div class="col-md-3 col-sm-3">
                            <div class="dropdown">
                                <button href="#pablo" class="dropdown-toggle btn btn-info btn-block" data-toggle="dropdown">Tambah Siswa
                                    <b class="caret"></b>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-left">
                                    <li class="dropdown-header">Dropdown header</li>
                                    <li>
                                        <a href="{{url('/siswaTambah')}}">Tambah</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#importExcel">Upload Excel</a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#importFoto">Upload Foto</a>
                                    </li>
                                </ul>
                            </div>
                            </div>
                            <a href="{{url('/luluskan')}}" class="btn btn-warning">Luluskan Siswa</a>
                        </div>
                        <!-- Import Excel -->
                            <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form method="post" action="/siswa/import_excel" enctype="multipart/form-data">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel"><b>Import Excel</b></h4>
                                            </div>
                                            <div class="modal-body">
                                                {{ csrf_field() }}
                                                <a href="/siswa/download_templates" class="btn btn-info">Download Template Excel</a>
                                                </br>
                                                
                                                <label>Pilih file excel</label>
                                                <div>
                                                    <input type="file" name="file" required="true">
                                                </div>
                     
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-rose" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Import</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <!-- end import -->
                        <!-- Import Excel -->
                            <div class="modal fade" id="importFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form method="post" action="/siswa/upload_foto" enctype="multipart/form-data">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel"><b>Upload Foto Siswa</b></h4>
                                            </div>
                                            <div class="modal-body">
                                                {{ csrf_field() }}
                                                <label>Pilih file foto</label>
                                                <div>
                                                    <input type="file" name="files[]" required="true" multiple>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-rose" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Upload</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <!-- end import -->
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No. Induk</th>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Kelas</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Foto</th>
                                        <th class="disabled-sorting text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>No. Induk</th>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Kelas</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Foto</th>
                                        <th class="text-right">Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                	@php $i=1 @endphp
                            		@foreach($siswa as $g)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$g->noInduk}}</td>
                                        <td>{{$g->nisn}}</td>
                                        <td>{{$g->nama}}</td>
                                        <td>{{$g->jenkel}}</td>
                                        <td>{{$g->kelas}}</td>
                                        <td>{{$g->tapel}}</td>
                                        <td><img src="{{ url('/images/'.$g->foto)}}" width="50px"></td>
                                        <td class="td-actions text-right">
                                            <a href="/siswaEdit/{{$g->id}}" class="btn btn-success"> 
                                            	<i class="material-icons">edit</i></a>
                                            <a id="delSiswa{{$g->id}}" onclick="showConf({{$g->id}})" class="btn btn-danger">
                                                <i class="material-icons">close</i></a>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">

function showConf(num){
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Beneran nih mau hapus?',
                text: 'sekali anda mengapus data nya nggak bisa kembali lo ya',
                icon: 'warning',
                buttons: ["yauda, jangan hapus", "beneran, hapus aja"],
            }).then(function(value) {
                if (value) {
                    window.location.replace('siswaHapus/'+num);
                }
            });
        }


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
      

        //Like record
        table.on('click', '.like', function() {
            alert('You clicked on Like button');
        });

        $('.card .material-datatables label').addClass('form-group');
    });
</script>
@endpush