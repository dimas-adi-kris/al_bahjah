<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class TahunPelajaranModel extends CI_Model
{

    public function getData()
    {
        $sql = "SELECT * FROM tahun_pelajaran";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function insertData($data)
    {

        $sql = "INSERT INTO
        `tahun_pelajaran` (
          `tanggal_mulai`,
          `tanggal_selesai`,
          `deskripsi`
        )
      VALUES
        (
          '" . $data['tanggal_mulai'] . "',
          '" . $data['tanggal_selesai'] . "',
          '" . $data['deskripsi'] . "'
        )";

        $res = $this->db->query($sql);
        return $res;
    }
    public function hapusData($id)
    {
        $sql = "DELETE FROM tahun_pelajaran WHERE id_tahun_pelajaran=" . $id . "";
        $res = $this->db->query($sql);
        return $res;
    }

    public function getDataById($id)
    {
        $sql = "SELECT
        *
      FROM
        tahun_pelajaran
        WHERE id_tahun_pelajaran = " . $id . "";
        $res = $this->db->query($sql);
        return $res->result_array()[0];
    }

    public function updateData($data)
    {

        $sql = "UPDATE tahun_pelajaran
    SET 
    tanggal_mulai= '" . $data['tanggal_mulai'] . "',
    tanggal_selesai= '" . $data['tanggal_selesai'] . "',
    deskripsi= '" . $data['deskripsi'] . "'
    WHERE id_tahun_pelajaran=" . $data['id_tahun_pelajaran'] . "";
        $status = $this->db->query($sql);
        return $status;
    }
}
