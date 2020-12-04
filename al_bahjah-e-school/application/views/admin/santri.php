<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- /.card-header -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Daftar Santri </h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body">

                    <table id="tabel-list-santri" class="table table-bordered table-striped">
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
                                <th> Status Registrasi Ulang </th>
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
        var tabelListSantri = $('#tabel-list-santri').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });

        renderTabelListSantri();

        function renderTabelListSantri(id_program) {
            var url = "<?=base_url()?>index.php/Santri/getDataCalonSantriLulus";
            var data = {};
            if (id_program) {
                url = "<?=base_url()?>index.php/CalonSantri/getAllCalonSantriJoinProgram";
                data = {
                    id_program
                };
            }

            tabelListSantri.clear();
            $.ajax({
                    method: "POST",
                    url,
                    data
                })
                .done(function(msg) {
                    var res = JSON.parse(msg);
                    if (!res[0]) {
                        alert('Data calon santri tidak ditemukan')
                        if (id_program) {
                            renderTabelListSantri();
                        }
                        return;
                    }
                    for (var i = 0; i < res.length; i++) {

                        var calon_santri = res[i];
                        var id_calon_santri = calon_santri['id_calon_santri'];

                        (function(_calon_santri, _i) {
                            $.ajax({
                                method: "POST",
                                url: "<?=base_url()?>index.php/Santri/getDataByIdCalonSantri",
                                data: {
                                    id_calon_santri
                                }
                            }).done(function(msg) {
                                var santri = JSON.parse(msg);
                                rend(santri, _calon_santri, _i);
                            });
                        }(calon_santri, i));

                        function rend(santri, calon_santri, i) {
                            var id = calon_santri['id_calon_santri'];
                            var status = '';
                            if (santri[0]) {
                                status = santri[0]['status_verifikasi_registrasi_ulang'] == "TERVERIFIKASI" ? "checked" : "";
                            }
                            var status_button = `
                                                <div class="custom-control custom-switch float-right">
                                                    <input type="checkbox" class="custom-control-input" id="status_${id}" id_calon_santri="${id}" name="status_verifikasi_registrasi" ${status} disabled>
                                                    <label class="custom-control-label" for="status_${id}"></label>
                                                </div>
                                            `;
                            var detail_button = `
                                                <button class="btn btn-primary detail" id_calon_santri="${id}">
                                                    Detail
                                                </button>
                                            `;

                            tabelListSantri.row.add([
                                i + 1,
                                calon_santri['nama'],
                                calon_santri['nik'],
                                calon_santri['asal_sekolah'],
                                `${calon_santri['tempat_lahir']}, ${calon_santri['tanggal_lahir'].split("-").reverse().join("-")}`,
                                calon_santri['gender'],
                                calon_santri["nama_program"],
                                calon_santri["nama_periode"] + " Masehi",
                                status_button,
                                detail_button
                            ]).draw(false);
                        }
                    }
                })
        };

        $("#tabel-list-santri").on('click', '.detail', function() {
            var id = $(this).attr("id_calon_santri");
            $("#main-content").load("<?=base_url()?>index.php/Admin/detail");
            $("#page-title").text("Santri").remove("#detail_id").append(`<div detail_id="${id}" id="detail_id" hidden></div>`);
        });
    })
</script>