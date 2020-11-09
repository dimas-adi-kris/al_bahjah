<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class BerkasUploadModel extends CI_Model
{

    public function getListTabel()
    {
        $sql = "SELECT * FROM berkas_upload";
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
        // $kapasitas = $data['kapasitas'];
        // if ($kapasitas == "") {
        //     $kapasitas = 0;
        // }

        $sql = "INSERT INTO
        `berkas_upload` (
          `id_berkas_upload`,
          `id_calon_santri`,
          `tanggal_upload`,
          `nama_berkas`,
          `lokasi_upload`,
          `keterangan`
        )
      VALUES
        (
          '" . $data['id_berkas_upload'] . "',
          '" . $data['id_calon_santri'] . "',
          '" . $data['tanggal_upload'] . "',
          '" . $data['nama_berkas'] . "',
          '" . $data['lokasi_upload'] . "',
          '" . $data['keterangan'] . "'
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
    //   $kapasitas = $data['kapasitas'];
    //   if($kapasitas==""){
    //     $kapasitas=0;
    //   }
      $sql = "UPDATE `berkas_upload`
              SET `kode_ruangan` = '".$data['kode_ruangan']."',
                  `id_jenis_ruangan` = '".$data['id_jenis_ruangan']."',
                  `kapasitas` = '".$data['kapasitas']."',
                  `lokasi` = '".$data['lokasi']."'
              WHERE id_ruangan = ".$data['id_ruangan']."";

      $status = $this->db->query($sql);

      return $status;
    }

    // public function getDataById($id)
    // {
    //     $sql = "SELECT
    //     r.*,
    //     jr.nama AS nama_jenis_ruangan
    //   FROM
    //     ruangan r
    //     JOIN jenis_ruangan jr ON jr.id_jenis_ruangan = r.id_jenis_ruangan
    //     WHERE r.id_ruangan = " . $id . "";
    //     $res = $this->db->query($sql);
    //     return $res->result_array()[0];
    // }

    public function hapusData($id_ruangan){
      $sql = "DELETE FROM berkas_upload WHERE id_ruangan=".$id_ruangan."";
      $res = $this->db->query($sql);
      return $res;
    }
}
