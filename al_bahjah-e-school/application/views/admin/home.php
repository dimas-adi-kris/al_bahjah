<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title> Al Bahjah </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->

    <link rel="stylesheet" href="<?=base_url()?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <!-- <link rel="stylesheet" href="<?=base_url()?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> -->
    <!-- iCheck -->
    <!-- <link rel="stylesheet" href="<?=base_url()?>plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->

    <!-- Date Picker -->
    <link rel="stylesheet" href="<?=base_url()?>plugins/daterangepicker/daterangepicker.css">

    <!-- data table -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url()?>dist/css/adminlte.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="shortcut icon" href="<?=base_url()?>assets/img/icon-albahjah-300x300.png" type="image/x-icon">
    <style>
        .o-f {
            overflow-x: scroll;
        }

        .dropdown-menu {
            max-height: 300px;
            overflow-y: auto;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="<?=base_url()?>dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="<?=base_url()?>dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="<?=base_url()?>dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="<?=base_url()?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?=base_url()?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
                        <!-- <li class="nav-header"> Dashboard </li>
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link" id="menu-profile">
                <i class="far fa-circle nav-icon"></i>
                <p> Profile </p>
              </a>
            </li> -->
                        <li class="nav-header"> Admin </li>
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link" id="dashboard">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link" id="santri">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Santri
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link" id="asatidz">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Asatidz
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link" id="asatidz_kelas">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Asatidz Kelas
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link" id="pembayaran">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Pembayaran
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link" id="ruang">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Ruang
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link" id="kelas_mata_pelajaran">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Kelas Mata Pelajaran
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link" id="mata_pelajaran">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Mata Pelajaran
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link" id="nilai_mata_pelajaran">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Nilai Mata Pelajaran
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link" id="tahun_pelajaran">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Tahun Pelajaran
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link" id="peserta_kelas">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Peserta Kelas
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link" id="kurikulum">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Kurikulum
                                </p>
                            </a>
                        </li>
                        <li class="has-treeview mt-2">
                            <a href="#" class="nav-link" id="logout">
                                <i class="fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark" id="page-title"> Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->

            <section class="content" id="main-content">
            </section>

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.5
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?=base_url()?>plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?=base_url()?>plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?=base_url()?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- AdminLTE App -->
    <script src="<?=base_url()?>dist/js/adminlte.js"></script>
    <!-- data table -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>


    <!-- AdminLTE for demo purposes -->
    <script src="<?=base_url()?>dist/js/demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        $("#main-content").load("<?=base_url()?>index.php/Admin/dashboard");
        // $("#menu-profile").click(function() {
        //   $("#page-title").text("Profile Sekolah");
        //   $("#main-content").load("<?=base_url()?>index.php/Index.php/profile/getProfilePage");
        // });
        $.ajax({
            method: "POST",
            url: "<?=base_url()?>index.php/Santri/getCalonSantriById",
            data: {}
        })
        .done(function(msg) {
            var res = JSON.parse(msg);
            $("#nama_profile").text(res['nama']);
        });

        $("#dashboard").click(function() {
            $("#main-content").load("<?=base_url()?>index.php/Admin/dashboard");
            $("#page-title").text("Dashboard");

            $("#dashboard .far").attr('class','fas fa-circle nav-icon');
            $("#santri .fas").attr('class','far fa-circle nav-icon');
            $("#asatidz .fas").attr('class','far fa-circle nav-icon');
            $("#asatidz_kelas .fas").attr('class','far fa-circle nav-icon');
            $("#pembayaran .fas").attr('class','far fa-circle nav-icon');
            $("#ruang .fas").attr('class','far fa-circle nav-icon');
            $("#kelas_mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#nilai_mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#tahun_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#peserta_kelas .fas").attr('class','far fa-circle nav-icon');
            $("#kurikulum .fas").attr('class','far fa-circle nav-icon');

        });

        $("#santri").click(function() {
            $("#main-content").load("<?=base_url()?>index.php/Admin/santri");
            $("#page-title").text("Santri");

            $("#dashboard .fas").attr('class','far fa-circle nav-icon');
            $("#santri .far").attr('class','fas fa-circle nav-icon');
            $("#asatidz .fas").attr('class','far fa-circle nav-icon');
            $("#asatidz_kelas .fas").attr('class','far fa-circle nav-icon');
            $("#pembayaran .fas").attr('class','far fa-circle nav-icon');
            $("#ruang .fas").attr('class','far fa-circle nav-icon');
            $("#kelas_mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#nilai_mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#tahun_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#peserta_kelas .fas").attr('class','far fa-circle nav-icon');
            $("#kurikulum .fas").attr('class','far fa-circle nav-icon');


        });

        $("#asatidz").click(function() {
            $("#main-content").load("<?=base_url()?>index.php/Admin/asatidz");
            $("#page-title").text("Asatidz");

            $("#dashboard .fas").attr('class','far fa-circle nav-icon');
            $("#santri .fas").attr('class','far fa-circle nav-icon');
            $("#asatidz .far").attr('class','fas fa-circle nav-icon');
            $("#asatidz_kelas .fas").attr('class','far fa-circle nav-icon');
            $("#pembayaran .fas").attr('class','far fa-circle nav-icon');
            $("#ruang .fas").attr('class','far fa-circle nav-icon');
            $("#kelas_mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#nilai_mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#tahun_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#peserta_kelas .fas").attr('class','far fa-circle nav-icon');
            $("#kurikulum .fas").attr('class','far fa-circle nav-icon');

        });

        $("#asatidz_kelas").click(function() {
            $("#main-content").load("<?=base_url()?>index.php/Admin/asatidz_kelas");
            $("#page-title").text("Asatidz Kelas");

            $("#dashboard .fas").attr('class','far fa-circle nav-icon');
            $("#santri .fas").attr('class','far fa-circle nav-icon');
            $("#asatidz .fas").attr('class','far fa-circle nav-icon');
            $("#asatidz_kelas .far").attr('class','fas fa-circle nav-icon');
            $("#pembayaran .fas").attr('class','far fa-circle nav-icon');
            $("#ruang .fas").attr('class','far fa-circle nav-icon');
            $("#kelas_mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#nilai_mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#tahun_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#peserta_kelas .fas").attr('class','far fa-circle nav-icon');
            $("#kurikulum .fas").attr('class','far fa-circle nav-icon');

        });

        $("#pembayaran").click(function() {
            $("#main-content").load("<?=base_url()?>index.php/Admin/pembayaran");
            $("#page-title").text("Pembayaran");

            $("#dashboard .fas").attr('class','far fa-circle nav-icon');
            $("#santri .fas").attr('class','far fa-circle nav-icon');
            $("#asatidz .fas").attr('class','far fa-circle nav-icon');
            $("#asatidz_kelas .fas").attr('class','far fa-circle nav-icon');
            $("#pembayaran .far").attr('class','fas fa-circle nav-icon');
            $("#ruang .fas").attr('class','far fa-circle nav-icon');
            $("#kelas_mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#nilai_mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#tahun_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#peserta_kelas .fas").attr('class','far fa-circle nav-icon');
            $("#kurikulum .fas").attr('class','far fa-circle nav-icon');

        });

        $("#ruang").click(function() {
            $("#main-content").load("<?=base_url()?>index.php/Admin/ruang");
            $("#page-title").text("Ruang");

            $("#dashboard .fas").attr('class','far fa-circle nav-icon');
            $("#santri .fas").attr('class','far fa-circle nav-icon');
            $("#asatidz .fas").attr('class','far fa-circle nav-icon');
            $("#asatidz_kelas .fas").attr('class','far fa-circle nav-icon');
            $("#pembayaran .fas").attr('class','far fa-circle nav-icon');
            $("#ruang .far").attr('class','fas fa-circle nav-icon');
            $("#kelas_mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#nilai_mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#tahun_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#peserta_kelas .fas").attr('class','far fa-circle nav-icon');
            $("#kurikulum .fas").attr('class','far fa-circle nav-icon');

        });

        $("#kelas_mata_pelajaran").click(function() {
            $("#main-content").load("<?=base_url()?>index.php/Admin/kelas_mata_pelajaran");
            $("#page-title").text("Kelas Mata Pelajaran");

            $("#dashboard .fas").attr('class','far fa-circle nav-icon');
            $("#santri .fas").attr('class','far fa-circle nav-icon');
            $("#asatidz .fas").attr('class','far fa-circle nav-icon');
            $("#asatidz_kelas .fas").attr('class','far fa-circle nav-icon');
            $("#pembayaran .fas").attr('class','far fa-circle nav-icon');
            $("#ruang .fas").attr('class','far fa-circle nav-icon');
            $("#kelas_mata_pelajaran .far").attr('class','fas fa-circle nav-icon');
            $("#mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#nilai_mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#tahun_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#peserta_kelas .fas").attr('class','far fa-circle nav-icon');
            $("#kurikulum .fas").attr('class','far fa-circle nav-icon');

        });

        $("#mata_pelajaran").click(function() {
            $("#main-content").load("<?=base_url()?>index.php/Admin/mata_pelajaran");
            $("#page-title").text("Mata Pelajaran");

            $("#dashboard .fas").attr('class','far fa-circle nav-icon');
            $("#santri .fas").attr('class','far fa-circle nav-icon');
            $("#asatidz .fas").attr('class','far fa-circle nav-icon');
            $("#asatidz_kelas .fas").attr('class','far fa-circle nav-icon');
            $("#pembayaran .fas").attr('class','far fa-circle nav-icon');
            $("#ruang .fas").attr('class','far fa-circle nav-icon');
            $("#kelas_mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#mata_pelajaran .far").attr('class','fas fa-circle nav-icon');
            $("#nilai_mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#tahun_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#peserta_kelas .fas").attr('class','far fa-circle nav-icon');
            $("#kurikulum .fas").attr('class','far fa-circle nav-icon');

        });

        $("#nilai_mata_pelajaran").click(function() {
            $("#main-content").load("<?=base_url()?>index.php/Admin/nilai_mata_pelajaran");
            $("#page-title").text("Nilai Mata Pelajaran");

            $("#dashboard .fas").attr('class','far fa-circle nav-icon');
            $("#santri .fas").attr('class','far fa-circle nav-icon');
            $("#asatidz .fas").attr('class','far fa-circle nav-icon');
            $("#asatidz_kelas .fas").attr('class','far fa-circle nav-icon');
            $("#pembayaran .fas").attr('class','far fa-circle nav-icon');
            $("#ruang .fas").attr('class','far fa-circle nav-icon');
            $("#kelas_mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#nilai_mata_pelajaran .far").attr('class','fas fa-circle nav-icon');
            $("#tahun_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#peserta_kelas .fas").attr('class','far fa-circle nav-icon');
            $("#kurikulum .fas").attr('class','far fa-circle nav-icon');

        });

        $("#tahun_pelajaran").click(function() {
            $("#main-content").load("<?=base_url()?>index.php/Admin/tahun_pelajaran");
            $("#page-title").text("Tahun Pelajaran");

            $("#dashboard .fas").attr('class','far fa-circle nav-icon');
            $("#santri .fas").attr('class','far fa-circle nav-icon');
            $("#asatidz .fas").attr('class','far fa-circle nav-icon');
            $("#asatidz_kelas .fas").attr('class','far fa-circle nav-icon');
            $("#pembayaran .fas").attr('class','far fa-circle nav-icon');
            $("#ruang .fas").attr('class','far fa-circle nav-icon');
            $("#kelas_mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#nilai_mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#tahun_pelajaran .far").attr('class','fas fa-circle nav-icon');
            $("#peserta_kelas .fas").attr('class','far fa-circle nav-icon');
            $("#kurikulum .fas").attr('class','far fa-circle nav-icon');

        });

        $("#peserta_kelas").click(function() {
            $("#main-content").load("<?=base_url()?>index.php/Admin/peserta_kelas");
            $("#page-title").text("Peserta Kelas");

            $("#dashboard .fas").attr('class','far fa-circle nav-icon');
            $("#santri .fas").attr('class','far fa-circle nav-icon');
            $("#asatidz .fas").attr('class','far fa-circle nav-icon');
            $("#asatidz_kelas .fas").attr('class','far fa-circle nav-icon');
            $("#pembayaran .fas").attr('class','far fa-circle nav-icon');
            $("#ruang .fas").attr('class','far fa-circle nav-icon');
            $("#kelas_mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#nilai_mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#tahun_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#peserta_kelas .far").attr('class','fas fa-circle nav-icon');
            $("#kurikulum .fas").attr('class','far fa-circle nav-icon');

        });

        $("#kurikulum").click(function() {
            $("#main-content").load("<?=base_url()?>index.php/Admin/kurikulum");
            $("#page-title").text("Kurikulum");

            $("#dashboard .fas").attr('class','far fa-circle nav-icon');
            $("#santri .fas").attr('class','far fa-circle nav-icon');
            $("#asatidz .fas").attr('class','far fa-circle nav-icon');
            $("#asatidz_kelas .fas").attr('class','far fa-circle nav-icon');
            $("#pembayaran .fas").attr('class','far fa-circle nav-icon');
            $("#ruang .fas").attr('class','far fa-circle nav-icon');
            $("#kelas_mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#nilai_mata_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#tahun_pelajaran .fas").attr('class','far fa-circle nav-icon');
            $("#peserta_kelas .fas").attr('class','far fa-circle nav-icon');
            $("#kurikulum .far").attr('class','fas fa-circle nav-icon');

        });

        $("#logout").click(function() {
            if (confirm("Anda yakin ingin logout?")) {
                $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>index.php/Admin/logout",
                    data: {}
                }).done(function(msg) {
                    if (msg == 1 || msg == "1") {
                        document.location.replace("<?=base_url()?>index.php/");
                    }
                })
            } else {
                alert("Gagal logout")
            }
        });

        $(".nav-item").click(function() {
            $('.nav-item').removeClass('menu-open');
            $(this).addClass('menu-open')
        })

        $(function() {
            $('.selectpicker').selectpicker();
        });
    });
</script>