<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Registrasi Calon Santri!</h1>
                    </div>
                    <div class="alert-box">

                    </div>
                    <form id="registrasi_calon_santri">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="hidden" name="id_periode" id="id_periode">
                                <input type="hidden" name="id_pembayaran" id="id_pembayaran">
                                <input type="hidden" name="id_program" id="id_program">
                                <input type="hidden" name="id_calon_santri" id="id_calon_santri">
                                <input type="hidden" name="status_verifikasi_registrasi" id="status_verifikasi_registrasi">
                                <label for="inputNamaLengkapSantri">Nama Lengkap Santri</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap Santri" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputNIK"> NIK </label>
                                <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputTempatLahir"> Tempat Lahir </label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputTanggalLahir"> Tanggal Lahir </label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputAsalSekolah">Asal Sekolah </label>
                            <input type="text" class="form-control" name="asal_sekolah" id="asal_sekolah" placeholder="Asal Sekolah" required>
                        </div>


                        <div class="form-group">
                            <label for="inputAlamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat .." required></textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="kota"> Kab/Kota </label>
                                <input type="text" class="form-control" name="kota" id="kota" placeholder="Kab/Kota" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputNegara"> Negara </label>
                                <select id="negara" name="negara" class="form-control" required>
                                    <option selected> Indonesia </option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputJenisKelamin"> Jenis Kelamin </label>
                                <select id="gender" name="gender" class="form-control" required>
                                    <option value="LAKI-LAKI"> Laki - Laki </option>
                                    <option value="PEREMPUAN"> Peremupuan </option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputGoldar"> Golongan Darah </label>
                                <select id="golongan_darah" name="golongan_darah" class="form-control" required>
                                    <option value="A"> A </option>
                                    <option value="B"> B </option>
                                    <option value="O"> O </option>
                                    <option value="AB"> AB </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="riwayat_penyakit">Riwayat Penyakit</label>
                            <input type="text" class="form-control" name="riwayat_penyakit" id="riwayat_penyakit" placeholder="Riwayat Penyakit...">
                        </div>

                        <!-- <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck" required>
                                <label class="form-check-label" for="gridCheck">
                                    Saya menyetujui bahwa data yang saya isi adalah sebenar-benarnya, Jika ada kepalsuan data maka saya akan bertanggung jawab dan menerima resiko dalam bentuk apapun.
                                </label>
                            </div>
                        </div> -->
                        <button type="submit" class="btn btn-success float-right" id="submit_button"> Submit </button>
                    </form>

                    <br><br>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="#">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="#">Already have an account? Login!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        renderDataSantri();

        function renderDataSantri(el) {
            $.ajax({
                method: "POST",
                url: "<?= base_url() ?>pembayaran/getDataById",
                data: {}
            }).done(function(msg) {
                var pembayaran = JSON.parse(msg);
                var calon_santri;
                var id_pembayaran = pembayaran['id_pembayaran'];
                $("#id_pembayaran").val(pembayaran['id_pembayaran']);
                $("#id_program").val(pembayaran['id_program']);
                $("#id_periode").val("1");
                $.ajax({
                        method: "POST",
                        url: "<?= base_url() ?>calonsantri/getCalonSantriByPembayaran",
                        data: {
                            id_pembayaran
                        }
                    })
                    .done(function(msg) {
                        calon_santri = JSON.parse(msg)[0];
                        if (calon_santri != undefined) {
                            $("#status_verifikasi_registrasi").val(calon_santri['status_verifikasi_registrasi']);
                            $("#id_calon_santri").val(calon_santri['id_calon_santri']);
                            $("#nama").val(calon_santri['nama']);
                            $("#nik").val(calon_santri['nik']);
                            $("#tempat_lahir").val(calon_santri['tempat_lahir']);
                            $("#tanggal_lahir").val(calon_santri['tanggal_lahir']);
                            $("#asal_sekolah").val(calon_santri['asal_sekolah']);
                            $("#alamat").val(calon_santri['alamat']);
                            $("#kota").val(calon_santri['kota']);
                            $("#negara").val(calon_santri['negara']);
                            $("#gender").val(calon_santri['gender']);
                            $("#golongan_darah").val(calon_santri['golongan_darah']);
                            $("#riwayat_penyakit").val(calon_santri['riwayat_penyakit']);
                            $("#submit_button").text("Simpan")
                            $("#btn-step-calon-santri").attr('id_calon_santri', calon_santri['id_calon_santri']);
                            $("#btn-step-wali-calon-santri").attr('disabled', false);
                            $("#btn-step-berkas").attr('disabled', false);
                            $("#btn-step-finalisasi").attr('disabled', false);
                            if (el) {
                                el.click();
                            }
                        }
                    });

            })
        }

        $("#registrasi_calon_santri").submit(function() {
            event.preventDefault();
            $("#submit_button").append(
                `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`
            ).attr('disabled', true);

            var formData = $(this).serialize();
            $.ajax({
                method: "POST",
                url: "<?= base_url() ?>calonsantri/simpanCalonSantri",
                data: formData
            }).done(function(msg) {
                console.log(msg);
                var res = JSON.parse(msg);
                if (res['status'] == 1 || res['status'] == "1") {
                    renderDataSantri($("#btn-step-wali-calon-santri"));
                    alert("Data berhasil disimpan");
                    $("#btn-step-wali-calon-santri").attr('disabled', false);
                    $("#btn-step-berkas").attr('disabled', false);
                } else {
                    alert("Data gagal disimpan");
                }
                $(".spinner-border-sm").remove();
                $("#submit_button").attr('disabled', false);
            });
        });
    });
</script>