<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class PeriodeModel extends CI_Model
{

	public function getPeriode()
	{
		$sql = "SELECT pe.*, pr.`nama` AS nama_program FROM periode pe, program pr WHERE pe.id_program=pr.id_program";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function getProgram()
	{
		$sql = "SELECT * FROM program";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function getListProgram()
	{
		$sql = "SELECT
        r.*,
        jr.nama
      FROM
        periode r
        JOIN program jr ON jr.id_program = r.id_program
      ";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function tambahPeriode($data)
	{
		$sql = "INSERT INTO
        `periode` (
          `id_program`,
          `tanggal_buka`,
          `tanggal_tutup`,
          `tahun_ajaran_masehi`,
          `tahun_ajaran_hijriyah`
        )
      VALUES
        (
          '" . $data['id_program'] . "',
          '" . $data['tanggal_buka'] . "',
          '" . $data['tanggal_tutup'] . "',
          '" . $data['tahun_ajaran_masehi'] . "',
          '" . $data['tahun_ajaran_hijriyah'] . "'
        )";
		$status = $this->db->query($sql);

		return $status;
	}

	public function hapusPeriode($id)
	{
		$sql = "DELETE FROM periode WHERE id_periode=" . $id . "";
		$res = $this->db->query($sql);
		return $res;
	}

	public function getPeriodeById($id)
	{
		$sql = "SELECT
        *
      FROM
        periode
        WHERE id_periode = " . $id . "";
		$res = $this->db->query($sql);
		return $res->result_array()[0];
	}

	public function updatePeriode($data)
	{
		$sql = "UPDATE periode
    SET
    id_program= '" . $data['id_program'] . "',
    tanggal_buka= '" . $data['tanggal_buka'] . "',
    tanggal_tutup= '" . $data['tanggal_tutup'] . "',
    tahun_ajaran_masehi= '" . $data['tahun_ajaran_masehi'] . "',
    tahun_ajaran_hijriyah= '" . $data['tahun_ajaran_hijriyah'] . "'
    WHERE id_periode=" . $data['id_periode'] . "";
		$status = $this->db->query($sql);
		return $status;
	}
}
