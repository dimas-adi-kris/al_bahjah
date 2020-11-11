<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class WaliCalonSantriModel extends CI_Model
{

    public function getListTabel()
    {
        $sql = "SELECT * FROM wali_calon_santri";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function getListTabelJoin()
    {
        $sql = "SELECT
        u.*,
        r.nama AS nama_role
      FROM
        user u
        JOIN `role` r ON r.id_role = u.id_role
      ";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function insertData($data)
    {
        $sql = "INSERT INTO
        `wali_calon_santri` (
          `id_calon_santri`,
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
          '" . $data['id_calon_santri'] . "',
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
        return $status;

        // if ($status) {
        //     $sql = "SELECT LAST_INSERT_ID()";
        //     $res = $this->db->query($sql);
        //     $newId = $res->result_array();
        //     $newId = $newId[0]['LAST_INSERT_ID()'];
        //     return $this->getDataById($newId);
        // } else {
        //     return false;
        // }
    }

    public function updateData($data){
      // $kapasitas = $data['kapasitas'];
      // if($kapasitas==""){
      //   $kapasitas=0;
      // }
      $sql = "UPDATE `wali_calon_santri`
              SET 
                  `id_calon_santri` = '".$data['id_calon_santri']."',
                  `nama` = '".$data['nama']."',
                  `alamat` = '".$data['alamat']."',
                  `kota` = '".$data['kota']."',
                  `negara` = '".$data['negara']."',
                  `telepon` = '".$data['telepon']."',
                  `pekerjaan` = '".$data['pekerjaan']."',
                  `no_ktp` = '".$data['no_ktp']."',
                  `gender` = '".$data['gender']."',
                  `hubungan` = '".$data['hubungan']."'
              WHERE id_wali_calon_santri = ".$data['id_wali_calon_santri']."";

      $status = $this->db->query($sql);

      return $status;
    }

    public function getDataById($id)
    {
        $sql2 = "SELECT * 
                FROM 
                  wali_calon_santri 
                WHERE 
                  id_wali_calon_santri = ".$id."";
        $sql = "SELECT
        u.*,
        r.nama AS nama_role
      FROM
        user u
        JOIN role r ON r.id_role = u.id_role
        WHERE u.id_user = " . $id . "";
        $res = $this->db->query($sql2);

        // print_r($res->result_array());
        return $res->result_array()[0];
    }

    public function hapusData($id_user){
      $sql = "DELETE FROM wali_calon_santri WHERE id_wali_calon_santri=".$id_user."";
      $res = $this->db->query($sql);
      return $res;
    }
}
