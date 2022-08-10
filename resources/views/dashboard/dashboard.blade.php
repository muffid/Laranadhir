@extends('layout.master')

@section('navbrand')
<a class="navbar-brand" href="{{url('/')}}"> Beranda</a>
@endsection

@section('dash')
    class="active"
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">attach_money</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Pemasukan hari ini:</p>
                        <h3 class="card-title">@currency($income_today)</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">date_range</i> Selama sehari
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">equalizer</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Pemasukan bulan ini:</p>
                        <h3 class="card-title">@currency($income_thismonth)</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">date_range</i> Selama sebulan
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">store</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Jumlah Siswa</p>
                        <h3 class="card-title">{{$jumlah_siswa}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">update</i> Just Updated
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">weekend</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Jumlah Guru</p>
                        <h3 class="card-title">{{$jumlah_guru}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">update</i> Just Updated
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h4 class="title">Infromasi dan Pengumuman</h4>
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3>Some Title Here</h3>
                            <p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections. The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me?" he thought.</p>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!--  end card -->
    </div>
</div>

@endsection