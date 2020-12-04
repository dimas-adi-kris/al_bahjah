<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- /.card -->

            <div class="card o-f">
                <div class="card-header">
                    <h3 class="card-title"> Data Bukti Pembayaran </h3>
                    <button type="submit" class="btn btn-success float-right" data-toggle="modal" data-target="#modal_pembayaran" id="btn-upload-data">
                        <i class="fas fa-plus mr-2"></i>Upload Data </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- Filter -->
                    <!-- <div class="btn-group mb-3">
                        <button type="button" class="btn bg-gradient-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Filter
                        </button>
                        <div class="dropdown-menu">
                        </div>
                    </div> -->

                    <table id="tabel_pembayaran" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> Nama Santri </th>
                                <th> Tanggal Pembayaran </th>
                                <th> Jenis Pembayaran </th>
                                <th> Bukti Berkas </th>
                                <th> Tanggal Verifikasi </th>
                                <th> Bulan </th>
                                <th> Keterangan </th>
                                <th> Nominal </th>
                                <th> Status </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <!-- <tfoot>

                  </tfoot> -->
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

<div class="modal fade" id="modal_pembayaran">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-white">
            <div class="modal-header">
                <h4 class="modal-title"> Upload Data Bukti Pembayaran </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <form id="form_pembayaran">
                    <input type="hidden" class="form-control" name="id_pembayaran" id="id_pembayaran">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tanggal_pembayaran"> Tanggal Pembayaran </label>
                            <input type="date" class="form-control" name="tanggal_pembayaran" id="tanggal_pembayaran" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="id_santri"> Santri </label>
                            <select id="id_santri" name="id_santri" class="custom-select" required>
                                <option value="1" id="id_santri_1">Qory Amanah Putra</option>
                                <option value="2" id="id_santri_2"> Ageng Prayoga </option>
                            </select>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="bukti_berkas"> Bukti Berkas </label>
                            <input type="text" class="form-control" name="bukti_berkas" id="bukti_berkas" placeholder="Bukti Berkas" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="jenis_pembayaran"> Jenis Pembayaran </label>
                            <select id="jenis_pembayaran" name="jenis_pembayaran" class="form-control" required>
                                <option value="REGISTRASI ULANG" id="registrasi_ulang" selected>REGISTRASI ULANG</option>
                                <option value="SPP" id="spp"> SPP </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="bulan"> Bulan </label>
                            <select id="bulan" name="bulan" class="custom-select" required>
                                <option value="1" id="bulan_1" selected>Januari</option>
                                <option value="2" id="bulan_2">Februari</option>
                                <option value="3" id="bulan_3">Maret</option>
                                <option value="4" id="bulan_4">April</option>
                                <option value="5" id="bulan_5">May</option>
                                <option value="6" id="bulan_6">Juni</option>
                                <option value="7" id="bulan_7">Juli</option>
                                <option value="8" id="bulan_8">Agustus</option>
                                <option value="9" id="bulan_9">September</option>
                                <option value="10" id="bulan_10">Oktober</option>
                                <option value="11" id="bulan_11">November</option>_
                                <option value="12" id="bulan_12">Desember</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="keterangan"> Keterangan </label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nominal"> Nominal </label>
                            <input type="number" class="form-control" id="nominal" name="nominal" placeholder="nominal" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status_verifikasi"> Status Verifikasi </label>
                            <select id="status_verifikasi" name="status_verifikasi" class="form-control" required>
                                <option value="BELUM" id="belum_terverifikasi" selected>BELUM TERVERIFIKASI</option>
                                <option value="TERVERIFIKASI" id="terverifikasi"> TERVERIFIKASI </option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-white btn-outline-primary" data-dismiss="modal"> Tutup </button>
                        <button type="submit" class="btn btn-primary btn-outline-white" id="btn-simpan"> Simpan </button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<script>
    $(document).ready(function() {
        var tableListPembayaran = $('#tabel_pembayaran').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

        renderTabelListPembayaran();

        function renderTabelListPembayaran(id_program) {
            tableListPembayaran.clear()
            $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>index.php/Pembayaran/getData",
                    data: {}
                })

                .done(function(msg) {
                    var res = JSON.parse(msg);
                    if (res[0]) {
                        var counter = 0;
                        for (var i = 0; i < res.length; i++) {
                            (function(i) {
                                $.ajax({
                                        method: "POST",
                                        url: "<?=base_url()?>index.php/Santri/getDataSantriById",
                                        data: {
                                            id_santri: (res[i]['id_santri'])
                                        },
                                    })
                                    .done(function(msg) {
                                        var data = JSON.parse(msg);
                                        var santri = data['santri'][0];
                                        var calon_santri = data['calon_santri'];

                                        res[i]['nama'] = calon_santri['nama'];
                                        var result = res;

                                        var id = res[i]['id_pembayaran'];
                                        var status = res[i]['status_verifikasi'] == "TERVERIFIKASI" ? "checked" : "";
                                        var btn_ubah =
                                            '<button type="button" class="m-1 btn bg-gradient-success btn-ubah btn-sm" data-toggle="modal" data-target="#modal_pembayaran" id_pembayaran=' + id + ' id="edit-button"><i class="fas fa-edit"></i>Ubah</button>';

                                        var btn_hapus =
                                            '<button type="button" class="m-1 btn bg-gradient-danger btn-sm" id_pembayaran=' + id + ' id="delete-button"><i class = "fa fa-minus-circle"></i>Delete</button>';

                                        var btn_status =
                                            '<div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" id="status_' + id + '" id_pembayaran="' + id + '" name="status_verifikasi"' + status + '><label class="custom-control-label" for="status_' + id + '"></label></div>';
                                        var tanggal_pembayaran = new Date(res[i]['tanggal_pembayaran']).toLocaleDateString(undefined, {
                                            day: 'numeric',
                                            month: 'long',
                                            year: 'numeric'
                                        });
                                        var tanggal_verifikasi = new Date(res[i]['tanggal_verifikasi']).toLocaleDateString(undefined, {
                                            day: 'numeric',
                                            month: 'long',
                                            year: 'numeric'
                                        });
                                        tableListPembayaran.row.add([
                                            i + 1,
                                            result[i]['nama'],
                                            tanggal_pembayaran,
                                            result[i]['jenis_pembayaran'],
                                            result[i]['bukti_berkas'],
                                            tanggal_verifikasi,
                                            result[i]['bulan'],
                                            result[i]['keterangan'],
                                            result[i]['nominal'],
                                            btn_status,
                                            btn_ubah + btn_hapus,
                                        ]).draw(false);
                                    })
                            })(i);
                        }
                    } else {
                        alert("Data pembayaran tidak ditemukan");
                    }


                })
        };

        //  UPDATE STATUS
        $("#tabel_pembayaran").on('click', 'input[id*="status_"]', function() {
            var id_pembayaran = $(this).attr("id_pembayaran");
            var status = $(this).attr("checked") == "checked" ? "BELUM" : "TERVERIFIKASI";
            $.ajax({
                method: "POST",
                url: "<?=base_url()?>index.php/Pembayaran/updateStatusPembayaran",
                data: {
                    id_pembayaran,
                    status
                }
            }).done(function(msg) {
                if (JSON.parse(msg)) {
                    alert("Pembayaran dengan id " + id_pembayaran + " " + status + (status == "BELUM" ? " terverifikasi" : ""));
                } else {
                    alert("Ubah status pembayaran gagal");
                }
                var id_program = $("#filter-option").attr("id_program");
                renderTabelListPembayaran(id_program);
            })
        });

        function renderOptionSantri(currentValue) {
            $.ajax({
                method: "POST",
                url: "<?=base_url()?>index.php/Santri/getDataSantri",
                data: {}
            }).done(function(msg) {
                var santri = JSON.parse(msg);
                // console.log(santri);
                $('#id_santri').html('');
                $.each(santri, function(key, value) {
                    if (currentValue == value['id_santri']) {
                        $('#id_santri')
                            .append($("<option selected='selected'></option>")
                                .attr("value", value['id_santri'])
                                .attr("id", "option_" + value['id_santri'])
                                .text(value['id_santri'] + ":"));
                        fillName(value['id_santri']);
                    } else {
                        $('#id_santri')
                            .append($("<option></option>")
                                .attr("value", value['id_santri'])
                                .attr("id", "option_" + value['id_santri'])
                                .text(value['id_santri'] + ":"));
                        fillName(value['id_santri']);
                    }
                });
            });
        }

        // console.log(getCalonSantri(18));

        function fillName(id_santri) {
            $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>index.php/Santri/getDataSantriById",
                    data: {
                        id_santri
                    },
                })
                .done(function(msg) {
                    var res = JSON.parse(msg);
                    fill(res['calon_santri']['nama']);
                });

            function fill(name) {
                $('#option_' + id_santri).text(name);
            }
        }

        function getCalonSantri(id_calon_santri) {
            if (id_calon_santri) {
                url = "<?=base_url()?>index.php/Santri/getCalonSantriById";
                var data = {
                    id_calon_santri
                }
            } else {
                url = "<?=base_url()?>index.php/Santri/getCalonSantri";
                var data = {}
            }

            return $.ajax({
                method: "POST",
                url,
                data,
            })
        }

        $("#btn-upload-data").click(function() {
            $("#id_pembayaran").val('');
            renderOptionSantri();
            $("#tanggal_pembayaran").val('');
            $("#bukti_berkas").val('');
            $("#bulan_default").attr('selected', true);
            $("#keterangan").val('');
            $("#nominal").val('');
        });

        $("#form_pembayaran").submit(function() {
            event.preventDefault();
            var formData = $(this).serialize();
            // console.log(formData);
            $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>index.php/Pembayaran/simpanData",
                    data: formData
                })

                .done(function(msg) {
                    var res = JSON.parse(msg);
                    var pembayaran = res['data']
                    // console.log(res);
                    if (res['status'] == 1 || res['status' == "1"]) {
                        alert("Data Berhasil Disimpan");
                        $("#modal_pembayaran").modal('hide');
                        var id_program = $("#filter-option").attr("id_program");
                        renderTabelListPembayaran(id_program);
                    } else if (res['status'] == 0 || res['status'] == "0") {
                        alert("Data Gagal Disimpan, mungkin sudah ada");
                        $("#modal_pembayaran").modal('hide')
                    } else {
                        console.log(res);
                    }
                });

        });

        $('#tabel_pembayaran').on('click', '#delete-button', function() {
            var id_pembayaran = $(this).attr('id_pembayaran');
            if (confirm("Apakah anda yakin ingin menghapus bukti pembayaran ini?")) {
                $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>index.php/Pembayaran/hapusData",
                    data: {
                        id_pembayaran
                    }
                }).done(function(msg) {
                    if (msg) {
                        alert("Bukti pembayaran terhapus");
                    }
                    var id_program = $("#filter-option").attr("id_program");
                    renderTabelListPembayaran(id_program);
                });
            } else {
                alert("Bukti pembayaran batal dihapus");
            }
        });

        $('#tabel_pembayaran').on('click', '#edit-button', function() {
            var id_pembayaran = $(this).attr('id_pembayaran');

            $.ajax({
                method: "POST",
                url: "<?=base_url()?>index.php/Pembayaran/getDataById",
                data: {
                    id_pembayaran
                }
            }).done(function(msg) {
                var res = JSON.parse(msg);
                // console.log(res);
                $("#id_pembayaran").val(res['id_pembayaran']);
                renderOptionSantri(res['id_santri']);
                $("#tanggal_pembayaran").val(res['tanggal_pembayaran']);
                $("#bukti_berkas").val(res['bukti_berkas']);
                $("#bulan").val(res['bulan']);
                $("#keterangan").val(res['keterangan']);
                $("#nominal").val(res['nominal']);
            })
        });

        function verifikasi($status_verifikasi) {
            if ($status_verifikasi == "TERVERIFIKASI") {
                $("#belum_terverifikasi").attr("selected", false);
                $("#terverifikasi").attr("selected", true);
            } else {
                $("#terverifikasi").attr("selected", false);
                $("#belum_terverifikasi").attr("selected", true);
            }
        }
    })
</script>