<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Cek Hasil Kelulusan Calon Santri</h1>

                        </div>
                        <div id="alert-box"></div>
                        <form id="registrasi-santri">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Santri">
                            </div>

                            <div class="form-group">
                                <input type="date" class="form-control form-control-user" id="tanggal_lahir" name="tanggal_lahir">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nik" name="nik" placeholder="NIK">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nama_wali" name="nama_wali" placeholder="Nama Wali">
                            </div>
                            <button type="submit" class="btn btn-success btn-user btn-block" id="btn-submit">
                                Cek Hasil Kelulusan
                            </button>
                        </form>
                        <hr />
                        <div class="text-center">
                            <a href="<?= base_url() ?>auth/santri_login" class="btn btn-link c-s login">Sudah punya akun? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $("#registrasi-santri").submit(function() {
            $("#alert-box").html('')
            $("#btn-submit").append(
                `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`
            ).attr('disabled', true);
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                method: "POST",
                url: "<?= base_url() ?>user/cekHasilKelulusan",
                data: formData
            }).done(function(msg) {
                var res = JSON.parse(msg);

                // 0 Error
                // 1 Data Santri Tidak Ditemukan
                // 2 Santri belum lulus
                // 3 Sukses
                if (res['status'] == '0' || res['status'] == 0) {
                    alert("Gagal melakukan pengecekan hasil kelulusan calon santri, silahkan hubungi operator")

                } else if (res['status'] == '1' || res['status'] == 1) {
                    $("#alert-box").html('<div class="alert alert-danger">Data Santri tidak ditemukan. Masukkan data yang benar</div>')

                } else if (res['status'] == '2' || res['status'] == 2) {
                    $("#alert-box").html('<div class="alert alert-danger">Maaf, anda dinyatakan belum lulus</div>')

                } else if (res['status'] == '3' || res['status'] == 3) {
                    alert("Selamat, anda dinyatakan lulus. Silahkan lakukan validasi dan registrasi santri");
                    document.location.replace('<?= base_url(); ?>auth/registrasi_validasi');
                } else {
                    console.log(res['data']);
                }
                $("#btn-submit .spinner-border-sm").remove();
                $("#btn-submit").attr('disabled', false);
            });
        });

    })
</script>