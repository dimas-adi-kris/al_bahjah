<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class PembayaranModel extends CI_Model
{

    public function getListPembayaran()
    {
        $sql = "SELECT * FROM pembayaran";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    // public function getListTabelJoin()
    // {
    //     $sql = "SELECT
    //     r.*,
    //     jr.nama AS nama_jenis_ruangan
    //   FROM
    //     ruangan r
    //     JOIN jenis_ruangan jr ON jr.id_jenis_ruangan = r.id_jenis_ruangan
    //   ";
    //     $res = $this->db->query($sql);
    //     return $res->result_array();
    // }

    public function insertData($data)
    {
        $kapasitas = $data['kapasitas'];
        if ($kapasitas == "") {
            $kapasitas = 0;
        }

        $sql = "INSERT INTO
        `pembayaran` (
          `id_pembayaran`,
          `tanggal_pembayaran`,
          `bukti_pembayaran`,
          `nama_calon_santri`,
          `tanggal_lahir`,
          `status_verifikasi`,
          `id_bendahara`,
          `otp_pembayaran`      
        )
      VALUES
        (
          '" . $data['id_pembayaran']. "',
          '" . $data['tanggal_pembayaran']. "',
          '" . $data['bukti_pembayaran']. "',
          '" . $data['nama_calon_santri']. "',
          '" . $data['tanggal_lahir']. "',
          '" . $data['status_verifikasi']. "',
          '" . $data['id_bendahara']. "',
          '" . $data['otp_pembayaran']. "'
        )";
        // $data['kapasitas']
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
    }

    public function updateData($data){
      $kapasitas = $data['kapasitas'];
      if($kapasitas==""){
        $kapasitas=0;
      }
      $sql = "UPDATE `pembayaran`
              SET `id_pembayaran` = '".$data['id_pembayaran']."',
                   `tanggal_pembayaran` = '".$data['tanggal_pembayaran']."',
                   `bukti_pembayaran` = '".$data['bukti_pembayaran']."',
                   `nama_calon_santri` = '".$data['nama_calon_santri']."',
                   `tanggal_lahir` = '".$data['tanggal_lahir']."',
                   `status_verifikasi` = '".$data['status_verifikasi']."',
                   `id_bendahara` = '".$data['id_bendahara']."',
                   `otp_pembayaran` = '".$data['otp_pembayaran']."'
              WHERE id_ruangan = ".$data['id_ruangan']."";

      $status = $this->db->query($sql);

      return $status;
    }

    public function getDataById($id)
    {
        $sql = "SELECT
        r.*,
        jr.nama AS nama_jenis_ruangan
      FROM
        ruangan r
        JOIN jenis_ruangan jr ON jr.id_jenis_ruangan = r.id_jenis_ruangan
        WHERE r.id_ruangan = " . $id . "";
        $res = $this->db->query($sql);
        return $res->result_array()[0];
    }

    public function hapusData($id_ruangan){
      $sql = "DELETE FROM pembayaran WHERE id_ruangan=".$id_ruangan."";
      $res = $this->db->query($sql);
      return $res;
    }
}
