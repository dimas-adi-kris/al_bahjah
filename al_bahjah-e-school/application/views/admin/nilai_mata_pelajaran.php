<!-- Tampilkan Data Table Nilai Mata Pelajaran -->

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Ruang</h3>
        <!-- <button id="btn-tambah-nilai-mata-pelajaran" type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal_form"><i class="fa fa-plus-square" aria-hidden="true"></i> Nilai Mata Pelajaran</button> -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <!-- Filter -->
        <div class="btn-group mb-3">
            <button type="button" class="btn bg-gradient-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="filter-tahun-pelajaran" filtered="">
                Tahun Pelajaran
            </button>
            <div class="dropdown-menu" id="dropdown-filter-tahun-pelajaran">
            </div>
        </div>

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
            <button type="button" class="btn bg-gradient-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="filter-kelas-mata-pelajaran" filtered="">
                Kelas Mata Pelajaran
            </button>
            <div class="dropdown-menu" id="dropdown-filter-kelas-mata-pelajaran">
            </div>
        </div>
        <button type="button" class="mb-3 btn btn-secondary" id="reset-filter"><i class="fas fa-ban"></i> Reset</button>
        <!-- End Filter -->

        <table id="tabel-list-nilai-mata-pelajaran" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Peserta Kelas</th>
                    <th>Mata Pelajaran</th>
                    <th>Kelas</th>
                    <th>Tanggal Entry</th>
                    <th>Nilai Huruf</th>
                    <th>Nilai Angka</th>
                    <th>Keterangan</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai Mata Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Isi Form -->
                <form id="form-tambah-nilai-mata-pelajaran">

                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_nilai_mata_pelajaran" name="id_nilai_mata_pelajaran">
                        <input type="hidden" name="id_peserta_kelas" id="id_peserta_kelas" class="id_peserta_kelas">
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nilai_huruf">Nilai Huruf</label>
                            <select name="nilai_huruf" id="nilai_huruf" class="nilai_huruf form-control" required>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                                <option value="F">F</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="nilai_angka">Nilai Angka</label>
                            <input type="number" class="form-control" id="nilai_angka" name="nilai_angka" min="0" max="100" placeholder="Nilai Angka" required>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <select class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" required>
                            <option value="Sangat Baik">Sangat Baik</option>
                            <option value="Baik">Baik</option>
                            <option value="Cukup">Cukup</option>
                            <option value="Kurang">Kurang</option>
                            <option value="Buruk">Buruk</option>
                            <option value="Belum">Belum</option>
                        </select>
                    </div>

                    <button id="submit-tambah" type="submit" class="btn btn-success">Tambah</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
            </form>
            <!-- Penutup Form -->
        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function() {
        var tabelListNilaiMataPelajaran = $('#tabel-list-nilai-mata-pelajaran').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        // READ
        renderTabelListNilaiMataPelajaran();

        function renderTabelListNilaiMataPelajaran(kelas, mata_pelajaran, kelas_mata_pelajaran, tahun_pelajaran) {
            tabelListNilaiMataPelajaran.clear();
            $.ajax({
                    method: "POST",
                    url: "<?= base_url() ?>NilaiMataPelajaran/getDataJoinAll",
                    data: {}
                })
                .done(function(msg) {
                    var res = JSON.parse(msg);
                    if (kelas) {
                        res = res.filter(function(e) {
                            return e['kelas'] == kelas;
                        });
                    }

                    if (mata_pelajaran) {
                        res = res.filter(function(e) {
                            return e['nama_mata_pelajaran'] == mata_pelajaran;
                        })
                    }

                    if (kelas_mata_pelajaran) {
                        res = res.filter(function(e) {
                            return e['id_kelas_mata_pelajaran'] == kelas_mata_pelajaran;
                        })
                    }

                    if (tahun_pelajaran) {
                        res = res.filter(function(e) {
                            var tahun = e['tanggal_mulai'].split('-')[0] + '-' + e['tanggal_selesai'].split('-')[0];
                            return tahun == tahun_pelajaran;
                        })
                    }

                    if (kelas || mata_pelajaran || kelas_mata_pelajaran || tahun_pelajaran) {
                        if (res[0] == undefined) {
                            alert('Data tidak ditemukan');
                            resetFilter();
                        }
                    }

                    for (i = 0; i < res.length; i++) {

                        (function(i) {
                            $.ajax({
                                method: "POST",
                                url: "<?= base_url() ?>santri/getCalonSantriById",
                                data: {
                                    id_calon_santri: res[i]['id_calon_santri']
                                }
                            }).done(function(msg) {
                                var calon_santri = JSON.parse(msg);

                                var btn_ubah = '<button type="button" class="m-1 btn bg-gradient-info btn-sm class_ubah_data" id="btn_ubah_data" data-toggle="modal" data-target="#modal_form" id_nilai_mata_pelajaran=' + res[i]['id_nilai_mata_pelajaran'] + '><i class="fa fa-edit" aria-hidden="true"></i> Ubah</button>';

                                var btn_hapus = '<button type="button" class="m-1 btn bg-gradient-danger btn-sm class_hapus_data" id="btn_hapus_data" id_nilai_mata_pelajaran=' + res[i]['id_nilai_mata_pelajaran'] + '><i class = "fa fa-minus-circle" aria-hidden = "true" ></i> Hapus</button > ';

                                tabelListNilaiMataPelajaran.row.add([
                                    i + 1,
                                    calon_santri['nama'],
                                    res[i]['nama_mata_pelajaran'],
                                    res[i]['kelas'],
                                    res[i]['tanggal_entry'],
                                    res[i]['nilai_huruf'],
                                    res[i]['nilai_angka'],
                                    res[i]['keterangan'],
                                    btn_ubah + btn_hapus,
                                ]).draw(false);
                            });
                        })(i);
                    }
                });
        }

        $("#btn-tambah-nilai-mata-pelajaran").click(function() {
            $('#submit-tambah').html('Tambah');
            $('#exampleModalLabel').html('Tambah Data Nilai');
            $('#id_nilai_mata_pelajaran').val('');
            renderOptionPesertaKelas();
            $('#tanggal_entry').val('');
            $('#nilai_huruf').val('');
            $('#nilai_angka').val('');
            $('#keterangan').val('');
        });

        function renderOptionPesertaKelas(currentValue) {
            $.ajax({
                method: "POST",
                url: "<?= base_url() ?>pesertakelas/getDataJoinAll",
                data: {}
            }).done(function(msg) {
                var peserta_kelas = JSON.parse(msg);
                console.log(peserta_kelas);
                $('.id_peserta_kelas').html('');
                $.each(peserta_kelas, function(key, value) {
                    var id_calon_santri = value['id_calon_santri'];
                    (function(value) {
                        $.ajax({
                            method: "POST",
                            url: "<?= base_url() ?>santri/getCalonSantriById",
                            data: {
                                id_calon_santri: value['id_calon_santri']
                            }
                        }).done(function(msg) {
                            var calon_santri = JSON.parse(msg);

                            var text = `${calon_santri['nama']} - ${value['nama_mata_pelajaran']}(${value['kode_ruang']})`;

                            if (currentValue == value['id_peserta_kelas']) {
                                $('.id_peserta_kelas')
                                    .append($("<option selected='selected'></option>")
                                        .attr("value", value['id_peserta_kelas'])
                                        .attr("id", "option_peserta_" + value['id_peserta_kelas'])
                                        .text(text));
                            } else {
                                $('.id_peserta_kelas')
                                    .append($("<option></option>")
                                        .attr("value", value['id_peserta_kelas'])
                                        .attr("id", "option_peserta_" + value['id_peserta_kelas'])
                                        .text(text));
                            }
                        });
                    })(value);
                });
            });
        }


        // Insert Data
        $("#form-tambah-nilai-mata-pelajaran").submit(function() {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                    method: "POST",
                    url: "<?= base_url() ?>NilaiMataPelajaran/simpanData",
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
                        console.log(res);
                    }
                    resetFilter();
                });
        });

        // Hapus Data
        $('#tabel-list-nilai-mata-pelajaran').on('click', '.class_hapus_data', function() {
            var id_nilai_mata_pelajaran = $(this).attr('id_nilai_mata_pelajaran');
            console.log(id_nilai_mata_pelajaran);
            if (confirm('Anda Yakin Menghapus Data')) {

                $.ajax({
                        method: "POST",
                        url: "<?= base_url() ?>NilaiMataPelajaran/hapusData",
                        data: {
                            id_nilai_mata_pelajaran: id_nilai_mata_pelajaran
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
        $('#tabel-list-nilai-mata-pelajaran').on('click', '.class_ubah_data', function() {
            $('#submit-tambah').html('Ubah');
            $('#exampleModalLabel').html('Ubah Data Ruang');
            var id_nilai_mata_pelajaran = $(this).attr('id_nilai_mata_pelajaran');
            $.ajax({
                    method: "POST",
                    url: "<?= base_url() ?>NilaiMataPelajaran/getDataById",
                    data: {
                        id_nilai_mata_pelajaran: id_nilai_mata_pelajaran
                    }
                })
                .done(function(msg) {
                    var dataNilaiMataPelajaran = JSON.parse(msg);
                    console.log(dataNilaiMataPelajaran);
                    var peserta = dataNilaiMataPelajaran['id_peserta_kelas'];
                    var tanggal = dataNilaiMataPelajaran['tanggal_entry'];
                    var huruf = dataNilaiMataPelajaran['nilai_huruf'];
                    var angka = dataNilaiMataPelajaran['nilai_angka'];
                    var keterangan = dataNilaiMataPelajaran['keterangan'];


                    $("#id_nilai_mata_pelajaran").val(id_nilai_mata_pelajaran);
                    $('#id_peserta_kelas').val(peserta);
                    $('#tanggal_entry').val(tanggal);
                    $('#nilai_huruf').val(huruf);
                    $('#nilai_angka').val(angka);
                    $('#keterangan').val(keterangan);
                });

        });

        // -----+ FILTER +-----

        // Render mata pelajaran
        renderFilterMataPelajaran();

        function renderFilterMataPelajaran(kelas) {
            $.ajax({
                method: "POST",
                url: "<?= base_url(); ?>matapelajaran/getDataJoinAll",
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

        // Render kelas mata pelajaran
        renderFilterKelasMataPelajaran();

        function renderFilterKelasMataPelajaran(kelas, mata_pelajaran) {
            $.ajax({
                method: "POST",
                url: "<?= base_url(); ?>kelasmatapelajaran/getDataJoinAll",
                data: {}
            }).done(function(msg) {
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
                var kumpulan_hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", "Sabtu"];

                $("#dropdown-filter-kelas-mata-pelajaran").html('');
                $("#dropdown-filter-kelas-mata-pelajaran").append('<button class="dropdown-item dropdown-kelas-mata-pelajaran" kelas-mata-pelajaran="" type="button">Semua</button>');
                for (var i = 0; i < res.length; i++) {
                    hari = kumpulan_hari[res[i]['hari'] - 1];
                    kmp = `Kelas ${res[i]['kelas']} - ${res[i]['nama_mata_pelajaran']} (${hari}, ${res[i]['jam_mulai'].substring(0, 5)}-${res[i]['jam_selesai'].substring(0, 5)}) - (${res[i]['kode_ruang']})`;

                    $("#dropdown-filter-kelas-mata-pelajaran").append('<button class="dropdown-item dropdown-kelas-mata-pelajaran" kelas-mata-pelajaran="' + res[i]['id_kelas_mata_pelajaran'] + '" type="button">' + kmp + '</button>');
                }
            })
        }

        renderFilterTahunPelajaran();

        function renderFilterTahunPelajaran() {
            $.ajax({
                method: "POST",
                url: "<?= base_url(); ?>tahunpelajaran/getData",
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
            var kelas_mata_pelajaran = $("#filter-kelas-mata-pelajaran").attr('filtered');

            $("#filter-kelas").attr('filtered', kelas).text(kelas);
            if (kelas == '') {
                $("#filter-kelas").text("Kelas");
            }

            renderFilterMataPelajaran(kelas);
            renderFilterKelasMataPelajaran(kelas, mata_pelajaran);
            renderTabelListNilaiMataPelajaran(kelas, mata_pelajaran, kelas_mata_pelajaran);
        });

        $("#dropdown-filter-mata-pelajaran").on('click', '.dropdown-mata-pelajaran', function() {
            var mata_pelajaran = $(this).attr('mata-pelajaran');
            var kelas = $("#filter-kelas").attr('filtered');
            var kelas_mata_pelajaran = $("#filter-kelas-mata-pelajaran").attr('filtered');

            $("#filter-mata-pelajaran").attr('filtered', mata_pelajaran).text(mata_pelajaran);
            if (mata_pelajaran == '') {
                $("#filter-mata-pelajaran").text("Mata Pelajaran");
            }

            renderFilterKelasMataPelajaran(kelas, mata_pelajaran);
            renderTabelListNilaiMataPelajaran(kelas, mata_pelajaran, kelas_mata_pelajaran);
        });

        $("#dropdown-filter-kelas-mata-pelajaran").on('click', '.dropdown-kelas-mata-pelajaran', function() {
            var kelas_mata_pelajaran = $(this).attr('kelas-mata-pelajaran');
            var nama_kelas_mata_pelajaran = $(this).text();
            var mata_pelajaran = $("#filter-mata-pelajaran").attr('filtered');
            var kelas = $("#filter-kelas").attr('filtered');

            $("#filter-kelas-mata-pelajaran").attr('filtered', kelas_mata_pelajaran).text(nama_kelas_mata_pelajaran);
            if (kelas_mata_pelajaran == '') {
                $("#filter-kelas-mata-pelajaran").text("Kelas Mapel");
            }

            renderTabelListNilaiMataPelajaran(kelas, mata_pelajaran, kelas_mata_pelajaran);
        });

        $("#dropdown-filter-tahun-pelajaran").on('click', '.dropdown-tahun-pelajaran', function() {
            var tahun_pelajaran = $(this).attr('tahun-pelajaran');

            $("#filter-tahun-pelajaran").attr('filtered', tahun_pelajaran).text(tahun_pelajaran);
            if (tahun_pelajaran == '') {
                $("#filter-tahun-pelajaran").text("Tahun Pelajaran");
            }

            renderTabelListNilaiMataPelajaran('', '', '', tahun_pelajaran);
        });

        $("#reset-filter").click(function() {
            resetFilter();
        });

        function resetFilter() {
            $("#filter-kelas").attr('filtered', '').text('Kelas');
            $("#filter-mata-pelajaran").attr('filtered', '').text('Mata Pelajaran');
            $("#filter-kelas-mata-pelajaran").attr('filtered', '').text('Kelas Mata Pelajaran');
            $("#filter-tahun-pelajaran").attr('filtered', '').text('Tahun Pelajaran');

            renderFilterKelasMataPelajaran();
            renderFilterMataPelajaran();
            renderTabelListNilaiMataPelajaran();
        }
    });
</script>