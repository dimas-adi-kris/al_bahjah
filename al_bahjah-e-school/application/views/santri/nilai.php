<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- /.card -->

            <div class="card o-f">
                <div class="card-header">
                    <h3 class="card-title"> Daftar Pelajaran </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table id="tabel_nilai" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> Mata Pelajaran </th>
                                <th> Kelas </th>
                                <th> Nilai Huruf </th>
                                <th> Nilai Angka </th>
                                <th> Keterangan </th>
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
<script>
    $(document).ready(function() {
        var tableListNilai = $('#tabel_nilai').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

        $.ajax({
                method: "POST",
                url: "<?= base_url() ?>nilaimatapelajaran/getDataByIdSantri",
                data: {}
            })
            .done(function(msg) {
                var res = JSON.parse(msg);
                for (var i = 0; i < res.length; i++) {
                    tableListNilai.row.add([
                        i + 1,
                        res[i]['nama_mata_pelajaran'],
                        res[i]['kelas'],
                        res[i]['nilai_huruf'],
                        res[i]['nilai_angka'],
                        res[i]['keterangan']
                    ]).draw(false);
                }
            })
    })
</script>