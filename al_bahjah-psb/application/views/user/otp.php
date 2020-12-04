<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Verifikasi Kode OTP</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url();?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-success" id="main">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center mt-5">

            <div class=" col-lg-6 col-sm-8">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Token Registrasi</h1>
                                        <p class="mb-4">Silahkan masukkan token registrasi yang telah anda dapatkan setelah melakukan pembayaran uang pendaftaran</p>
                                    </div>
                                    <div class="alert-box"></div>
                                    <form id="verifikasi-otp-pembayaran">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="otp_pembayaran" name="otp_pembayaran" placeholder="Token Registrasi..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control form-control-user" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir...">
                                        </div>
                                        <button type="submit" class="btn btn-success btn-user btn-block" id="submit_button">Verifikasi Token</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="#">Tata cara pembayaran</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="#">Halaman Utama</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- jQuery -->
    <script src="<?=base_url()?>plugins/jquery/jquery.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url();?>assets/js/sb-admin-2.min.js"></script>

    <script>
        $(document).ready(function() {
            console.log("Bisa");
            $("#verifikasi-otp-pembayaran").submit(function() {
                event.preventDefault();
                var formData = $(this).serialize();
                console.log(formData);
                $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>index.php/Pembayaran/getDataByOtp",
                    data: formData
                }).done(function(msg) {
                    var res = JSON.parse(msg);
                    var data = res['data'];
                    console.log(res);
                    if (res['status'] == 0 || res['status'] == "0") {
                        $(".alert-box").html('<div class=" alert alert-danger">Kode OTP atau tanggal lahir salah</div>');
                    } else if (res['status'] == 1 || res['status'] == "1") {
                        if (data['status_verifikasi'] == "TERVERIFIKASI") {
                            alert("Kode OTP anda terkonfirmasi. Silahkan lanjutkan pendaftaran");
                            location.replace("<?=base_url()?>index.php/Auth/registrasi")
                        } else {
                            $(".alert-box").html('<div class=" alert alert-danger">Bukti pembayaran anda sedang diproses dan belum dikonfirmasi. Silahkan hubungi admin untuk info lebih lanjut</div>')
                        }
                    } else {
                        alert("Maaf, bukti pembayaran anda belum terverifikasi. Silahkan hubungi bendahara");
                    }
                })
            })
        });
    </script>

</body>

</html>