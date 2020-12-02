<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class NilaiMataPelajaranModel extends CI_Model
{

    public function getData()
    {
        $sql = "SELECT * FROM nilai_mata_pelajaran";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function getDataJoinAll()
    {
        $sql = "SELECT nmp.*, kmp.*, s.`id_calon_santri`, mp.`kelas`, mp.`nama` AS nama_mata_pelajaran, tp.`tanggal_mulai`, tp.`tanggal_selesai` FROM nilai_mata_pelajaran nmp, kelas_mata_pelajaran kmp, peserta_kelas pk, santri s, mata_pelajaran mp, tahun_pelajaran tp WHERE nmp.id_peserta_kelas=pk.id_peserta_kelas AND pk.id_santri=s.id_santri AND pk.id_kelas_mata_pelajaran=kmp.id_kelas_mata_pelajaran AND kmp.id_mata_pelajaran=mp.id_mata_pelajaran AND kmp.id_tahun_pelajaran=tp.id_tahun_pelajaran";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function insertData($data)
    {

        $sql = "INSERT INTO
        `nilai_mata_pelajaran` (
          `id_peserta_kelas`,
          `nilai_huruf`,
          `nilai_angka`,
          `keterangan`
        )
      VALUES
        (
          '" . $data['id_peserta_kelas'] . "',
          '" . $data['nilai_huruf'] . "',
          '" . $data['nilai_angka'] . "',
          '" . $data['keterangan'] . "'
        )";

        $res = $this->db->query($sql);
        return $res;
    }
    public function hapusData($id)
    {
        $sql = "DELETE FROM nilai_mata_pelajaran WHERE id_nilai_mata_pelajaran=" . $id . "";
        $res = $this->db->query($sql);
        return $res;
    }

    public function hapusDataByIdPesertaKelas($id)
    {
        $sql = "DELETE FROM nilai_mata_pelajaran WHERE id_peserta_kelas=" . $id . "";
        $res = $this->db->query($sql);
        return $res;
    }

    public function getDataById($id)
    {
        $sql = "SELECT
        *
      FROM
        nilai_mata_pelajaran
        WHERE id_nilai_mata_pelajaran = " . $id . "";
        $res = $this->db->query($sql);
        return $res->result_array()[0];
    }

    public function updateData($data)
    {

        $sql = "UPDATE nilai_mata_pelajaran
                SET 
                id_peserta_kelas= '" . $data['id_peserta_kelas'] . "',
                nilai_huruf= '" . $data['nilai_huruf'] . "',
                nilai_angka= '" . $data['nilai_angka'] . "',
                keterangan= '" . $data['keterangan'] . "'
                WHERE id_nilai_mata_pelajaran=" . $data['id_nilai_mata_pelajaran'] . "";
        $status = $this->db->query($sql);
        return $status;
    }

    public function getDataByIdSantri($id_santri)
    {
        $sql = "SELECT nmp.*, mp.`nama` AS nama_mata_pelajaran, mp.`kelas`
                FROM nilai_mata_pelajaran nmp, peserta_kelas pk, kelas_mata_pelajaran kmp, mata_pelajaran mp
                WHERE pk.id_santri='" . $id_santri . "'
                    AND nmp.id_peserta_kelas=pk.id_peserta_kelas
                    AND pk.id_kelas_mata_pelajaran=kmp.id_kelas_mata_pelajaran
                    AND kmp.id_mata_pelajaran=mp.id_mata_pelajaran";

        $res = $this->db->query($sql);
        return $res->result_array();
    }
}
