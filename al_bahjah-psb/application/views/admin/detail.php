<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> Detail Calon Santri </h3>
                        <div class="custom-control custom-switch float-right">
                            <input type="checkbox" class="custom-control-input" id="status" name="status">
                            <label class="custom-control-label" for="status">Status</label>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body detail-card">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-sm-12 p-3">
                                    <div class="row" id="detail-calon-santri">
                                        <div class="col-12">
                                            <h1>Calon Santri</h1>
                                            <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#modal-edit-santri" id="edit_santri_button">
                                                <strong><i class="fas fa-edit"></i> Edit </strong>
                                            </button>
                                            <table class="table table-striped mb-5">
                                                <tbody>
                                                    <tr>
                                                        <td>Nama</td>
                                                        <td>:</td>
                                                        <td id="nama">Qory Amanah Putra</td>
                                                    </tr>
                                                    <tr>
                                                        <td>NIK</td>
                                                        <td>:</td>
                                                        <td id="nik">1304080708010003</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Asal Sekolah</td>
                                                        <td>:</td>
                                                        <td id="asal_sekolah">SMAN 1 Batusangkar</td>
                                                    </tr>
                                                    <tr>
                                                        <td>TTL</td>
                                                        <td>:</td>
                                                        <td id="ttl">Batusangkar, 07 Agustus 2001</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gender</td>
                                                        <td>:</td>
                                                        <td id="gender">Laki - Laki</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat</td>
                                                        <td>:</td>
                                                        <td id="alamat">Jorong Utara, Nagari Kumango, Kecamatan Sungai Tarab, Kabupaten Tnaha Data, Sumatera Barat</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kota</td>
                                                        <td>:</td>
                                                        <td id="kota">Batusangkar</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Negara</td>
                                                        <td>:</td>
                                                        <td id="negara">Indonesia</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Golongan Darah</td>
                                                        <td>:</td>
                                                        <td id="golongan_darah">A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Riwayat Penyakit</td>
                                                        <td>:</td>
                                                        <td id="riwayat_penyakit">Gejala TB, Hepatitis A, Tifus</td>
                                                    </tr>
                                                    <tr>
                                                        <td>ID Program</td>
                                                        <td>:</td>
                                                        <td id="program"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>ID Periode</td>
                                                        <td>:</td>
                                                        <td class="periode"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row" id="detail-wali-calon-santri">
                                        <div class="col-12 p-3">
                                            <h1>Wali Calon Santri</h1>
                                            <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#modal-edit-wali" id="edit_wali_button">
                                                <strong><i class="fas fa-edit"></i>Edit </strong>
                                            </button>
                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td scop="col">Nama</td>
                                                        <td scop="col">:</td>
                                                        <td scop="col" id="nama_wali_santri">Belum lengkap</td>
                                                    </tr>
                                                    <tr>
                                                        <td scop="row">NIK</td>
                                                        <td>:</td>
                                                        <td id="no_ktp_wali_santri">Belum lengkap</td>
                                                    </tr>
                                                    <tr>
                                                        <td scop="row">Email</td>
                                                        <td>:</td>
                                                        <td id="email_wali_santri">Belum lengkap</td>
                                                    </tr>
                                                    <tr>
                                                        <td scop="row">Gender</td>
                                                        <td>:</td>
                                                        <td id="gender_wali_santri">Belum lengkap</td>
                                                    </tr>
                                                    <tr>
                                                        <td scop="row">Hubungan</td>
                                                        <td>:</td>
                                                        <td id="hubungan_wali_santri">Belum lengkap</td>
                                                    </tr>
                                                    <tr>
                                                        <td scop="row">Pekerjaan</td>
                                                        <td>:</td>
                                                        <td id="pekerjaan_wali_santri">Belum lengkap</td>
                                                    </tr>
                                                    <tr>
                                                        <td scop="row">Alamat</td>
                                                        <td>:</td>
                                                        <td id="alamat_wali_santri">Belum lengkap</td>
                                                    </tr>
                                                    <tr>
                                                        <td scop="row">Kota</td>
                                                        <td>:</td>
                                                        <td id="kota_wali_santri">Belum lengkap</td>
                                                    </tr>
                                                    <tr>
                                                        <td scop="row">Negara</td>
                                                        <td>:</td>
                                                        <td id="negara_wali_santri">Belum lengkap</td>
                                                    </tr>
                                                    <tr>
                                                        <td scop="row">HP/Telepon</td>
                                                        <td>:</td>
                                                        <td id="telepon_wali_santri">Belum lengkap</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 p-3">
                                    <div class="row">
                                        <h1>Berkas Upload</h1>
                                        <div class="col-12">
                                            <div class="card" style="width: 18rem;">
                                                <div class="card-body">
                                                    <h2 class="card-title">Kartu Keluarga</h2><br>
                                                    <h6 class="text-muted">10:58, 09 November 2020</h6>
                                                </div>
                                                <img src="<?=base_url('assets/img/user.jpg')?>" class="card-img-top img-fluid">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="card" style="width: 18rem;">
                                                <div class="card-body">
                                                    <h2 class="card-title">Rafor</h2><br>
                                                    <h6 class="text-muted">10:58, 09 November 2020</h6>
                                                </div>
                                                <img src="<?=base_url('assets/img/user.jpg')?>" class="card-img-top img-fluid">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="card" style="width: 18rem;">
                                                <div class="card-body">
                                                    <h2 class="card-title">Ijazah Terakhir</h2><br>
                                                    <h6 class="text-muted">10:58, 09 November 2020</h6>
                                                </div>
                                                <img src="<?=base_url('assets/img/user.jpg')?>" class="card-img-top img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Modal Edit Santri -->
    <div class="modal fade" id="modal-edit-santri">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-secondary">
                <div class="modal-header">
                    <h4 class="modal-title" id="moda-title"> Edit Santri </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form id="edit_calon_santri">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="form_nama">Nama Lengkap Santri</label>
                                <input type="hidden" name="id_pembayaran" id="form_id_pembayaran" value="">
                                <input type="hidden" name="id_calon_santri" id="form_id_calon_santri" value="">
                                <input type="hidden" name="id_periode" id="form_id_periode" value="">
                                <input type="hidden" name="status_verifikasi_registrasi" id="form_status_verifikasi_registrasi" value="">
                                <input type="text" class="form-control" id="form_nama" name="nama" placeholder="Nama Lengkap Santri" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="form_nik"> NIK </label>
                                <input type="text" class="form-control" id="form_nik" name="nik" placeholder="NIK" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="form_tempat_lahir"> Tempat Lahir </label>
                                <input type="text" class="form-control" name="tempat_lahir" id="form_tempat_lahir" placeholder="Tempat Lahir" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="form_tanggal_lahir"> Tanggal Lahir </label>
                                <input type="date" class="form-control" id="form_tanggal_lahir" name="tanggal_lahir" placeholder="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputAsalSekolah">Asal Sekolah </label>
                            <input type="text" class="form-control" name="asal_sekolah" id="form_asal_sekolah" placeholder="Asal Sekolah" required>
                        </div>


                        <div class="form-group">
                            <label for="form_alamat">Alamat</label>
                            <textarea class="form-control" id="form_alamat" name="alamat" placeholder="Masukan Alamat .." required></textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="form_kota"> Kab/Kota </label>
                                <input type="text" class="form-control" name="kota" id="form_kota" placeholder="Kab/Kota" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="form_negara"> Negara </label>
                                <select id="form_negara" name="negara" class="form-control" required>
                                    <option selected> Indonesia </option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="form_gender"> Jenis Kelamin </label>
                                <select id="form_gender" name="gender" class="form-control" required>
                                    <option value="LAKI-LAKI" id="santri_laki_laki"> Laki - Laki </option>
                                    <option value="PEREMPUAN" id="santri_perempuan"> Peremupuan </option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="form_golongan_darah"> Golongan Darah </label>
                                <select id="form_golongan_darah" name="golongan_darah" class="form-control" required>
                                    <option value="A" id="santri_a"> A </option>
                                    <option value="B" id="santri_b"> B </option>
                                    <option value="O" id="santri_o"> O </option>
                                    <option value="AB" id="santri_ab"> AB </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="form_riwayat_penyakit">Riwayat Penyakit</label>
                            <input type="text" class="form-control" name="riwayat_penyakit" id="form_riwayat_penyakit" placeholder="Riwayat Penyakit...">
                        </div>
                        <button type="submit" class="btn btn-primary float-right" id="submit_button"> Submit </button>
                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- Modal Edit Wali Santri -->
    <div class="modal fade" id="modal-edit-wali">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-secondary">
                <div class="modal-header">
                    <h4 class="modal-title" id="title-modal-jadwal-ujian"> Edit Wali Santri </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form id="edit_wali_calon_santri">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="form_nama_wali"> Nama Wali </label>
                                <input type="hidden" id="form_id_calon_santri_wali" name="id_calon_santri" value="">
                                <input type="hidden" id="form_id_wali_calon_santri" name="id_wali_calon_santri" value="">
                                <input type="text" class="form-control" name="nama" id="form_nama_wali" placeholder="Nama" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="form_no_ktp_wali"> NIK </label>
                                <input type="text" class="form-control" name="no_ktp" id="form_no_ktp_wali" placeholder="NIK" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="form_email_wali"> Email </label>
                            <input type="email" class="form-control" name="email" id="form_email_wali" placeholder="Email" required>
                        </div>

                        <div class="form-group">
                            <label for="form_alamat_wali">Alamat</label>
                            <textarea class="form-control" name="alamat" id="form_alamat_wali" placeholder="Masukan Alamat .." required></textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="form_pekerjaan_wali"> Pekerjaan </label>
                                <input type="text" class="form-control" name="pekerjaan" id="form_pekerjaan_wali" placeholder="Pekerjan" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="form_telepon_wali"> HP/Telepon </label>
                                <input type="text" class="form-control" name="telepon" id="form_telepon_wali" placeholder="No.Hp / No.Telepon" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="form_kota_wali"> Kab/Kota </label>
                                <input type="text" class="form-control" id="form_kota_wali" name="kota" placeholder="Kab/Kota" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="form_negara_wali"> Negara </label>
                                <select id="form_negara_wali" name="negara" class="form-control">
                                    <option selected> Indonesia </option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="form_gender_wali"> Jenis Kelamin </label>
                                <select id="form_gender_wali" name="gender" class="form-control">
                                    <option value="LAKI-LAKI" id="wali_laki_laki"> Laki - Laki </option>
                                    <option value="PEREMPUAN" id="wali_perempuan"> Perempuan </option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="form_hubungan_wali"> Hubungan </label>
                                <select id="form_hubungan_wali" name="hubungan" class="form-control">
                                    <option id="wali_orang_tua_kandung"> ORANG TUA KANDUNG </option>
                                    <option id="wali_saudara_orang_tua"> SAUDARA ORANG TUA </option>
                                    <option id="wali_kakek_nenek"> KAKEK/NENEK </option>
                                    <option id="wali_lainnya"> LAINNYA </option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary float-right" id="submit_wali"> Submit </button>
                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <script>
        $(document).ready(function() {
            var id_calon_santri = $("#detail_id").attr("detail_id");

            renderDataWali();
            renderDataSantri();

            function renderDataSantri() {
                $.ajax({
                        method: "POST",
                        url: "<?=base_url()?>CalonSantri/getCalonSantriById",
                        data: {
                            id_calon_santri
                        }
                    })
                    .done(function(msg) {
                        var res = JSON.parse(msg);

                        $("#status").attr('checked', (res['status_verifikasi_registrasi'] == "TERVERIFIKASI" ? true : false));

                        //  Set isi tabel
                        $("#nama").text(res['nama']);
                        $("#nik").text(res['nik']);
                        $("#asal_sekolah").text(res['asal_sekolah']);
                        $("#ttl").text(`${res['tempat_lahir']}, ${res['tanggal_lahir'].split("-").reverse().join("-")}`);
                        $("#gender").text(res['gender']);
                        $("#alamat").text(res['alamat']);
                        $("#kota").text(res['kota']);
                        $("#negara").text(res['negara']);
                        $("#golongan_darah").text(res['golongan_darah']);
                        $("#riwayat_penyakit").text(res['riwayat_penyakit']);
                        $.ajax({
                            method: "POST",
                            url: "<?=base_url()?>Program/getProgramById",
                            data: {
                                id_program: res['id_program']
                            }
                        }).done(function(msg) {
                            var program = JSON.parse(msg);
                            console.log("Program: " + program);
                            $("#program").text(program['nama']);
                        });

                        $.ajax({
                            method: "POST",
                            url: "<?=base_url()?>Periode/getPeriodeById",
                            data: {
                                id_periode: res['id_periode']
                            }
                        }).done(function(msg) {
                            var periode = JSON.parse(msg)
                            console.log(periode['tahun_ajaran_hijriyah']);
                            $(".periode").html(periode['tahun_ajaran_hijriyah'] + " Hijriyah / " + periode['tahun_ajaran_masehi'] + " Masehi");
                        });

                        // Set isi modal
                        $("#form_id_calon_santri").val(res['id_calon_santri']);
                        $("#form_id_pembayaran").val(res['id_pembayaran']);
                        $("#form_id_periode").val(res['id_periode']);
                        $("#form_status_verifikasi_registrasi").val(res['status_verifikasi_registrasi']);
                        $("#form_nama").val(res['nama']);
                        $("#form_nik").val(res['nik']);
                        $("#form_tempat_lahir").val(res['tempat_lahir']);
                        $("#form_tanggal_lahir").val(res['tanggal_lahir']);
                        $("#form_asal_sekolah").val(res['asal_sekolah']);
                        $("#form_alamat").val(res['alamat']);
                        $("#form_kota").val(res['kota']);
                        $("#form_negara").val(res['negara']);
                        $("#form_gender").val(res['gender']);
                        $("#form_golongan_darah").val(res['golongan_darah']);
                        $("#form_riwayat_penyakit").val(res['riwayat_penyakit']);
                    })
            }


            function renderDataWali() {
                $.ajax({
                        method: "POST",
                        url: "<?=base_url()?>WaliCalonSantri/getDataById",
                        data: {
                            id_calon_santri
                        }
                    })
                    .done(function(msg) {
                        var res = JSON.parse(msg);
                        console.log(res['nama']);
                        if (res["nama"] == undefined) {
                            $("#edit_wali_button").attr("disabled", true);
                            return;
                        }

                        // Set isi tabel
                        $("#nama_wali_santri").text(res['nama']);
                        $("#no_ktp_wali_santri").text(res['no_ktp']);
                        $("#email_wali_santri").text(res['email']);
                        $("#gender_wali_santri").text(res['gender']);
                        $("#hubungan_wali_santri").text(res['hubungan']);
                        $("#pekerjaan_wali_santri").text(res['pekerjaan']);
                        $("#alamat_wali_santri").text(res['alamat']);
                        $("#kota_wali_santri").text(res['kota']);
                        $("#negara_wali_santri").text(res['negara']);
                        $("#telepon_wali_santri").text(res['telepon'])

                        // Set isi modal
                        $("#form_id_calon_santri_wali").val(id_calon_santri);
                        $("#form_id_wali_calon_santri").val(res['id_wali_calon_santri']);
                        $("#form_nama_wali").val(res['nama']);
                        $("#form_no_ktp_wali").val(res['no_ktp']);
                        $("#form_email_wali").val(res['email']);
                        $("#form_alamat_wali").val(res['alamat']);
                        $("#form_pekerjaan_wali").val(res['pekerjaan']);
                        $("#form_telepon_wali").val(res['telepon']);
                        $("#form_kota_wali").val(res['kota']);
                        $("#form_negara_wali").val(res['negara']);

                        // Gender
                        if (res['gender'] == "LAKI-LAKI") {
                            $("#wali_laki_laki").attr("selected", true);
                        } else {
                            $("#wali_perempuan").attr("selected", true);
                        }

                        // Hubungan
                        if (res['hubungan'] == "ORANG TUA KANDUNG") {
                            $("#wali_orang_tua_kandung").attr("selected", true);
                        } else if (res['hubungan'] == "SAUDARA ORANG TUA") {
                            $("#wali_saudara_orang_tua").attr("selected", true);
                        } else if (res['hubungan'] == "KAKEK/NENEK") {
                            $("#wali_kakek_nenek").attr("selected", true);
                        } else {
                            $("#wali_lainnya").attr("selected", true);
                        }
                    })
            }

            $("#edit_wali_calon_santri").submit(function() {
                event.preventDefault();
                var data = $(this).serialize();

                $.ajax({
                    method: "POST",
                    url: "<?=base_url();?>Walicalonsantri/simpanData",
                    data: data
                }).done(function(msg) {
                    var res = JSON.parse(msg);
                    if (res['status'] == 1 | res['status'] == "1") {
                        alert("Data wali calon santri berhasil diperbarui");
                    } else {
                        alert("Gagal memperbarui data wali calon santri");
                    }
                    $("#modal-edit-wali").modal("hide");
                    renderDataWali();
                });
            })

            $("#edit_calon_santri").submit(function() {
                event.preventDefault();
                var data = $(this).serialize();

                $.ajax({
                    method: "POST",
                    url: "<?=base_url();?>Calonsantri/simpanCalonSantri",
                    data: data
                }).done(function(msg) {
                    var res = JSON.parse(msg);
                    if (res['status'] == 1 | res['status'] == "1") {
                        alert("Data calon santri berhasil diperbarui");
                    } else {
                        alert("Gagal memperbarui data calon santri");
                    }
                    $("#modal-edit-santri").modal("hide");
                    renderDataSantri();
                });
            })

            $("#status").click(function() {
                var status = $(this).attr("checked") == "checked" ? "BELUM" : "TERVERIFIKASI";
                $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>CalonSantri/updateStatusCalonSantri",
                    data: {
                        id_calon_santri,
                        status
                    }
                }).done(function(msg) {
                    if (JSON.parse(msg)) {
                        alert("Calon Santri dengan id " + id_calon_santri + " " + status + (status == "BELUM" ? " terverifikasi" : ""));
                    } else {
                        alert("Ubah status calon santri gagal");
                    }
                })
            });

        });
    </script>