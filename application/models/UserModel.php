<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class UserModel extends CI_Model
{

    public function getListUser()
    {
        $sql = "SELECT * FROM user";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function getListUser()
    {
        $sql = "SELECT
        u.*,
        r.nama AS nama_role
      FROM
        user u
        JOIN role r ON r.id_role = u.id_role
      ";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function insertData($data)
    {
        $sql = "INSERT INTO
        `user` (
          `id_user`,
          `id_role`,
          `password`,
          `nama`,
          `email`
        )
      VALUES
        (
          '" . $data['id_user'] . "',
          '" . $data['id_role'] . "',
          '" . $data['password'] . "',
          '" . $data['nama'] . "',
          '" . $data['email'] . "'
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
      // $kapasitas = $data['kapasitas'];
      // if($kapasitas==""){
      //   $kapasitas=0;
      // }
      $sql = "UPDATE `user`
              SET 
                  `id_role` = '".$data['id_role']."',
                  `password` = '".$data['password']."',
                  `nama` = '".$data['nama'].,
                  `email` = '".$data['email']."'
              WHERE id_user = ".$data['id_user']."";

      $status = $this->db->query($sql);

      return $status;
    }

    public function getDataById($id)
    {
        $sql = "SELECT
        u.*,
        r.nama AS nama_role
      FROM
        user u
        JOIN role r ON r.id_role = u.id_role
        WHERE u.id_role = " . $id . "";
        $res = $this->db->query($sql);
        return $res->result_array()[0];
    }

    public function hapusData($id_user){
      $sql = "DELETE FROM user WHERE id_user=".$id_user."";
      $res = $this->db->query($sql);
      return $res;
    }
}
