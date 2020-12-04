<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Input Data Wali Calon Santri</h1>
                    </div>

                    <form id="registrasi_wali_calon_santri">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nama_wali_calon_santri"> Nama Wali </label>
                                <input type="hidden" id="id_calon_santri" name="id_calon_santri">
                                <input type="hidden" id="id_wali_calon_santri" name="id_wali_calon_santri">
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="no_ktp"> NIK </label>
                                <input type="text" class="form-control" name="no_ktp" id="no_ktp" placeholder="NIK" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukan Alamat .." required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="email"> Email </label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="pekerjaan"> Pekerjaan </label>
                                <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjan" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="telepon"> HP/Telepon </label>
                                <input type="text" class="form-control" name="telepon" id="telepon" placeholder="No.Hp / No.Telepon" required>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="kota"> Kab/Kota </label>
                                <input type="text" class="form-control" id="kota" name="kota" placeholder="Kab/Kota" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="negara"> Negara </label>
                                <select id="negara" name="negara" class="form-control">
                                    <option selected> Indonesia </option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="gender"> Jenis Kelamin </label>
                                <select id="gender" name="gender" class="form-control">
                                    <option value="LAKI-LAKI" selected> Laki - Laki </option>
                                    <option value="PEREMPUAN"> Perempuan </option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="hubungan"> Hubungan </label>
                                <select id="hubungan" name="hubungan" class="form-control">
                                    <option value="ORANG TUA KANDUNG" selected> ORANG TUA KANDUNG </option>
                                    <option value="SAUDARA ORANG TUA"> SAUDARA ORANG TUA </option>
                                    <option value="KAKEK/NENEK"> KAKEK/NENEK </option>
                                    <option value="LAINNYA"> LAINNYA </option>
                                </select>
                            </div>
                        </div>
                        <br>
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
</div>

<script>
    $(document).ready(function() {

        var id_calon_santri = $("#btn-step-calon-santri").attr('id_calon_santri');
        $("#id_calon_santri").val(id_calon_santri);
        console.log(id_calon_santri);

        function renderWaliCalonSantri() {
            $.ajax({
                method: "POST",
                url: "<?=base_url()?>index.php/CalonSantri/getCalonSantriJoinPembayaran",
                data: {
                    id_calon_santri
                }
            }).done(function(msg) {
                var res = JSON.parse(msg);
                console.log(res);
                if (res['status'] == 1 || res['status'] == "1") {
                    var data = res['data'][0];
                    console.log(data);
                    $("#id_calon_santri").val(data['id_calon_santri']);
                    $("#id_wali_calon_santri").val(data['id_wali_calon_santri']);
                    $("#nama").val(data['nama']);
                    $("#no_ktp").val(data['no_ktp']);
                    $("#alamat").val(data['alamat']);
                    $("#email").val(data['email']);
                    $("#pekerjaan").val(data['pekerjaan']);
                    $("#telepon").val(data['telepon']);
                    $("#kota").val(data['kota']);
                    $("#negara").val(data['negara']);
                    $("#gender").val(data['gender']);
                    $("#hubungan").val(data['hubungan']);
                }
            });
        }
        renderWaliCalonSantri();


        $("#registrasi_wali_calon_santri").submit(function() {
            event.preventDefault();
            $("#submit_button").append(
                `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`
            ).attr('disabled', true);

            var data = $(this).serialize();
            $.ajax({
                method: "POST",
                url: "<?=base_url()?>index.php/WaliCalonSantri/simpanData",
                data: data
            }).done(function(msg) {
                var res = JSON.parse(msg);
                if (res['status'] == 1 || res['status'] == "1") {
                    alert("Wali Calon Santri berhasil didaftarkan");
                } else {
                    alert("Wali Calon Santri gagal didaftarkan");
                }
                renderWaliCalonSantri()
                $(".spinner-border-sm").remove();
                $("#submit_button").attr("disabled", false);
            });
        });
    });
</script>