<html>
<head>
	<title>Laporan Data Barang Masuk</title>
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
	<h5>Laporan Data Barang Masuk</h4>
		<h6><p>berikut data barang masuk <b>Aston Printer</b></p></h5>
		</center>

		<table class='table table-bordered'>
			<thead>
				<tr>
					<th></th>
					<th>BARANG</th>
					<th>KODE BARANG</th>
					<th>NAMA SUPPLIER</th>
					<th>STOK</th>
					<th>TANGGAL MASUK</th>
				</tr>
			</thead>
			<tbody>
				@php
				$i = 1;
				@endphp
				@foreach($bm as $bm)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $bm->nama_barang }}</td>
					<td>{{ $bm->kode_barang }}</td>
					<td>{{ $bm->nama_supplier }}</td>
					<td>{{ $bm->stok }}</td>
					<td>{{ $bm->created_at->isoFormat('dddd, D MMMM Y') }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</body>
	</html>