<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- /.card-header -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Daftar Calon Santri </h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div id="filter-option"></div>
                    </div>

                    <!-- Filter -->
                    <div class="btn-group mb-3">
                        <button type="button" class="btn bg-gradient-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Filter
                        </button>
                        <div class="dropdown-menu">
                        </div>
                    </div>

                    <table id="tabel-list-calon-santri" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> Nama </th>
                                <th> NIK</th>
                                <th> Asal Sekolah </th>
                                <th> TTL </th>
                                <th> Gender </th>
                                <th> Program </th>
                                <th> Periode </th>
                                <th> Status </th>
                                <th> Detail </th>
                            </tr>
                        </thead>
                        <tbody>
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


<script type="text/javascript">
    $(document).ready(function() {
        var tabelListCalonSantri = $('#tabel-list-calon-santri').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

        renderTabelListCalonSantri();

        function renderTabelListCalonSantri(id_program) {
            var url = "<?=base_url()?>CalonSantri/getAllCalonSantriJoin";
            var data = {};
            if (id_program) {
                url = "<?=base_url()?>CalonSantri/getAllCalonSantriJoinProgram";
                data = {
                    id_program
                };
            }

            tabelListCalonSantri.clear();
            $.ajax({
                    method: "POST",
                    url,
                    data
                })
                .done(function(msg) {
                    var res = JSON.parse(msg);
                    console.log(res);
                    if (!res[0]) {
                        alert('Data calon santri tidak ditemukan')
                        renderTabelListCalonSantri();
                    }
                    for (i = 0; i < res.length; i++) {
                        var id = res[i]['id_calon_santri'];
                        var status = res[i]['status_verifikasi_registrasi'] == "TERVERIFIKASI" ? "checked" : "";
                        var status_button = `
                                <div class="custom-control custom-switch float-right">
                                    <input type="checkbox" class="custom-control-input" id="status_${id}" id_calon_santri="${id}" name="status_verifikasi_registrasi" ${status}>
                                    <label class="custom-control-label" for="status_${id}"></label>
                                </div>
                            `;
                        var detail_button = `
                                <button class="btn btn-primary detail" id_calon_santri="${id}">
                                    Detail
                                </button>
                            `;

                        var tanggal_lahir = new Date(res[i]['tanggal_lahir']).toLocaleDateString(undefined, {
                            day: 'numeric',
                            month: 'long',
                            year: 'numeric'
                        });

                        tabelListCalonSantri.row.add([
                            i + 1,
                            res[i]['nama'],
                            res[i]['nik'],
                            res[i]['asal_sekolah'],
                            `${res[i]['tempat_lahir']}, ${tanggal_lahir}`,
                            res[i]['gender'],
                            res[i]["nama_program"],
                            res[i]["nama_periode"] + " Masehi",
                            status_button,
                            detail_button
                        ]).draw(false);
                    }
                })
        };

        $("#tabel-list-calon-santri").on('click', 'input[id*="status_"]', function() {
            var id_calon_santri = $(this).attr("id_calon_santri");
            var status = $(this).attr("checked") == "checked" ? "BELUM" : "TERVERIFIKASI";
            $.ajax({
                method: "POST",
                url: "<?=base_url()?>CalonSantri/updateStatusCalonSantri",
                data: {
                    id_calon_santri,
                    status
                }
            }).done(function(msg) {
                if (JSON.parse(msg)) {
                    alert("Calon Santri dengan id " + id_calon_santri + " " + status + (status == "BELUM" ? " terverifikasi" : ""));
                } else {
                    alert("Ubah status calon santri gagal");
                }
                renderTabelListCalonSantri();
            })
        });

        $("#tabel-list-calon-santri").on('click', '.detail', function() {
            var id = $(this).attr("id_calon_santri");
            $("#main-content").load("<?=base_url()?>Operator/detail");
            $("#page-title").text("Calon Santri").remove("#detail_id").append(`<div detail_id="${id}" id="detail_id" hidden></div>`);
        });

        $.ajax({
            method: "POST",
            url: "<?=base_url()?>Program/getProgram",
            data: {}
        }).done(function(msg) {
            var res = JSON.parse(msg);
            console.log(res);
            $(".dropdown-menu").append('<button class="dropdown-item" type="button">Semua</button>')
            for (var i = 0; i < res.length; i++) {
                var element = '<button class="dropdown-item" id_program="' + res[i]['id_program'] + '" type="button">' + res[i]['nama'] + '</button>'
                $(".dropdown-menu").append(element);
            }

            // var res = JSON.parse(msg);
            // $("#filter-option").append('<div class="btn btn-info filter mr-3 mb-3">Semua</div>');
            // for (var i = 0; i < res.length; i++) {
            //     var element = '<div class="btn btn-info filter mr-3 mb-3" id_program="' + res[i]['id_program'] + '">' + res[i]['nama'] + '</div>'
            //     $("#filter-option").append(element);
            // }
        });

        $(".dropdown-menu").on('click', '.dropdown-item', function() {
            var id_program = $(this).attr("id_program");
            renderTabelListCalonSantri(id_program);
        });

        // $("#filter-option").on('click', '.filter', function() {
        //     var id_program = $(this).attr("id_program");
        //     $(".filter").removeClass("active");
        //     $(this).addClass("active");
        //     renderTabelListCalonSantri(id_program);
        // });
    });
</script>