<ul class="nav">
    
    <li @yield('dash')>
        <a href="{{url('/')}}">
            <i class="material-icons">dashboard</i>
            <p>Beranda</p>
        </a>
    </li>
    @if(auth()->user()->role == 'user')
    <li @yield('profil')>
        <a href="{{url('/profil')}}">
            <i class="material-icons">face</i>
            <p>Profil</p>
        </a>
    </li>
    <li @yield('detail_gaji')>
        <a href="{{url('/detail_gaji')}}">
            <i class="material-icons">apps</i>
            <p>Detail Gaji</p>
        </a>
    </li>
    @endif
    @if(auth()->user()->role == 'admin')
    <li @yield('sekolah')>
        <a href="{{url('/data_sekolah')}}">
            <i class="material-icons">assessment</i>
            <p>Data Sekolah
            </p>
        </a>
    </li>
    <li @yield('siswa')>
        <a href="{{url('/siswa')}}">
            <i class="material-icons">people</i>
            <p>Data Siswa</p>
        </a>
    </li>
    <li @yield('guru')>
        <a href="{{url('/guru')}}">
            <i class="material-icons">face</i>
            <p>Data Guru & Karyawan</p>
        </a>
    </li>
    <!-- <li @yield('password')>
        <a href="{{url('change-password')}}">
            <i class="material-icons">account_box</i>
            <p>Ganti Password</p>
        </a>
    </li> -->
    <li @yield('jenis_bayar')>
        <a href="{{url('/jenisPembayaran')}}">
            <i class="material-icons">apps</i>
            <p>Jenis Pembayaran</p>
        </a>
    </li>
    <li @yield('transaksi')>
        <a href="#transaksis" data-toggle="collapse">
            <i class="material-icons">receipt_long</i>
            <p>Transaksi
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse" id="transaksis">
            <ul class="nav">
                <li @yield('transaksix')>
                    <a href="{{url('/transaksi')}}">Transaksi Siswa</a>
                </li>
                <li @yield('spp')>
                    <a href="{{url('/spp')}}">SPP</a>
                </li>
                <li @yield('gaji')>
                    <a href="{{url('/gaji')}}">Gaji Guru & Karyawan</a>
                </li>
            </ul>
        </div>
    </li>
    <li @yield('laporan')>
        <a data-toggle="collapse" href="#laporans">
            <i class="material-icons">book</i>
            <p>Laporan
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse" id="laporans">
            <ul class="nav">
                <li @yield('lapbayar')>
                    <a href="{{url('/laporanbayar')}}">Laporan Pembayaran</a>
                </li>
                <li @yield('laptunggakan')>
                    <a href="{{url('/laporantunggakan')}}">Laporan Tunggakan</a>
                </li>
                <li @yield('lapspp')>
                    <a href="{{url('/laporanspp')}}">Laporan SPP</a>
                </li>
                <li @yield('lapgaji')>
                    <a href="{{url('/laporangaji')}}">Laporan Gaji</a>
                </li>
            </ul>
        </div>
    </li>
    <li @yield('lulus')>
        <a href="{{url('/siswa/lulus')}}">
            <i class="material-icons">widgets</i>
            <p>Data Kelulusan</p>
        </a>
    </li>
    @endif
</ul>