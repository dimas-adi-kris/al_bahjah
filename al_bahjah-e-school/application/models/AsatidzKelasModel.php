<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class AsatidzKelasModel extends CI_Model
{

    public function getData()
    {
        $sql = "SELECT * FROM asatidz_kelas";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function getDataJoinAll()
    {
        $sql = "SELECT ak.*, kmp.*,a.`nama_lengkap`, mp.`nama` AS nama_mata_pelajaran, mp.`kelas`, tp.*, r.`kode` AS kode_ruang FROM asatidz_kelas ak, kelas_mata_pelajaran kmp, asatidz a, mata_pelajaran mp, tahun_pelajaran tp, ruang r WHERE ak.id_kelas_mata_pelajaran = kmp.id_kelas_mata_pelajaran AND ak.id_asatidz = a.id_asatidz AND kmp.id_mata_pelajaran = mp.id_mata_pelajaran AND kmp.id_tahun_pelajaran = tp.id_tahun_pelajaran AND kmp.id_ruang = r.id_ruang";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function insertData($data)
    {

        $sql = "INSERT INTO
        `asatidz_kelas` (
          `id_kelas_mata_pelajaran`,
          `id_asatidz`
        )
      VALUES
        (
          '" . $data['id_kelas_mata_pelajaran'] . "',
          '" . $data['id_asatidz'] . "'
        )";

        $res = $this->db->query($sql);
        return $res;
    }
    public function hapusData($id)
    {
        $sql = "DELETE FROM asatidz_kelas WHERE id_asatidz_kelas=" . $id . "";
        $res = $this->db->query($sql);
        return $res;
    }

    public function getDataById($id)
    {
        $sql = "SELECT
        *
      FROM
        asatidz_kelas
        WHERE id_asatidz_kelas = " . $id . "";
        $res = $this->db->query($sql);
        return $res->result_array()[0];
    }

    public function updateData($data)
    {

        $sql = "UPDATE asatidz_kelas
    SET 
    id_kelas_mata_pelajaran= '" . $data['id_kelas_mata_pelajaran'] . "',
    id_asatidz= '" . $data['id_asatidz'] . "'
    WHERE id_asatidz_kelas=" . $data['id_asatidz_kelas'] . "";
        $status = $this->db->query($sql);
        return $status;
    }
}
