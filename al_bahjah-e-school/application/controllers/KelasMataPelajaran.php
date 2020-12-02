<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KelasMataPelajaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('KelasMataPelajaranModel');
    }

    public function getData()
    {
        $listKurikulum = $this->KelasMataPelajaranModel->getData();
        echo json_encode($listKurikulum);
    }

    public function getDataJoinAll()
    {
        $listKurikulum = $this->KelasMataPelajaranModel->getDataJoinAll();
        echo json_encode($listKurikulum);
    }

    public function simpanData()
    {
        $data = $_POST;

        $id_kelas_mata_pelajaran = $_POST['id_kelas_mata_pelajaran'];

        if ($id_kelas_mata_pelajaran == '' || !isset($id_kelas_mata_pelajaran)) {
            $data = $this->KelasMataPelajaranModel->insertData($data);
        } else {
            $data = $this->KelasMataPelajaranModel->updateData($data);
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
        $id = $data['id_kelas_mata_pelajaran'];
        $status = $this->KelasMataPelajaranModel->hapusData($id);
        echo $status;
    }

    public function getDataById()
    {
        $id = $_POST['id_kelas_mata_pelajaran'];
        $data = $this->KelasMataPelajaranModel->getDataById($id);
        echo json_encode($data);
    }
}
