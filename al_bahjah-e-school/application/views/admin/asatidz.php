<!-- Tampilkan Data Table Asatidz -->

<div class="card o-f">
    <div class="card-header">
        <h3 class="card-title">Data Asatidz</h3>
        <button id="btn-tambah-asatidz" type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal_form"><i class="fa fa-plus-square" aria-hidden="true"></i> Asatidz</button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="tabel-list-asatidz" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Nama Tanpa Gelas</th>
                    <th>TTL</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>NIK</th>
                    <th>NIP</th>
                    <th>Bidang Ilmu</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Asatidz</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Isi Form -->
                <form id="form-tambah-asatidz">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="hidden" class="form-control" id="id_asatidz" name="id_asatidz">
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="nama_tanpa_gelar">Nama Tanpa Gelar</label>
                            <input type="text" class="form-control" id="nama_tanpa_gelar" name="nama_tanpa_gelar" placeholder="Nama Tanpa Gelar" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email_asatidz">Email</label>
                            <input type="email" class="form-control" id="email_asatidz" name="email_asatidz" placeholder="Email" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="telepon_astidz">Telepon</label>
                            <input type="text" class="form-control" id="telepon_asatidz" name="telepon_asatidz" placeholder="Telepon" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat_asatidz">Alamat</label>
                        <input type="text" class="form-control" id="alamat_asatidz" name="alamat_asatidz" placeholder="Alamat" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nik_asatidz">NIK</label>
                            <input type="text" class="form-control" id="nik_asatidz" name="nik_asatidz" placeholder="NIK" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nip_asatidz">NIP</label>
                            <input type="text" class="form-control" id="nip_asatidz" name="nip_asatidz" placeholder="NIP" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="bidang_ilmu">Bidang Ilmu</label>
                        <input type="text" class="form-control" id="bidang_ilmu" name="bidang_ilmu" placeholder="Bidang Ilmu" required>
                    </div>

                    <button id="submit-tambah" type="submit" class="btn btn-success">Tambah</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </form>
                <!-- Penutup Form -->
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var tabelListAsatidz = $('#tabel-list-asatidz').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
        // READ
        renderTabelListAsatidz();

        function renderTabelListAsatidz() {
            tabelListAsatidz.clear();
            $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>index.php/Asatidz/getData",
                    data: {}
                })
                .done(function(msg) {
                    var res = JSON.parse(msg);
                    // console.log(res);
                    for (i = 0; i < res.length; i++) {
                        var btn_ubah = '<button type="button" class="m-1 btn bg-gradient-info btn-sm class_ubah_data" id="btn_ubah_data" data-toggle="modal" data-target="#modal_form" id_asatidz=' + res[i]['id_asatidz'] + '><i class="fa fa-edit" aria-hidden="true"></i> Ubah</button>';
                        var tanggal_lahir = new Date(res[i]['tanggal_lahir']).toLocaleDateString(undefined, {
                            day: 'numeric',
                            month: 'long',
                            year: 'numeric'
                        });
                        var btn_hapus = '<button type="button" class="m-1 btn bg-gradient-danger btn-sm class_hapus_data" id="btn_hapus_data" id_asatidz=' + res[i]['id_asatidz'] + '><i class = "fa fa-minus-circle" aria-hidden = "true" ></i> Hapus</button > ';
                        tabelListAsatidz.row.add([
                            i + 1,
                            res[i]['nama_lengkap'],
                            res[i]['nama_tanpa_gelar'],
                            `${res[i]['tempat_lahir']}, ${tanggal_lahir}`,
                            res[i]['email'],
                            res[i]['telepon'],
                            res[i]['alamat'],
                            res[i]['nik'],
                            res[i]['nip'],
                            res[i]['bidang_ilmu'],
                            btn_ubah + btn_hapus,
                        ]).draw(false);
                    }
                });
        }

        $("#btn-tambah-asatidz").click(function() {
            $('#submit-tambah').html('Tambah');
            $('#exampleModalLabel').html('Tambah Data Tahun Pelajaran');
            $('#id_asatidz').val('');
            $('#nama_lengkap').val('');
            $('#nama_tanpa_gelar').val('');
            $('#tempat_lahir').val('');
            $('#tanggal_lahir').val('');
            $('#email_asatidz').val('');
            $('#telepon_asatidz').val('');
            $('#alamat_asatidz').val('');
            $('#nik_asatidz').val('');
            $('#nip_asatidz').val('');
            $('#bidang_ilmu').val('');
        });


        // Insert Data
        $("#form-tambah-asatidz").submit(function() {
            // alert('True');
            event.preventDefault();
            var formData = $(this).serialize();
            // console.log(formData);
            $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>index.php/Asatidz/simpanData",
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
                        renderTabelListAsatidz();
                    } else if (res['status'] == 0 || res['status'] == "0") {
                        alert("Data tidak berhasil disimpan");
                        $("#modal_form").modal("hide");
                    } else {
                        // console.log(msg);
                    }
                });
        });

        // Hapus Data
        $('#tabel-list-asatidz').on('click', '.class_hapus_data', function() {
            var id_asatidz = $(this).attr('id_asatidz');
            console.log(id_asatidz);
            if (confirm('Anda Yakin Menghapus Data')) {

                $.ajax({
                        method: "POST",
                        url: "<?=base_url()?>index.php/Asatidz/hapusData",
                        data: {
                            id_asatidz: id_asatidz
                        }
                    })
                    .done(function(msg) {
                        renderTabelListAsatidz();
                    });
            } else {
                alert('Data tidak bisa dihapus', msg);
            }
        });

        // Edit Data
        $('#tabel-list-asatidz').on('click', '.class_ubah_data', function() {
            $('#submit-tambah').html('Ubah');
            $('#exampleModalLabel').html('Ubah Data Asatidz');
            var id_asatidz = $(this).attr('id_asatidz');
            // console.log(id_asatidz);
            $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>index.php/Asatidz/getDataById",
                    data: {
                        id_asatidz: id_asatidz
                    }
                })
                .done(function(msg) {
                    var dataAsatidz = JSON.parse(msg);
                    console.log(dataAsatidz);
                    var nama_l = dataAsatidz['nama_lengkap'];
                    var nama_tg = dataAsatidz['nama_tanpa_gelar'];
                    var tempat_lahir = dataAsatidz['tempat_lahir'];
                    var tanggal_lahir = dataAsatidz['tanggal_lahir'];
                    var email = dataAsatidz['email'];
                    var telepon = dataAsatidz['telepon'];
                    var alamat = dataAsatidz['alamat'];
                    var nik = dataAsatidz['nik'];
                    var nip = dataAsatidz['nip'];
                    var bidang_ilmu = dataAsatidz['bidang_ilmu'];

                    $('#id_asatidz').val(id_asatidz);
                    $('#nama_lengkap').val(nama_l);
                    $('#nama_tanpa_gelar').val(nama_tg);
                    $('#tempat_lahir').val(tempat_lahir);
                    $('#tanggal_lahir').val(tanggal_lahir);
                    $('#email_asatidz').val(email);
                    $('#telepon_asatidz').val(telepon);
                    $('#alamat_asatidz').val(alamat);
                    $('#nik_asatidz').val(nik);
                    $('#nip_asatidz').val(nip);
                    $('#bidang_ilmu').val(bidang_ilmu);
                });

        });

    });
</script>