<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan SPP</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan SPP TK Muslimat NU 15 Al-Munib</h5>
		<h6>Kebonagung Kecamatan Pakisaji Kabupaten Malang</h6>
	</center>
	<br>
	</br>
	<left>
		<h6>Nama : {{$lapspp[0]->siswa->nama}}
		<br>
		</br>
		Kelas : {{$lapspp[0]->siswa->kelas}}</h6>	
	</left>
	<table class="table table-bordered">
		<thead class="thead-light">
			<tr>
				<th style="width: 3%">No</th>
				<th>Tahun Ajaran</th>
				<th>Bulan</th>
				<th>Tanggal</th>
				<th>Jumlah Dibayar</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($lapspp as $p)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$p->tapel}}</td>
				<td>{{$p->bulan}}</td>
				<td>{{$p->tanggal}}</td>
				<td>@comma($p->biaya)</td>
				<td>{{$p->ket}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>