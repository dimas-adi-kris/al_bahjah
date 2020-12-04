<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> Daftar Jadwal </h3>
                        <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-jadwal-ujian" id="btn-tambah-jadwal-ujian">
                            <strong><i class="fas fa-plus"></i>Data </strong></button>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tabel-list-jadwal-ujian" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th> No </th>
                                    <th> Tanggal </th>
                                    <th> Waktu</th>
                                    <th> Lokasi </th>
                                    <th> Keterangan </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>11-11-2020</td>
                                    <td>08:00 - 10:00</td>
                                    <td>Gedung A, Kelas A-D</td>
                                    <td>Ini keterangan</td>
                                    <td>
                                        <button class="btn btn-success mr-2" type="button" data-toggle='modal' data-target='#modal-jadwal'>Edit</button>
                                        <button class="btn btn-danger delete-button" type="button">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>11-11-2020</td>
                                    <td>13.30 - 15.30</td>
                                    <td>Di dalam kelas</td>
                                    <td>Ini Keterangan</td>
                                    <td>
                                        <button class="btn btn-success mr-2" type="button" data-toggle='modal' data-target='#modal-jadwal'>Edit</button>
                                        <button class="btn btn-danger delete-button" type="button">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>12-11-2020</td>
                                    <td>08.00 - 10.00</td>
                                    <td>Di dalam kelas</td>
                                    <td>Ini Keterangan</td>
                                    <td>
                                        <button class="btn btn-success mr-2" type="button" data-toggle='modal' data-target='#modal-jadwal'>Edit</button>
                                        <button class="btn btn-danger delete-button" type="button">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>12-11-2020</td>
                                    <td>13.30 - 15.30</td>
                                    <td>Di dalam kelas</td>
                                    <td>Ini Keterangan</td>
                                    <td>
                                        <button class="btn btn-success mr-2" type="button" data-toggle='modal' data-target='#modal-jadwal'>Edit</button>
                                        <button class="btn btn-danger delete-button" type="button">Delete</button>
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

    <div class="modal fade" id="modal-jadwal-ujian">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-secondary">
                <div class="modal-header">
                    <h4 class="modal-title" id="title-modal-jadwal-ujian"> Jadwal Ujian </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form id="form-jadwal-ujian">
                        <div class="form-group">
                            <label label for="tanggal"> Tanggal </label>
                            <input type="hidden" class="form-control" name="id_jadwal_ujian" id="id_jadwal_ujian">
                            <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                        </div>
                        <div class="form-group">
                            <label for="waktu"> Waktu </label>
                            <input type="time" class="form-control" name="waktu" id="waktu" required>
                        </div>
                        <div class="form-group">
                            <label for="lokasi"> Lokasi </label>
                            <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Lokasi" required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan"> Keterangan </label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" required>
                        </div>
                        <hr>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-outline-light" id="submit-data-jadwal-ujian">Save changes</button>
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
            var tabelListJadwalUjian = $('#tabel-list-jadwal-ujian').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });

            renderTabelListJadwalUjian();

            function renderTabelListJadwalUjian() {

                tabelListJadwalUjian.clear();
                $.ajax({
                        method: "POST",
                        url: "<?=base_url()?>JadwalUjian/getJadwalUjian",
                        data: {}
                    })

                    .done(function(msg) {
                        var res = JSON.parse(msg);
                        for (i = 0; i < res.length; i++) {
                            var btn_ubah = '<button type="button" id="edit-button" class="btn bg-gradient-info btn-sm mr-2" data-toggle="modal" data-target="#modal-jadwal-ujian" id_jadwal_ujian=' + res[i]['id_jadwal_ujian'] + '><i class="fas fa-edit" aria-hidden="true"></i> Ubah</button>';

                            var btn_hapus = '<button type="button" class="btn bg-gradient-danger btn-sm" id="delete-button" id_jadwal_ujian=' + res[i]['id_jadwal_ujian'] + '><i class = "fa fa-minus-circle" aria-hidden = "true" ></i> Hapus</button > ';

                            var tanggal = new Date(res[i]['tanggal']).toLocaleDateString(undefined, {
                                day: 'numeric',
                                month: 'long',
                                year: 'numeric'
                            });

                            tabelListJadwalUjian.row.add([
                                i + 1,
                                tanggal,
                                res[i]['waktu'],
                                res[i]['lokasi'],
                                res[i]['keterangan'],
                                btn_ubah + btn_hapus,
                            ]).draw(false);
                        }
                    })
            };

            $("#btn-tambah-jadwal-ujian").click(function() {
                $('#submit-data-jadwal-ujian').html('Tambah');
                $('#title-modal-jadwal-ujian').html('Tambah Data Jadwal Ujian');
                $('#tanggal').val('');
                $('#waktu').val('');
                $('#lokasi').val('');
                $('#keterangan').val('');
            });

            $("#form-jadwal-ujian").submit(function() {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                        method: "POST",
                        url: "<?=base_url()?>JadwalUjian/tambahJadwalUjian",
                        data: formData
                    })
                    .done(function(msg) {
                        var res = JSON.parse(msg);
                        var data = res['data'];

                        if (res['status'] == 1 || res['status'] == "1") {
                            alert("Data berhasil " + res['type']);
                            $("#modal-jadwal-ujian").modal("hide");

                            renderTabelListJadwalUjian();
                        } else if (res['status'] == 0 || res['status'] == "0") {
                            alert("Data gagal " + res['type']);
                            $("#modal-jadwal-ujian").modal("hide");
                        } else {
                            console.log(msg);
                        }
                    });
            });

            $('#tabel-list-jadwal-ujian').on('click', '#delete-button', function() {
                var id_jadwal_ujian = $(this).attr('id_jadwal_ujian');
                if (confirm("Apakah anda yakin ingin menghapus jadwal ini?")) {
                    $.ajax({
                        method: "POST",
                        url: "<?=base_url()?>JadwalUjian/hapusJadwalUjian",
                        data: {
                            id_jadwal_ujian
                        }
                    }).done(function(msg) {
                        alert("Jadwal terhapus");
                        renderTabelListJadwalUjian();
                    });
                } else {
                    alert("Jadwal batal dihapus");
                }
            });

            $('#tabel-list-jadwal-ujian').on('click', '#edit-button', function() {
                var id_jadwal_ujian = $(this).attr('id_jadwal_ujian');
                $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>JadwalUjian/getJadwalUjianById",
                    data: {
                        id_jadwal_ujian
                    }
                }).done(function(msg) {
                    var res = JSON.parse(msg);

                    $("#id_jadwal_ujian").val(res['id_jadwal_ujian'])
                    $('#submit-data-jadwal-ujian').html('Edit');
                    $('#title-modal-jadwal-ujian').html('Edit Data Jadwal Ujian');
                    $('#tanggal').val(res['tanggal']);
                    $('#waktu').val(res['waktu']);
                    $('#lokasi').val(res['lokasi']);
                    $('#keterangan').val(res['keterangan']);
                })
            });

        });
    </script>