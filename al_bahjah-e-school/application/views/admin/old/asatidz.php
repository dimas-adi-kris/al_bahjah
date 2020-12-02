<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> Daftar Asatidz </h3>
                        <button type="submit" class="btn btn-success float-right" data-toggle="modal" data-target="#modal_asatidz" id="btn-upload-data">
                            <i class="fas fa-plus mr-2"></i>Upload Data </button>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body o-f">
                        <div class="row">
                            <div id="filter-option"></div>
                        </div>

                        <!-- Filter -->
                        <div class="btn-group mb-3">
                            <button type="button" class="btn bg-gradient-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Filter
                            </button>
                            <div class="dropdown-menu">
                            </div>
                        </div>

                        <table id="tabel-list-calon-santri" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th> No </th>
                                    <th> Nama Lengkap </th>
                                    <th> Nama Tanpa Gelar</th>
                                    <th> TTL </th>
                                    <th> Email </th>
                                    <th> Telepon </th>
                                    <th> Alamat </th>
                                    <th> NIK </th>
                                    <th> NIP </th>
                                    <th> Bidang Ilmu </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Dra. Linda Elita</td>
                                    <td>Linda Elita</td>
                                    <td>Batusangkar, 01-01-1963</td>
                                    <td>lindae@gmail.com</td>
                                    <td>+6285363021295</td>
                                    <td>Baringin, Batusangkar</td>
                                    <td>1304084101630001</td>
                                    <td>19850723 2005022001</td>
                                    <td>Kimia</td>
                                    <td>
                                        <button class="btn bg-gradient-success" id_asatidz="1"><i class="fa fa-edit"></i>Edit</button>
                                        <button class="btn bg-gradient-danger" id_asatidz="1"><i class="fa fa-minus-circle"></i>Detail</button>
                                    </td>
                                </tr>
                            </tbody>
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

    <div class="modal fade" id="modal_asatidz">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-white">
                <div class="modal-header">
                    <h4 class="modal-title"> Tambah Data Asatidz </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">
                    <form id="form_pembayaran">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="hidden" class="form-control" name="id_asatidz" id="id_asatidz">
                                <label label for="nama_lengkap"> Nama Lengkap </label>
                                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label label for="nama_tanpa_gelar"> Nama Tanpa Gelar </label>
                                <input type="text" class="form-control" name="nama_tanpa_gelar" id="nama_tanpa_gelar" placeholder="Nama Tanpa Gelar" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tempat_lahir"> Tempat Lahir </label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tanggal_lahir"> Tanggal Lahir </label>
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email"> Email </label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="telepon"> Telepon </label>
                                <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Telepon" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="alamat"> Alamat </label>
                            <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat" required>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nik"> NIK </label>
                                <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nip"> NIP </label>
                                <input type="text" class="form-control" name="nip" id="nip" placeholder="NIP" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bidang_ilmu"> Bidang Ilmu </label>
                            <input type="text" class="form-control" name="bidang_ilmu" id="bidang_ilmu" placeholder="Bidang Ilmu" required>
                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-primary btn-outline-white" id="btn-simpan"> Simpan </button>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <script type="text/javascript">
        // $(document).ready(function() {
        //     var tabelListCalonSantri = $('#tabel-list-calon-santri').DataTable({
        //         "paging": true,
        //         "lengthChange": true,
        //         "searching": true,
        //         "ordering": true,
        //         "info": true,
        //         "autoWidth": false,
        //         "responsive": true,
        //     });

        //     renderTabelListCalonSantri();

        //     function renderTabelListCalonSantri(id_program) {
        //         var url = "<?= base_url() ?>calonsantri/getAllCalonSantriJoin";
        //         var data = {};
        //         if (id_program) {
        //             url = "<?= base_url() ?>calonsantri/getAllCalonSantriJoinProgram";
        //             data = {
        //                 id_program
        //             };
        //         }

        //         tabelListCalonSantri.clear();
        //         $.ajax({
        //                 method: "POST",
        //                 url,
        //                 data
        //             })
        //             .done(function(msg) {
        //                 var res = JSON.parse(msg);
        //                 console.log(res);
        //                 if (!res[0]) {
        //                     alert('Data calon santri tidak ditemukan')
        //                     renderTabelListCalonSantri();
        //                 }
        //                 for (i = 0; i < res.length; i++) {
        //                     var id = res[i]['id_calon_santri'];
        //                     var status = res[i]['status_verifikasi_registrasi'] == "TERVERIFIKASI" ? "checked" : "";
        //                     var status_button = `
        //                         <div class="custom-control custom-switch float-right">
        //                             <input type="checkbox" class="custom-control-input" id="status_${id}" id_calon_santri="${id}" name="status_verifikasi_registrasi" ${status}>
        //                             <label class="custom-control-label" for="status_${id}"></label>
        //                         </div>
        //                     `;
        //                     var detail_button = `
        //                         <button class="btn btn-primary detail" id_calon_santri="${id}">
        //                             Detail
        //                         </button>
        //                     `;

        //                     tabelListCalonSantri.row.add([
        //                         i + 1,
        //                         res[i]['nama'],
        //                         res[i]['nik'],
        //                         res[i]['asal_sekolah'],
        //                         `${res[i]['tempat_lahir']}, ${res[i]['tanggal_lahir'].split("-").reverse().join("-")}`,
        //                         res[i]['gender'],
        //                         res[i]["nama_program"],
        //                         res[i]["nama_periode"] + " Masehi",
        //                         status_button,
        //                         detail_button
        //                     ]).draw(false);
        //                 }
        //             })
        //     };

        //     $("#tabel-list-calon-santri").on('click', 'input[id*="status_"]', function() {
        //         var id_calon_santri = $(this).attr("id_calon_santri");
        //         var status = $(this).attr("checked") == "checked" ? "BELUM" : "TERVERIFIKASI";
        //         $.ajax({
        //             method: "POST",
        //             url: "<?= base_url() ?>calonsantri/updateStatusCalonSantri",
        //             data: {
        //                 id_calon_santri,
        //                 status
        //             }
        //         }).done(function(msg) {
        //             if (JSON.parse(msg)) {
        //                 alert("Calon Santri dengan id " + id_calon_santri + " " + status + (status == "BELUM" ? " terverifikasi" : ""));
        //             } else {
        //                 alert("Ubah status calon santri gagal");
        //             }
        //             renderTabelListCalonSantri();
        //         })
        //     });

        //     $("#tabel-list-calon-santri").on('click', '.detail', function() {
        //         var id = $(this).attr("id_calon_santri");
        //         $("#main-content").load("<?= base_url() ?>operator/detail");
        //         $("#page-title").text("Calon Santri").remove("#detail_id").append(`<div detail_id="${id}" id="detail_id" hidden></div>`);
        //     });

        //     $.ajax({
        //         method: "POST",
        //         url: "<?= base_url() ?>program/getProgram",
        //         data: {}
        //     }).done(function(msg) {
        //         var res = JSON.parse(msg);
        //         console.log(res);
        //         $(".dropdown-menu").append('<button class="dropdown-item" type="button">Semua</button>')
        //         for (var i = 0; i < res.length; i++) {
        //             var element = '<button class="dropdown-item" id_program="' + res[i]['id_program'] + '" type="button">' + res[i]['nama'] + '</button>'
        //             $(".dropdown-menu").append(element);
        //         }

        //         // var res = JSON.parse(msg);
        //         // $("#filter-option").append('<div class="btn btn-info filter mr-3 mb-3">Semua</div>');
        //         // for (var i = 0; i < res.length; i++) {
        //         //     var element = '<div class="btn btn-info filter mr-3 mb-3" id_program="' + res[i]['id_program'] + '">' + res[i]['nama'] + '</div>'
        //         //     $("#filter-option").append(element);
        //         // }
        //     });

        //     $(".dropdown-menu").on('click', '.dropdown-item', function() {
        //         var id_program = $(this).attr("id_program");
        //         renderTabelListCalonSantri(id_program);
        //     });

        //     // $("#filter-option").on('click', '.filter', function() {
        //     //     var id_program = $(this).attr("id_program");
        //     //     $(".filter").removeClass("active");
        //     //     $(this).addClass("active");
        //     //     renderTabelListCalonSantri(id_program);
        //     // });
        // });
    </script>