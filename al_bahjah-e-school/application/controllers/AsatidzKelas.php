<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AsatidzKelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AsatidzKelasModel');
    }

    public function getData()
    {
        $list = $this->AsatidzKelasModel->getData();
        echo json_encode($list);
    }

    public function getDataJoinAll()
    {
        $list = $this->AsatidzKelasModel->getDataJoinAll();
        echo json_encode($list);
    }

    public function simpanData()
    {
        $data = $_POST;

        $id_asatidz_kelas = $_POST['id_asatidz_kelas'];

        if ($id_asatidz_kelas == '' || !isset($id_asatidz_kelas)) {
            $data = $this->AsatidzKelasModel->insertData($data);
        } else {
            $data = $this->AsatidzKelasModel->updateData($data);
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
        $id = $data['id_asatidz_kelas'];
        $status = $this->AsatidzKelasModel->hapusData($id);
        echo $status;
    }

    public function getDataById()
    {
        $id = $_POST['id_asatidz_kelas'];
        $data = $this->AsatidzKelasModel->getDataById($id);
        echo json_encode($data);
    }
}
