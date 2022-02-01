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
							<h5 class="m-b-10">Cetak Data Barang Keluar</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#!">Data Barang Keluar</a></li>
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
						<h5>Daftar Data Barang Keluar</h5>
					</div>
					<div class="card-body">
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<a href="/cetakbk" class="btn btn-info mb-4" target="_blank">Cetak Data</a>
								<br>
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th></th>
												<th>Barang</th>
												<th>Kode Barang</th>
												<th>Stok Keluar</th>
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
												<td>{{ $bk->kode_barang }}</td>
												<td>{{ $bk->stok }}</td>
												<td>{{ $bk->created_at->isoFormat('dddd, D MMMM Y') }}</td>
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