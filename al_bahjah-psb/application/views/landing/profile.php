<!-- About Me Box -->
<!-- Illustrations -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <!-- Card Header -->
        <h3 class="m-0 font-weight-bold text-success"> Telah Dibuka ! Pendaftaran Santri Formal SDIQU AL-BAHJAH Tahun Ajaran <span id="tahun_hijriyah">1442/1443 H</span> atau <span id="tahun_masehi">2021/2022 M</span> </h3>
    </div>
    <div class="card-body row my-5">
        <div class="col-md-6 my-4">
            <p>Lembaga Pengembangan Dakwah <a target="_blank" rel="nofollow" href="#"> Al-Bahjah </a> (LPD Al Bahjah) atau yang lebih dikenal dengan Al-Bahjah kelahirannya diawali dengan serangkaian perjalanan dakwah Buya Yahya, ulama muda kharismatik yang kemudian menjadi pendiri dari lembaga dakwah yang terletak di Kelurahan Sendang No. 179 Blok. Gudang Air Kecamatan Sumber Kabupaten Cirebon Jawa Barat yang semakin berkembang itu. <br> </p>
            <a rel="nofollow" href="#">
                <button class="btn btn-success my-5" style="border-radius:20rem!important;">
                    <h5 class="mt-1">Informasi Lebih Lanjut&rarr;</h5>
                </button> </a>
        </div>

        <div class="text-center col-md-6 mb-2">
            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width:25rem;" src="<?=base_url()?>assets/img/albahjahlogo.png" alt="">
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <!-- Card Header -->
        <h3 class="m-0 font-weight-bold text-success"> Timeline Waktu Pendaftaran </h3>
    </div>
    <div class="card-body row">
        <div class="text-center col-md-6">
            <i class="far fa-calendar-alt px-3 px-sm-4 mt-3 mb-4 text-success" style="font-size:15rem;"></i>
        </div>

        <div class="col-md-6 my-5">
            <i class="fas fa-calendar-alt"></i><strong> Waktu Pendaftaran </strong><br><br>
            <ul>
                <li>
                    <p class="font-weight-bold">
                        <strong> <span id="tanggal_buka"> Tanggal Buka </span>
                            <span id="tahun_hijriyah"> Tahun hijriyah </span> <span> / </span>
                            <span id="tahun_masehi"> Tahun Masehi </span>
                        </strong>
                    </p>
                </li>
                <li>
                    <p class="font-weight-bold" id="tanggal_tutup">
                        <strong> <span id="tanggal_tutup"> Tanggal Tutup </span>
                            <span id="tahun_hijriyah"> Tahun hijriyah </span> <span> / </span>
                            <span id="tahun_masehi"> Tahun Masehi </span>
                        </strong>
                    </p>
                </li>
            </ul>

            <!-- <p><strong>
                        14 Shafar – 16 Jumadil Awal 1442 H<br>
                        (01 Oktober – 31 Desember 2020 M) </strong><br> <br>
                    </p> -->

            <a rel="nofollow" href="<?=base_url()?>index.php/Auth/otp">
                <button class="btn btn-success c" style="border-radius:20rem!important;">
                    <h5 class="mt-2">Klik untuk pendaftaran&rarr;</h5>
                </button> </a>
        </div>

    </div>
</div>

<div class="row">

    <div class="card shadow mb-4 col-md-6">
        <div class="card-header py-3">
            <!-- Card Header -->
            <h3 class="m-0 font-weight-bold text-success"> Program Unggulan </h3>
        </div>
        <div class="card-body row">
            <div class="col-md-6 my-5">
                <ol>
                    <li> Lingkungan Belajar Islami</li>
                    <li>Pembiasaan Ibadah</li>
                    <li>Program Tahsin dan Tahfidz Qur’an Metode Tashili</li>
                    <li>Pembinaan Karakter Berbasis Pesantren</li>
                    <li>Pengembangan Minat dan Bakat Santri</li>
                    <li>Bimbingan Konseling</li>
                    <li>Outing Class</li>
                    <li>Kegiatan Ekstrakulikuler</li>
                    <li>Tenaga Pendidikan yang Tersertifkasi</li>
                    <li>Program Mabit / Boarding</li>
                    <li>Terakreditas A (Sangat Baik)</li>
                </ol>
            </div>

            <div class="text-center col-md-6">
                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15rem;" src="<?=base_url()?>assets/img/MASKOT-ANIN.PNG" alt="">
            </div>
        </div>



    </div>

    <div class="card shadow mb-4  col-md-6">
        <div class="card-header py-3">
            <!-- Card Header -->
            <h3 class="m-0 font-weight-bold text-success"> Persyaratan </h3>
        </div>
        <div class="card-body row">
            <div class="col-md-6 my-5">
                <ol>
                    <li> Pas Foto 3X4 @3 Lembar</li>
                    <li>FC Akta Kelahiran</li>
                    <li> FC Kartu Keluarga</li>
                    <li>Mengisi Formulir Pendaftaran</li>
                    <li>Membayar Biaya Pendaftaran @Rp. 300.000</li>

                </ol>
            </div>

            <div class="text-center col-md-6">
                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15rem;" src="<?=base_url()?>assets/img/MASKOT-QOSIM.PNG" alt="">
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>index.php/Periode/getPeriode",
                    data: {}
                })
                .done(function(msg) {
                    var periode = JSON.parse(msg);

                    $("#tanggal_buka").html(periode['tanggal_buka']);
                    $("#tanggal_tutup").html(periode['tanggal_tutup']);
                    $("#tahun_hijriyah").html(periode['tahun_hijriyah']);
                    $("#tahun_masehi").html(periode['tahun_masehi']);
                });
        });
    </script>