<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class WaliCalonSantriModel extends CI_Model
{

    // public function getListTabel()
    // {
    //     $sql = "SELECT * FROM jenis_ruangan";
    //     $res = $this->db->query($sql);
    //     return $res->result_array();
    // }

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
        `wali_calon_santri` (
          `id_wali_calon_santri`,
          `id_calon_istri`,
          `nama`,
          `alamat`,
          `kota`,
          `negara`,
          `telepon`,
          `pekerjaan`,
          `no_ktp`,
          `gender`,
          `hubungan`
        )
      VALUES
        (
          '" . $data['id_wali_calon_santri'] . "',
          '" . $data['id_calon_istri'] . "',
          '" . $data['nama'] . "',
          '" . $data['alamat'] . "',
          '" . $data['kota'] . "',
          '" . $data['negara'] . "',
          '" . $data['telepon'] . "',
          '" . $data['pekerjaan'] . "',
          '" . $data['no_ktp'] . "',
          '" . $data['gender'] . "',
          '" . $data['hubungan'] . "'
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
      $sql = "UPDATE `wali_calon_santri`
              SET `id_calon_santri` = '".$data['id_calon_santri']."',
                  `nama` = '".$data['nama']."',
                  `alamat` = '".$data['alamat']."',
                  `kota` = '".$data['kota']."',
                  `negara` = '".$data['negara']."',
                  `telepon` = '".$data['telepon']."',
                  `pekerjaan` = '".$data['pekerjaan']."',
                  `no_ktp` = '".$data['no_ktp']."',
                  `gender` = '".$data['gender']."'
                  `hubungan` = '".$data['hubungan']."',
              WHERE id_wali_calon_santri = ".$data['id_wali_calon_santri']."";

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

    public function hapusData($id_wali_calon_santri){
      $sql = "DELETE FROM wali_calon_santri WHERE id_wali_calon_santri=".$id_wali_calon_santri."";
      $res = $this->db->query($sql);
      return $res;
    }
}
