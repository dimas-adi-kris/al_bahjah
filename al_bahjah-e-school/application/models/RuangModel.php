<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class RuangModel extends CI_Model
{

  public function getData()
  {
    $sql = "SELECT * FROM ruang";
    $res = $this->db->query($sql);
    return $res->result_array();
  }

  public function insertData($data)
  {

    $sql = "INSERT INTO
        `ruang` (
          `nama`,
          `kode`,
          `singkatan`,
          `lokasi`,
          `kapasitas`,
          `jenis_ruang`,
          `status_tersedia`
        )
      VALUES
        (
          '" . $data['nama_ruang'] . "',
          '" . $data['kode_ruang'] . "',
          '" . $data['singkatan_ruang'] . "',
          '" . $data['lokasi_ruang'] . "',
          '" . $data['kapasitas_ruang'] . "',
          '" . $data['jenis_ruang'] . "',
          '" . $data['status_ruang'] . "'
        )";

    $res = $this->db->query($sql);
    return $res;
  }
  public function hapusData($id)
  {
    $sql = "DELETE FROM ruang WHERE id_ruang=" . $id . "";
    $res = $this->db->query($sql);
    return $res;
  }

  public function getDataById($id)
  {
    $sql = "SELECT
        *
      FROM
        ruang
        WHERE id_ruang = " . $id . "";
    $res = $this->db->query($sql);
    return $res->result_array()[0];
  }

  public function updateData($data)
  {

    $sql = "UPDATE ruang
    SET 
    nama= '" . $data['nama_ruang'] . "',
    kode= '" . $data['kode_ruang'] . "',
    singkatan= '" . $data['singkatan_ruang'] . "',
    lokasi= '" . $data['lokasi_ruang'] . "',
    kapasitas= '" . $data['kapasitas_ruang'] . "',
    jenis_ruang= '" . $data['jenis_ruang'] . "',
    status_tersedia= '" . $data['status_ruang'] . "'
    WHERE id_ruang=" . $data['id_ruang'] . "";
    $status = $this->db->query($sql);
    return $status;
  }
}
