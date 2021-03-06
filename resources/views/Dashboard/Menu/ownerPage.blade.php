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
							<h5 class="m-b-10">Halaman Owner</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#!">Owner</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- [ Main Content ] start -->
		<div class="row">
			<div class="col-sm-12">

				<div class="card">
					<div class="card-header">
						<h5>Cetak Semua Data</h5>
					</div>
					<div class="card-body">
						<ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Cetak Data Suplier</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-uppercase" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Cetak Barang Masuk</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-uppercase" id="cbk-tab" data-toggle="tab" href="#cbk" role="tab" aria-controls="cbk" aria-selected="false">Cetak Barang Keluar</a>
							</li>
						</ul>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<div class="table-responsive">
									<table class="table table-striped table-dark">
										<thead>
											<tr>
												<th></th>
												<th>Kode Supplier</th>
												<th>Nama Supplier</th>
												<th>Email</th>
												<th>Telephone</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											@php
											$i = 1;
											@endphp
											@foreach($dasu as $ds)
											<tr>
												<td>{{ $i++ }}</td>
												<td>{{ $ds->kode_supplier }}</td>
												<td>{{ $ds->nama_supplier }}</td>
												<td>{{ $ds->email }}</td>
												<td>{{ $ds->telephone }}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
								<div class="row mt-2">
									<div class="col-lg-12">									
										<a href="/cetaks" class="btn btn-info col-lg-12 mb-4" target="_blank">Cetak Data Suplier</a>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
								<div class="table-responsive">
									<table class="table table-striped table-dark">
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
								<div class="row mt-2">
									<div class="col-lg-12">									
										<a href="/cetakbm" class="btn btn-info col-lg-12 mb-4" target="_blank">Cetak Barang Masuk</a>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="cbk" role="tabpanel" aria-labelledby="cbk-tab">
								<div class="table-responsive">
									<table class="table table-striped table-dark">
										<thead>
											<tr>
												<th></th>
												<th>Barang</th>
												<th>Stok</th>
												<th>Tanggal Keluar</th>
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
												<td>{{ $bk->stok }}</td>
												<td>{{ $bk->created_at }}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
								<div class="row mt-2">
									<div class="col-lg-12">									
										<a href="/cetakbk" class="btn btn-info col-lg-12 mb-4" target="_blank">Cetak Barang Keluar</a>
									</div>
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