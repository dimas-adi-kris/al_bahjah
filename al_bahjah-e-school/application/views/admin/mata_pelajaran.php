<!-- Tampilkan Data Table pelajaran -->

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Mata Pelajaran</h3>
        <button id="btn-tambah-pelajaran" type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal_form"><i class="fa fa-plus-square" aria-hidden="true"></i> Pelajaran</button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <!-- Filter -->
        <div class="btn-group mb-3">
            <button type="button" class="btn bg-gradient-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="filter-kelas" filtered="">
                Kelas
            </button>
            <div class="dropdown-menu" id="dropdown-filter-kelas">
                <button class="dropdown-item dropdown-kelas" kelas="" type="button">Semua</button>
                <button class="dropdown-item dropdown-kelas" kelas="X" type="button">X</button>
                <button class="dropdown-item dropdown-kelas" kelas="XI" type="button">XI</button>
                <button class="dropdown-item dropdown-kelas" kelas="XII" type="button">XII</button>
            </div>
        </div>

        <div class="btn-group mb-3">
            <button type="button" class="btn bg-gradient-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="filter-kurikulum" filtered="">
                Kurikulum
            </button>
            <div class="dropdown-menu" id="dropdown-filter-kurikulum">
                <button class="dropdown-item dropdown-kurikulum" kurikulum="" type="button">Semua</button>
            </div>
        </div>
        <button type="button" class="mb-3 btn btn-secondary" id="reset-filter"><i class="fas fa-ban"></i> Reset</button>

        <!-- End Filter -->

        <table id="tabel-list-mata-pelajaran" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Singkatan</th>
                    <th>ID Kurikulum</th>
                    <th>Jenis Mata Pelajaran</th>
                    <th>Deskripsi</th>
                    <th>Buku Referensi</th>
                    <th>Kelas</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Isi Form -->
                <form id="form-tambah-mata-pelajaran">

                    <div class="form-group">
                        <label for="nama_mata_pelajaran">Nama</label>
                        <input type="hidden" class="form-control" id="id_mata_pelajaran" name="id_mata_pelajaran">
                        <input type="text" class="form-control" id="nama_mata_pelajaran" name="nama_mata_pelajaran" placeholder="Nama Mata Pelajaran" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="kode_mata_pelajaran">Kode</label>
                            <input type="text" class="form-control" id="kode_mata_pelajaran" name="kode_mata_pelajaran" placeholder="Kode" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="singkatan_mata_pelajaran">Singkatan</label>
                            <input type="text" class="form-control" id="singkatan_mata_pelajaran" name="singkatan_mata_pelajaran" placeholder="Singkatan" required>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="id_kurikulum">Kurikulum</label>
                            <select name="id_kurikulum" id="id_kurikulum" class="id_kurikulum form-control" required></select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="jenis_mata_pelajaran">Jenis Mata Pelajaran</label>
                            <select class="form-control" id="jenis_mata_pelajaran" name="jenis_mata_pelajaran" required>
                                <option value="UMUM">Umum</option>
                                <option value="SYARIAH">Syariah</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi_mata_pelajaran">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi_mata_pelajaran" name="deskripsi_mata_pelajaran" placeholder="Deskripsi" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="buku_mata_pelajaran">Buku Referensi</label>
                            <input type="text" class="form-control" id="buku_mata_pelajaran" name="buku_mata_pelajaran" placeholder="Buku Referensi" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="kelas_mata_pelajaran">Kelas</label>
                            <select class="form-control kelas_mata_pelajaran" id="kelas_mata_pelajaran" name="kelas_mata_pelajaran" required>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
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
        var tabelListMataPelajaran = $('#tabel-list-mata-pelajaran').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
        // READ
        renderTabelListMataPelajaran();

        function renderTabelListMataPelajaran(kelas, kurikulum) {
            tabelListMataPelajaran.clear();
            $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>index.php/MataPelajaran/getDataJoinAll",
                    data: {}
                })
                .done(function(msg) {
                    var res = JSON.parse(msg);
                    // console.log(res);
                    if (kelas) {
                        res = res.filter(function(e) {
                            return e['kelas'] == kelas;
                        });
                    }
                    if (kurikulum) {
                        res = res.filter(function(e) {
                            return e['tahun'] == kurikulum;
                        });
                    }
                    if (kelas || kurikulum) {
                        if (res[0] == undefined) {
                            alert("Data tidak ada");
                            resetFilter();
                        }
                    }

                    for (i = 0; i < res.length; i++) {
                        var btn_ubah = '<button type="button" class="m-1 btn bg-gradient-info btn-sm class_ubah_data" id="btn_ubah_data" data-toggle="modal" data-target="#modal_form" id_mata_pelajaran=' + res[i]['id_mata_pelajaran'] + '><i class="fa fa-edit" aria-hidden="true"></i> Ubah</button>';

                        var btn_hapus = '<button type="button" class="m-1 btn bg-gradient-danger btn-sm class_hapus_data" id="btn_hapus_data" id_mata_pelajaran=' + res[i]['id_mata_pelajaran'] + '><i class = "fa fa-minus-circle" aria-hidden = "true" ></i> Hapus</button > ';
                        tabelListMataPelajaran.row.add([
                            i + 1,
                            res[i]['nama'] + " (" + res[i]['kode'] + ")",
                            res[i]['singkatan'],
                            res[i]['tahun'],
                            res[i]['jenis_mata_pelajaran'],
                            res[i]['deskripsi'],
                            res[i]['buku_referensi'],
                            res[i]['kelas'],
                            btn_ubah + btn_hapus,
                        ]).draw(false);
                    }
                });
        }

        function renderOptionKurikulum(currentValue) {
            $.ajax({
                method: "POST",
                url: "<?=base_url()?>index.php/Kurikulum/getData",
                data: {}
            }).done(function(msg) {
                var res = JSON.parse(msg);
                $('.id_kurikulum').html('');
                $.each(res, function(key, value) {
                    if (currentValue == value['id_kurikulum']) {
                        $('.id_kurikulum')
                            .append($("<option selected='selected'></option>")
                                .attr("value", value['id_kurikulum'])
                                .attr("id", "option_kurikulum_" + value['id_kurikulum'])
                                .text(value['tahun']));
                    } else {
                        $('.id_kurikulum')
                            .append($("<option></option>")
                                .attr("value", value['id_kurikulum'])
                                .attr("id", "option_kurikulum_" + value['id_kurikulum'])
                                .text(value['tahun']));
                    }

                });
            });
        }

        $("#btn-tambah-pelajaran").click(function() {
            $('#submit-tambah').html('Tambah');
            $('#exampleModalLabel').html('Tambah Data Mata Pelajaran');
            $('#id_mata_pelajaran').val('');
            renderOptionKurikulum();
            $('#jenis_mata_pelajaran').val('');
            $('#nama_mata_pelajaran').val('');
            $('#kode_mata_pelajaran').val('');
            $('#singkatan_mata_pelajaran').val('');
            $('#deskripsi_mata_pelajaran').val('');
            $('#buku_mata_pelajaran').val('');
            $('.kelas_mata_pelajaran').val('');
        });


        // Insert Data
        $("#form-tambah-mata-pelajaran").submit(function() {
            // alert('True');
            event.preventDefault();
            var formData = $(this).serialize();
            // console.log(formData);
            $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>index.php/MataPelajaran/simpanData",
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
                    } else if (res['status'] == 0 || res['status'] == "0") {
                        alert("Data tidak berhasil disimpan");
                        $("#modal_form").modal("hide");
                    } else {
                        console.log(msg);
                    }
                    resetFilter();
                });
        });

        // Hapus Data
        $('#tabel-list-mata-pelajaran').on('click', '.class_hapus_data', function() {
            var id_mata_pelajaran = $(this).attr('id_mata_pelajaran');
            console.log(id_mata_pelajaran);
            if (confirm('Anda Yakin Menghapus Data')) {

                $.ajax({
                        method: "POST",
                        url: "<?=base_url()?>index.php/MataPelajaran/hapusData",
                        data: {
                            id_mata_pelajaran: id_mata_pelajaran
                        }
                    })
                    .done(function(msg) {
                        resetFilter();
                    });
            } else {
                alert('Data tidak bisa dihapus', msg);
            }
        });

        // Edit Data
        $('#tabel-list-mata-pelajaran').on('click', '.class_ubah_data', function() {
            $('#submit-tambah').html('Ubah');
            $('#exampleModalLabel').html('Ubah Data pelajaran');
            var id_mata_pelajaran = $(this).attr('id_mata_pelajaran');
            // console.log(id_mata_pelajaran);
            $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>index.php/MataPelajaran/getDataById",
                    data: {
                        id_mata_pelajaran: id_mata_pelajaran
                    }
                })
                .done(function(msg) {
                    var dataMataPelajaran = JSON.parse(msg);
                    // console.log(dataMataPelajaran);
                    var kurikulum = dataMataPelajaran['id_kurikulum'];
                    var jenis = dataMataPelajaran['jenis_mata_pelajaran'];
                    var nama = dataMataPelajaran['nama'];
                    var kode = dataMataPelajaran['kode'];
                    var singkatan = dataMataPelajaran['singkatan'];
                    var deskripsi = dataMataPelajaran['deskripsi'];
                    var buku_referensi = dataMataPelajaran['buku_referensi'];
                    var kelas = dataMataPelajaran['kelas'];

                    console.log(kelas);

                    $("#id_mata_pelajaran").val(id_mata_pelajaran);
                    $('#nama_mata_pelajaran').val(nama);
                    $('#kode_mata_pelajaran').val(kode);
                    $('#singkatan_mata_pelajaran').val(singkatan);
                    renderOptionKurikulum(kurikulum);
                    $("#jenis_mata_pelajaran").val(jenis);
                    $('#deskripsi_mata_pelajaran').val(deskripsi);
                    $('#buku_mata_pelajaran').val(buku_referensi);

                    $('.kelas_mata_pelajaran').val(kelas);
                });

        });

        // Render Filter Kurikulum
        $.ajax({
            method: "POST",
            url: "<?=base_url();?>index.php/Kurikulum/getData",
            data: {}
        }).done(function(msg) {
            var res = JSON.parse(msg);
            for (var i = 0; i < res.length; i++) {
                $("#dropdown-filter-kurikulum").append('<button class="dropdown-item dropdown-kurikulum" type="button" kurikulum="' + res[i]['tahun'] + '">' + res[i]["tahun"] + '</button>');
            }
        });

        // Filter
        $(".dropdown-kelas").click(function() {
            var kelas = $(this).attr('kelas');
            var kurikulum = $("#filter-kurikulum").attr('filtered');
            $("#filter-kelas").attr('filtered', kelas).text(kelas);
            if (kelas == '') {
                $("#filter-kelas").attr('filtered', kelas).text("Kelas");
            }

            renderTabelListMataPelajaran(kelas, kurikulum);
        });

        $('#dropdown-filter-kurikulum').on('click', '.dropdown-kurikulum', function() {
            var kurikulum = $(this).attr('kurikulum');
            var kelas = $("#filter-kelas").attr('filtered');
            $("#filter-kurikulum").attr('filtered', kurikulum).text(kurikulum);
            if (kurikulum == '') {
                $("#filter-kurikulum").attr('filtered', kurikulum).text("Kurikulum");
            }

            renderTabelListMataPelajaran(kelas, kurikulum);
        })
        // End filter

        $("#reset-filter").click(function() {
            resetFilter();
        })

        function resetFilter() {
            $("#filter-kelas").attr('filtered', '').text('Kelas');
            $("#filter-kurikulum").attr('filtered', '').text('Kurikulum');
            renderTabelListMataPelajaran();
        }
    });
</script>