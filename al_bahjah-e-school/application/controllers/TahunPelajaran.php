<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TahunPelajaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TahunPelajaranModel');
        $this->load->model('KelasMataPelajaranModel');
    }

    public function getData()
    {
        $list = $this->TahunPelajaranModel->getData();
        echo json_encode($list);
    }
    public function simpanData()
    {
        $data = $_POST;

        $id_tahun_pelajaran = $_POST['id_tahun_pelajaran'];

        if ($id_tahun_pelajaran == '' || !isset($id_tahun_pelajaran)) {
            $data = $this->TahunPelajaranModel->insertData($data);
        } else {
            $data = $this->TahunPelajaranModel->updateData($data);
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
        $id = $data['id_tahun_pelajaran'];
        $status = $this->TahunPelajaranModel->hapusData($id);
        $status = $this->KelasMataPelajaranModel->hapusDataByIdTahunPelajaran($id);
        echo $status;
    }

    public function getDataById()
    {
        $id = $_POST['id_tahun_pelajaran'];
        $data = $this->TahunPelajaranModel->getDataById($id);
        echo json_encode($data);
    }
}
