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
							<h5 class="m-b-10">Data Barang</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#!">Daftar Barang</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- [ breadcrumb ] end -->
		<!-- [ Main Content ] start -->
		<div class="row">
			<div class="col-sm-12">

				@if($message = Session::get('berhasil'))
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>{{ $message }}</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				@endif
				@if($message = Session::get('stok'))
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>{{ $message }}</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				@endif
				@if($message = Session::get('edit'))
				<div class="alert alert-primary alert-dismissible fade show" role="alert">
					<strong>{{ $message }}</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				@endif
				@if($message = Session::get('eror'))
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>{{ $message }} <b>Barang Masuk</b> dan <b>Barng Keluar</b></strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				@endif
				@if($message = Session::get('sukses'))
				<div class="alert alert-primary alert-dismissible fade show" role="alert">
					<strong>{{ $message }}</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				@endif

				<div class="card">
					<div class="card-header">
						<h5>Daftar Data Barang</h5>
					</div>
					<div class="card-body">
						<ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tabel Barang</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-uppercase" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tambah Barang</a>
							</li>
						</ul>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<p class="mb-0">berikut adalah tabel daftar data barang.
								</p>
								<br>
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th></th>
												<th>Kode Barang</th>
												<th>Nama Barang</th>
												<th>Harga</th>
												<th>Stok</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											@php
											$i = 1;
											@endphp
											@foreach($daBa as $db)
											<tr>
												<td>{{ $i++ }}</td>
												<td>{{ $db->kode_barang }}</td>
												<td>{{ $db->nama_barang }}</td>
												<td>{{ $db->harga }}</td>
												<td>{{ $db->stok }}</td>
												<td>
													<button type="button" class="btn  btn-icon btn-primary tooltip-test" title="edit" data-toggle="modal" data-target="#editdatabarang-{{ $db->id }}"><i class="feather icon-edit"></i></button>

													<button type="submit" form="{{ $db->id }}" onclick="return confirm('Data Akan dihapus?')" class="btn  btn-icon btn-danger tooltip-test" title="hapus" data-toggle="tooltip"><i class="feather icon-trash-2"></i></button>
													<form method="POST" id="{{ $db->id }}" action="{{ route('dataBarang.destroy', $db->id) }}">
														@csrf
														<input type="hidden" name="_method" value="DELETE">
													</form>

												</td>

												<!-- EDIT DATA BARANG -->
												
												<div id="editdatabarang-{{ $db->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalCenterTitle">Edit Data Barang</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															</div>
															<form action="{{ route('dataBarang.update',$db->id) }}" method="POST">
																@csrf
																<div class="modal-body">
																	<p class="mb-0">silahkan edit data barang.</p>
																	<br>
																	<input type="hidden" name="_method" value="PUT">
																	<div class="form-row">
																		<div class="form-group col-md-6">
																			<label for="inputkodebarang">Kode Barang</label>
																			<input type="text" class="form-control" id="inputkodebarang" placeholder="kode barang..." name="kode_barang" value="{{ $db->kode_barang }}">
																		</div>
																		<div class="form-group col-md-6">
																			<label for="inputnamabarang">Nama Barang</label>
																			<input type="text" class="form-control" id="inputnamabarang" placeholder="nama barang..." name="nama_barang" value="{{ $db->nama_barang }}">
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col-md-6">
																			<label for="inputharga">Harga</label>
																			<input type="number" class="form-control" id="inputharga"
																			placeholder="harga barang..." name="harga" value="{{ $db->harga }}">
																		</div>
																		<div class="form-group col-md-6">
																			<label for="inputstok">Stok</label>
																			<input type="number" class="form-control" id="inputstok" name="stok" placeholder="stok..." value="{{ $db->stok }}">
																		</div>
																	</div>

																</div>
																<div class="modal-footer">
																	<button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
																	<button type="submit" class="btn  btn-primary">Simpan Perubahan</button>
																</div>
															</form>
														</div>
													</div>
												</div>
												
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
								<p class="mb-0">silahkan tambahkan barang yang belum ada.</p>
								<br>
								<form action="{{ route('dataBarang.store') }}" method="POST">
									@csrf
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="inputkodebarang">Kode Barang</label>
											<input type="text" class="form-control" id="inputkodebarang" placeholder="kode barang..." name="kode_barang">
										</div>
										<div class="form-group col-md-6">
											<label for="inputnamabarang">Nama Barang</label>
											<input type="text" class="form-control" id="inputnamabarang" placeholder="nama barang..." name="nama_barang">
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="inputharga">Harga</label>
											<input type="number" class="form-control" id="inputharga"
											placeholder="harga barang..." name="harga">
										</div>
										<div class="form-group col-md-6">
											<label for="inputstok">Stok</label>
											<input type="number" class="form-control" id="inputstok" name="stok" placeholder="stok...">
										</div>
									</div>
									<div class="form-group">	
										<button type="submit" class="form-control btn btn-primary">Simpan Data</button>
									</div>
								</form>
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