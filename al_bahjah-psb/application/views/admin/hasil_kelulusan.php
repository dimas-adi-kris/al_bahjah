<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- /.card -->

            <div class="card o-f">
                <div class="card-header">
                    <h3 class="card-title"> Data Hasil Kelulusan </h3>
                    <!-- <button type="submit" class="btn btn-success float-right" data-toggle="modal" data-target="#modal_pembayaran" id="btn-upload-data">
                        <i class="fas fa-plus mr-2"></i>Upload Data </button> -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div id="filter-option" id_program=""></div>
                    </div>

                    <!-- Filter -->
                    <div class="btn-group mb-3">
                        <!-- <button type="button" class="btn bg-gradient-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Filter
                        </button>
                        <div class="dropdown-menu">
                        </div> -->
                    </div>

                    <table id="tabel_hasil_kelulusan" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th> No </th>
                                <th> Nama Calon Santri </th>
                                <th> Tanggal Kelulusan </th>
                                <th> Keterangan </th>
                                <th> Status Kelulusan </th>
                            </tr>
                        </thead>
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
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label label for="nama-calon-santri"> Nama Calon Santri </label>
                            <input type="text" class="form-control" name="otp_pembayaran" id="otp_pembayaran" hidden>
                            <input type="hidden" class="form-control" name="id_pembayaran" id="id_pembayaran">
                            <input type="text" class="form-control" name="nama_calon_santri" id="nama_calon_santri" placeholder=" Nama " required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tanggal_lahir"> Tanggal Lahir </label>
                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="tanggal_pembayaran"> Tanggal Pembayaran </label>
                            <input type="date" class="form-control" name="tanggal_pembayaran" id="tanggal_pembayaran" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="nominal_pembayaran"> Nominal Pembayaran </label>
                            <input type="text" class="form-control" name="nominal_pembayaran" id="nominal_pembayaran" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="bukti_pembayaran"> Bukti Pembayaran </label>
                        <input type="text" class="form-control" name="bukti_pembayaran" id="bukti_pembayaran" placeholder="" required>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="id_program"> Program </label>
                            <select id="id_program" name="id_program" class="form-control" required>

                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="status-verifikasi"> Status Verifikasi </label>
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
        var tableListHasilKelulusan = $('#tabel_hasil_kelulusan').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

        function renderTabelListHasilKelulusan(id_program) {
            var url = "<?= base_url() ?>hasilkelulusan/getHasilKelulusan";
            var data = {};
            if (id_program) {
                url = "<?= base_url() ?>hasilkelulusan/getDataByProgram";
                data = {
                    id_program
                };
            }
            tableListHasilKelulusan.clear()
            $.ajax({
                    method: "POST",
                    url,
                    data
                })

                .done(function(msg) {
                    var res = JSON.parse(msg);

                    if (res[0]) {
                        for (i = 0; i < res.length; i++) {
                            var id = res[i]['id_hasil_kelulusan'];
                            var status = res[i]['status_lulus'] == "DITERIMA" ? "checked" : "";
                            var nama_program;
                            var btn_status =
                                '<div class="custom-control custom-switch text-center"><input type="checkbox" class="custom-control-input" id="status_' + id + '" id_hasil_kelulusan="' + id + '" name="status_verifikasi"' + status + '><label class="custom-control-label" for="status_' + id + '"></label></div>';

                            var tangga_kelulusan = new Date(res[i]['tanggal_kelulusan'].replace(' ', 'T')).toLocaleDateString(undefined, {
                                day: 'numeric',
                                month: 'long',
                                year: 'numeric'
                            }) + " " + res[i]['tanggal_kelulusan'].split(' ').pop();

                            tableListHasilKelulusan.row.add([
                                i + 1,
                                res[i]['nama'],
                                tangga_kelulusan,
                                res[i]['keterangan'],
                                btn_status,
                            ]).draw(false);
                        }
                    } else {
                        alert("Data santri tidak ditemukan");
                        renderTabelListHasilKelulusan();
                    }


                })
        }

        renderTabelListHasilKelulusan();

        function verifikasi($status_verifikasi) {
            if ($status_verifikasi == "TERVERIFIKASI") {
                $("#belum_terverifikasi").attr("selected", false);
                $("#terverifikasi").attr("selected", true);
            } else {
                $("#terverifikasi").attr("selected", false);
                $("#belum_terverifikasi").attr("selected", true);
            }
        }

        $("#tabel_hasil_kelulusan").on('click', 'input[id*="status_"]', function() {
            var id_hasil_kelulusan = $(this).attr("id_hasil_kelulusan");
            var status = $(this).attr("checked") == "checked" ? "BELUM DITERIMA" : "DITERIMA";
            $.ajax({
                method: "POST",
                url: "<?= base_url() ?>hasilkelulusan/updateStatusHasilKelulusan",
                data: {
                    id_hasil_kelulusan,
                    status
                }
            }).done(function(msg) {
                if (JSON.parse(msg)) {
                    alert("Pembayaran dengan id " + id_hasil_kelulusan + " " + status + (status == "BELUM" ? " terverifikasi" : ""));
                } else {
                    alert("Ubah status pembayaran gagal");
                }
                var id_program = $("#filter-option").attr("id_program");
                renderTabelListHasilKelulusan(id_program);
            })
        });

        function getProgram() {
            return $.ajax({
                method: "POST",
                url: "<?= base_url() ?>program/getProgram",
                data: {}
            })
        }

        function renderOptionProgram(currentValue) {
            $('#id_program')
                .empty()
                .append("<option selected='selected' value='0'>[pilih jenis program]</option> ");

            getProgram().done(function(msg) {
                var program = JSON.parse(msg);

                $.each(program, function(key, value) {
                    if (currentValue == value['id_program']) {
                        $('#id_program')
                            .append($("<option selected='selected'></option>")
                                .attr("value", value['id_program'])
                                .text(value['id_program'] + ":" + value['nama']));
                    } else {
                        $('#id_program')
                            .append($("<option></option>")
                                .attr("value", value['id_program'])
                                .text(value['id_program'] + ":" + value['nama']));
                    }

                });
            });
        }

        getProgram().done(function(msg) {
            var res = JSON.parse(msg);
            console.log(res);
            $(".dropdown-menu").append('<button class="dropdown-item" type="button">Semua</button>')
            for (var i = 0; i < res.length; i++) {
                var element = '<button class="dropdown-item" id_program="' + res[i]['id_program'] + '" type="button">' + res[i]['nama'] + '</button>'
                $(".dropdown-menu").append(element);
            }

        });

        $(".dropdown-menu").on('click', '.dropdown-item', function() {
            var id_program = $(this).attr("id_program");
            renderTabelListHasilKelulusan(id_program);
        });

    });
</script>