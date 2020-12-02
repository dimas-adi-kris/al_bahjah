<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('RuangModel');
        $this->load->model('KelasMataPelajaranModel');
    }

    public function getData()
    {
        $listKurikulum = $this->RuangModel->getData();
        echo json_encode($listKurikulum);
    }
    public function simpanData()
    {
        $data = $_POST;

        $id_ruang = $_POST['id_ruang'];

        if ($id_ruang == '' || !isset($id_ruang)) {
            $data = $this->RuangModel->insertData($data);
        } else {
            $data = $this->RuangModel->updateData($data);
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
        $data = $_POST;
        $id = $data['id_ruang'];
        $status = $this->RuangModel->hapusData($id);
        $status = $this->KelasMataPelajaranModel->hapusDataByIdRuang($id);
        echo $status;
    }

    public function getDataById()
    {
        $id = $_POST['id_ruang'];
        $data = $this->RuangModel->getDataById($id);
        echo json_encode($data);
    }
}
