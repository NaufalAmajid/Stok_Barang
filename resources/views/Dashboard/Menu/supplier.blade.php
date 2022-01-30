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
							<h5 class="m-b-10">Data Supplier</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#!">Daftar Supplier</a></li>
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
				@if($message = Session::get('edit'))
				<div class="alert alert-primary alert-dismissible fade show" role="alert">
					<strong>{{ $message }}</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				@endif
				<div class="card">
					<div class="card-header">
						<h5>Daftar Data Supplier</h5>
					</div>
					<div class="card-body">
						<ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tabel Supplier</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-uppercase" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tambah Supplier</a>
							</li>
						</ul>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<p class="mb-0">berikut adalah tabel daftar data supplier.
								</p>
								<br>
								<div class="table-responsive">
									<table class="table table-striped">
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
											@foreach($daSu as $ds)
											<tr>
												<td>{{ $i++ }}</td>
												<td>{{ $ds->kode_supplier }}</td>
												<td>{{ $ds->nama_supplier }}</td>
												<td>{{ $ds->email }}</td>
												<td>{{ $ds->telephone }}</td>
												<td>
													<button type="button" class="btn  btn-icon btn-primary tooltip-test" title="edit" data-toggle="modal" data-target="#editsupplier-{{ $ds->id }}"><i class="feather icon-edit"></i></button>

													<button type="submit" form="{{ $ds->id }}" onclick="return confirm('Data Akan dihapus?')" class="btn  btn-icon btn-danger tooltip-test" title="hapus" data-toggle="tooltip"><i class="feather icon-trash-2"></i></button>
													<form method="POST" id="{{ $ds->id }}" action="{{ route('supplier.destroy', $ds->id) }}">
														@csrf
														<input type="hidden" name="_method" value="DELETE">
													</form>

												</td>

												<!-- EDIT DATA BARANG -->
												
												<div id="editsupplier-{{ $ds->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalCenterTitle">Edit Data Supplier</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															</div>
															<form action="{{ route('supplier.update',$ds->id) }}" method="POST">
																@csrf
																<div class="modal-body">
																	<p class="mb-0">silahkan edit data supplier.</p>
																	<br>
																	<input type="hidden" name="_method" value="PUT">
																	<div class="form-row">
																		<div class="form-group col-md-6">
																			<label for="inputkodesupplier">Kode Supplier</label>
																			<input type="text" class="form-control" id="inputkodesupplier" placeholder="kode supplier..." name="kode_supplier" value="{{ $ds->kode_supplier }}">
																		</div>
																		<div class="form-group col-md-6">
																			<label for="inputnamasupplier">Nama Supplier</label>
																			<input type="text" class="form-control" id="inputnamasupplier" placeholder="nama supplier..." name="nama_supplier" value="{{ $ds->nama_supplier }}">
																		</div>
																	</div>
																	<div class="form-row">
																		<div class="form-group col-md-6">
																			<label for="inputemail">Email</label>
																			<input type="email" class="form-control" id="inputemail"
																			placeholder="email supplier..." name="email" value="{{ $ds->email }}">
																		</div>
																		<div class="form-group col-md-6">
																			<label for="inputtele">Telephone</label>
																			<input type="number" class="form-control" id="inputtele"
																			placeholder="telephone supplier..." name="telephone" value="{{ $ds->telephone }}">
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
								<p class="mb-0">silahkan tambahkan data supplier yang belum ada.</p>
								<br>
								<form action="{{ route('supplier.store') }}" method="POST">
									@csrf
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="inputkodesupplier">Kode Supplier</label>
											<input type="text" class="form-control" id="inputkodesupplier" placeholder="kode supplier..." name="kode_supplier" autocomplete="off">
										</div>
										<div class="form-group col-md-6">
											<label for="inputnamasupplier">Nama Supplier</label>
											<input type="text" class="form-control" id="inputnamasupplier" placeholder="nama supplier..." name="nama_supplier" autocomplete="off">
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="inputemail">Email</label>
											<input type="email" class="form-control" id="inputemail"
											placeholder="email supplier..." name="email" autocomplete="off">
										</div>
										<div class="form-group col-md-6">
											<label for="inputtele">Telephone</label>
											<input type="number" class="form-control" id="inputtele"
											placeholder="telephone supplier..." name="telephone" autocomplete="off">
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