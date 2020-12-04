<?php
defined('BASEPATH') or exit('No direct script access allowed');

class API extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('APIModel');
    }

    public function getAPIInfoDasarCalonSantri()
    {
        $data = $this->APIModel->getAPIInfoDasarCalonSantri();

        echo json_encode($data);
    }

    public function getAPICalonSantriLulus()
    {
        $data = $this->APIModel->getAPICalonSantriLulus();

        echo json_encode($data);
    }

    public function getAPIInfoDasarCalonSantriById($id_santri)
    {
        $data = $this->APIModel->getAPIInfoDasarCalonSantriByID($id_santri);

        echo json_encode($data);
    }

    public function getAPIInfoDasarWaliCalonSantriById($id_santri)
    {
        $data = $this->APIModel->getAPIInfoDasarWaliCalonSantriByID($id_santri);

        echo json_encode($data);
    }

    public function getEmailWali($email_wali)
    {
        $email_wali = urldecode($email_wali);
        $data = $this->APIModel->getEmailWali($email_wali);

        echo json_encode($data);
    }

    public function getHasilKelulusanById($id_calon_santri)
    {
        $res = $this->APIModel->getHasilKelulusanById($id_calon_santri);

        echo json_encode($res);
    }

    public function getHasilKelulusan()
    {
        $res = $this->APIModel->getHasilKelulusan();
        echo json_encode($res);
    }

    public function cekHasilKelulusan()
    {
        $data = $_GET;

        $res = $this->APIModel->cekHasilKelulusan($data);
        echo json_encode($res);
    }

    public function getFullCalonSantriById($id_calon_santri)
    {
        $calon_santri = $this->APIModel->getAPIInfoDasarCalonSantriByID($id_calon_santri);
        $wali_calon_santri = $this->APIModel->getAPIInfoDasarWaliCalonSantriByID($id_calon_santri);
        $data = [
            'calon_santri' => $calon_santri,
            'wali_calon_santri' => $wali_calon_santri,
        ];

        echo json_encode($data);
    }
}
