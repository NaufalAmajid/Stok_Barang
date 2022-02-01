<html>
<head>
	<title>Laporan Data Supplier</title>
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
		<h5>Laporan Data Supplier</h4>
		<h6><p>berikut data semua supplier barang <b>Aston Printer</b></p></h5>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>NO</th>
				<th>NAMA SUPPLIER </th>
				<th>KODE SUPPLIER</th>
				<th>EMAIL</th>
				<th>TELEPHONE</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($ds as $s)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $s->nama_supplier }}</td>
				<td>{{ $s->kode_supplier }}</td>
				<td>{{ $s->email }}</td>
				<td>{{ $s->telephone }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>