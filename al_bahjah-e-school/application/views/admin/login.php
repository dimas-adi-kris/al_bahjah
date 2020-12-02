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
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/icon-albahjah-300x300.png" type="image/x-icon">


    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

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
    </style>
</head>

<body class="bg-gradient-success">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center mt-5">

            <div class="col-xl-5 col-lg-6 col-md-8">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login ADMIN</h1>
                                    </div>
                                    <div id="alert"></div>
                                    <form class="user" id="form-login">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email" id="email" placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password">
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                                            </div>
                                        </div> -->
                                        <button type="submit" class="btn btn-success btn-user btn-block" id="login-button">
                                            Login
                                        </button>
                                        <!-- <div class="col-md-12 ">
                                            <div class="login-or">
                                                <hr class="hr-or">
                                                <span class="span-or">or</span>
                                            </div>
                                        </div> -->
                                        <!-- <a href="#" class="btn btn-outline-primary btn-user btn-block">
                                            Login as Bendahara
                                        </a> -->
                                        <br>

                                    </form>

                                    <div class="text-center">
                                        <a class="small" href="#">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <!-- <a class="small" href="#">Create an Account!</a> -->
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
            $("#form-login").submit(function() {
                event.preventDefault();
                var form = $(this).serialize();

                $("#login-button").append(
                    `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`
                ).attr('disabled', true);
                $.ajax({
                    method: "POST",
                    url: "<?= base_url() ?>auth/autentikasi_admin",
                    data: form
                }).done(function(msg) {
                    if (msg == 0 || msg == "0") {
                        $("#alert").html(`<div class="alert alert-danger" role="alert">Email atau password salah</div>`);
                    } else if (msg == 1 || msg == "1") {
                        $("#alert").html(`<div class="alert alert-danger" role="alert">Akses Ditolak</div>`);
                    } else {
                        window.location.replace("<?= base_url() ?>admin");
                    }
                    $("#login-button").attr('disabled', false);
                    $(".spinner-border").remove();
                });
            })
        });
    </script>

</body>

</html>