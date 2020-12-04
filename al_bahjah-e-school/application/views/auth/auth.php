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
    </style>
</head>

<body class="bg-gradient-success">


    <div id="main-content"></div>



    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url()?>assets/js/sb-admin-2.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#main-content").load("<?=base_url()?>index.php/Auth/cek_hasil_kelulusan");

            $("#main-content").on('click', '.cek_hasil_kelulusan', function() {
                event.preventDefault();
                $("#main-content").load("<?=base_url()?>index.php/Auth/cek_hasil_kelulusan");
                document.title = 'Cek Hasil Kelulusan';
            });

            $("#main-content").on('click', '.login', function() {
                event.preventDefault();
                document.location.replace('<?=base_url()?>index.php/Auth/akunLogin')
            });
        });
    </script>

</body>

</html>