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
							<h5 class="m-b-10">Cetak Data Barang Masuk</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#!">Data Barang Masuk</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- [ breadcrumb ] end -->
		<!-- [ Main Content ] start -->
		<div class="row">
			<div class="col-sm-12">

				<div class="card">
					<div class="card-header">
						<h5>Daftar Data Barang Masuk</h5>
					</div>
					<div class="card-body">
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<a href="/cetakbm" class="btn btn-info mb-4" target="_blank">Cetak Data</a>
								<br>
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th></th>
												<th>Barang</th>
												<th>Kode Barang</th>
												<th>Nama Supplier</th>
												<th>Stok</th>
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
												<td>{{ $bm->kode_barang }}</td>
												<td>{{ $bm->nama_supplier }}</td>
												<td>{{ $bm->stok }}</td>
												<td>{{ $bm->created_at->isoFormat('dddd, D MMMM Y') }}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<!-- [ Main Content ] end -->
		
	</div>
</div>
@endsection