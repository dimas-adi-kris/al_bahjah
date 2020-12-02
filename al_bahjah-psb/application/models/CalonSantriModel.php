<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class CalonSantriModel extends CI_Model
{

    public function getCalonSantri()
    {
        $sql = "SELECT * FROM calon_santri";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function tambahCalonSantri($data)
    {
        $date = date('Y-m-d');
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
          `id_operator`,
          `id_periode`
        )
      VALUES
        (
          '" . $data['id_program'] . "',
          '" . $data['id_pembayaran'] . "',
          '" . $date . "',
          '" . $data['nama'] . "',
          '" . $data['nik'] . "',
          '" . $data['alamat'] . "',
          '" . $data['kota'] . "',
          '" . $data['negara'] . "',
          '" . $data['asal_sekolah'] . "',
          '" . $data['tempat_lahir'] . "',
          '" . $data['tanggal_lahir'] . "',
          '" . $data['gender'] . "',
          '" . $data['golongan_darah'] . "',
          '" . $data['riwayat_penyakit'] . "',
          'BELUM',
          '0',
          '" . $data['id_periode'] . "'
        )";
        $status = $this->db->query($sql);

        if ($status) {
            $sql = "SELECT LAST_INSERT_ID()";
            $res = $this->db->query($sql);
            $newId = $res->result_array();
            $newId = $newId[0]['LAST_INSERT_ID()'];
            return $this->getCalonSantriById($newId);
        } else {
            return false;
        }
        return $status;
    }

    public function hapusCalonSantri($id)
    {
        $sql = "DELETE FROM jadwal_ujian_calon_santri WHERE id_jadwal_ujian_calon_santri=" . $id . "";
        $res = $this->db->query($sql);
        return $res;
    }

    public function getCalonSantriById($id)
    {
        $sql = "SELECT * FROM calon_santri WHERE id_calon_santri = " . $id . "";
        $res = $this->db->query($sql);
        return $res->result_array()[0];
    }

    public function getCalonSantriByOtp($id_pembayaran)
    {
        $sql = "SELECT * FROM calon_santri WHERE id_pembayaran = " . $id_pembayaran . "";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function updateCalonSantri($data)
    {
        // echo json_encode($data);
        // die;
        $date = date('Y-m-d');
        $sql = "UPDATE calon_santri
                SET
                    id_pembayaran= '" . $data['id_pembayaran'] . "',
                    tanggal_registrasi= '" . $date . "',
                    nama= '" . $data['nama'] . "',
                    nik= '" . $data['nik'] . "',
                    alamat= '" . $data['alamat'] . "',
                    kota= '" . $data['kota'] . "',
                    negara= '" . $data['negara'] . "',
                    asal_sekolah= '" . $data['asal_sekolah'] . "',
                    tempat_lahir= '" . $data['tempat_lahir'] . "',
                    tanggal_lahir= '" . $data['tanggal_lahir'] . "',
                    gender= '" . $data['gender'] . "',
                    golongan_darah= '" . $data['golongan_darah'] . "',
                    riwayat_penyakit= '" . $data['riwayat_penyakit'] . "',
                    status_verifikasi_registrasi= '" . $data['status_verifikasi_registrasi'] . "',
                    id_operator= '1',
                    id_periode= '" . $data['id_periode'] . "'
                WHERE id_calon_santri=" . $data['id_calon_santri'] . "";
        $status = $this->db->query($sql);
        return $status;
    }


    public function updateStatus($data)
    {
        $query = "UPDATE calon_santri SET status_verifikasi_registrasi='" . $data["status"] . "' WHERE id_calon_santri=" . $data["id_calon_santri"] . "";

        $res = $this->db->query($query);

        return $res;
    }

    public function getCalonSantriByPembayaran($id_pembayaran)
    {
        $query = "SELECT * FROM calon_santri WHERE id_pembayaran='" . $id_pembayaran . "'";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function getCalonSantriByProgram($id_program)
    {
        $query = "SELECT * FROM calon_santri WHERE id_program='" . $id_program . "'";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    // FUNGSI DIBAWAH INI YANG DIPAKE UNTUK JOIN 3 TABEL
    public function getTabelJoinCalonSantri()
    {
        $sql = "SELECT * 
            FROM `wali_calon_santri` wcs, `calon_santri` cs, `berkas_upload` bu
            WHERE wcs.id_calon_santri = cs.id_calon_santri AND wcs.id_calon_santri = bu.id_calon_santri
              ";

        $res = $this->db->query($sql);
        return $res->result_array();
    }

    // JOIN TABEL CALON SANTRI, PERIODE, PROGRAM
    public function getTabelJoinProgram()
    {
        $sql = "SELECT cs.*, pe.`tahun_ajaran_masehi` AS nama_periode, pr.`nama` AS nama_program
            FROM calon_santri cs, program pr, periode pe
            WHERE cs.id_program = pr.id_program and cs.id_periode = pe.id_periode
              ";

        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function getTabelJoinProgramById($id_program)
    {
        $sql = "SELECT cs.*, pe.`tahun_ajaran_masehi` AS nama_periode, pr.`nama` AS nama_program
            FROM calon_santri cs, program pr, periode pe
            WHERE cs.id_program = '" . $id_program . "' AND cs.id_program = pr.id_program AND cs.id_periode = pe.id_periode
              ";

        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function getCalonSantriJoinPembayaran($id_pembayaran)
    {
        $sql = "SELECT wcs.* 
            FROM calon_santri cs, pembayaran pe, wali_calon_santri wcs
            WHERE cs.id_pembayaran = " . $id_pembayaran . " AND pe.id_pembayaran = " . $id_pembayaran . " AND cs.id_calon_santri = wcs.id_calon_santri
              ";

        $res = $this->db->query($sql);
        return $res->result_array();
    }
}
