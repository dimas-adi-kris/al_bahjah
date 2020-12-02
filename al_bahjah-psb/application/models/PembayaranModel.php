<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class PembayaranModel extends CI_Model
{

	public function getData()
	{
		$sql = "SELECT pb.*, pr.`nama` AS nama_program FROM pembayaran pb, program pr WHERE pb.id_program=pr.id_program";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function getListTabelJoin()
	{
		$sql = "SELECT
        r.*,
        jr.nama AS nama_jenis_ruangan
      FROM
        ruangan r
        JOIN jenis_ruangan jr ON jr.id_jenis_ruangan = r.id_jenis_ruangan
      ";
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function insertData($data)
	{
		$sql = "INSERT INTO
          `pembayaran` (
            `nama_calon_santri`,
            `tanggal_pembayaran`,
            `bukti_pembayaran`,
            `tanggal_lahir`,
            `status_verifikasi`,
            `id_bendahara`,
            `otp_pembayaran`,      
            `id_program`      
          )
        VALUES
          (
            '" . $data['nama_calon_santri'] . "',
            '" . $data['tanggal_pembayaran'] . "',
            '" . $data['bukti_pembayaran'] . "',
            '" . $data['tanggal_lahir'] . "',
            '" . $data['status_verifikasi'] . "',
            '1',
            '" . $data['otp_pembayaran'] . "',
            '" . $data['id_program'] . "'
          )";
		$status = $this->db->query($sql);

		if ($status) {
			$sql = "SELECT LAST_INSERT_ID()";
			$res = $this->db->query($sql);
			$newId = $res->result_array();
			$newId = $newId[0]['LAST_INSERT_ID()'];
			return $this->getDataById($newId);
		} else {
			return false;
		}
		return $status;
	}

	public function updateData($data)
	{

		$sql = "UPDATE `pembayaran`
              SET `nama_calon_santri` = '" . $data['nama_calon_santri'] . "',
                  `tanggal_pembayaran` = '" . $data['tanggal_pembayaran'] . "',
                  `bukti_pembayaran` = '" . $data['bukti_pembayaran'] . "',
                  `tanggal_lahir` = '" . $data['tanggal_lahir'] . "',
                  `status_verifikasi` = '" . $data['status_verifikasi'] . "',
                  `id_bendahara` = '" . $data['id_bendahara'] . "',
                  `otp_pembayaran` = '" . $data['otp_pembayaran'] . "',
                  `id_program` = '" . $data['id_program'] . "'
              WHERE id_pembayaran = " . $data['id_pembayaran'] . "";

		$status = $this->db->query($sql);

		return $status;
	}

	public function getDataById($id)
	{
		$sql2 = "SELECT * 
      FROM 
        pembayaran 
      WHERE 
        id_pembayaran = " . $id . "";
		$res = $this->db->query($sql2);
		return $res->result_array()[0];
	}

	public function getDataByOtp($data)
	{
		$sql = "SELECT * FROM pembayaran WHERE otp_pembayaran = ? AND tanggal_lahir = ?";
		$res = $this->db->query($sql, array($data['otp_pembayaran'], $data['tanggal_lahir']));
		return $res->result_array();
	}

	public function hapusData($id_ruangan)
	{
		$sql = "DELETE FROM pembayaran WHERE id_pembayaran=" . $id_ruangan . "";
		$res = $this->db->query($sql);
		return $res;
	}

	public function updateStatus($data)
	{
		date_default_timezone_set('Asia/Jakarta');
		$date = date("Y-m-d H:i:s");
		$query = "UPDATE pembayaran SET status_verifikasi='" . $data["status"] . "', tanggal_verifikasi='" . $date . "' WHERE id_pembayaran=" . $data["id_pembayaran"] . "";

		$res = $this->db->query($query);

		return $res;
	}

	public function getDataByProgram($id_program)
	{
		$query = "SELECT * FROM pembayaran WHERE id_program='" . $id_program . "'";

		$res = $this->db->query($query);
		return $res->result_array();
	}
}
