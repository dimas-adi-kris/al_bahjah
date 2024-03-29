<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->model('SantriModel');
    }

    public function cekHasilKelulusan()
    {
        $data = $_POST;
        $res = (array) $this->UserModel->cekHasilKelulusan($data);
        if (isset($res[0])) {
            $calon_santri = (array) $res[0];
            if ($calon_santri['status_lulus'] == "DITERIMA") {
                $status = 3;
                $this->session->set_userdata('id_calon_santri', $calon_santri['id_calon_santri']);
            } else {
                $status = 2;
            }
        } else {
            $status = 1;
        }

        $res = [
            'status' => $status,
            'data' => $res,
        ];

        echo json_encode($res);
    }

    public function registrasi()
    {
        $data = $_POST;

        $id_calon_santri = $this->session->userdata('id_calon_santri');
        $santri = $this->SantriModel->getDataByIdCalonSantri($id_calon_santri);
        if (isset($santri[0])) {
            $status = 1;
        } else {
            $user = $this->UserModel->getDataByEmail($data['email']);
            if (isset($user[0])) {
                $status = 2;
            } else {
                if ($data['password'] != $data['password2']) {
                    $status = 3;
                } else {
                    $calon_santri = (array) $this->SantriModel->getCalonSantriById($id_calon_santri);
                    $data['id_calon_santri'] = $id_calon_santri;
                    $data['id_user'] = $calon_santri['nik'];
                    if ($this->UserModel->insertDataUser($data)) {
                        $data_random = (array) $this->UserModel->getRandomNumber($data['email']);
                        $kode_aktifasi = $data_random[0]["kode_aktifasi"];
                        $this->UserModel->tes($kode_aktifasi);
                        if ($this->SantriModel->insertDataSantri($data)) {
                            $status = 4;
                        } else {
                            $status = 0;
                        }
                    } else {
                        $status = 0;
                    }
                }
            }
        }

        $res = [
            "status" => $status,
            "data" => $data,
            "kode" => $kode_aktifasi,
        ];

        echo json_encode($res);
    }

    public function getHasilKelulusan()
    {
        $status_calon_santri = (array) $this->UserModel->getHasilKelulusan();
        echo json_encode($status_calon_santri);
    }

    public function getCalonSantriById()
    {
        $id_calon_santri = $this->session->userdata('id_calon_santri');
        $res = (array) $this->UserModel->getCalonSantriById($id_calon_santri);
        $calon_santri = (array) $res['calon_santri'];
        $wali_calon_santri = (array) $res['wali_calon_santri'];
        $data = [
            'calon_santri' => $calon_santri,
            'wali_calon_santri' => $wali_calon_santri,
        ];

        echo json_encode($data);
    }

    public function getDataByIdCalonSantri()
    {
        $id_calon_santri = $this->session->userdata('id_calon_santri');
        $santri = $this->SantriModel->getDataByIdCalonSantri($id_calon_santri);
        if (isset($santri[0])) {
            $status = 1;
        } else {
            $status = 0;
        }
        echo $status;
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

        $this->email->from("cerelisasi55@gmail.com", "Sysadmin");
        $this->email->to('dimaskristianto1999@gmail.com');
        $this->email->subject("Verify New Account");
        $this->email->message("Klik link berikut : " . base_url() . "index.php/Auth/verification/" . $kode_aktifasi);
        $this->email->send();
    }
}
