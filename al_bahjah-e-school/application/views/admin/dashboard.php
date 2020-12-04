<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <h4>Status Santri</h4>
            <div class="row">
                <div class="col-6">
                    <div class="info-box bg-gradient-warning">
                        <span class="info-box-icon"><i class="fa fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">lulus</span>
                            <span class="info-box-number" id="santri_lulus"></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-6">
                    <div class="info-box bg-gradient-success">
                        <span class="info-box-icon"><i class="fas fa-user-check"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Registrasi ulang</span>
                            <span class="info-box-number" id="santri_terverifikasi"></span>

                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="75" id="santri_terverifikasi_percent"></div>
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
            url: "<?=base_url();?>index.php/User/getHasilKelulusan",
            data: {}
        }).done(function(msg) {
            var res = JSON.parse(msg);
            $("#santri_lulus").html(res.length);
            $.ajax({
                method: "POST",
                url: "<?=base_url();?>index.php/Santri/getDataSantri",
                data: {}
            }).done(function(msg) {
                var res = JSON.parse(msg);
                setTeregitrasi(res);
            })

            function setTeregitrasi(santri) {
                var percent = santri.length / res.length * 100;
                $("#santri_terverifikasi").html(santri.length);
                $("#santri_terverifikasi_percent").css({
                    'width': percent + "%"
                });
            }
        });
    });
</script>