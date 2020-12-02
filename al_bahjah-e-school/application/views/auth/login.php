<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title> Login </title>

	<!-- Custom fonts for this template-->
	<link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="<?= base_url() ?>assets/img/icon-albahjah-300x300.png" type="image/x-icon">


	<style>
		.login-or {
			position: relative;
			color: #aaa;
			margin-top: 10px;
			margin-bottom: 10px;
			padding-top: 10px;
			padding-bottom: 10px;
		}

		.span-or {
			display: block;
			position: absolute;
			left: 50%;
			top: -2px;
			margin-left: -25px;
			background-color: #fff;
			width: 50px;
			text-align: center;
		}

		.hr-or {
			height: 1px;
			margin-top: 0px !important;
			margin-bottom: 0px !important;
		}

		.c-s {
			font-size: .8em;
		}
	</style>
</head>

<body class="bg-gradient-success">


	<div id="main-content">
		<div class="container">
			<!-- Outer Row -->
			<div class="row justify-content-center">
				<div class="col-lg-6 mt-5">
					<div class="card o-hidden border-0 shadow-lg my-5">
						<div class="card-body p-0">
							<!-- Nested Row within Card Body -->
							<div class="row">
								<div class="col-lg">
									<div class="p-5">
										<div class="text-center">
											<h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
										</div>
										<form id="login-santri">
											<div class="form-group">
												<input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Alamat Email ">
											</div>
											<div class="form-group">
												<input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
											</div>
											<button type="submit" class="btn btn-success btn-user btn-block" id="login-button">
												Login
											</button>
										</form>
										<hr />
										<div class="text-center">
											<a href="<?= base_url() ?>auth" class=" btn btn-link c-s cek_hasil_kelulusan">Cek Hasil Kelulusan!</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<!-- Bootstrap core JavaScript-->
	<script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>

	<script>
		$(document).ready(function() {
			$("#login-santri").submit(function() {
				event.preventDefault();
				var form = $(this).serialize();

				$("#login-button").append(
					`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`
				).attr('disabled', true);
				$.ajax({
					method: "POST",
					url: "<?= base_url() ?>auth/autentikasi_santri",
					data: form
				}).done(function(msg) {
					if (msg == 0 || msg == "0") {
						$("#alert").html(`<div class="alert alert-danger" role="alert">Email atau password salah</div>`);
					} else if (msg == 1 || msg == "1") {
						$("#alert").html(`<div class="alert alert-danger" role="alert">Akses Ditolak</div>`);
					} else {
						window.location.replace("<?= base_url() ?>santri");
					}
					$("#login-button").attr('disabled', false);
					$(".spinner-border").remove();
				});
			})
		});
	</script>

</body>

</html>