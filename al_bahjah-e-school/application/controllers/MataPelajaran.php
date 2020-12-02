<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MataPelajaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MataPelajaranModel');
        $this->load->model('KelasMataPelajaranModel');
    }

    public function getData()
    {
        $listKurikulum = $this->MataPelajaranModel->getData();
        echo json_encode($listKurikulum);
    }

    public function getDataJoinAll()
    {
        $list = $this->MataPelajaranModel->getDataJoinAll();
        echo json_encode($list);
    }

    public function simpanData()
    {
        $data = $_POST;

        $id_mata_pelajaran = $_POST['id_mata_pelajaran'];

        if ($id_mata_pelajaran == '' || !isset($id_mata_pelajaran)) {
            $data = $this->MataPelajaranModel->insertData($data);
        } else {
            $data = $this->MataPelajaranModel->updateData($data);
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
        $id = $data['id_mata_pelajaran'];
        $status = $this->MataPelajaranModel->hapusData($id);
        $status = $this->KelasMataPelajaranModel->hapusDataByIdMataPelajaran($id);
        echo $status;
    }

    public function getDataById()
    {
        $id = $_POST['id_mata_pelajaran'];
        $data = $this->MataPelajaranModel->getDataById($id);
        echo json_encode($data);
    }
}
