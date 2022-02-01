<html>
<head>
	<title>Laporan Data Barang Keluar</title>
	<link rel="stylesheet" href="bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
	table tr td,
	table tr th{
		font-size: 9pt;
	}
</style>
<center>
	<h5>Laporan Data Barang Keluar</h4>
		<h6><p>berikut data barang keluar <b>Aston Printer</b></p></h5>
		</center>

		<table class='table table-bordered'>
			<thead>
				<tr>
					<th></th>
					<th>BARANG</th>
					<th>KODE BARANG</th>
					<th>STOK KELUAR</th>
					<th>TANGGAL KELUAR</th>
				</tr>
			</thead>
			<tbody>
				@php
				$i = 1;
				@endphp
				@foreach($bk as $bk)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $bk->nama_barang }}</td>
					<td>{{ $bk->kode_barang }}</td>
					<td>{{ $bk->stok }}</td>
					<td>{{ $bk->created_at->isoFormat('dddd, D MMMM Y') }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</body>
	</html>