<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan Tunggakan</title>
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
		<h5>Laporan Tunggakan TK Muslimat NU 15 Al-Munib</h4>
		<h6>Kebonagung Kecamatan Pakisaji Kabupaten Malang</h5>
	</center>

	<table class="table table-bordered">
		<thead class="thead-light">
			<tr>
				<th style="width: 3%">No</th>
				<th style="width: 25%">Nama Siswa</th>
				<th style="width: 8%">No.Induk</th>
				<th style="width: 5%">Kelas</th>
				<th>Tahun Ajaran</th>
				<th>Tunggakan</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($lapTunggakan as $p)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$p->nama}}</td>
				<td>{{$p->noInduk}}</td>
				<td>{{$p->kelas}}</td>
				<td>{{$p->tapel}}</td>
				<td>{{$p->tunggakan}}</td>
				<td>@currency($p->total)</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>