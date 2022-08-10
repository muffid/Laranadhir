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
                    <div class="card-header card-header-icon" data-background-color="purple">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Jenis Pembayaran</h4>
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                            <a href="{{url('/jenisBayar/tambah')}}" class="btn btn-info">Tambah Data</a>
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Jenis Pembayaran</th>
                                        <th>Nominal</th>
                                        <th>Kelas</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Ket</th>
                                        <th class="disabled-sorting text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Jenis Pembayaran</th>
                                        <th>Nominal</th>
                                        <th>Kelas</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Ket</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @php $i=1 @endphp
                                    @foreach($jenisBayar as $g)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$g->jenisBayar}}</td>
                                        <td>@comma($g->nominal)</td>
                                        <td>{{$g->kelas}}</td>
                                        <td>{{$g->tapel}}</td>
                                        <td>{{$g->ket}}</td>
                                        <td class="td-actions text-right">
                                            <a href="/jenisBayar/edit/{{$g->id}}" class="btn btn-success"> 
                                                <i class="material-icons">edit</i></a>
                                            <a href="/jenisBayar/hapus/{{$g->id}}" class="btn btn-danger">
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