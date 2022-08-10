@extends('layout.master')

@section('navbrand')
<a class="navbar-brand" href="{{url('/')}}"> Profil</a>
@endsection

@section('profil')
    class="active"
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="purple">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Profil Guru </h4>
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>NUPTK</th>
                                        <th>Email</th>
                                        <th>Jabatan</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Ket</th>
                                        
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>NUPTK</th>
                                        <th>Email</th>
                                        <th>Jabatan</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Ket</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @php $i=1 @endphp
                                    @foreach($guru as $g)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$g->nama}}</td>
                                        <td>{{$g->nuptk}}</td>
                                        <td>{{$g->user->email}}</td>
                                        <td>{{$g->jabatan}}</td>
                                        <td>{{$g->jenkel}}</td>
                                        <td>{{$g->ket}}</td>
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
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="#pablo">
                            <img class="img" src="{{url('/images/'.$guru[0]->foto)}}" />
                        </a>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">{{$guru[0]->nama}}</h4>
                        <h6 class="category text-gray">{{$guru[0]->jabatan}}</h6> 
                        <p class="description">
                            {{$guru[0]->detail}}
                        </p>
                        <!-- <a href="#pablo" class="btn btn-rose btn-round">Follow</a> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">perm_identity</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Tentang Anda -
                            <small class="category">Tulis kata bijak atau tentang diri Anda!</small>
                        </h4>

                        <form method="POST" action="{{url('/profilku')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-group label-floating">
                                            <textarea name="profilku" class="form-control" rows="5" onclick="showButtons();"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button id="b1" type="submit" class="btn btn-rose pull-right">Simpan</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>

function showButtons () { $('#b1').show(); }

</script>
<style type="text/css">
#b1 {
display: none;
}

</style>
@endpush