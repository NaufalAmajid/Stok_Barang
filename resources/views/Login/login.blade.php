
<!DOCTYPE html>
<html lang="en">

<head>

	<title>Aplikasi Stock Barang</title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="{{asset('template/dist/assets/images/favicon.ico')}}" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="{{asset('template/dist/assets/css/style.css')}}">
	
	


</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content text-center">
		<img src="{{asset('template/dist/assets/images/aston printer.png')}}" alt="" class="img-fluid mb-4">
		<div class="card borderless">
			<div class="row align-items-center ">
				<div class="col-md-12">
					<div class="card-body">
						<form action="javascript:void(0)" method="post" id="formLogin">
							@csrf
							<h4 class="mb-3 f-w-400">Login</h4>
							<hr>
							<div class="form-group mb-3">
								<input type="text" class="form-control" id="username" placeholder="Please Enter Your Username" autocomplete="off">
							</div>
							<div class="form-group mb-4">
								<input type="password" class="form-control" id="password" placeholder="Please Enter Your Password" autocomplete="off">
							</div>
							<button class="btn btn-block btn-primary mb-4" id="btnSubmit">Signin</button>
							<hr>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="{{asset('template/dist/assets/js/vendor-all.min.js')}}"></script>
<script src="{{asset('template/dist/assets/js/plugins/bootstrap.min.js')}}"></script>

<script src="{{asset('template/dist/assets/js/pcoded.min.js')}}"></script>
<script src="{{asset('jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('sweetalert2@11.js')}}"></script>

<script type="text/javascript">
	$('#btnSubmit').click(function () {

		var username = $('#username').val();
        var password = $('#password').val();
        var token = $("meta[name='csrf-token']").attr("content");

        if(username != '' && password != ''){

			$.ajax({
                type: 'POST',
                url: '{{ route('prosesLogin') }}',
                data: {
                	"username": username,
                    "password": password,
                    "_token": token
                },
                success: function(data) {
                	const result = JSON.parse(data);
                    const status = result.status;
                    
                    if (status == 'success') {
                    	
                        Swal.fire({
						  icon: 'success',
						  title: 'Login Berhasil',
						  text: `Selamat Datang`
						}).then(function() {
                        	window.location.href = result.url;
                        });

                    }else{
                    	Swal.fire({
						  icon: 'error',
						  title: 'Login Gagal',
						  text: `Silahkan Coba Kembali`
						});
                    }
                },
                error: function(data) {
                	swal.fire({
                    	icon: 'warning',
                        text: data.responseJSON.message,
                        type: 'warning',
                        confirmButtonText: 'OK'
                    });
                    	// console.log(data);
                 }
            });

        }else{

        	Swal.fire({
			  icon: 'error',
			  title: 'Login Gagal',
			  text: `Silahkan Coba Kembali`
			});

        }

	})
</script>>
</body>

</html>
