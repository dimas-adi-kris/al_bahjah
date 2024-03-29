<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{

    public function getEmailWali($email_wali)
    {
        $email_wali = urlencode($email_wali);
        $res = file_get_contents('http://localhost/al_bahjah/al_bahjah-psb/api/getEmailWali/' . $emaril_wali);
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

    public function getRandomNumber($em)
    {
        $sql = "SELECT `kode_aktifasi` FROM `user` WHERE `email`='" . $em . "'";
        $res = $this->db->query($sql);

        return $res->result_array();

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
        $kode_aktifasi = rand(10000000, 100000000);
        $sql = "INSERT INTO
            `user`(
                `id_user`,
                `id_role`,
                `password`,
                `email`,
                `kode_aktifasi`,
                `Aktif`
            )
            VALUES(
                ?,
                '4',
                ?,
                ?,
                ?,
                ?
            )
        ";
        $status = $this->db->query($sql, array($data['id_user'], $password, $data['email'], $kode_aktifasi, 'BELUM_AKTIF'));

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

    public function tes($kode_aktifasi)
    {
        $config = [
            'protocol' => "smtp",
            'smtp_host' => "ssl://smtp.googlemail.com",
            'smtp_user' => "cerelisasi55@gmail.com",
            'smtp_pass' => "po21po32",
            'smtp_port' => 465,
            'mailtype' => "html",
            'charset' => "utf-8",
            'priority' => 1,
            'newline' => "\r\n",
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from("cerelisasi55@gmail.com", "SMAIQu Al-Bahjah");
        $this->email->to('dimaskristianto1999@gmail.com');
        $this->email->subject("Verifikasi Akun");
        $this->email->message("Untuk memverifikasi akun, klik link berikut : " . base_url() . "index.php/Auth/verification/" . $kode_aktifasi);
        $this->email->send();
    }
}
