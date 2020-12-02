<!-- Tampilkan Data Table Asatidz Kelas -->

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Asatidz Kelas</h3>
        <button id="btn-tambah-asatidz-kelas" type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal_form"><i class="fa fa-plus-square" aria-hidden="true"></i> Asatidz Kelas</button>
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

        <table id="tabel-list-asatidz-kelas" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Asatidz</th>
                    <th>Kelas Mata Pelajaran</th>
                    <th>Tahun Pelajaran</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Asatidz Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Isi Form -->
                <form id="form-tambah-asatidz-kelas">

                    <div class="form-group">
                        <label for="id_asatidz">Asatidz</label>
                        <select name="id_asatidz" id="id_asatidz" class="form-control"></select>
                    </div>

                    <div class="form-group">
                        <label for="id_kelas_mata_pelajaran">Kelas Mata Pelajaran</label>
                        <input type="hidden" class="form-control" id="id_asatidz_kelas" name="id_asatidz_kelas">
                        <select name="id_kelas_mata_pelajaran" id="id_kelas_mata_pelajaran" class="form-control"></select>
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
        var tabelListAsatidzKelas = $('#tabel-list-asatidz-kelas').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        // READ
        renderTabelListAsatidzKelas();

        function renderTabelListAsatidzKelas(kelas, mata_pelajaran, kelas_mata_pelajaran, tahun_pelajaran) {
            tabelListAsatidzKelas.clear();
            $.ajax({
                    method: "POST",
                    url: "<?= base_url() ?>asatidzkelas/getDataJoinAll",
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

                    var kumpulan_hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", "Sabtu"];
                    for (i = 0; i < res.length; i++) {
                        var hari = kumpulan_hari[res[i]['hari'] - 1];
                        var btn_ubah = '<button type="button" class="m-1 btn bg-gradient-info btn-sm class_ubah_data" id="btn_ubah_data" data-toggle="modal" data-target="#modal_form" id_asatidz_kelas=' + res[i]['id_asatidz_kelas'] + '><i class="fa fa-edit" aria-hidden="true"></i> Ubah</button>';

                        var btn_hapus = '<button type="button" class="m-1 btn bg-gradient-danger btn-sm class_hapus_data" id="btn_hapus_data" id_asatidz_kelas=' + res[i]['id_asatidz_kelas'] + '><i class = "fa fa-minus-circle" aria-hidden = "true" ></i> Hapus</button > ';

                        var kmp = `Kelas ${res[i]['kelas']} - ${res[i]['nama_mata_pelajaran']} (${hari}, ${res[i]['jam_mulai'].substring(0,5)}-${res[i]['jam_selesai'].substring(0,5)})`;

                        tabelListAsatidzKelas.row.add([
                            i + 1,
                            res[i]['nama_lengkap'],
                            kmp,
                            `${res[i]['tanggal_mulai'].split('-')[0]}/${res[i]['tanggal_selesai'].split('-')[0]}`,
                            btn_ubah + btn_hapus,
                        ]).draw(false);
                    }
                });
        }

        function renderOptionAsatidz(currentValue) {
            $.ajax({
                method: "POST",
                url: "<?= base_url() ?>asatidz/getData",
                data: {}
            }).done(function(msg) {
                var res = JSON.parse(msg);
                $('#id_asatidz').html('');
                $.each(res, function(key, value) {
                    if (currentValue == value['id_asatidz']) {
                        $('#id_asatidz')
                            .append($("<option selected='selected'></option>")
                                .attr("value", value['id_asatidz'])
                                .attr("id", "option_asatidz_" + value['id_asatidz'])
                                .text(value['nama_lengkap']));
                    } else {
                        $('#id_asatidz')
                            .append($("<option></option>")
                                .attr("value", value['id_asatidz'])
                                .attr("id", "option_asatidz_" + value['id_asatidz'])
                                .text(value['nama_lengkap']));
                    }

                });
            });
        }

        function renderOptionKelas(currentValue) {
            $.ajax({
                method: "POST",
                url: "<?= base_url() ?>kelasmatapelajaran/getDataJoinAll",
                data: {}
            }).done(function(msg) {
                var santri = JSON.parse(msg);
                $('#id_kelas_mata_pelajaran').html('');
                $.each(santri, function(key, value) {
                    var text = `Kelas ${value['kelas']} - ${value['nama_mata_pelajaran']} - ${value['tanggal_mulai'].split('-')[0]}/${value['tanggal_selesai'].split('-')[0]} - (${value['kode_ruang']})`;
                    if (currentValue == value['id_kelas_mata_pelajaran']) {
                        $('#id_kelas_mata_pelajaran')
                            .append($("<option selected='selected'></option>")
                                .attr("value", value['id_kelas_mata_pelajaran'])
                                .attr("id", "option_kelas_" + value['id_kelas_mata_pelajaran'])
                                .text(text));
                    } else {
                        $('#id_kelas_mata_pelajaran')
                            .append($("<option></option>")
                                .attr("value", value['id_kelas_mata_pelajaran'])
                                .attr("id", "option_kelas_" + value['id_kelas_mata_pelajaran'])
                                .text(text));
                    }

                });
            });
        }

        $("#btn-tambah-asatidz-kelas").click(function() {
            $('#submit-tambah').html('Tambah');
            $('#exampleModalLabel').html('Tambah Data Tahun Pelajaran');
            $('#id_asatidz').val('');
            renderOptionAsatidz();
            renderOptionKelas();
        });


        // Insert Data
        $("#form-tambah-asatidz-kelas").submit(function() {
            // alert('True');
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                    method: "POST",
                    url: "<?= base_url() ?>AsatidzKelas/simpanData",
                    data: formData
                })
                .done(function(msg) {
                    var res = JSON.parse(msg);
                    var data = res['data'];

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
        $('#tabel-list-asatidz-kelas').on('click', '.class_hapus_data', function() {
            var id_asatidz_kelas = $(this).attr('id_asatidz_kelas');
            if (confirm('Anda Yakin Menghapus Data')) {

                $.ajax({
                        method: "POST",
                        url: "<?= base_url() ?>AsatidzKelas/hapusData",
                        data: {
                            id_asatidz_kelas: id_asatidz_kelas
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
        $('#tabel-list-asatidz-kelas').on('click', '.class_ubah_data', function() {
            $('#submit-tambah').html('Ubah');
            $('#exampleModalLabel').html('Ubah Data AsatidzKelas');
            var id_asatidz_kelas = $(this).attr('id_asatidz_kelas');
            $.ajax({
                    method: "POST",
                    url: "<?= base_url() ?>AsatidzKelas/getDataById",
                    data: {
                        id_asatidz_kelas: id_asatidz_kelas
                    }
                })
                .done(function(msg) {
                    var dataAsatidzKelas = JSON.parse(msg);
                    var asatidz_kelas = dataAsatidzKelas['id_asatidz_kelas'];
                    var kelas = dataAsatidzKelas['id_kelas_mata_pelajaran'];
                    var asatidz = dataAsatidzKelas['id_asatidz'];

                    $('#id_asatidz_kelas').val(asatidz_kelas);
                    renderOptionKelas(kelas);
                    renderOptionAsatidz(asatidz);
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
            renderTabelListAsatidzKelas(kelas, mata_pelajaran, kelas_mata_pelajaran);
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
            renderTabelListAsatidzKelas(kelas, mata_pelajaran, kelas_mata_pelajaran);
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

            renderTabelListAsatidzKelas(kelas, mata_pelajaran, kelas_mata_pelajaran);
        });

        $("#dropdown-filter-tahun-pelajaran").on('click', '.dropdown-tahun-pelajaran', function() {
            var tahun_pelajaran = $(this).attr('tahun-pelajaran');

            $("#filter-tahun-pelajaran").attr('filtered', tahun_pelajaran).text(tahun_pelajaran);
            if (tahun_pelajaran == '') {
                $("#filter-tahun-pelajaran").text("Tahun Pelajaran");
            }

            renderTabelListAsatidzKelas('', '', '', tahun_pelajaran);
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
            renderTabelListAsatidzKelas();
        }
    });
</script>