<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class MataPelajaranModel extends CI_Model
{

    public function getData()
    {
        $sql = "SELECT * FROM mata_pelajaran";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function getDataJoinAll()
    {
        $sql = "SELECT mp.*, k.`tahun` FROM mata_pelajaran mp, kurikulum k WHERE mp.id_kurikulum = k.id_kurikulum";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function insertData($data)
    {

        $sql = "INSERT INTO
        `mata_pelajaran` (
          `id_kurikulum`,
          `jenis_mata_pelajaran`,
          `nama`,
          `kode`,
          `singkatan`,
          `deskripsi`,
          `buku_referensi`,
          `kelas`
        )
      VALUES
        (
          '" . $data['id_kurikulum'] . "',
          '" . $data['jenis_mata_pelajaran'] . "',
          '" . $data['nama_mata_pelajaran'] . "',
          '" . $data['kode_mata_pelajaran'] . "',
          '" . $data['singkatan_mata_pelajaran'] . "',
          '" . $data['deskripsi_mata_pelajaran'] . "',
          '" . $data['buku_mata_pelajaran'] . "',
          '" . $data['kelas_mata_pelajaran'] . "'
        )";

        $res = $this->db->query($sql);
        return $res;
    }

    public function hapusData($id)
    {
        $sql = "DELETE FROM mata_pelajaran WHERE id_mata_pelajaran=" . $id . "";
        $res = $this->db->query($sql);
        return $res;
    }

    public function hapusDataByIdKurikulum($id_kurikulum)
    {
        $sql = "DELETE FROM mata_pelajaran WHERE id_kurikulum=" . $id_kurikulum . "";
        $res = $this->db->query($sql);
        return $res;
    }

    public function getDataById($id)
    {
        $sql = "SELECT
        *
      FROM
        mata_pelajaran
        WHERE id_mata_pelajaran = " . $id . "";
        $res = $this->db->query($sql);
        return $res->result_array()[0];
    }

    public function updateData($data)
    {

        $sql = "UPDATE mata_pelajaran
    SET id_kurikulum= '" . $data['id_kurikulum'] . "',
    jenis_mata_pelajaran= '" . $data['jenis_mata_pelajaran'] . "',
    nama= '" . $data['nama_mata_pelajaran'] . "',
    kode= '" . $data['kode_mata_pelajaran'] . "',
    singkatan= '" . $data['singkatan_mata_pelajaran'] . "',
    deskripsi= '" . $data['deskripsi_mata_pelajaran'] . "',
    buku_referensi= '" . $data['buku_mata_pelajaran'] . "',
    kelas= '" . $data['kelas_mata_pelajaran'] . "'
    WHERE id_mata_pelajaran=" . $data['id_mata_pelajaran'] . "";
        $status = $this->db->query($sql);
        return $status;
    }
}
