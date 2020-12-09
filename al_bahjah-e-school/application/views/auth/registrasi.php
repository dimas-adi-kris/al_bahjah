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
	<link href="<?=base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?=base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="<?=base_url()?>assets/img/icon-albahjah-300x300.png" type="image/x-icon">


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

		p {
			font-size: .8em;
			margin: 0;
			padding: 0;
		}
	</style>
</head>

<body class="bg-gradient-success">


	<div id="main-content">

		<div class="container">
			<div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Buat Akun Santri</h1>

								</div>
								<div id="alert-box"></div>
								<form id="registrasi-santri">
									<div class="form-group">
										<input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email" required>
									</div>
									<p>* Gunakan email yang aktif. Kode verifikasi akan dikirimkan melalui email untuk mengaktifkan akun</p>
									<div class="form-group row">
										<div class="col-sm-6 mb-3 mb-sm-0">
											<input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan katasandi" required>

										</div>
										<div class="col-sm-6">
											<input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi katasandi" required>
										</div>
									</div>
									<button type="submit" class="btn btn-success btn-user btn-block">
										Daftarkan Akun
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<!-- Bootstrap core JavaScript-->
	<script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?=base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?=base_url()?>assets/js/sb-admin-2.min.js"></script>

	<script>
		$(document).ready(function() {

			$("#registrasi-santri").submit(function() {
				event.preventDefault();
				var formData = $(this).serialize();
				$.ajax({
					method: "POST",
					url: "<?=base_url()?>index.php/User/registrasi",
					data: formData
				}).done(function(msg) {
					var res = JSON.parse(msg);
					console.log(res['random_n']);
					// 0 Error
					// 1 Santri sudah melakukan pendaftaran
					// 2 Email telah terdaftar
					// 3 password tidak cocok
					// 4 sukses
					if (res['status'] == '0' || res['status'] == 0) {
						alert("Gagal melakukan registrai, silahkan hubungi operator")

					}
					else if (res['status'] == '1' || res['status'] == 1) {
						$("#alert-box").html('<div class="alert alert-danger">Santri sudah melakukan registrasi. Silahkan <a href="<?=base_url()?>index.php/Auth" class="btn-link">Login</a></div>');

					}
					else if (res['status'] == '2' || res['status'] == 2) {
						$("#alert-box").html('<div class="alert alert-danger">Email telah terdaftar, mohon gunakan email lain</div>');
					}
					else if (res['status'] == '3' || res['status'] == 3) {
						$("#alert-box").html('<div class="alert alert-danger">Password tidak cocok</div>');
					}
					else if (res['status'] == '4' || res['status'] == 4) {
						console.log(res['random_n']);
						alert("Registrasi Santri berhasil, silahkan login");
						// document.location.replace('<?=base_url()?>index.php/');
					}
					else {
						alert("Error");
					}
					$("#password").val('');
					$("#password2").val('');
				});
			});

		})
	</script>

</body>

</html>