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
							<h5 class="m-b-10">Dashboard Daftar Barang</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#!">Dashboard Analytics</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- [ breadcrumb ] end -->
		<!-- [ Main Content ] start -->
		<div class="row">
			<!-- table card-1 start -->
			<div class="col-md-12 col-xl-4">
				<!-- widget primary card start -->
				<div class="card flat-card widget-primary-card">
					<div class="row-table">
						<div class="col-sm-3 card-body">
							<i class="fas fa-file-import"></i>
						</div>
						<div class="col-sm-9">
							<h4>{{ $jbm }}</h4>
							<h6>Barang Masuk</h6>
						</div>
					</div>
				</div>
				<!-- widget primary card end -->
			</div>
			<!-- table card-1 end -->
			<!-- table card-2 start -->
			<div class="col-md-12 col-xl-4">
				<!-- widget-success-card start -->
				<div class="card flat-card widget-purple-card">
					<div class="row-table">
						<div class="col-sm-3 card-body">
							<i class="fas fa-file-export"></i>
						</div>
						<div class="col-sm-9">
							<h4>{{ $jbk }}</h4>
							<h6>Barang Keluar</h6>
						</div>
					</div>
				</div>
				<!-- widget-success-card end -->
			</div>
			<!-- table card-2 end -->
			<!-- table card-3 start -->
			<div class="col-md-12 col-xl-4">
				<!-- widget-success-card start -->
				<div class="card flat-card widget-primary-card">
					<div class="row-table">
						<div class="col-sm-3 card-body">
							<i class="fas fa-users"></i>
						</div>
						<div class="col-sm-9">
							<h4>{{ $js }}</h4>
							<h6>Supplier</h6>
						</div>
					</div>
				</div>
				<!-- widget-success-card end -->
			</div>
			<!-- table card-3 end -->
		</div>
		<!-- [ Main Content ] end -->
	</div>
</div>
@endsection