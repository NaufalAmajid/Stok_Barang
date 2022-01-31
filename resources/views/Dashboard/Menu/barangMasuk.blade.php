@extends('Dashboard.headerfooter.headfoot')

@section('content')
<div class="pcoded-main-container">
	<div class="pcoded-content">
		<!-- [ breadcrumb ] start -->
		<div class="page-header">
			<div class="page-block">
				<div class="row align-items-center">

					<div class="col-md-12">
						<div class="page-header-title">
							<h5 class="m-b-10">Data Barang Masuk</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#!">Daftar Barang Masuk</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- [ breadcrumb ] end -->
		<!-- [ Main Content ] start -->
		<div class="col-xl-12">
			<div class="row">
				<div class="col-sm-12 col-md-3">

				</div>
				<div class="col-sm-12 col-md-6">
					<h5>Barang Masuk</h5>
					<hr>
					<div class="card text-center">
						<div class="card-body">
							@php

							$tanggal= mktime(date("m"),date("d"),date("Y"));

							date_default_timezone_set('Asia/Jakarta');

							@endphp
							<h5 class="card-title">@php echo "Masuk Pada : <b>".date("d-M-Y", $tanggal)."</b> "; @endphp</h5>
							<p class="card-text">silahkan masukkan stok barang yang bertambah.</p>
							<form action="{{ route('barangMasuk.store') }}" method="POST" class="text-left" id="BM">
								@csrf
								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="inputbarang">Barang</label>
										<select id="inputbarang" class="form-control" name="kode_barang">
											<option selected>...</option>
											@foreach($db as $db)
											<option value="{{ $db->kode_barang }}">{{ $db->nama_barang }}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group col-md-6">
										<label for="inputstok">Stok Bertambah</label>
										<input type="number" class="form-control" id="inputstok" placeholder="stok..." name="stok" autocomplete="off">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="inputsupplier">Supplier</label>
										<select id="inputsupplier" class="form-control" name="kode_supplier">
											<option selected>...</option>
											@foreach($supplier as $supplier)
											<option value="{{ $supplier->kode_supplier }}">{{ $supplier->nama_supplier }}</option>
											@endforeach
										</select>

									</div>
								</div>
								<div class="form-group">	
									<a href="#!" onclick="document.getElementById('BM').submit();" class="btn  btn-primary form-control">Masukan</a>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-3">
					
				</div>
			</div>
		</div>

		<!-- TABLE BARANG MASUK -->
		@if($message = Session::get('kosong'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>{{ $message }}</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
		@endif
		<div class="col-xl-12">
			<div class="row">
				<div class="col-sm-12 col-md-2">

				</div>
				<div class="col-sm-12 col-md-8">
					<div class="card">
						<div class="card-header">
							<h5>Daftar Tabel Barang Masuk</h5>
							<span class="d-block m-t-5">berikut daftar tabel yang diurutkan <strong>berdasarkan hari</strong></span>


							<a href="/kosong" class="btn btn-warning mt-2 col-md-12">Kosongkan Data</a>
						</div>
						<div class="card-body table-border-style">
							<div class="table-responsive">
								<table class="table table-dark">
									<thead>
										<tr>
											<th></th>
											<th>Barang</th>
											<th>Stok</th>
											<th>Supplier</th>
											<th>Tanggal Masuk</th>
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
											<td>{{ $bm->stok }}</td>
											<td>{{ $bm->nama_supplier }}</td>
											<td>{{ $bm->created_at }}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-2">

				</div>	
			</div>
		</div>
		<!-- [ Main Content ] end -->
	</div>
</div>
@endsection