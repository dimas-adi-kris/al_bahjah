<!-- Tampilkan Data Table Ruang -->

<div class="card o-f">
    <div class="card-header">
        <h3 class="card-title">Data Ruang</h3>
        <button id="btn-tambah-ruang" type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal_form"><i class="fa fa-plus-square" aria-hidden="true"></i> Ruang</button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="tabel-list-ruang" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kode</th>
                    <th>Singkatan</th>
                    <th>Lokasi</th>
                    <th>Kapasitas</th>
                    <th>Jenis Ruang</th>
                    <th>Status Tersedia</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Ruang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Isi Form -->
                <form id="form-tambah-ruang">

                    <div class="form-group">
                        <label for="nama_ruang">Nama</label>
                        <input type="hidden" class="form-control" id="id_ruang" name="id_ruang">
                        <input type="text" class="form-control" id="nama_ruang" name="nama_ruang" placeholder="Nama Ruang" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="kode_ruang">Kode</label>
                            <input type="text" class="form-control" id="kode_ruang" name="kode_ruang" placeholder="Kode" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="singkatan_ruang">Singkatan</label>
                            <input type="text" class="form-control" id="singkatan_ruang" name="singkatan_ruang" placeholder="Singkatan" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="lokasi_ruang">Lokasi</label>
                            <input type="text" class="form-control" id="lokasi_ruang" name="lokasi_ruang" placeholder="Lokasi" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="kapasitas_ruang">Kapasitas</label>
                            <input type="number" class="form-control" id="kapasitas_ruang" name="kapasitas_ruang" placeholder="Kapasitas" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="jenis_ruang">Jenis Ruang</label>
                            <select class="form-control" id="jenis_ruang" name="jenis_ruang" required>
                                <option value="LABORATORIUM">LABORATORIUM</option>
                                <option value="KELAS">KELAS</option>
                                <option value="LAPANGAN">LAPANGAN</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="status_ruang">Status Tersedia</label>
                            <select class="form-control" id="status_ruang" name="status_ruang" required>
                                <option value="TERSEDIA">TERSEDIA</option>
                                <option value="TIDAK TERSEDIA">TIDAK TERSEDIA</option>
                            </select>
                        </div>
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
        var tabelListRuang = $('#tabel-list-ruang').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        // READ
        renderTabelListRuang();

        function renderTabelListRuang() {
            tabelListRuang.clear();
            $.ajax({
                    method: "POST",
                    url: "<?= base_url() ?>Ruang/getData",
                    data: {}
                })
                .done(function(msg) {
                    var res = JSON.parse(msg);
                    // console.log(res);
                    for (i = 0; i < res.length; i++) {
                        var btn_ubah = '<button type="button" class="m-1 btn bg-gradient-info btn-sm class_ubah_data" id="btn_ubah_data" data-toggle="modal" data-target="#modal_form" id_ruang=' + res[i]['id_ruang'] + '><i class="fa fa-edit" aria-hidden="true"></i> Ubah</button>';

                        var btn_hapus = '<button type="button" class="m-1 btn bg-gradient-danger btn-sm class_hapus_data" id="btn_hapus_data" id_ruang=' + res[i]['id_ruang'] + '><i class = "fa fa-minus-circle" aria-hidden = "true" ></i> Hapus</button > ';

                        tabelListRuang.row.add([
                            i + 1,
                            res[i]['nama'],
                            res[i]['kode'],
                            res[i]['singkatan'],
                            res[i]['lokasi'],
                            res[i]['kapasitas'],
                            res[i]['jenis_ruang'],
                            res[i]['status_tersedia'],
                            btn_ubah + btn_hapus,
                        ]).draw(false);
                    }
                });
        }

        $("#btn-tambah-ruang").click(function() {
            $('#submit-tambah').html('Tambah');
            $('#exampleModalLabel').html('Tambah Data Ruang');
            $('#id_ruang').val('');
            $('#nama_ruang').val('');
            $('#kode_ruang').val('');
            $('#singkatan_ruang').val('');
            $('#lokasi_ruang').val('');
            $('#kapasitas_ruang').val('');
            $('#jenis_ruang').val('');
            $('#status_ruang').val('');
        });


        // Insert Data
        $("#form-tambah-ruang").submit(function() {
            // alert('True');
            event.preventDefault();
            var formData = $(this).serialize();
            // console.log(formData);
            $.ajax({
                    method: "POST",
                    url: "<?= base_url() ?>Ruang/simpanData",
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
                        renderTabelListRuang();
                    } else if (res['status'] == 0 || res['status'] == "0") {
                        alert("Data tidak berhasil disimpan");
                        $("#modal_form").modal("hide");
                    } else {
                        // console.log(msg);
                    }
                });
        });

        // Hapus Data
        $('#tabel-list-ruang').on('click', '.class_hapus_data', function() {
            var id_ruang = $(this).attr('id_ruang');
            console.log(id_ruang);
            if (confirm('Anda Yakin Menghapus Data')) {

                $.ajax({
                        method: "POST",
                        url: "<?= base_url() ?>Ruang/hapusData",
                        data: {
                            id_ruang: id_ruang
                        }
                    })
                    .done(function(msg) {
                        renderTabelListRuang();
                    });
            } else {
                alert('Data tidak bisa dihapus', msg);
            }
        });

        // Edit Data
        $('#tabel-list-ruang').on('click', '.class_ubah_data', function() {
            $('#submit-tambah').html('Ubah');
            $('#exampleModalLabel').html('Ubah Data Ruang');
            var id_ruang = $(this).attr('id_ruang');
            // console.log(id_ruang);
            $.ajax({
                    method: "POST",
                    url: "<?= base_url() ?>Ruang/getDataById",
                    data: {
                        id_ruang: id_ruang
                    }
                })
                .done(function(msg) {
                    var dataRuang = JSON.parse(msg);
                    console.log(dataRuang);
                    var nama = dataRuang['nama'];
                    var kode = dataRuang['kode'];
                    var singkatan = dataRuang['singkatan'];
                    var lokasi = dataRuang['lokasi'];
                    var kapasitas = dataRuang['kapasitas'];
                    var jenis = dataRuang['jenis_ruang'];
                    var status = dataRuang['status_tersedia'];

                    $("#id_ruang").val(id_ruang);
                    $('#nama_ruang').val(nama);
                    $('#kode_ruang').val(kode);
                    $('#singkatan_ruang').val(singkatan);
                    $('#kapasitas_ruang').val(kapasitas);
                    $('#lokasi_ruang').val(lokasi);
                    $('#jenis_ruang').val(jenis);
                    $('#status_ruang').val(status);
                });

        });

    });
</script>