<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class PesertaKelasModel extends CI_Model
{
    public function getData()
    {
        $sql = "SELECT * FROM peserta_kelas";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function getDataJoinAll()
    {
        $sql = "SELECT pk.*, s.`id_calon_santri`, mp.`nama` AS nama_mata_pelajaran, mp.`kelas`, tp.*, r.`kode` AS kode_ruang FROM peserta_kelas pk, santri s, kelas_mata_pelajaran kmp, mata_pelajaran mp, tahun_pelajaran tp, ruang r WHERE pk.id_santri = s.id_santri AND pk.id_kelas_mata_pelajaran = kmp.id_kelas_mata_pelajaran AND kmp.id_mata_pelajaran = mp.id_mata_pelajaran AND kmp.id_tahun_pelajaran = tp.id_tahun_pelajaran AND kmp.id_ruang = r.id_ruang";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function insertData($data)
    {

        $sql = "INSERT INTO
        `peserta_kelas` (
          `id_kelas_mata_pelajaran`,
          `id_santri`
        )
      VALUES
        (
          '" . $data['id_kelas_mata_pelajaran'] . "',
          '" . $data['id_santri'] . "'
        )";

        $res = $this->db->query($sql);
        if ($res) {
            $sql = "SELECT LAST_INSERT_ID()";
            $res = $this->db->query($sql);
            $newId = $res->result_array();
            $newId = $newId[0]['LAST_INSERT_ID()'];
            return $this->getDataById($newId);
        } else {
            return false;
        }
    }

    public function hapusData($id)
    {
        $sql = "DELETE FROM peserta_kelas WHERE id_peserta_kelas=" . $id . "";
        $res = $this->db->query($sql);
        return $res;
    }

    public function getDataById($id)
    {
        $sql = "SELECT * FROM peserta_kelas WHERE id_peserta_kelas = " . $id . "";
        $res = $this->db->query($sql);
        return $res->result_array()[0];
    }

    public function updateData($data)
    {
        $sql = "UPDATE peserta_kelas
                SET 
                id_kelas_mata_pelajaran= '" . $data['id_kelas_mata_pelajaran'] . "',
                id_santri= '" . $data['id_santri'] . "'
                WHERE id_peserta_kelas=" . $data['id_peserta_kelas'] . "";
        $status = $this->db->query($sql);
        return $status;
    }

    public function getDataByIdSantri($id_santri)
    {
        $sql = "SELECT kmp.*, mp.`kelas`, mp.`nama` AS nama_mata_pelajaran, r.`kode`, r.`nama` AS nama_ruang FROM peserta_kelas pk, kelas_mata_pelajaran kmp, mata_pelajaran mp, ruang r WHERE pk.id_santri='" . $id_santri . "' AND pk.id_kelas_mata_pelajaran=kmp.id_kelas_mata_pelajaran AND kmp.id_mata_pelajaran=mp.id_mata_pelajaran AND kmp.id_ruang=r.id_ruang";

        $res = $this->db->query($sql);
        return $res->result_array();
    }
}
