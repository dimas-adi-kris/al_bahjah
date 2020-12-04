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

                    <table id="tabel_pembayaran" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> Tanggal Pembayaran </th>
                                <th> Jenis Pembayaran </th>
                                <th> Bukti Berkas </th>
                                <th> Tanggal Verifikasi </th>
                                <th> Bulan </th>
                                <th> Keterangan </th>
                                <th> Nominal </th>
                                <th> Status </th>
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
                    <input type="hidden" class="form-control" name="id_santri" id="id_santri">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tanggal_pembayaran"> Tanggal Pembayaran </label>
                            <input type="date" class="form-control" name="tanggal_pembayaran" id="tanggal_pembayaran" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="bukti_berkas"> Bukti Berkas </label>
                            <input type="text" class="form-control" name="bukti_berkas" id="bukti_berkas" placeholder="Bukti Berkas" required>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="jenis_pembayaran"> Jenis Pembayaran </label>
                            <select id="jenis_pembayaran" name="jenis_pembayaran" class="form-control" required>
                                <option value="REGISTRASI ULANG" id="registrasi_ulang" selected>REGISTRASI ULANG</option>
                                <option value="SPP" id="spp"> SPP </option>
                            </select>
                        </div>
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
                    </div>

                    <div class="form-group">
                        <label for="nominal"> Nominal </label>
                        <input type="number" class="form-control" id="nominal" name="nominal" placeholder="nominal" required>
                    </div>

                    <div class="form-group">
                        <label for="keterangan"> Keterangan </label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" required>
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

        $.ajax({
            method: "POST",
            url: "<?=base_url()?>index.php/Santri/getIdSantri",
            data: {}
        }).done(function(msg) {
            $("#id_santri").val(msg);
        });

        function renderTabelListPembayaran() {
            tableListPembayaran.clear()
            $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>index.php/Pembayaran/getDataByIdSantri",
                    data: {}
                })

                .done(function(msg) {
                    var res = JSON.parse(msg);
                    console.log(res);
                    if (res[0]) {
                        for (i = 0; i < res.length; i++) {
                            var id = res[i]['id_pembayaran'];
                            var status = res[i]['status_verifikasi'] == "TERVERIFIKASI" ? "checked" : "";
                            var btn_status =
                                '<div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" id="status_' + id + '" id_pembayaran="' + id + '" name="status_verifikasi"' + status + ' disabled><label class="custom-control-label" for="status_' + id + '"></label></div>';

                            tableListPembayaran.row.add([
                                i + 1,
                                res[i]['tanggal_pembayaran'].split("-").reverse().join("-"),
                                res[i]['jenis_pembayaran'],
                                res[i]['bukti_berkas'],
                                res[i]['tanggal_verifikasi'].split("-").reverse().join("-"),
                                res[i]['bulan'],
                                res[i]['keterangan'],
                                res[i]['nominal'],
                                btn_status,
                            ]).draw(false);
                        }
                    } else {
                        alert("Data pembayaran tidak ditemukan");
                    }
                })
        };
        renderTabelListPembayaran();

        $("#btn-upload-data").click(function() {
            $("#id_pembayaran").val('');
            $("#id_santri_default").attr('selected', true);
            $("#tanggal_pembayaran").val('');
            $("#bukti_berkas").val('');
            $("#bulan_default").attr('selected', true);
            $("#keterangan").val('');
            $("#nominal").val('');
        });

        $("#form_pembayaran").submit(function() {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>index.php/Pembayaran/simpanData",
                    data: formData
                })

                .done(function(msg) {
                    var res = JSON.parse(msg);
                    var pembayaran = res['data']
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
    })
</script>