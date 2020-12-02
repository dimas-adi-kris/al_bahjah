<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Validaso Data Santri </title>

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
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title text-dark text-center pt-3"> Validasi Data Santri </h3>
                                </div>

                                <!-- /.card-header -->
                                <div class="card-body detail-card">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-8 col-sm-12 p-3">
                                                <div class="row" id="detail-calon-santri">
                                                    <div class="col-12">
                                                        <h3 class=" text-dark"> Data Santri</h3>
                                                        <table class="table table-striped mb-5">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Nama</td>
                                                                    <td>:</td>
                                                                    <td id="nama"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>NIK</td>
                                                                    <td>:</td>
                                                                    <td id="nik"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Asal Sekolah</td>
                                                                    <td>:</td>
                                                                    <td id="asal_sekolah"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>TTL</td>
                                                                    <td>:</td>
                                                                    <td id="ttl"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Gender</td>
                                                                    <td>:</td>
                                                                    <td id="gender"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Alamat</td>
                                                                    <td>:</td>
                                                                    <td id="alamat"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Kota</td>
                                                                    <td>:</td>
                                                                    <td id="kota"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Negara</td>
                                                                    <td>:</td>
                                                                    <td id="negara"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Golongan Darah</td>
                                                                    <td>:</td>
                                                                    <td id="golongan_darah"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Riwayat Penyakit</td>
                                                                    <td>:</td>
                                                                    <td id="riwayat_penyakit"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Program</td>
                                                                    <td>:</td>
                                                                    <td id="program"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Periode</td>
                                                                    <td>:</td>
                                                                    <td id="periode"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row" id="detail-wali-calon-santri">
                                                    <div class="col-12 p-3">
                                                        <h3 class=" text-dark">Data Wali Santri</h3>
                                                        <table class="table table-striped">
                                                            <tbody>
                                                                <tr>
                                                                    <td scop="col">Nama</td>
                                                                    <td scop="col">:</td>
                                                                    <td scop="col" id="nama_wali_santri"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scop="row">NIK</td>
                                                                    <td>:</td>
                                                                    <td id="no_ktp_wali_santri"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scop="row">Email</td>
                                                                    <td>:</td>
                                                                    <td id="email_wali_santri"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scop="row">Gender</td>
                                                                    <td>:</td>
                                                                    <td id="gender_wali_santri"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scop="row">Hubungan</td>
                                                                    <td>:</td>
                                                                    <td id="hubungan_wali_santri"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scop="row">Pekerjaan</td>
                                                                    <td>:</td>
                                                                    <td id="pekerjaan_wali_santri"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scop="row">Alamat</td>
                                                                    <td>:</td>
                                                                    <td id="alamat_wali_santri"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scop="row">Kota</td>
                                                                    <td>:</td>
                                                                    <td id="kota_wali_santri"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scop="row">Negara</td>
                                                                    <td>:</td>
                                                                    <td id="negara_wali_santri"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scop="row">HP/Telepon</td>
                                                                    <td>:</td>
                                                                    <td id="telepon_wali_santri"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12 p-3">
                                                <div class="row">
                                                    <h3 class=" text-dark ml-3">Berkas Upload</h3>
                                                    <div class="col-12 mb-2">
                                                        <div class="card" style="width: 18rem;">
                                                            <div class="card-body">
                                                                <h2 class="card-title">Kartu Keluarga</h2><br>
                                                                <h6 class="text-muted">10:58, 09 November 2020</h6>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <div class="card" style="width: 18rem;">
                                                            <div class="card-body">
                                                                <h2 class="card-title">Raport</h2><br>
                                                                <h6 class="text-muted">10:58, 09 November 2020</h6>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <div class="card" style="width: 18rem;">
                                                            <div class="card-body">
                                                                <h2 class="card-title">Ijazah Terakhir</h2><br>
                                                                <h6 class="text-muted">10:58, 09 November 2020</h6>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 mb-2">
                                                        <div class="card" style="width: 18rem;">
                                                            <div class="card-body">
                                                                <h2 class="card-title">Kartu Keluarga</h2><br>
                                                                <h6 class="text-muted">10:58, 09 November 2020</h6>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <div class="card" style="width: 18rem;">
                                                            <div class="card-body">
                                                                <h2 class="card-title">Raport</h2><br>
                                                                <h6 class="text-muted">10:58, 09 November 2020</h6>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <div class="card" style="width: 18rem;">
                                                            <div class="card-body">
                                                                <h2 class="card-title">Ijazah Terakhir</h2><br>
                                                                <h6 class="text-muted">10:58, 09 November 2020</h6>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="card" style="width: 18rem;">
                                                            <div class="card-body">
                                                                <h2 class="card-title">Ijazah Terakhir</h2><br>
                                                                <h6 class="text-muted">10:58, 09 November 2020</h6>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <p><span class="text-danger">&ast;</span><span class="text-muted">Jika terdapat data yang salah, silahkan hubungi operator</span></p>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>

                            <div class="p-5">
                                <form id="form-validasi">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck" required>
                                            <label class="form-check-label" for="gridCheck">
                                                Saya menyetujui bahwa data yang tertera diatas adalah sebenar-benarnya, Jika ada kepalsuan data maka saya akan bertanggung jawab dan menerima resiko dalam bentuk apapun.
                                            </label>
                                        </div>
                                        <hr>
                                    </div>
                                    <button type="submit" class="btn btn-success float-right mb-5" id="btn-validasi"> Validasi </button>
                                </form>
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



    <!-- <textarea name="test" id="test" cols="30" rows="10"></textarea> -->
    <script>
        $(document).ready(function() {

            $.ajax({
                    method: "POST",
                    url: "<?= base_url() ?>user/getDataByIdCalonSantri",
                    data: {}
                })
                .done(function(msg) {
                    if (msg == 1) {
                        alert('Anda lulus, dan telah membuat akun. Silahkan login');
                        location.href.replace('<?= base_url(); ?>auth')
                    }
                });

            renderDataSantri();

            function renderDataSantri() {
                $.ajax({
                        method: "POST",
                        url: "<?= base_url() ?>user/getCalonSantriById",
                        data: {}
                    })

                    .done(function(msg) {
                        var res = JSON.parse(msg);
                        var calon_santri = res['calon_santri'];
                        var wali_calon_santri = res['wali_calon_santri']

                        //SET DATA TABEL SANTRI
                        $("#nama").text(calon_santri['nama']);
                        $("#nik").text(calon_santri['nik']);
                        $("#asal_sekolah").text(calon_santri['asal_sekolah']);
                        $("#ttl").text(`${calon_santri['tempat_lahir']}, ${calon_santri['tanggal_lahir'].split("-").reverse().join("-")}`);
                        $("#gender").text(calon_santri['gender']);
                        $("#alamat").text(calon_santri['alamat']);
                        $("#kota").text(calon_santri['kota']);
                        $("#negara").text(calon_santri['negara']);
                        $("#golongan_darah").text(calon_santri['golongan_darah']);
                        $("#riwayat_penyakit").text(calon_santri['riwayat_penyakit']);
                        $("#program").text(calon_santri['nama_program']);
                        $("#periode").html(calon_santri['tahun_ajaran_hijriyah'] + " Hijriyah / " + calon_santri['tahun_ajaran_masehi'] + " Masehi");

                        renderDataWali(wali_calon_santri);
                    });


            }


            function renderDataWali(wali_calon_santri) {


                // SET DATA TABEL WALI 
                $("#nama_wali_santri").text(wali_calon_santri['nama']);
                $("#no_ktp_wali_santri").text(wali_calon_santri['no_ktp']);
                $("#email_wali_santri").text(wali_calon_santri['email']);
                $("#gender_wali_santri").text(wali_calon_santri['gender']);
                $("#hubungan_wali_santri").text(wali_calon_santri['hubungan']);
                $("#pekerjaan_wali_santri").text(wali_calon_santri['pekerjaan']);
                $("#alamat_wali_santri").text(wali_calon_santri['alamat']);
                $("#kota_wali_santri").text(wali_calon_santri['kota']);
                $("#negara_wali_santri").text(wali_calon_santri['negara']);
                $("#telepon_wali_santri").text(wali_calon_santri['telepon'])
            }

            $("#form-validasi").submit(function() {
                event.preventDefault();
                document.location.replace('<?= base_url() ?>auth/registrasi');
            })
        });
    </script>
</body>

</html>