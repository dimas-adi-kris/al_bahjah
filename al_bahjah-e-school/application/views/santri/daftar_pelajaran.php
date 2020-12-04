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

                    <table id="tabel_jadwal_pelajaran" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> Mata Pelajaran </th>
                                <th> Hari </th>
                                <th> Waktu </th>
                                <th> Kelas Mata Pelajaran </th>
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
        var tableListJadwalPelajaran = $('#tabel_jadwal_pelajaran').DataTable({
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
                url: "<?=base_url()?>index.php/PesertaKelas/getDataByIdSantri",
                data: {}
            })
            .done(function(msg) {
                var res = JSON.parse(msg);
                var kumpulan_hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", "Sabtu"];
                for (var i = 0; i < res.length; i++) {
                    var hari = kumpulan_hari[res[i]['hari'] - 1];

                    tableListJadwalPelajaran.row.add([
                        i + 1,
                        res[i]['nama_mata_pelajaran'],
                        hari,
                        res[i]['jam_mulai'].substring(0, 5) + " - " + res[i]['jam_selesai'].substring(0, 5),
                        `(${res[i]['kode']}) ${res[i]['nama_ruang']} - Kelas ${res[i]['kelas']}`
                    ]).draw(false);
                }
            })
    })
</script>