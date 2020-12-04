<!-- Tampilkan Data Table Kelas Mata Pelajaran -->

<div class="card o-f">
    <div class="card-header">
        <h3 class="card-title">Data Ruang</h3>
        <button id="btn-tambah-kelas-mata-pelajaran" type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal_form"><i class="fa fa-plus-square" aria-hidden="true"></i> Kelas Mata Pelajaran</button>
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
            <button type="button" class="btn bg-gradient-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="filter-mata-pelajaran" filtered="">
                Mata Pelajaran
            </button>
            <div class="dropdown-menu" id="dropdown-filter-mata-pelajaran">
            </div>
        </div>

        <div class="btn-group mb-3">
            <button type="button" class="btn bg-gradient-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="filter-tahun-pelajaran" filtered="">
                Tahun Pelajaran
            </button>
            <div class="dropdown-menu" id="dropdown-filter-tahun-pelajaran">
            </div>
        </div>
        <button type="button" class="mb-3 btn btn-secondary" id="reset-filter"><i class="fas fa-ban"></i> Reset</button>
        <!--  -->

        <table id="tabel-list-kelas-mata-pelajaran" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Pelajaran</th>
                    <th>Tahun Pelajaran</th>
                    <th>Ruang</th>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas Mata Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Isi Form -->
                <form id="form-tambah-kelas-mata-pelajaran">

                    <div class="form-group">
                        <label for="id_mata_pelajaran">Mata Pelajaran</label>
                        <input type="hidden" class="form-control" id="id_kelas_mata_pelajaran" name="id_kelas_mata_pelajaran">
                        <select name="id_mata_pelajaran" id="id_mata_pelajaran" class="form-control" required></select>
                    </div>

                    <div class="form-group">
                        <label for="id_tahun_pelajaran">Tahun Pelajaran</label>
                        <select name="id_tahun_pelajaran" id="id_tahun_pelajaran" class="form-control" required></select>
                    </div>

                    <div class="form-group">
                        <label for="id_ruang">Ruang</label>
                        <select name="id_ruang" id="id_ruang" class="form-control" required></select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Hari</label>
                        <select name="hari_kelas_mata_pelajaran" id="hari_kelas_mata_pelajaran" class="form-control" required>
                            <option value="1" id="hari_1">Senin</option>
                            <option value="2" id="hari_2">Selasa</option>
                            <option value="3" id="hari_3">Rabu</option>
                            <option value="4" id="hari_4">Kamis</option>
                            <option value="5" id="hari_5">Jum'at</option>
                            <option value="6" id="hari_6">Sabtu</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jam_mulai">Jam Mulai</label>
                        <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
                    </div>

                    <div class="form-group">
                        <label for="jam_selesai">Jam Selesai</label>
                        <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required>
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
        var tabelListKelasMataPelajaran = $('#tabel-list-kelas-mata-pelajaran').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
        // READ
        renderTabelListKelasMataPelajaran();

        function renderTabelListKelasMataPelajaran(kelas, mata_pelajaran, tahun_pelajaran) {
            tabelListKelasMataPelajaran.clear();
            $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>index.php/KelasMataPelajaran/getDataJoinAll",
                    data: {}
                })
                .done(function(msg) {
                    var res = JSON.parse(msg);

                    if (kelas) {
                        res = res.filter(function(e) {
                            return e['kelas'] == kelas;
                        })
                    }

                    if (mata_pelajaran) {
                        res = res.filter(function(e) {
                            return e['nama_mata_pelajaran'] == mata_pelajaran;
                        })
                    }

                    if (tahun_pelajaran) {
                        res = res.filter(function(e) {
                            var tahun = e['tanggal_mulai'].split('-')[0] + '-' + e['tanggal_selesai'].split('-')[0];
                            return tahun == tahun_pelajaran;
                        })
                    }

                    if (kelas || mata_pelajaran || tahun_pelajaran) {
                        if (res[0] == undefined) {
                            alert("Data tidak ada");
                            resetFilter();
                        }
                    }

                    for (i = 0; i < res.length; i++) {
                        var btn_ubah = '<button type="button" class="m-1 btn bg-gradient-info btn-sm class_ubah_data" id="btn_ubah_data" data-toggle="modal" data-target="#modal_form" id_kelas_mata_pelajaran=' + res[i]['id_kelas_mata_pelajaran'] + '><i class="fa fa-edit" aria-hidden="true"></i> Ubah</button>';

                        var btn_hapus = '<button type="button" class="m-1 btn bg-gradient-danger btn-sm class_hapus_data" id="btn_hapus_data" id_kelas_mata_pelajaran=' + res[i]['id_kelas_mata_pelajaran'] + '><i class = "fa fa-minus-circle" aria-hidden = "true" ></i> Hapus</button > ';

                        tabelListKelasMataPelajaran.row.add([
                            i + 1,
                            res[i]['nama_mata_pelajaran'],
                            res[i]['tanggal_mulai'].split('-')[0] + "/" + res[i]['tanggal_selesai'].split('-')[0],
                            res[i]['kode_ruang'],
                            renderHari(res[i]['hari']),
                            res[i]['jam_mulai'],
                            res[i]['jam_selesai'],
                            btn_ubah + btn_hapus,
                        ]).draw(false);
                    }
                });
        }

        function renderHari(no_hari) {
            var hari = ["Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
            return hari[no_hari - 1];
        }

        function renderOptionMataPelajaran(currentValue) {
            $.ajax({
                method: "POST",
                url: "<?=base_url()?>index.php/MataPelajaran/getDataJoinAll",
                data: {}
            }).done(function(msg) {
                var res = JSON.parse(msg);
                $('#id_mata_pelajaran').html('');
                $.each(res, function(key, value) {
                    if (currentValue == value['id_mata_pelajaran']) {
                        $('#id_mata_pelajaran')
                            .append($("<option selected='selected'></option>")
                                .attr("value", value['id_mata_pelajaran'])
                                .attr("id", "option_mapel_" + value['id_mata_pelajaran'])
                                .text("Kelas " + value['kelas'] + " - " + value['nama'] + " - Kurikulum " + value['tahun']));
                    } else {
                        $('#id_mata_pelajaran')
                            .append($("<option></option>")
                                .attr("value", value['id_mata_pelajaran'])
                                .attr("id", "option_mapel_" + value['id_mata_pelajaran'])
                                .text("Kelas " + value['kelas'] + " - " + value['nama'] + " - Kurikulum " + value['tahun']));
                    }

                });
            });
        }

        function renderOptionTahunPelajaran(currentValue) {
            $.ajax({
                method: "POST",
                url: "<?=base_url()?>index.php/TahunPelajaran/getData",
                data: {}
            }).done(function(msg) {
                var res = JSON.parse(msg);
                $('#id_tahun_pelajaran').html('');
                $.each(res, function(key, value) {
                    if (currentValue == value['id_tahun_pelajaran']) {
                        $('#id_tahun_pelajaran')
                            .append($("<option selected='selected'></option>")
                                .attr("value", value['id_tahun_pelajaran'])
                                .attr("id", "option_tahun_" + value['id_tahun_pelajaran'])
                                .text(value['tanggal_mulai'].split('-')[0] + "/" + value['tanggal_selesai'].split('-')[0]));
                    } else {
                        $('#id_tahun_pelajaran')
                            .append($("<option></option>")
                                .attr("value", value['id_tahun_pelajaran'])
                                .attr("id", "option_tahun_" + value['id_tahun_pelajaran'])
                                .text(value['tanggal_mulai'].split('-')[0] + "/" + value['tanggal_selesai'].split('-')[0]));
                    }

                });
            });
        }

        function renderOptionRuang(currentValue) {
            $.ajax({
                method: "POST",
                url: "<?=base_url()?>index.php/Ruang/getData",
                data: {}
            }).done(function(msg) {
                var res = JSON.parse(msg);
                $('#id_ruang').html('');
                $.each(res, function(key, value) {
                    if (value['status_tersedia'] == "TERSEDIA") {
                        if (currentValue == value['id_ruang']) {
                            $('#id_ruang')
                                .append($("<option selected='selected'></option>")
                                    .attr("value", value['id_ruang'])
                                    .attr("id", "option_ruang_" + value['id_ruang'])
                                    .text(value['nama'] + " (" + value['kode'] + ")"));
                        } else {
                            $('#id_ruang')
                                .append($("<option></option>")
                                    .attr("value", value['id_ruang'])
                                    .attr("id", "option_ruang_" + value['id_ruang'])
                                    .text(value['nama'] + " (" + value['kode'] + ")"));
                        }
                    }
                });
            });
        }

        $("#btn-tambah-kelas-mata-pelajaran").click(function() {
            $('#submit-tambah').html('Tambah');
            $('#exampleModalLabel').html('Tambah Data Ruang');
            $('#id_kelas_mata_pelajaran').val('');
            renderOptionMataPelajaran();
            renderOptionTahunPelajaran();
            renderOptionRuang();
            $('#hari_kelas_mata_pelajaran').val('');
            $('#jam_mulai').val('');
            $('#jam_selesai').val('');
        });

        // Insert Data
        $("#form-tambah-kelas-mata-pelajaran").submit(function() {
            // alert('True');
            event.preventDefault();
            var formData = $(this).serialize();
            // console.log(formData);
            $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>index.php/KelasMataPelajaran/simpanData",
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
                        // console.log(msg);
                    }
                    resetFilter();
                });
        });

        // Hapus Data
        $('#tabel-list-kelas-mata-pelajaran').on('click', '.class_hapus_data', function() {
            var id_kelas_mata_pelajaran = $(this).attr('id_kelas_mata_pelajaran');
            console.log(id_kelas_mata_pelajaran);
            if (confirm('Anda Yakin Menghapus Data')) {

                $.ajax({
                        method: "POST",
                        url: "<?=base_url()?>index.php/KelasMataPelajaran/hapusData",
                        data: {
                            id_kelas_mata_pelajaran: id_kelas_mata_pelajaran
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
        $('#tabel-list-kelas-mata-pelajaran').on('click', '.class_ubah_data', function() {
            $('#submit-tambah').html('Ubah');
            $('#exampleModalLabel').html('Ubah Data Ruang');
            var id_kelas_mata_pelajaran = $(this).attr('id_kelas_mata_pelajaran');
            $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>index.php/KelasMataPelajaran/getDataById",
                    data: {
                        id_kelas_mata_pelajaran: id_kelas_mata_pelajaran
                    }
                })
                .done(function(msg) {
                    var dataKelasMataPelajaran = JSON.parse(msg);
                    console.log(dataKelasMataPelajaran);
                    var mapel = dataKelasMataPelajaran['id_mata_pelajaran'];
                    var tahun = dataKelasMataPelajaran['id_tahun_pelajaran'];
                    var ruang = dataKelasMataPelajaran['id_ruang'];
                    var hari = dataKelasMataPelajaran['hari'];
                    var awal = dataKelasMataPelajaran['jam_mulai'];
                    var selesai = dataKelasMataPelajaran['jam_selesai'];

                    $("#id_kelas_mata_pelajaran").val(id_kelas_mata_pelajaran);
                    renderOptionMataPelajaran(mapel);
                    renderOptionTahunPelajaran(tahun);
                    renderOptionRuang(ruang);
                    $('#hari_kelas_mata_pelajaran').val(hari);
                    $('#jam_mulai').val(awal);
                    $('#jam_selesai').val(selesai);
                });

        });

        // Render mata pelajaran
        renderFilterMataPelajaran();

        function renderFilterMataPelajaran(kelas) {
            $.ajax({
                method: "POST",
                url: "<?=base_url();?>matapelajaran/getDataJoinAll",
                data: {}
            }).done(function(msg) {
                var res = JSON.parse(msg);
                if (kelas) {
                    res = res.filter(function(e) {
                        return e['kelas'] == kelas;
                    })
                }
                $("#dropdown-filter-mata-pelajaran").html('');
                $("#dropdown-filter-mata-pelajaran").append('<button class="dropdown-item dropdown-mata-pelajaran" mata-pelajaran="" type="button">Semua</button>');
                for (var i = 0; i < res.length; i++) {
                    $("#dropdown-filter-mata-pelajaran").append('<button class="dropdown-item dropdown-mata-pelajaran" type="button" mata-pelajaran="' + res[i]['nama'] + '">' + res[i]["nama"] + ' - ' + res[i]['tahun'] + '</button>');
                }
            });
        }

        // Render tahun pelajaran
        renderFilterTahunPelajaran();

        function renderFilterTahunPelajaran() {
            $.ajax({
                method: "POST",
                url: "<?=base_url();?>tahunpelajaran/getData",
                data: {}
            }).done(function(msg) {
                var res = JSON.parse(msg);
                $("#dropdown-filter-tahun-pelajaran").html('');
                $("#dropdown-filter-tahun-pelajaran").append('<button class="dropdown-item dropdown-tahun-pelajaran" tahun-pelajaran="" type="button">Semua</button>');

                for (var i = 0; i < res.length; i++) {
                    var tahun_pelajaran = res[i]['tanggal_mulai'].split('-')[0] + '-' + res[i]['tanggal_selesai'].split('-')[0];
                    var text = '<button class="dropdown-item dropdown-tahun-pelajaran" type="button" tahun-pelajaran="' + tahun_pelajaran + '">' + tahun_pelajaran + '</button>'
                    $("#dropdown-filter-tahun-pelajaran").append(text);
                }
            });
        }

        $(".dropdown-kelas").click(function() {
            var kelas = $(this).attr('kelas');
            var mata_pelajaran = $("#filter-mata-pelajaran").attr('filtered');
            var tahun_pelajaran = $("#filter-tahun-pelajaran").attr('filtered')

            $("#filter-kelas").attr('filtered', kelas).text(kelas);
            if (kelas == '') {
                $("#filter-kelas").text("Kelas");
            }

            renderFilterMataPelajaran(kelas);
            renderTabelListKelasMataPelajaran(kelas, mata_pelajaran, tahun_pelajaran);
        });

        $("#dropdown-filter-mata-pelajaran").on('click', '.dropdown-mata-pelajaran', function() {
            var mata_pelajaran = $(this).attr('mata-pelajaran');
            var kelas = $("#filter-kelas").attr('filtered');
            var tahun_pelajaran = $("#filter-tahun-pelajaran").attr('filtered');

            $("#filter-mata-pelajaran").attr('filtered', mata_pelajaran).text(mata_pelajaran);
            if (mata_pelajaran == '') {
                $("#filter-mata-pelajaran").text("Mata Pelajaran");
            }

            renderTabelListKelasMataPelajaran(kelas, mata_pelajaran, tahun_pelajaran);
        });

        $("#dropdown-filter-tahun-pelajaran").on('click', '.dropdown-tahun-pelajaran', function() {
            var tahun_pelajaran = $(this).attr('tahun-pelajaran');
            var mata_pelajaran = $("#filter-mata-pelajaran").attr('filtered');
            var kelas = $("#filter-kelas").attr('filtered');

            $("#filter-tahun-pelajaran").attr('filtered', tahun_pelajaran).text(tahun_pelajaran);
            if (tahun_pelajaran == '') {
                $("#filter-tahun-pelajaran").text("Tahun Pelajaran");
            }

            renderTabelListKelasMataPelajaran(kelas, mata_pelajaran, tahun_pelajaran);
        });

        $("#reset-filter").click(function() {
            resetFilter();
        })

        function resetFilter() {
            $("#filter-kelas").attr('filtered', '').text('Kelas');
            $("#filter-mata-pelajaran").attr('filtered', '').text('Mata Pelajaran');
            $("#filter-tahun-pelajaran").attr('filtered', '').text('Tahun Pelajaran');

            renderFilterMataPelajaran();
            renderTabelListKelasMataPelajaran();
        }
    });
</script>