<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sekolahModel extends CI_Model {
    
    public function getSekolahById($id){
        $sql ="SELECT * FROM info_sekolah WHERE id=".$id."";
        $res = $this->db->query($sql);

        return $res->result_array()[0];
    }

    public function updateSekolah($sekolah){
        $newId = $this->session->userdata('sekolah_id');

        $sql = "UPDATE info_sekolah SET
                nama_lengkap = '".$sekolah['nama_lengkap']."',
                singkatan = '".$sekolah['singkatan']."',
                alamat = '".$sekolah['alamat']."',
                email = '".$sekolah['email']."',
                telepon = '".$sekolah['telepon']."'
                WHERE id=".$newId."";

        $res = $this->db->query($sql);
        return $res;
    }


}