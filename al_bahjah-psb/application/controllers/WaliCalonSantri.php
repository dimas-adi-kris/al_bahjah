<?php
defined('BASEPATH') or exit('No direct script access allowed');

class WaliCalonSantri extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('WaliCalonSantriModel');
    }

    public function getListTabel()
    {
        $listJenisRuangan = $this->WaliCalonSantriModel->getListTabel();
        echo json_encode($listJenisRuangan);
    }
    public function getListTabelJoin()
    {
        $listJenisRuangan = $this->WaliCalonSantriModel->getListTabelJoin();
        echo json_encode($listJenisRuangan);
    }
    public function simpanData()
    {
        $data = $_POST;
        $id_wali_calon_santri = $_POST['id_wali_calon_santri'];

        if ($id_wali_calon_santri == '' || !isset($id_wali_calon_santri)) {
            $data = $this->WaliCalonSantriModel->insertData($data);
        } else {
            $data = $this->WaliCalonSantriModel->updateData($data);
        }
        if ($data) {
            $status = 1;
        } else {
            $status = 0;
        }

        $res = array(
            "data" => $data,
            "status" => $status
        );

        echo json_encode($res);
    }

    public function hapusData()
    {
        $id_wali_calon_santri = $_POST['id_wali_calon_santri'];

        $status = $this->WaliCalonSantriModel->hapusData($id_wali_calon_santri);

        echo $status;
    }

    public function getDataById()
    {
        $id_calon_santri = $_POST['id_calon_santri'];

        $data = $this->WaliCalonSantriModel->getDataById($id_calon_santri);

        echo json_encode($data);
    }
}
