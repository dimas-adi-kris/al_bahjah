<?php
defined('BASEPATH') or exit('No direct script access allowed');

class API extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('APIModel');
    }

    public function getAPIInfoDasarCalonSantriByID($id_santri)
    {
        $data = $this->APIModel->getAPIInfoDasarCalonSantriByID($id_santri);

        echo json_encode($data);
    }

    public function getAPIDataCalonSantri($id_santri)
    {
        $data = $this->APIModel->getAPIDataCalonSantri($id_santri);

        echo json_encode($data);
    }
}
