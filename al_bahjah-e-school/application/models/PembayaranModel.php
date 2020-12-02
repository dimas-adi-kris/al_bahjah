<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class PembayaranModel extends CI_Model
{

    public function getData()
    {
        $sql = "SELECT * FROM pembayaran";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function insertData($data)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date("Y-m-d");
        $sql = "INSERT INTO
        `pembayaran` (
          `id_bendahara`,  
          `id_santri`,  
          `tanggal_pembayaran`,  
          `jenis_pembayaran`,  
          `bukti_berkas`,  
          `status_verifikasi`,  
          `tanggal_verifikasi`,  
          `bulan`,  
          `keterangan`,
          `nominal`
        )
      VALUES
        (
          '1',
          '" . $data['id_santri'] . "',
          '" . $data['tanggal_pembayaran'] . "',
          '" . $data['jenis_pembayaran'] . "',
          '" . $data['bukti_berkas'] . "',
          '" . $data['status_verifikasi'] . "',
          '" . $date . "',
          '" . $data['bulan'] . "',
          '" . $data['keterangan'] . "',
          '" . $data['nominal'] . "'
        )";
        $status = $this->db->query($sql);

        if ($status) {
            $sql = "SELECT LAST_INSERT_ID()";
            $res = $this->db->query($sql);
            $newId = $res->result_array();
            $newId = $newId[0]['LAST_INSERT_ID()'];
            return $this->getDataById($newId);
        } else {
            return false;
        }
        return $status;
    }

    public function updateData($data)
    {

        $sql = "UPDATE `pembayaran`
              SET `tanggal_entry` = '" . $data['tanggal_entry'] . "',
                   `id_bendahara` = '" . $data['id_bendahara'] . "',
                   `id_santri` = '" . $data['id_santri'] . "',
                   `tanggal_pembayaran` = '" . $data['tanggal_pembayaran'] . "',
                   `jenis_pembayaran` = '" . $data['jenis_pembayaran'] . "',
                   `bukti_berkas` = '" . $data['bukti_berkas'] . "',
                   `status_verifikasi` = '" . $data['status_verifikasi'] . "',
                   `tanggal_verifikasi` = '" . $data['tanggal_verifikasi'] . "',
                   `bulan` = '" . $data['bulan'] . "',
                   `keterangan` = '" . $data['keterangan'] . "'
              WHERE `id_pembayaran` = " . $data['id_pembayaran'] . "";

        $status = $this->db->query($sql);

        return $status;
    }

    public function getDataById($id)
    {
        $sql2 = "SELECT * 
      FROM 
        pembayaran 
      WHERE 
        id_pembayaran = " . $id . "";
        $res = $this->db->query($sql2);
        return $res->result_array()[0];
    }

    public function getDataByIdSantri($id)
    {
        $sql = "SELECT * 
      FROM 
        pembayaran 
      WHERE 
        id_santri = " . $id . "";
        $res = $this->db->query($sql);

        return $res->result_array();
    }

    public function hapusData($id_ruangan)
    {
        $sql = "DELETE FROM pembayaran WHERE id_pembayaran=" . $id_ruangan . "";
        $res = $this->db->query($sql);
        return $res;
    }

    public function updateStatus($data)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date("Y-m-d H:i:s");
        $query = "UPDATE pembayaran SET status_verifikasi='" . $data["status"] . "', tanggal_verifikasi='" . $date . "' WHERE id_pembayaran=" . $data["id_pembayaran"] . "";

        $res = $this->db->query($query);

        return $res;
    }
}
