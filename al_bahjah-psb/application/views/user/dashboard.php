<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <h4>Jadwal Terkini</h4>
            <div class="alert alert-info alert-dismissible" id="list-jadwal-ujian">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-info"></i> Jadwal Ujian</h5>
            </div>



            <!-- /.card -->
        </div>
        <div class="col-xs-12 col-md-6">
            <h4>Status Calon Santri</h4>
            <div class="row">
                <div class="col-6">
                    <div class="info-box bg-gradient-success">
                        <span class="info-box-icon"><i class="fas fa-user-check"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Terverifikasi</span>
                            <span class="info-box-number" id="santri_terverifikasi">99</span>

                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="75" id="santri_terverifikasi_percent"></div>
                            </div>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-6">
                    <div class="info-box bg-gradient-warning">
                        <span class="info-box-icon"><i class="fa fa-user-times"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Belum terverifikasi</span>
                            <span class="info-box-number" id="santri_belum_terverifikasi">61</span>

                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="75" id="santri_belum_terverifikasi_percent"></div>
                            </div>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

<script>
    $(document).ready(function() {
        $.ajax({
            method: "POST",
            url: "<?=base_url()?>index.php/JadwalUjian/getJadwalUjian",
            data: {}
        }).done(function(msg) {
            var res = JSON.parse(msg);
            for (var i = 0; i < res.length; i++) {
                $("#list-jadwal-ujian").append(
                    `<h6><strong>${res[i]['keterangan']}:</strong> ${res[i]['waktu']}, ${res[i]['tanggal'].split("-").reverse().join("-")}</h6>`
                );
            }
        });

        $.ajax({
                method: "POST",
                url: "<?=base_url()?>index.php/CalonSantri/getCalonSantri",
                data: {}
            })
            .done(function(msg) {
                var res = JSON.parse(msg);
                var jumlah = res.length;
                var terverifikasi = 0;
                var belum_terverifikasi = 0;

                for (i = 0; i < res.length; i++) {
                    if (res[i]['status_verifikasi_registrasi'] == "TERVERIFIKASI") {
                        terverifikasi++;
                    } else {
                        belum_terverifikasi++;
                    }
                }
                var terverifikasi_percent = parseInt(terverifikasi / jumlah * 100);
                var belum_terverifikasi_percent = parseInt(belum_terverifikasi / jumlah * 100);

                $("#santri_terverifikasi").text(terverifikasi);
                $("#santri_belum_terverifikasi").text(belum_terverifikasi);
                $("#santri_terverifikasi_percent").css({
                    "width": terverifikasi_percent + "%"
                });
                $("#santri_belum_terverifikasi_percent").css({
                    "width": belum_terverifikasi_percent + "%"
                });
            })
    });
</script>