<!-- Tampilkan Data Table Tahun Pelajaran -->

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Tahun Pelajaran</h3>
        <button id="btn-tambah-tahun-pelajaran" type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal_form"><i class="fa fa-plus-square" aria-hidden="true"></i> Tahun Pelajaran</button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="tabel-list-tahun-pelajaran" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Tahun Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Isi Form -->
                <form id="form-tambah-tahun-pelajaran">
                    <div class="form-group">
                        <label for="tanggal_mulai">Tanggal Mulai</label>
                        <input type="hidden" class="form-control" id="id_tahun_pelajaran" name="id_tahun_pelajaran">
                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_selesai">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" required>
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
        var tabelListTahunPelajaran = $('#tabel-list-tahun-pelajaran').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
        // READ
        renderTabelListTahunPelajaran();

        function renderTabelListTahunPelajaran() {
            tabelListTahunPelajaran.clear();
            $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>index.php/TahunPelajaran/getData",
                    data: {}
                })
                .done(function(msg) {
                    var res = JSON.parse(msg);
                    // console.log(res);
                    for (i = 0; i < res.length; i++) {
                        var btn_ubah = '<button type="button" class="m-1 btn bg-gradient-info btn-sm class_ubah_data" id="btn_ubah_data" data-toggle="modal" data-target="#modal_form" id_tahun_pelajaran=' + res[i]['id_tahun_pelajaran'] + '><i class="fa fa-edit" aria-hidden="true"></i> Ubah</button>';

                        var btn_hapus = '<button type="button" class="m-1 btn bg-gradient-danger btn-sm class_hapus_data" id="btn_hapus_data" id_tahun_pelajaran=' + res[i]['id_tahun_pelajaran'] + '><i class = "fa fa-minus-circle" aria-hidden = "true" ></i> Hapus</button > ';
                        tabelListTahunPelajaran.row.add([
                            i + 1,
                            res[i]['tanggal_mulai'],
                            res[i]['tanggal_selesai'],
                            res[i]['deskripsi'],
                            btn_ubah + btn_hapus,
                        ]).draw(false);
                    }
                });
        }

        $("#btn-tambah-tahun-pelajaran").click(function() {
            $('#submit-tambah').html('Tambah');
            $('#exampleModalLabel').html('Tambah Data Tahun Pelajaran');
            $('#id_tahun_pelajaran').val('');
            $('#tanggal_mulai').val('');
            $('#tanggal_selesai').val('');
            $('#deskripsi').val('');

        });


        // Insert Data
        $("#form-tambah-tahun-pelajaran").submit(function() {
            // alert('True');
            event.preventDefault();
            var formData = $(this).serialize();
            // console.log(formData);
            $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>index.php/TahunPelajaran/simpanData",
                    data: formData
                })
                .done(function(msg) {
                    console.log(msg);
                    var res = JSON.parse(msg);
                    var data = res['data'];
                    console.log(res);

                    if (res['status'] == 1 || res['status'] == "1") {
                        alert("Data berhasil disimpan");
                        $("#modal_form").modal("hide");
                        renderTabelListTahunPelajaran();
                    } else if (res['status'] == 0 || res['status'] == "0") {
                        alert("Data tidak berhasil disimpan");
                        $("#modal_form").modal("hide");
                    } else {
                        // console.log(msg);
                    }
                });
        });

        // Hapus Data
        $('#tabel-list-tahun-pelajaran').on('click', '.class_hapus_data', function() {
            var id_tahun_pelajaran = $(this).attr('id_tahun_pelajaran');
            console.log(id_tahun_pelajaran);
            if (confirm('Anda Yakin Menghapus Data')) {

                $.ajax({
                        method: "POST",
                        url: "<?=base_url()?>index.php/TahunPelajaran/hapusData",
                        data: {
                            id_tahun_pelajaran: id_tahun_pelajaran
                        }
                    })
                    .done(function(msg) {
                        renderTabelListTahunPelajaran();
                    });
            } else {
                alert('Data tidak bisa dihapus', msg);
            }
        });

        // Edit Data
        $('#tabel-list-tahun-pelajaran').on('click', '.class_ubah_data', function() {
            $('#submit-tambah').html('Ubah');
            $('#exampleModalLabel').html('Ubah Data Tahun Pelajaran');
            var id_tahun_pelajaran = $(this).attr('id_tahun_pelajaran');
            // console.log(id_tahun_pelajaran);
            $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>index.php/TahunPelajaran/getDataById",
                    data: {
                        id_tahun_pelajaran: id_tahun_pelajaran
                    }
                })
                .done(function(msg) {
                    var dataTahunPelajaran = JSON.parse(msg);
                    console.log(dataTahunPelajaran);
                    var mulai = dataTahunPelajaran['tanggal_mulai'];
                    var selesai = dataTahunPelajaran['tanggal_selesai'];
                    var deskripsi = dataTahunPelajaran['deskripsi'];

                    $("#id_tahun_pelajaran").val(id_tahun_pelajaran);
                    $('#tanggal_mulai').val(mulai);
                    $('#tanggal_selesai').val(selesai);
                    $('#deskripsi').val(deskripsi);
                });

        });

    });
</script>