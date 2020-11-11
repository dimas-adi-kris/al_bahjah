<!-- Tampilkan Data Table Ruangan -->

<div class="card">
	<div class="card-header">
		<h3 class="card-title">Data Pembayaran</h3>
		<button id="btn-tambah-ruang" type="button" class="btn btn-success float-right" data-toggle="modal"
			data-target="#modal-form-tambah-ruangan"><i class="fa fa-plus-square" aria-hidden="true"></i>Tambah Transaksi</button>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<table id="tabel-list-ruangan" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal Pembayaran</th>
					<th>Bukti Pembayaran</th>
					<th>Nama Calon Santri</th>
					<th>Tanggal Lahir</th>
					<th>Status Verifikasi</th>
					<th>ID Bendahara</th>
					<th>OTP Pembayaran</th>
					<th>Tanggal Lahir</th>
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
<div class="modal fade" id="modal-form-tambah-ruangan" tabindex="-1" aria-labelledby="ModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="ModalLabel">Tambah Ruangan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- Isi Form -->
				<form id="form-tambah-ruangan">
					<input type="text" id="id_pembayaran" name="id_pembayaran" hidden>
					<div class="form-group">
						<label>Tanggal Pembayaran</label>
						<input type="text" class="form-control" id="kode_ruangan" name="kode_ruangan" placeholder="AAABBB">
					</div>
					<div class="form-group">
						<label>Bukti Pembayaran</label>
						<select class="form-control" id="bukti_pembayaran" name="bukti_pembayaran">
							<!-- Isi Option -->
						</select>
					</div>
					<div class="form-group">
						<label>Nama Calon Santri</label>
						<input type="text" class="form-control" id="nama_calon_santri" name="nama_calon_santri" placeholder="Nama Calon Santri">
					</div>
					<div class="form-group">
						<label>Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
					</div>
					<div class="form-group">
						<label>Status Verifikasi</label>
                        <input type="checkbox" class="form-control" name="status_verifikasi" id="status_verifikasi">
					</div>
					<div class="form-group">
						<label>ID Bendahara</label>
                        <input type="text" class="form-control" name="id_bendahara" id="id_bendahara">
					</div>
					<div class="form-group">
						<label>OTP Pembayaran</label>
                        <input type="text" class="form-control" name="otp_pembayaran" id="otp_pembayaran">
					</div>
					<button id="summit-tambah" type="submit" class="btn btn-success">Tambah</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>

          
          		</form>
			</div>
			<!-- Penutup Form -->
		</div>
		<div class="modal-footer">
			<!-- <button id="summit-tambah" type="submit" class="btn btn-success">Tambah</button> -->
		</div>
	</div>
</div>
</div>

<script>
$(document).ready(function () {
	var tabelListRuangan = $('#tabel-list-ruangan').DataTable({
		"paging": true,
		"lengthChange": true,
		"searching": false,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		"columnDefs": [{
				"width": "130px",
				"targets": 5
			},
			{
				"width": "30px",
				"targets": 0
			},
			{
				"className": "text-center",
				"targets": [0, 3, 5]
			},
		]
	});

	renderTabelListRuangan();

	function renderTabelListRuangan() {
		tabelListRuangan.clear();
		$.ajax({
				method: "POST",
				url: "<?= base_url() ?>index.php/Pembayaran/getListTabelJoin",
				data: {}
			})
			.done(function (msg) {
				var res = JSON.parse(msg);
				console.log(res);
				// $edit = '<button type="button" class="btn bg-gradient-success">Success</button>'
				// $hapus = '<button type="button" class="btn btn-hapus bg-gradient-danger">Danger</button>'
				for (i = 0; i < res.length; i++) {
					$edit = '<button type="button" id_pembayaran=' + res[i]['id_pembayaran'] + ' class="btn bg-gradient-success btn-ubah" data-toggle="modal" data-target="#modal-form-tambah-ruangan"><i class="far fa-edit"></i>Edit</button>'
					$hapus = '<button type="button" id_pembayaran=' + res[i]['id_pembayaran'] + ' class="btn btn-hapus bg-gradient-danger"><i class="far fa-trash-alt"></i>Delete</button>'
					tabelListRuangan.row.add([
						i + 1,
						res[i]['kode_ruangan'],
						res[i]['nama_jenis_ruangan'],
						res[i]['nama_calon_santri'],
						res[i]['lokasi'],
						$edit + $hapus,
					]).draw(false);
				}
			});
	}


	function renderOptionJenisRuangan(currentValue) {
		$("#bukti_pembayaran")
			.empty()
			.append("<option selected='selected' value'0'>[pilih Bukti Pembayaran]</option>");

		$.ajax({
				method: "POST",
				url: "<?= base_url() ?>index.php/Pembayaran/getListTabel",
				data: {}
			})
			.done(function (msg) {
				var jenisRuangan = JSON.parse(msg);
				// console.log(jenisRuangan);
				$.each(jenisRuangan, function (key, value) {

					if (currentValue == value['bukti_pembayaran']) {
						$("#bukti_pembayaran")
							.append($("<option selected='selected'></option>")
							.attr("value", value['bukti_pembayaran'])
							.text(value['bukti_pembayaran'] + ":" + value['nama']));

					} else {
						$("#bukti_pembayaran")
							.append($("<option></option>")
								.attr("value", value['bukti_pembayaran'])
								.text(value['bukti_pembayaran'] + ":" + value['nama']));

					}
				});
			});
	}
	$("#btn-tambah-ruang").click(function () {
		$("#id").val('');
		$("#kode_ruangan").val('');
		renderOptionJenisRuangan(0);
		$("#nama_calon_santri").val(0);
		$("#lokasi").val('');
	});

	// Insert Data
	$("#form-tambah-ruangan").submit(function () {
		// alert('True');
		event.preventDefault();
		var formData = $(this).serialize();
		$.ajax({
				method: "POST",
				url: "<?= base_url() ?>index.php/Pembayaran/simpanData",
				data: formData
			})
			.done(function (msg) {
				// console.log(msg);
				var res = JSON.parse(msg);
				var data = res['data'];
				// console.log(data);

				if (res['status'] == 1 || res['status'] == "1") {
					alert("Data berhasil disimpan");
					$("#modal-form-tambah-ruangan").modal("hide");
					renderTabelListRuangan();
				} else if (res['status'] == 0 || res['status'] == "0") {
					alert("Data tidak berhasil disimpan");
					$("#modal-form-tambah-ruangan").modal("hide");
				} else {
					console.log(msg);
				}
			});
	});

	$('#tabel-list-ruangan').on('click', '.btn-hapus', function () {
		var id_pembayaran = $(this).attr('id_pembayaran');
		if (confirm("Apakah data ini akan dihapus?")) {
			$.ajax({
					method: "POST",
					url: "<?=base_url()?>index.php/Pembayaran/hapusData",
					data: {
						id_pembayaran: id_pembayaran
					}
				})
				.done(function (msg) {
					if (msg == 'true' || msg) {
						alert('data telah dihapus');
						renderTabelListRuangan();
					} else {
						alert('data gagal dihapus, err', msg);
					}
				});
		}
	});

	$('#tabel-list-ruangan').on('click', '.btn-ubah', function () {
		var id_pembayaran = $(this).attr('id_pembayaran');
		$.ajax({
				method: "POST",
				url: "<?=base_url()?>index.php/Pembayaran/getDataById",
				data: {
					id_pembayaran: id_pembayaran
				}
			})
			.done(function (msg) {
				// console.log(msg);
				var res = JSON.parse(msg);
				var bukti_pembayaran = res['bukti_pembayaran'];
				var lokasi = res['lokasi'];
				console.log(bukti_pembayaran);
				$("#id_pembayaran").val(res['id_pembayaran']);
				$("#kode_ruangan").val(res['kode_ruangan']);
				renderOptionJenisRuangan(bukti_pembayaran);
				$("#nama_calon_santri").val(res['nama_calon_santri']);
				$("#lokasi").val(lokasi);

				$("#summit-tambah").text('Ubah');
				$("#ModalLabel").text('Ubah Ruangan');
			});

	});
});

</script>
