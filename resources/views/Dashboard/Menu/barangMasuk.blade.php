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
		<!-- [ Main Content ] end -->
	</div>
</div>
@endsection