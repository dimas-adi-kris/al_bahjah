<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{

    public function getEmailWali($email_wali)
    {
        $email_wali = urlencode($email_wali);
        $res = file_get_contents('http://localhost/al_bahjah/al_bahjah-psb/api/getEmailWali/' . $email_wali);
        return json_decode($res);
    }

    public function cekHasilKelulusan($data)
    {
        $nama = urlencode($data['nama']);
        $tanggal_lahir = urlencode($data['tanggal_lahir']);
        $nik = urlencode($data['nik']);
        $nama_wali = urlencode($data['nama_wali']);
        $res = file_get_contents('http://localhost/al_bahjah/al_bahjah-psb/api/cekHasilKelulusan/?nama=' . $nama . '&tanggal_lahir=' . $tanggal_lahir . '&nik=' . $nik . '&nama_wali=' . $nama_wali);

        return json_decode($res);
    }

    public function getCalonSantriById($id_calon_santri)
    {
        $res = file_get_contents('http://localhost/al_bahjah/al_bahjah-psb/api/getFullCalonSantriById/' . $id_calon_santri);
        return json_decode($res);
    }

    public function getDataByEmail($email)
    {
        $sql = "SELECT * FROM user WHERE email='" . $email . "'";
        $res = $this->db->query($sql);

        return $res->result_array();
    }

    public function insertDataUser($data)
    {
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $sql = "INSERT INTO
            `user`(
                `id_user`,
                `id_role`,
                `password`,
                `email`
            )
            VALUES(
                ?,
                '4',
                ?,
                ?
            )
        ";
        $status = $this->db->query($sql, array($data['id_user'], $password, $data['email']));

        return $status;
    }

    public function getDataById($id_user)
    {
        $sql = "SELECT * FROM user WHERE id_user= ? ";

        $res = $this->db->query($sql, array($id_user));
        return $res->result_array();
    }

    public function getHasilKelulusanById($id_calon_santri)
    {
        $res = file_get_contents('http://localhost/al_bahjah/al_bahjah-psb/api/getHasilKelulusanById/' . $id_calon_santri);
        return json_decode($res);
    }

    public function getHasilKelulusan()
    {
        $res = file_get_contents('http://localhost/al_bahjah/al_bahjah-psb/api/getHasilKelulusan');
        return json_decode($res);
    }
}
