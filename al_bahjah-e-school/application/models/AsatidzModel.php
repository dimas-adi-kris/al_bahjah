<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class AsatidzModel extends CI_Model
{

  public function getData()
  {
    $sql = "SELECT * FROM asatidz";
    $res = $this->db->query($sql);
    return $res->result_array();
  }

  public function insertData($data)
  {

    $sql = "INSERT INTO
        `asatidz` (
          `nama_lengkap`,
          `nama_tanpa_gelar`,
          `tempat_lahir`,
          `tanggal_lahir`,
          `email`,
          `telepon`,
          `alamat`,
          `nik`,
          `nip`,
          `bidang_ilmu`
        )
      VALUES
        (
          '" . $data['nama_lengkap'] . "',
          '" . $data['nama_tanpa_gelar'] . "',
          '" . $data['tempat_lahir'] . "',
          '" . $data['tanggal_lahir'] . "',
          '" . $data['email_asatidz'] . "',
          '" . $data['telepon_asatidz'] . "',
          '" . $data['alamat_asatidz'] . "',
          '" . $data['nik_asatidz'] . "',
          '" . $data['nip_asatidz'] . "',
          '" . $data['bidang_ilmu'] . "'
        )";

    $res = $this->db->query($sql);
    return $res;
  }
  public function hapusData($id)
  {
    $sql = "DELETE FROM asatidz WHERE id_asatidz=" . $id . "";
    $res = $this->db->query($sql);
    return $res;
  }

  public function getDataById($id)
  {
    $sql = "SELECT
        *
      FROM
        asatidz
        WHERE id_asatidz = " . $id . "";
    $res = $this->db->query($sql);
    return $res->result_array()[0];
  }

  public function updateData($data)
  {

    $sql = "UPDATE asatidz
    SET 
    nama_lengkap= '" . $data['nama_lengkap'] . "',
    nama_tanpa_gelar= '" . $data['nama_tanpa_gelar'] . "',
    tempat_lahir= '" . $data['tempat_lahir'] . "',
    tanggal_lahir= '" . $data['tanggal_lahir'] . "',
    email= '" . $data['email_asatidz'] . "',
    telepon= '" . $data['telepon_asatidz'] . "',
    alamat= '" . $data['alamat_asatidz'] . "',
    nik= '" . $data['nik_asatidz'] . "',
    nip= '" . $data['nip_asatidz'] . "',
    bidang_ilmu= '" . $data['bidang_ilmu'] . "'
    WHERE id_asatidz=" . $data['id_asatidz'] . "";
    $status = $this->db->query($sql);
    return $status;
  }
}
