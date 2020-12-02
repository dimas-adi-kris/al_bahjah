<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class JadwalUjianCalonSantriModel extends CI_Model
{

    public function getJadwalUjianCalonSantri()
    {
        $sql = "SELECT * FROM jadwal_ujian_calon_santri";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function tambahJadwalUjianCalonSantri($data)
    {
        $sql = "INSERT INTO
        `jadwal_ujian_calon_santri` (
          `id_calon_santri`,
          `id_jadwal_ujian`,
          `status_persetujuan`,
          `tanggal_setuju`
        )
      VALUES
        (
          '" . $data['id_calon_santri'] . "',
          '" . $data['id_jadwal_ujian'] . "',
          '" . $data['status_persetujuan'] . "',
          '" . $data['tanggal_persetujuan'] . "'
        )";
        $status = $this->db->query($sql);

        return $status;
    }

    public function hapusJadwalUjianCalonSantri($id)
    {
        $sql = "DELETE FROM jadwal_ujian_calon_santri WHERE id_jadwal_ujian_calon_santri=" . $id . "";
        $res = $this->db->query($sql);
        return $res;
    }


    public function getListRuangan()
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

    public function getJadwalUjianCalonSantriById($id)
    {
        $sql = "SELECT
        *
      FROM
        jadwal_ujian_calon_santri
        WHERE id_jadwal_ujian_calon_santri = " . $id . "";
        $res = $this->db->query($sql);
        return $res->result_array()[0];
    }

    public function updateData($data)
    {
        $kapasitas = $data['kapasitas_ruang'];
        if ($kapasitas == "") {
            $kapasitas = 0;
        }

        $sql = "UPDATE ruangan
    SET kode_ruangan= '" . $data['kode_ruang'] . "',
    id_jenis_ruangan= '" . $data['id_jenis_ruangan'] . "',
    kapaitas= '" . $data['kapasitas_ruang'] . "',
    lokasi= '" . $data['lokasi_ruang'] . "'
    WHERE id_ruangan=" . $data['id_ru'] . "";
        $status = $this->db->query($sql);
        return $status;
    }
}
