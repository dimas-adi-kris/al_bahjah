<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Al Bahjah | Registrasi </title>

    <!-- Custom fonts for this template-->
    <link href="<?=base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- jsPdf -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- bs-stepper  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">

    <link rel="shortcut icon" href="<?=base_url();?>assets/img/icon-albahjah-300x300.png" type="image/x-icon">
</head>

<body class="bg-gradient-success">

    <div class="container">

        <div class="bs-stepper">
            <div class="bs-stepper-header" role="tablist">
                <!-- your steps here -->
                <div class="step" id="step-calon-santri">
                    <button type="button" class="step-trigger" role="tab" aria-controls="step-calon-santri" id="btn-step-calon-santri">
                        <span class="bs-stepper-circle bg-white text-success">1</span>
                        <span class="bs-stepper-label text-white">Calon Santri</span>
                    </button>
                </div>
                <div class="line"></div>
                <div class="step" id="step-wali-calon-santri">
                    <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="btn-step-wali-calon-santri" disabled>
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Wali Calon Santri</span>
                    </button>
                </div>
                <div class="line"></div>
                <div class="step" id="step-berkas">
                    <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="btn-step-berkas" disabled>
                        <span class="bs-stepper-circle">3</span>
                        <span class="bs-stepper-label">Upload Berkas</span>
                    </button>
                </div>
                <div class="line"></div>
                <div class="step" id="step-finalisasi">
                    <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="btn-step-finalisasi" disabled>
                        <span class="bs-stepper-circle">4</span>
                        <span class="bs-stepper-label">Finalisasi</span>
                    </button>
                </div>
            </div>
        </div>

        <div id="main-content">

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url()?>assets/js/sb-admin-2.min.js"></script>

    <!-- bs-stepper -->
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#main-content").load("<?=base_url();?>index.php/Auth/registrasi_santri")
            $("#btn-step-calon-santri").click(function() {
                $("#main-content").load("<?=base_url()?>index.php/Auth/registrasi_santri");
            });
            $("#btn-step-wali-calon-santri").click(function() {
                $("#main-content").load("<?=base_url()?>index.php/Auth/registrasi_wali");
            });
            $("#btn-step-berkas").click(function() {
                $("#main-content").load("<?=base_url()?>index.php/Auth/registrasi_berkas");
            });
            $("#btn-step-finalisasi").click(function() {
                $("#main-content").load("<?=base_url()?>index.php/Auth/registrasi_finalisasi");
            });

            $(".step-trigger").click(function() {
                $(".bs-stepper-circle").removeClass("bg-white text-success");
                $(".bs-stepper-label").removeClass("text-white");
                $(this).children(".bs-stepper-circle").addClass("bg-white text-success")
                $(this).children(".bs-stepper-label").addClass("text-white")
                // console.log($(this).children(".bs-stepper-circle"));
            })
        });
    </script>

</body>

</html>