
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Aplikasi Stok Barang</title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="{{ asset('template/dist/assets/images/favicon.ico') }}" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="{{ asset('template/dist/assets/css/style.css') }}">

</head>
<body class="">
	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar  ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				
				<div class="">
					<div class="main-menu-header">
						<img class="img-radius" src="{{ asset('template/dist/assets/images/user/avatar-2.jpg') }}" alt="User-Profile-Image">
						<div class="user-details">
							<span>Admin</span>
							<div id="more-details">{{ Auth::user()->name }}<i class="fa fa-chevron-down m-l-5"></i></div>
						</div>
					</div>
					<div class="collapse" id="nav-user-link">
						<ul class="list-unstyled">
							<li class="list-group-item" id="btnLogout"><a href="#"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
						</ul>
					</div>
				</div>
				
				<ul class="nav pcoded-inner-navbar ">
					@can('isOwner')
					<li class="nav-item {{ Request::is('owner') ? 'active' : '' }}">
						<a href="{{ route('owner') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-slack"></i></span><span class="pcoded-mtext">Owner Page</span></a>
					</li>
					@else
					<li class="nav-item pcoded-menu-caption">
						<label>Navigasi</label>
					</li>
					<li class="nav-item">
						<a href="{{ url('dashboard') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>
					<li class="nav-item pcoded-menu-caption">
						<label>Menu</label>
					</li>
					<li class="nav-item">
						<a href="{{ route('dataBarang.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Data Barang</span></a>
					</li>
					<li class="nav-item">
						<a href="{{ route('supplier.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Data Supplier</span></a>
					</li>
					<li class="nav-item">
						<a href="{{ route('barangMasuk.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-plus"></i></span><span class="pcoded-mtext">Data Barang Masuk</span></a>
					</li>
					<li class="nav-item">
						<a href="{{ route('barangKeluar.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-minus"></i></span><span class="pcoded-mtext">Data Barang Keluar</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-printer"></i></span><span class="pcoded-mtext">Rekap Data</span></a>
						<ul class="pcoded-submenu">
							<li><a href="/tampilsupplier">Suplier</a></li>
							<li><a href="/tampilbm">Barang Masuk</a></li>
							<li><a href="/tampilbk">Barang Keluar</a></li>
						</ul>
					</li>
					@endcan
				</ul>
				
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
		

		<div class="m-header">
			<a class="mobile-menu" id="mobile-collapse" href="#"><span></span></a>
			<a href="#!" class="b-brand">
				<!-- ========   change your logo hear   ============ -->
				<img src="{{ asset('template/dist/assets/images/logoAP.png') }}" alt="" class="logo">
				<img src="{{ asset('template/dist/assets/images/logo-icon.png') }}" alt="" class="logo-thumb">
			</a>
			<a href="#!" class="mob-toggler">
				<i class="feather icon-more-vertical"></i>
			</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
					<div class="search-bar">
						<input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
						<button type="button" class="close" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</li>
				
			</ul>
			<ul class="navbar-nav ml-auto">
				<li>
					<div class="dropdown drp-user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="feather icon-user"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right profile-notification">
							<div class="pro-head" id="btnLogout2">
								<img src="{{ asset('template/dist/assets/images/user/avatar-1.jpg') }}" class="img-radius" alt="User-Profile-Image">
								<span>{{ strtoupper(Auth::user()->username) }}</span>
								<a href="#" class="dud-logout" title="Logout">
									<i class="feather icon-log-out"></i>
								</a>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>


	</header>
	<!-- [ Header ] end -->
	
	

	<!-- [ Main Content ] start -->
	@yield('content')
	<!-- [ Main Content ] end -->

	<!-- Required Js -->
	<script src="{{ asset('template/dist/assets/js/vendor-all.min.js') }}"></script>
	<script src="{{ asset('template/dist/assets/js/plugins/bootstrap.min.js') }}"></script>
	<script src="{{ asset('template/dist/assets/js/pcoded.min.js') }}"></script>

	<!-- Apex Chart -->
	<script src="{{ asset('template/dist/assets/js/plugins/apexcharts.min.js') }}"></script>


	<!-- custom-chart js -->
	<script src="{{ asset('template/dist/assets/js/pages/dashboard-main.js') }}"></script>
	<script src="{{asset('jquery-3.6.0.min.js')}}"></script>
	<script src="{{asset('sweetalert2@11.js')}}"></script>


	<script>
		$('#btnLogout, #btnLogout2').click(function () {

			const user = '{{ Auth::user()->name }}';
			const token = $("meta[name='csrf-token']").attr("content");

		Swal.fire({
			  title: 'Apakah Anda Yakin?',
			  text:  user + ' akan Logout',
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Ya',
			  cancelButtonText: 'Tidak'
			}).then((result) => {
			  if (result.isConfirmed) {
			    	$.ajax({
                            type: 'POST',
                            url: '{{ route('logout') }}',
                            data: {
                                "_token": token,
                                "logout": true
                            },
                            success: function(data) {
                                const result = JSON.parse(data);
                                if (result.status == 'success') {
                                    window.location.href = result.url;
                                }
                            }
                        });
			  }
			})
		})
	</script>

</body>

</html>
