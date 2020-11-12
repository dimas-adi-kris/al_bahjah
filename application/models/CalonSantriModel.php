<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class CalonSantriModel extends CI_Model
{

  public function getCalonSantri()
  {
    $sql = "SELECT * FROM calon_santri";
    $res = $this->db->query($sql);
    return $res->result_array();
  }



  // FUNGSI DIBAWAH INI YANG DIPAKE UNTUK JOIN 3 TABEL
  public function getTabelJoin()
  {
    $sql = "SELECT * 
            FROM wali_calon_santri wcs, calon_santri cs, berkas_upload bu
            WHERE wcs.id_calon_santri = cs.id_calon_santri and wcs.id_calon_santri = bu.id_calon_santri
              ";
    
    $res = $this->db->query($sql);
    return $res->result_array();

  }
  // FUNGSI DIATAS INI YANG DIPAKE UNTUK JOIN 3 
  
  
  
    public function tambahCalonSantri($data)
  {
    $sql = "INSERT INTO
        `calon_santri` (
          `id_program`,
          `id_pembayaran`,
          `tanggal_registrasi`,
          `nama`,
          `nik`,
          `alamat`,
          `kota`,
          `negara`,
          `asal_sekolah`,
          `tempat_lahir`,
          `tanggal_lahir`,
          `gender`,
          `golongan_darah`,
          `riwayat_penyakit`,
          `status_verifikasi_registrasi`,
          `id_operator`
        )
      VALUES
        (
          '" . $data['id_program'] . "',
          '" . $data['id_pembayaran'] . "',
          '" . $data['tanggal_registrasi_calon_santri'] . "',
          '" . $data['nama_calon_santri'] . "',
          '" . $data['nik_calon_santri'] . "',
          '" . $data['alamat_calon_santri'] . "',
          '" . $data['kota_calon_santri'] . "',
          '" . $data['negara_calon_santri'] . "',
          '" . $data['asal_sekolah_calon_santri'] . "',
          '" . $data['tempat_lahir_calon_santri'] . "',
          '" . $data['tanggal_lahir_calon_santri'] . "',
          '" . $data['gender_calon_santri'] . "',
          '" . $data['golongan_darah_calon_santri'] . "',
          '" . $data['riwayat_penyakit_calon_santri'] . "',
          '" . $data['status_verifikasi_registrasi_calon_santri'] . "',
          '" . $data['id_operator_calon_santri'] . "'
        )";
    $status = $this->db->query($sql);

    return $status;
  }

  public function hapusCalonSantri($id)
  {
    $sql = "DELETE FROM calon_santri WHERE id_calon_santri=" . $id . "";
    $res = $this->db->query($sql);
    return $res;
  }

  public function getCalonSantriById($id)
  {
    $sql = "SELECT
        *
      FROM
        calon_santri
        WHERE id_calon_santri = " . $id . "";
    $res = $this->db->query($sql);
    return $res->result_array()[0];
  }

  public function updateCalonSantri($data)
  {
    $sql = "UPDATE calon_santri
    SET
    id_pembayaran= '" . $data['id_pembayaran_ubah'] . "',
    tanggal_registrasi= '" . $data['tanggal_registrasi_ubah'] . "',
    nama= '" . $data['nama_calon_santri_ubah'] . "',
    nik= '" . $data['nik_calon_santri_ubah'] . "',
    alamat= '" . $data['alamat_calon_santri_ubah'] . "',
    kota= '" . $data['kota_calon_santri_ubah'] . "',
    negara= '" . $data['negara_calon_santri_ubah'] . "',
    asal_sekolah= '" . $data['asal_sekolah_calon_santri_ubah'] . "',
    tempat_lahir= '" . $data['tempat_lahir_calon_santri_ubah'] . "',
    tanggal_lahir= '" . $data['tanggal_lahir_calon_santri_ubah'] . "',
    gender= '" . $data['gender_calon_santri_ubah'] . "',
    golongan_darah= '" . $data['golongan_darah_calon_santri_ubah'] . "',
    riwayat_penyakit= '" . $data['riwayat_penyakit_calon_santri_ubah'] . "',
    status_verifikasi_registrasi= '" . $data['status_calon_santri_ubah'] . "',
    id_operator= '" . $data['id_operator_calon_santri_ubah'] . "'
    WHERE id_calon_santri=" . $data['id_calon_santri'] . "";
    $status = $this->db->query($sql);
    return $status;
  }
}
