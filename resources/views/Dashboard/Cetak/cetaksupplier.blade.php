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
							<h5 class="m-b-10">Cetak Data Supplier</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#!">Data Supplier</a></li>
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
						<h5>Daftar Data Supplier</h5>
					</div>
					<div class="card-body">
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<a href="/cetaks" class="btn btn-info mb-4" target="_blank">Cetak Data</a>
								<br>
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th></th>
												<th>Nama Supplier</th>
												<th>Kode Supplier</th>
												<th>Email</th>
												<th>Telephone</th>
											</tr>
										</thead>
										<tbody>
											@php
											$i = 1;
											@endphp
											@foreach($dasu as $ds)
											<tr>
												<td>{{ $i++ }}</td>
												<td>{{ $ds->nama_supplier }}</td>
												<td>{{ $ds->kode_supplier }}</td>
												<td>{{ $ds->email }}</td>
												<td>{{ $ds->telephone }}</td>
												
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