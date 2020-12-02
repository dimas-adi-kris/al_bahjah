<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Daftar Kelas Mata Pelajaran </h3>
                    <button type="submit" class="btn btn-success float-right" data-toggle="modal" data-target="#modal_kelas_mata_pelajaran" id="btn-upload-data">
                        <i class="fas fa-plus mr-2"></i>Upload Data </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div id="filter-option" id_program=""></div>
                    </div>

                    <!-- Filter -->
                    <div class="btn-group mb-3">
                        <button type="button" class="btn bg-gradient-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Filter
                        </button>
                        <div class="dropdown-menu">
                        </div>
                    </div>

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
                            <tr>
                                <td>1</td>
                                <td> Qory Amanah Putra </td>
                                <td> 11-11-2020 </td>
                                <td> REGISTRASI </td>
                                <td> pembayaran.jpg </td>
                                <td> 11-11-2020 </td>
                                <td> 11 </td>
                                <td> Keterangan </td>
                                <td> 1000000 </td>
                                <td>
                                    <div class="custom-control custom-switch float-right">
                                        <input type="checkbox" class="custom-control-input" id="status_1" id_pembayaran="1" name="status_verifikasi" checked>
                                        <label class="custom-control-label" for="status_1"></label>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn bg-gradient-success mb-2 mr-2" id_asatidz="1"><i class="fa fa-edit"></i>Edit</button>
                                    <button class="btn bg-gradient-danger" id_asatidz="1"><i class="fa fa-minus-circle"></i>Detail</button> </td>
                            </tr>
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

<div class="modal fade" id="modal_kelas_mata_pelajaran">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-white">
            <div class="modal-header">
                <h4 class="modal-title"> Tambah Kelas Mata Pelajaran </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <form id="form_pembayaran">
                    <input type="hidden" class="form-control" name="id_kelas_mata_pelajaran" id="id_kelas_mata_pelajaran">
                    <input type="hidden" class="form-control" name="id_santri" id="id_santri">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="id_mata_pelajaran"> Mata Pelajaran </label>
                            <select id="id_mata_pelajaran" name="id_mata_pelajaran" class="form-control" required>
                                <option value="1" id="mata_pelajaran_1" selected>Fisika [XII]</option>
                                <option value="2" id="mata_pelajaran_2"> Kimia [XII] </option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="id_tahun_pelajaran"> Mata Pelajaran </label>
                            <select id="id_tahun_pelajaran" name="id_tahun_pelajaran" class="form-control" required>
                                <option value="1" id="mata_pelajaran_1" selected> 2020 </option>
                                <option value="2" id="mata_pelajaran_2"> 2021 </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="id_ruang"> Jenis Pembayaran </label>
                            <select id="id_ruang" name="id_ruang" class="form-control" required>
                                <option value="1" id="ruang_2" selected>Kelas Fisika XII</option>
                                <option value="2" id="ruang_2"> Kelas Kimia XII </option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="hari"> Hari </label>
                            <input type="number" class="form-control" min="1" max="12" id="hari" name="hari" placeholder="Bulan" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="jam_mulai"> Jam Mulai </label>
                            <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="jam_selesai"> Jam Selesai </label>
                            <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required>
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
    // $(document).ready(function() {
    //     var tableListPembayaran = $('#tabel_pembayaran').DataTable({
    //         "paging": true,
    //         "lengthChange": true,
    //         "searching": true,
    //         "ordering": true,
    //         "info": true,
    //         "autoWidth": false,
    //         "responsive": true,
    //     });

    //     function renderTabelListPembayaran(id_program) {
    //         var url = "pembayaran/getData";
    //         var data = {};
    //         if (id_program) {
    //             url = "pembayaran/getDataByProgram";
    //             data = {
    //                 id_program
    //             };
    //         }
    //         tableListPembayaran.clear()
    //         $.ajax({
    //                 method: "POST",
    //                 url,
    //                 data
    //             })

    //             .done(function(msg) {
    //                 var res = JSON.parse(msg);

    //                 if (res[0]) {
    //                     for (i = 0; i < res.length; i++) {
    //                         var id = res[i]['id_pembayaran'];
    //                         var status = res[i]['status_verifikasi'] == "TERVERIFIKASI" ? "checked" : "";
    //                         var nama_program;
    //                         var btn_ubah =
    //                             '<button type="button" class="btn bg-gradient-success mb-2 mr-2 btn-ubah btn-sm" data-toggle="modal" data-target="#modal_pembayaran" id_pembayaran=' + id + ' id="edit-button"><i class="fas fa-edit"></i>Ubah</button>';
    //                         var btn_hapus =
    //                             '<button type="button" class="btn bg-gradient-danger mb-2 mr-3 btn-sm" id_pembayaran=' + id + ' id="delete-button"><i class = "fa fa-minus-circle"></i>Delete</button>';
    //                         var btn_status =
    //                             '<div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" id="status_' + id + '" id_pembayaran="' + id + '" name="status_verifikasi"' + status + '><label class="custom-control-label" for="status_' + id + '"></label></div>';

    //                         tableListPembayaran.row.add([
    //                             i + 1,
    //                             res[i]['nama_calon_santri'],
    //                             res[i]['tanggal_pembayaran'].split("-").reverse().join("-"),
    //                             res[i]['bukti_pembayaran'],
    //                             res[i]['id_program'],
    //                             res[i]['otp_pembayaran'],
    //                             btn_status,
    //                             btn_ubah + btn_hapus,
    //                         ]).draw(false);
    //                     }
    //                 } else {
    //                     alert("Data pembayaran tidak ditemukan");
    //                     renderTabelListPembayaran();
    //                 }


    //             })
    //     }

    //     renderTabelListPembayaran();

    //     $("#btn-upload-data").click(function() {
    //         renderOptionProgram();
    //         $("#id_pembayaran").val('');
    //         $("#nama_calon_santri").val('');
    //         $("#tanggal_pembayaran").val('');
    //         $("#tanggal_lahir").val('');
    //         $("#bukti_pembayaran").val('');
    //         $("#otp_pembayaran").val('');
    //         $("#status_terverifikasi").val('');
    //     });



    //     $("#form_pembayaran").submit(function() {
    //         event.preventDefault();
    //         var formData = $(this).serialize();
    //         $.ajax({
    //                 method: "POST",
    //                 url: "<?= base_url() ?>Pembayaran/simpanData",
    //                 data: formData
    //             })

    //             .done(function(msg) {
    //                 var res = JSON.parse(msg);
    //                 var pembayaran = res['data']

    //                 if (res['status'] == 1 || res['status' == "1"]) {
    //                     alert("Data Berhasil Disimpan");
    //                     $("#modal_pembayaran").modal('hide');
    //                     var id_program = $("#filter-option").attr("id_program");
    //                     renderTabelListPembayaran(id_program);
    //                 } else if (res['status'] == 0 || res['status'] == "0") {
    //                     alert("Data Gagal Disimpan, mungkin sudah ada");
    //                     $("#modal_pembayaran").modal('hide')
    //                 } else {
    //                     console.log(res);
    //                 }
    //             });

    //     });


    //     $('#tabel_pembayaran').on('click', '#delete-button', function() {
    //         var id_pembayaran = $(this).attr('id_pembayaran');
    //         if (confirm("Apakah anda yakin ingin menghapus bukti pembayaran ini?")) {
    //             $.ajax({
    //                 method: "POST",
    //                 url: "<?= base_url() ?>pembayaran/hapusData",
    //                 data: {
    //                     id_pembayaran
    //                 }
    //             }).done(function(msg) {
    //                 if (msg) {
    //                     alert("Bukti pembayaran terhapus");
    //                 }
    //                 var id_program = $("#filter-option").attr("id_program");
    //                 renderTabelListPembayaran(id_program);
    //             });
    //         } else {
    //             alert("Bukti pembayaran batal dihapus");
    //         }
    //     });

    //     $('#tabel_pembayaran').on('click', '#edit-button', function() {
    //         var id_pembayaran = $(this).attr('id_pembayaran');

    //         $.ajax({
    //             method: "POST",
    //             url: "<?= base_url() ?>pembayaran/getDataById",
    //             data: {
    //                 id_pembayaran
    //             }
    //         }).done(function(msg) {
    //             var res = JSON.parse(msg);
    //             $("#id_pembayaran").val(res['id_pembayaran']);
    //             $("#nama_calon_santri").val(res['nama_calon_santri']);
    //             $("#tanggal_pembayaran").val(res['tanggal_pembayaran']);
    //             $("#tanggal_lahir").val(res['tanggal_lahir']);
    //             $("#bukti_pembayaran").val(res['bukti_pembayaran']);
    //             renderOptionProgram(res['id_program']);
    //             $("#otp_pembayaran").val(res['otp_pembayaran']);
    //             verifikasi(res['status_verifikasi']);
    //         })
    //     });

    //     function verifikasi($status_verifikasi) {
    //         if ($status_verifikasi == "TERVERIFIKASI") {
    //             $("#belum_terverifikasi").attr("selected", false);
    //             $("#terverifikasi").attr("selected", true);
    //         } else {
    //             $("#terverifikasi").attr("selected", false);
    //             $("#belum_terverifikasi").attr("selected", true);
    //         }
    //     }

    //     $("#tabel_pembayaran").on('click', 'input[id*="status_"]', function() {
    //         var id_pembayaran = $(this).attr("id_pembayaran");
    //         var status = $(this).attr("checked") == "checked" ? "BELUM" : "TERVERIFIKASI";
    //         $.ajax({
    //             method: "POST",
    //             url: "<?= base_url() ?>pembayaran/updateStatusPembayaran",
    //             data: {
    //                 id_pembayaran,
    //                 status
    //             }
    //         }).done(function(msg) {
    //             if (JSON.parse(msg)) {
    //                 alert("Pembayaran dengan id " + id_pembayaran + " " + status + (status == "BELUM" ? " terverifikasi" : ""));
    //             } else {
    //                 alert("Ubah status pembayaran gagal");
    //             }
    //             var id_program = $("#filter-option").attr("id_program");
    //             renderTabelListPembayaran(id_program);
    //         })
    //     });

    //     function getProgram() {
    //         return $.ajax({
    //             method: "POST",
    //             url: "<?= base_url() ?>program/getProgram",
    //             data: {}
    //         })
    //     }

    //     function renderOptionProgram(currentValue) {
    //         $('#id_program')
    //             .empty()
    //             .append("<option selected='selected' value='0'>[pilih jenis program]</option> ");

    //         getProgram().done(function(msg) {
    //             var program = JSON.parse(msg);

    //             $.each(program, function(key, value) {
    //                 if (currentValue == value['id_program']) {
    //                     $('#id_program')
    //                         .append($("<option selected='selected'></option>")
    //                             .attr("value", value['id_program'])
    //                             .text(value['id_program'] + ":" + value['nama']));
    //                 } else {
    //                     $('#id_program')
    //                         .append($("<option></option>")
    //                             .attr("value", value['id_program'])
    //                             .text(value['id_program'] + ":" + value['nama']));
    //                 }

    //             });
    //         });
    //     }

    //     getProgram().done(function(msg) {
    //         var res = JSON.parse(msg);
    //         console.log(res);
    //         $(".dropdown-menu").append('<button class="dropdown-item" type="button">Semua</button>')
    //         for (var i = 0; i < res.length; i++) {
    //             var element = '<button class="dropdown-item" id_program="' + res[i]['id_program'] + '" type="button">' + res[i]['nama'] + '</button>'
    //             $(".dropdown-menu").append(element);
    //         }

    //         // $("#filter-option").append('<div class="btn btn-info filter mr-3 mb-3">Semua</div>');
    //         // for (var i = 0; i < res.length; i++) {
    //         //     var element = '<div class="btn btn-info filter mr-3 mb-3" id_program="' + res[i]['id_program'] + '">' + res[i]['nama'] + '</div>'
    //         //     $("#filter-option").append(element);
    //         // }
    //     });

    //     $(".dropdown-menu").on('click', '.dropdown-item', function() {
    //         var id_program = $(this).attr("id_program");
    //         renderTabelListPembayaran(id_program);
    //     });
    //     // $("#filter-option").on('click', '.filter', function() {
    //     //     var id_program = $(this).attr("id_program");
    //     //     $(".filter").removeClass("active");
    //     //     $(this).addClass("active");
    //     //     $("#filter-option").attr("id_program", id_program);
    //     //     renderTabelListPembayaran(id_program);
    //     // });
    // });
</script>