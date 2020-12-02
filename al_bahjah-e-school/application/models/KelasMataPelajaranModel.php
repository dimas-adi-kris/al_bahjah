<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class KelasMataPelajaranModel extends CI_Model
{

	public function getData()
	{
		$sql = "SELECT * FROM kelas_mata_pelajaran";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function getDataJoinAll()
	{
		$sql = "SELECT kmp.*, mp.`nama` AS nama_mata_pelajaran, mp.`kelas`, tp.`tanggal_mulai`, tp.`tanggal_selesai`, r.`kode` AS kode_ruang FROM `kelas_mata_pelajaran` kmp, mata_pelajaran mp, tahun_pelajaran tp, ruang r WHERE kmp.id_mata_pelajaran = mp.id_mata_pelajaran AND kmp.id_tahun_pelajaran = tp.id_tahun_pelajaran AND kmp.id_ruang = r.id_ruang";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function insertData($data)
	{

		$sql = "INSERT INTO
        `kelas_mata_pelajaran` (
          `id_mata_pelajaran`,
          `id_tahun_pelajaran`,
          `id_ruang`,
          `hari`,
          `jam_mulai`,
          `jam_selesai`
        )
      VALUES
        (
          '" . $data['id_mata_pelajaran'] . "',
          '" . $data['id_tahun_pelajaran'] . "',
          '" . $data['id_ruang'] . "',
          '" . $data['hari_kelas_mata_pelajaran'] . "',
          '" . $data['jam_mulai'] . "',
          '" . $data['jam_selesai'] . "'
        )";

		$res = $this->db->query($sql);
		return $res;
	}

	public function hapusData($id)
	{
		$sql = "DELETE FROM kelas_mata_pelajaran WHERE id_kelas_mata_pelajaran=" . $id . "";
		$res = $this->db->query($sql);
		return $res;
	}

	public function hapusDataByIdMataPelajaran($id_mata_pelajaran)
	{
		$sql = "DELETE FROM kelas_mata_pelajaran WHERE id_mata_pelajaran=" . $id_mata_pelajaran . "";
		$res = $this->db->query($sql);
		return $res;
	}

	public function hapusDataByIdTahunPelajaran($id_tahun_pelajaran)
	{
		$sql = "DELETE FROM kelas_mata_pelajaran WHERE id_tahun_pelajaran=" . $id_tahun_pelajaran . "";
		$res = $this->db->query($sql);
		return $res;
	}

	public function hapusDataByIdRuang($id_ruang)
	{
		$sql = "DELETE FROM kelas_mata_pelajaran WHERE id_ruang=" . $id_ruang . "";
		$res = $this->db->query($sql);
		return $res;
	}

	public function getDataById($id)
	{
		$sql = "SELECT
        *
      FROM
        kelas_mata_pelajaran
        WHERE id_kelas_mata_pelajaran = " . $id . "";
		$res = $this->db->query($sql);
		return $res->result_array()[0];
	}

	public function updateData($data)
	{

		$sql = "UPDATE kelas_mata_pelajaran
    SET 
    id_mata_pelajaran= '" . $data['id_mata_pelajaran'] . "',
    id_tahun_pelajaran= '" . $data['id_tahun_pelajaran'] . "',
    id_ruang= '" . $data['id_ruang'] . "',
    hari= '" . $data['hari_kelas_mata_pelajaran'] . "',
    jam_mulai= '" . $data['jam_mulai'] . "',
    jam_selesai= '" . $data['jam_selesai'] . "'
    WHERE id_kelas_mata_pelajaran=" . $data['id_kelas_mata_pelajaran'] . "";
		$status = $this->db->query($sql);
		return $status;
	}
}
