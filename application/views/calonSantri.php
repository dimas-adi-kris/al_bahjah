<!-- Tampilkan Data Table Ruangan -->

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Calon Santri</h3>
    <button id="btn-tambah-calon-santri" type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal_form_calon_santri"><i class="fa fa-plus-square" aria-hidden="true"></i> Calon Santri</button>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="tabel-list-program" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>ID Calon Santri</th>
          <th>ID Program</th>
          <th>ID Pembayaran</th>
          <th>Tanggal Registrasi</th>
          <th>Nama</th>
          <th>NIK</th>
          <th>Alamat</th>
          <th>KOta</th>
          <th>Negara</th>
          <th>Asal Sekolah</th>
          <th>Tempat Lahir</th>
          <th>Tanggal Lahir</th>
          <th>Gender</th>
          <th>Golongan Darah</th>
          <th>Riwayat Penyakit</th>
          <th>Status Verifikasi Registrasi</th>
          <th>ID Operator</th>
          <th>nama</th>
          <th>id_periode</th>
          <th>tanggal_buka</th>
          <th>tanggal_tutup</th>
          <th>tahun_ajaran_masehi</th>
          <th>tahun_ajaran_hijriyah</th>
        </tr>
      </thead>
      <tbody>

      </tbody>

    </table>
  </div>
  <!-- /.card-body -->
  <!-- /.card-header -->
  <!-- <div class="card-body">
    <table id="tabel-list-calon-santri" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>ID Calon Santri</th>
          <th>ID Program</th>
          <th>ID Pembayaran</th>
          <th>Tanggal Registrasi</th>
          <th>Nama</th>
          <th>NIK</th>
          <th>Alamat</th>
          <th>KOta</th>
          <th>Negara</th>
          <th>Asal Sekolah</th>
          <th>Tempat Lahir</th>
          <th>Tanggal Lahir</th>
          <th>Gender</th>
          <th>Golongan Darah</th>
          <th>Riwayat Penyakit</th>
          <th>Status Verifikasi Registrasi</th>
          <th>ID Operator</th>
					<th>id_wali_calon_santri</th>
					<th>nama</th>
					<th>Alamat</th>
					<th>Kota</th>
					<th>Negara</th>
					<th>Telepon</th>
					<th>Pekerjaan</th>
					<th>No KTP</th>
					<th>Gender</th>
					<th>Hubungan</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

      </tbody>

    </table>
  </div> -->
  <!-- /.card-body -->
</div>

<!-- Modal Form -->
<!-- Modal -->

</div>

<script>
  $(document).ready(function() {
    var tableListCalonSantri = $('#tabel-list-program').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });

    renderTableListProgram();

    function renderTableListCalonSantri() {
      tableListCalonSantri.clear();
      $.ajax({
          method: "POST",
          url: "<?= base_url() ?>index.php/CalonSantri/getCalonSantri",
          data: {}
        })
        .done(function(msg) {
          var res = JSON.parse(msg);
          console.log(res);
          for (i = 0; i < res.length; i++) {
            var btn_ubah = '<button type="button" class="btn bg-gradient-info btn-sm class_ubah_data" id="btn_ubah_data" data-toggle="modal" data-target="#modal_form_calon_santri_ubah" id_calon_santri=' + res[i]['id_calon_santri'] + '><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ubah</button>';
            var btn_hapus = '<button type="button" class="btn bg-gradient-danger btn-sm class_hapus_data" id="btn_hapus_data" id_calon_santri=' + res[i]['id_calon_santri'] + '><i class = "fa fa-minus-circle" aria-hidden = "true" ></i> Hapus</button > ';
            tableListCalonSantri.row.add([
              i + 1,
              res[i]['id_calon_santri'],
              res[i]['id_program'],
              res[i]['id_pembayaran'],
              res[i]['tanggal_registrasi'],
              res[i]['nama'],
              res[i]['nik'],
              res[i]['alamat'],
              res[i]['kota'],
              res[i]['negara'],
              res[i]['asal_sekolah'],
              res[i]['tempat_lahir'],
              res[i]['tanggal_lahir'],
              res[i]['gender'],
              res[i]['golongan_darah'],
              res[i]['riwayat_penyakit'],
              res[i]['status_verifikasi_registrasi'],
              res[i]['id_operator'],
              res[i]['id_wali_calon_santri'],
              res[i]['nama'],
              res[i]['alamat'],
              res[i]['kota'],
              res[i]['negara'],
              res[i]['telepon'],
              res[i]['pekerjaan'],
              res[i]['no_ktp'],
              res[i]['gender'],
              res[i]['hubungan'],
              btn_ubah + btn_hapus,
            ]).draw(false);
          }
        });
    }

    function renderTableListProgram() {
      tableListCalonSantri.clear();
      $.ajax({
          method: "POST",
          url: "<?= base_url() ?>index.php/CalonSantri/getProgram",
          data: {}
        })
        .done(function(msg) {
          var res = JSON.parse(msg);
          console.log(res);
          for (i = 0; i < res.length; i++) {
            var btn_ubah = '<button type="button" class="btn bg-gradient-info btn-sm class_ubah_data" id="btn_ubah_data" data-toggle="modal" data-target="#modal_form_calon_santri_ubah" id_calon_santri=' + res[i]['id_calon_santri'] + '><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ubah</button>';
            var btn_hapus = '<button type="button" class="btn bg-gradient-danger btn-sm class_hapus_data" id="btn_hapus_data" id_calon_santri=' + res[i]['id_calon_santri'] + '><i class = "fa fa-minus-circle" aria-hidden = "true" ></i> Hapus</button > ';
            tableListCalonSantri.row.add([
              i + 1,
              res[i]['id_calon_santri'],
              res[i]['id_program'],
              res[i]['id_pembayaran'],
              res[i]['tanggal_registrasi'],
              res[i]['nama'],
              res[i]['nik'],
              res[i]['alamat'],
              res[i]['kota'],
              res[i]['negara'],
              res[i]['asal_sekolah'],
              res[i]['tempat_lahir'],
              res[i]['tanggal_lahir'],
              res[i]['gender'],
              res[i]['golongan_darah'],
              res[i]['riwayat_penyakit'],
              res[i]['status_verifikasi_registrasi'],
              res[i]['id_operator'],
              res[i]['nama'],
              res[i]['id_periode'],
              res[i]['tanggal_buka'],
              res[i]['tanggal_tutup'],
              res[i]['tahun_ajaran_masehi'],
              res[i]['tahun_ajaran_hijriyah'],
              btn_ubah + btn_hapus,
            ]).draw(false);
          }
        });
    }

    function renderOptionJenisRuangan(currentValue) {
      // console.log(currentValue);
      $('#id_jenis_ruangan')
        .empty()
        .append("<option selected='selected' value'0'>[pilih jenis ruangan]</option>");
      $.ajax({
          method: "POST",
          url: "<?= base_url() ?>index.php/Ruangan/getListJenisRuangan",
          data: {}
        })
        .done(function(msg) {
          var jenisRuangan = JSON.parse(msg);

          $.each(jenisRuangan, function(key, value) {
            if (currentValue == value['id_jenis_ruangan']) {
              $("#id_jenis_ruangan")
                .append($("<option selected='selected'></option>")
                  .attr("value", value['id_jenis_ruangan'])
                  .text(value['id_jenis_ruangan'] + ":" + value['nama']));
            } else {
              $("#id_jenis_ruangan")
                .append($("<option></option>")
                  .attr("value", value['id_jenis_ruangan'])
                  .text(value['id_jenis_ruangan'] + ":" + value['nama']));
            }

          });
        });
    }

    $("#btn-tambah-calon-santri").click(function() {
      $('#submit-tambah').html('Tambah');
      $('#exampleModalLabel').html('Tambah Calon Santri');
      $('#id_program').val('');
      $('#id_pembayaran').val('');
      $('#tanggal_registrasi_calon_santri').val('');
      $('#nama_calon_santri').val('');
      $('#nik_calon_santri').val('');
      $('#alamat_calon_santri').val('');
      $('#kota_calon_santri').val('');
      $('#negara_calon_santri').val('');
      $('#asal_sekolah_calon_santri').val('');
      $('#tempat_lahir_calon_santri').val('');
      $('#tanggal_lahir_calon_santri').val('');
      $('#gender_calon_santri').val('');
      $('#golongan_darah_calon_santri').val('');
      $('#riwayat_penyakit_calon_santri').val('');
      $('#status_verifikasi_registrasi_calon_santri').val('');
      $('#id_operator_calon_santri').val('');

    });

    // Insert Data
    $("#form-tambah-calon-santri").submit(function() {
      // alert('True');
      event.preventDefault();
      var formData = $(this).serialize();
      console.log(formData);
      $.ajax({
          method: "POST",
          url: "<?= base_url() ?>index.php/CalonSantri/tambahCalonSantri",
          data: formData
        })
        .done(function(msg) {
          console.log(msg);
          var res = JSON.parse(msg);
          var data = res['data'];
          console.log(res);

          if (res['status'] == 1 || res['status'] == "1") {
            alert("Data berhasil disimpan");
            $("#modal_form_calon_santri").modal("hide");

            renderTableListProgram();
          } else if (res['status'] == 0 || res['status'] == "0") {
            alert("Data tidak berhasil disimpan");
            $("#modal_form_calon_santri").modal("hide");
          } else {
            console.log(msg);
          }
        });
    });

    // Hapus Data
    $('#tabel-list-calon-santri').on('click', '.class_hapus_data', function() {
      var id_calon_santri = $(this).attr('id_calon_santri');
      // console.log(id_ruangan);
      // alert('Test');
      if (confirm('Anda Yakin Menghapus Data')) {
        // alert('Iya');
        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>index.php/CalonSantri/hapusCalonSantri",
            data: {
              id_calon_santri: id_calon_santri
            }
          })
          .done(function(msg) {
            renderTableListProgram();
          });
      } else {
        alert('Data tidak bisa dihapus', msg);
      }
    });

    // Edit Data
    $('#tabel-list-calon-santri').on('click', '.class_ubah_data', function() {
      $('#submit-tambah-ubah').html('Ubah');
      $('#exampleModalLabel').html('Ubah Data Ruangan');
      var id_calon_santri = $(this).attr('id_calon_santri');
      // console.log(id_jadwal_ujian_calon_santri);
      $.ajax({
          method: "POST",
          url: "<?= base_url() ?>index.php/CalonSantri/getCalonSantriById",
          data: {
            id_calon_santri: id_calon_santri
          }
        })
        .done(function(msg) {
          var data = JSON.parse(msg);
          console.log(data);
          var id_calon_santri = data['id_calon_santri'];
          console.log(id_calon_santri);
          // INPUT DATA
          $("#id_calon_santri").val(data['id_calon_santri']);
          // $("#id_program_ubah").val(data['id_program']);
          // renderOptionProgramUbah(id_program);
          $("#id_program_ubah").val(data['id_program']);
          $("#id_pembayaran_ubah").val(data['id_pembayaran']);
          $("#tanggal_registrasi_ubah").val(data['tanggal_registrasi']);
          $("#nama_calon_santri_ubah").val(data['nama']);
          $("#nik_calon_santri_ubah").val(data['nik']);
          $("#alamat_calon_santri_ubah").val(data['alamat']);
          $("#kota_calon_santri_ubah").val(data['kota']);
          $("#negara_calon_santri_ubah").val(data['negara']);
          $("#asal_sekolah_calon_santri_ubah").val(data['asal_sekolah']);
          $("#tempat_lahir_calon_santri_ubah").val(data['tempat_lahir']);
          $("#tanggal_lahir_calon_santri_ubah").val(data['tanggal_lahir']);
          $("#gender_calon_santri_ubah").val(data['gender']);
          $("#golongan_darah_calon_santri_ubah").val(data['golongan_darah']);
          $("#riwayat_penyakit_calon_santri_ubah").val(data['riwayat_penyakit']);
          $("#status_calon_santri_ubah").val(data['status_verifikasi_registrasi']);
          $("#id_operator_calon_santri_ubah").val(data['id_operator']);
          $("#form-tambah-calon-santri-ubah").submit(function() {
            event.preventDefault();
            var formData = $(this).serialize();
            console.log(formData);
            $.ajax({
                method: "POST",
                url: "<?= base_url() ?>index.php/CalonSantri/updateCalonSantri",
                data: formData
              })
              .done(function(msg) {
                // console.log("TES::" + msg);
                var res = JSON.parse(msg);
                var data = res['data'];

                if (res['status'] == 1 || res['status'] == "1") {
                  alert("Data berhasil diubah");
                  $("#modal_form_calon_santri_ubah").modal("hide");
                  renderTableListProgram();
                } else if (res['status'] == 0 || res['status'] == "0") {
                  alert("Data tidak berhasil disimpan");
                  $("#modal_form_calon_santri_ubah").modal("hide");
                } else {
                  console.log(msg);
                }
              });
          });
        });
    });

  });
</script>