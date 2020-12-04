<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Data Peserta Kelas </h3>
                    <button type="submit" class="btn btn-success float-right" data-toggle="modal" data-target="#modal_peserta_kelas" id="btn-tambah-peserta-kelas">
                        <i class="fas fa-plus mr-2"></i>Upload Data </button>
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
                        <button type="button" class="btn bg-gradient-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="filter-kelas-mata-pelajaran" filtered="">
                            Kelas Mata Pelajaran
                        </button>
                        <div class="dropdown-menu" id="dropdown-filter-kelas-mata-pelajaran">
                        </div>
                    </div>
                    <button type="button" class="mb-3 btn btn-secondary" id="reset-filter"><i class="fas fa-ban"></i> Reset</button>

                    <!-- End Filter -->

                    <table id="tabel-peserta-kelas" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> Santri </th>
                                <th> Kelas Mata Pelajaran </th>
                                <th> Kode Ruang </th>
                                <th> Action </th>
                            </tr>
                        </thead>
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

<div class="modal fade" id="modal_peserta_kelas">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-white">
            <div class="modal-header">
                <h4 class="modal-title"> Tambah Peserta Kelas </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <form id="form-pembayaran">
                    <input type="hidden" class="form-control" name="id_peserta_kelas" id="id_peserta_kelas">

                    <div class="form-group">
                        <label for="kelas_mata_pelajaran"> Kelas Mata Pelajaran </label>
                        <select id="id_kelas_mata_pelajaran" name="id_kelas_mata_pelajaran" class="form-control id_kelas_mata_pelajaran" required></select>
                    </div>

                    <div class="form-group">
                        <label for="id_santri"> Santri </label>
                        <select id="id_santri" name="id_santri" class="form-control id_santri" required></select>
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
        var tabelListPesertaKelas = $('#tabel-peserta-kelas').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
        // READ
        renderTabelListPesertaKelas();

        function renderTabelListPesertaKelas(kelas, mata_pelajaran, kelas_mata_pelajaran) {
            tabelListPesertaKelas.clear();
            $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>index.php/PesertaKelas/getDataJoinAll",
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

                    if (kelas || mata_pelajaran || kelas_mata_pelajaran) {
                        if (res[0] == undefined) {
                            alert('Data tidak ditemukan');
                            resetFilter();
                        }
                    }

                    for (i = 0; i < res.length; i++) {

                        (function(i) {
                            $.ajax({
                                method: "POST",
                                url: "<?=base_url()?>index.php/Santri/getCalonSantriById",
                                data: {
                                    id_calon_santri: res[i]['id_calon_santri']
                                }
                            }).done(function(msg) {
                                var calon_santri = JSON.parse(msg);
                                var result = res;

                                var btn_ubah = '<button type="button" class="m-1 btn bg-gradient-info btn-sm class_ubah_data" id="btn_ubah_data" data-toggle="modal" data-target="#modal_peserta_kelas" id_peserta_kelas=' + res[i]['id_peserta_kelas'] + '><i class="fas fa-edit" aria-hidden="true"></i> Ubah</button>';

                                var btn_hapus = '<button type="button" class="m-1 btn bg-gradient-danger btn-sm class_hapus_data" id="btn_hapus_data" id_peserta_kelas=' + res[i]['id_peserta_kelas'] + '><i class = "fa fa-minus-circle" aria-hidden = "true" ></i> Hapus</button > ';

                                var kmp = `Kelas ${res[i]['kelas']} - ${res[i]['nama_mata_pelajaran']} - ${res[i]['tanggal_mulai'].split('-')[0]}/${res[i]['tanggal_selesai'].split('-')[0]}`;

                                tabelListPesertaKelas.row.add([
                                    i + 1,
                                    calon_santri['nama'],
                                    kmp,
                                    res[i]['kode_ruang'],
                                    btn_ubah + btn_hapus,
                                ]).draw(false);
                            })
                        })(i);
                    }
                });
        }

        function renderOptionKelas(currentValue) {
            $.ajax({
                method: "POST",
                url: "<?=base_url()?>index.php/KelasMataPelajaran/getDataJoinAll",
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

        function renderOptionSantri(currentValue) {
            $.ajax({
                method: "POST",
                url: "<?=base_url()?>index.php/Santri/getDataSantri",
                data: {}
            }).done(function(msg) {
                var santri = JSON.parse(msg);
                // console.log(santri);
                $('#id_santri').html('');
                $.each(santri, function(key, value) {
                    if (currentValue == value['id_santri']) {
                        $('#id_santri')
                            .append($("<option selected='selected'></option>")
                                .attr("value", value['id_santri'])
                                .attr("id", "option_" + value['id_santri'])
                                .text(value['id_santri'] + ":"));
                        fillName(value['id_santri']);
                    } else {
                        $('#id_santri')
                            .append($("<option></option>")
                                .attr("value", value['id_santri'])
                                .attr("id", "option_" + value['id_santri'])
                                .text(value['id_santri'] + ":"));
                        fillName(value['id_santri']);
                    }
                });
            });
        }

        // console.log(getCalonSantri(18));

        function fillName(id_santri) {
            $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>index.php/Santri/getDataSantriById",
                    data: {
                        id_santri
                    },
                })
                .done(function(msg) {
                    var res = JSON.parse(msg);
                    fill(res['calon_santri']['nama']);
                });

            function fill(name) {
                $('#option_' + id_santri).text(name);
            }
        }

        $("#btn-tambah-peserta-kelas").click(function() {
            $('#btn-simpan').html('Tambah');
            $('#modal-title').html('Tambah Data Tahun Pelajaran');
            $('#id_peserta_kelas').val('');
            renderOptionSantri();
            renderOptionKelas();
        });

        // Insert Data
        $("#form-pembayaran").submit(function() {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>index.php/PesertaKelas/simpanData",
                    data: formData
                })
                .done(function(msg) {
                    var res = JSON.parse(msg);
                    console.log(res);
                    var data = res['data'];

                    if (res['status'] == 1 || res['status'] == "1") {
                        alert("Data berhasil disimpan");
                        $("#modal_peserta_kelas").modal("hide");
                    } else if (res['status'] == 0 || res['status'] == "0") {
                        alert("Data gagal disimpan");
                        $("#modal_peserta_kelas").modal("hide");
                    } else {
                        console.log(msg);
                    }
                    resetFilter();
                });
        });

        // Hapus Data
        $('#tabel-peserta-kelas').on('click', '#btn_hapus_data', function() {
            var id_peserta_kelas = $(this).attr('id_peserta_kelas');
            if (confirm('Anda Yakin Menghapus Data')) {
                $.ajax({
                        method: "POST",
                        url: "<?=base_url()?>index.php/PesertaKelas/hapusData",
                        data: {
                            id_peserta_kelas
                        }
                    })
                    .done(function(msg) {
                        resetFilter();
                    });
            } else {
                alert('Data gagal dihapus');
            }
        });

        // Edit Data
        $('#tabel-peserta-kelas').on('click', '#btn_ubah_data', function() {
            $('#btn-simpan').html('Ubah');
            $('#modal-title').html('Ubah Data Tahun Pelajaran');
            var id_peserta_kelas = $(this).attr('id_peserta_kelas');
            $.ajax({
                    method: "POST",
                    url: "<?=base_url()?>index.php/PesertaKelas/getDataById",
                    data: {
                        id_peserta_kelas
                    }
                })
                .done(function(msg) {
                    var res = JSON.parse(msg);

                    $("#id_peserta_kelas").val(res['id_peserta_kelas']);
                    renderOptionKelas(res['id_kelas_mata_pelajaran']);
                    renderOptionSantri(res['id_santri']);
                });

        });

        // -----+ FILTER +-----

        // Render mata pelajaran
        renderFilterMataPelajaran();

        function renderFilterMataPelajaran(kelas) {
            $.ajax({
                method: "POST",
                url: "<?=base_url();?>index.php/MataPelajaran/getDataJoinAll",
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
                url: "<?=base_url();?>index.php/KelasMataPelajaran/getDataJoinAll",
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

                $("#dropdown-filter-kelas-mata-pelajaran").html('');
                $("#dropdown-filter-kelas-mata-pelajaran").append('<button class="dropdown-item dropdown-kelas-mata-pelajaran" kelas-mata-pelajaran="" type="button">Semua</button>');
                for (var i = 0; i < res.length; i++) {
                    kmp = `Kelas ${res[i]['kelas']} - ${res[i]['nama_mata_pelajaran']} (${res[i]['jam_mulai'].substring(0, 5)}-${res[i]['jam_selesai'].substring(0, 5)}) - (${res[i]['kode_ruang']})`;

                    $("#dropdown-filter-kelas-mata-pelajaran").append('<button class="dropdown-item dropdown-kelas-mata-pelajaran" kelas-mata-pelajaran="' + res[i]['id_kelas_mata_pelajaran'] + '" type="button">' + kmp + '</button>');
                }
            })
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
            renderTabelListPesertaKelas(kelas, mata_pelajaran, kelas_mata_pelajaran);
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
            renderTabelListPesertaKelas(kelas, mata_pelajaran, kelas_mata_pelajaran);
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

            renderTabelListPesertaKelas(kelas, mata_pelajaran, kelas_mata_pelajaran);
        });

        $("#reset-filter").click(function() {
            resetFilter();
        })

        function resetFilter() {
            $("#filter-kelas").attr('filtered', '').text('Kelas');
            $("#filter-mata-pelajaran").attr('filtered', '').text('Mata Pelajaran');
            $("#filter-kelas-mata-pelajaran").attr('filtered', '').text('Kelas Mata Pelajaran');

            renderFilterKelasMataPelajaran();
            renderFilterMataPelajaran();
            renderTabelListPesertaKelas();
        }
    });
</script>