<!-- Tampilkan Data Table Kurikulum -->

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Kurikulum</h3>
        <button id="btn-tambah-kurikulum" type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal_form"><i class="fa fa-plus-square" aria-hidden="true"></i> Kurikulum</button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="tabel-list-kurikulum" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tahun</th>
                    <th>Deskripsi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>

        </table>
    </div>
    <!-- /.card-body -->
</div>

<!-- Modal Form -->
<!-- Modal -->
<div class="modal fade" id="modal_form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kurikulum</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Isi Form -->
                <form id="form-tambah-kurikulum">

                    <div class="form-group">
                        <label for="tahun_kurikulum">Tahun</label>
                        <input type="hidden" class="form-control" id="id_kurikulum" name="id_kurikulum">
                        <input type="number" class="form-control" id="tahun_kurikulum" name="tahun_kurikulum" placeholder="Tahun" min="1945" max="2099" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_kurikulum">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi_kurikulum" name="deskripsi_kurikulum" placeholder="Deskripsi" required>
                    </div>

                    <button id="submit-tambah" type="submit" class="btn btn-success">Tambah</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
            </form>
            <!-- Penutup Form -->
        </div>
        <div class="modal-footer">
            <!-- <button id="summit-tambah" type="submit" class="btn btn-success">Tambah</button> -->
        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function() {
        var tabelListKurikulum = $('#tabel-list-kurikulum').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
        // READ
        renderTabelListKurikulum();

        function renderTabelListKurikulum() {
            tabelListKurikulum.clear();
            $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>index.php/Kurikulum/getData",
                    data: {}
                })
                .done(function(msg) {
                    var res = JSON.parse(msg);
                    console.log(res);
                    for (i = 0; i < res.length; i++) {
                        var btn_ubah = '<button type="button" class="m-1 btn bg-gradient-info btn-sm class_ubah_data" id="btn_ubah_data" data-toggle="modal" data-target="#modal_form" id_kurikulum=' + res[i]['id_kurikulum'] + '><i class="fa fa-edit" aria-hidden="true"></i> Ubah</button>';

                        var btn_hapus = '<button type="button" class="m-1 btn bg-gradient-danger btn-sm class_hapus_data" id="btn_hapus_data" id_kurikulum=' + res[i]['id_kurikulum'] + '><i class = "fa fa-minus-circle" aria-hidden = "true" ></i> Hapus</button > ';
                        tabelListKurikulum.row.add([
                            i + 1,
                            res[i]['tahun'],
                            res[i]['deskripsi'],
                            btn_ubah + btn_hapus,
                        ]).draw(false);
                    }
                });
        }

        function renderOptionJeniskurikulum(currentValue) {
            // console.log(currentValue);
            $('#id_jenis_kurikulum')
                .empty()
                .append("<option selected='selected' value'0'>[pilih jenis kurikulum]</option>");
            $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>index.php/Kurikulum/getListJeniskurikulum",
                    data: {}
                })
                .done(function(msg) {
                    var jeniskurikulum = JSON.parse(msg);

                    $.each(jeniskurikulum, function(key, value) {
                        if (currentValue == value['id_jenis_kurikulum']) {
                            $("#id_jenis_kurikulum")
                                .append($("<option selected='selected'></option>")
                                    .attr("value", value['id_jenis_kurikulum'])
                                    .text(value['id_jenis_kurikulum'] + ":" + value['nama']));
                        } else {
                            $("#id_jenis_kurikulum")
                                .append($("<option></option>")
                                    .attr("value", value['id_jenis_kurikulum'])
                                    .text(value['id_jenis_kurikulum'] + ":" + value['nama']));
                        }
                    });
                });
        }

        $("#btn-tambah-kurikulum").click(function() {
            $('#submit-tambah').html('Tambah');
            $('#exampleModalLabel').html('Tambah Data Kurikulum');
            $('#id_kurikulum').val('');
            $('#tahun_kurikulum').val('');
            $('#deskripsi_kurikulum').val('');
        });


        // Insert Data
        $("#form-tambah-kurikulum").submit(function() {
            // alert('True');
            event.preventDefault();
            var formData = $(this).serialize();
            console.log(formData);
            $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>index.php/Kurikulum/simpanData",
                    data: formData
                })
                .done(function(msg) {
                    console.log(msg);
                    var res = JSON.parse(msg);
                    var data = res['data'];
                    // console.log(res);

                    if (res['status'] == 1 || res['status'] == "1") {
                        alert("Data berhasil disimpan");
                        $("#modal_form").modal("hide");
                        renderTabelListKurikulum();
                    } else if (res['status'] == 0 || res['status'] == "0") {
                        alert("Data tidak berhasil disimpan");
                        $("#modal_form").modal("hide");
                    } else {
                        console.log(msg);
                    }
                });
        });

        // Hapus Data
        $('#tabel-list-kurikulum').on('click', '.class_hapus_data', function() {
            var id_kurikulum = $(this).attr('id_kurikulum');

            if (confirm('Anda Yakin Menghapus Data')) {

                $.ajax({
                        method: "POST",
                        url: "<?=base_url()?>index.php/Kurikulum/hapusData",
                        data: {
                            id_kurikulum: id_kurikulum
                        }
                    })
                    .done(function(msg) {
                        renderTabelListKurikulum();
                    });
            } else {
                alert('Data tidak bisa dihapus', msg);
            }
        });

        // Edit Data
        $('#tabel-list-kurikulum').on('click', '.class_ubah_data', function() {
            $('#submit-tambah').html('Ubah');
            $('#exampleModalLabel').html('Ubah Data kurikulum');
            var id_kurikulum = $(this).attr('id_kurikulum');
            console.log(id_kurikulum);
            $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>index.php/Kurikulum/getDataById",
                    data: {
                        id_kurikulum: id_kurikulum
                    }
                })
                .done(function(msg) {
                    var dataKurikulum = JSON.parse(msg);
                    console.log(dataKurikulum);
                    var tahun = dataKurikulum['tahun'];
                    var deskripsi = dataKurikulum['deskripsi'];
                    $("#id_kurikulum").val(dataKurikulum['id_kurikulum']);
                    $("#tahun_kurikulum").val(tahun);
                    $('#deskripsi_kurikulum').val(deskripsi);
                });
        });

    });
</script>