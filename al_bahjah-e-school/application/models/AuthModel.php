<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthModel extends CI_Model
{
    public function getDataByEmail($email)
    {
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }

    public function cekAktifasiByKode($kode_aktifasi)
    {
        $sql = "SELECT `kode_aktifasi`,`Aktif` FROM `user` WHERE `kode_aktifasi`='" . $kode_aktifasi . "'";

        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function verifikasiEmail($Kode_aktifasi)
    {
        $sql2 = "UPDATE `user` SET `Aktif`='AKTIF' WHERE `kode_aktifasi` = '" . $Kode_aktifasi . "'";
        $res = $this->db->query($sql2);
        return $res;
    }

    public function getAktifByVerif($kode_aktifasi)
    {

    }
}
