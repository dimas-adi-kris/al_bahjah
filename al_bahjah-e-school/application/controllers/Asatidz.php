<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Asatidz extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AsatidzModel');
    }

    public function getData()
    {
        $list = $this->AsatidzModel->getData();
        echo json_encode($list);
    }
    public function simpanData()
    {
        $data = $_POST;

        $id_asatidz = $_POST['id_asatidz'];

        if ($id_asatidz == '' || !isset($id_asatidz)) {
            $data = $this->AsatidzModel->insertData($data);
        } else {
            $data = $this->AsatidzModel->updateData($data);
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
        $id = $data['id_asatidz'];
        $status = $this->AsatidzModel->hapusData($id);
        echo $status;
    }

    public function getDataById()
    {
        $id = $_POST['id_asatidz'];
        $data = $this->AsatidzModel->getDataById($id);
        echo json_encode($data);
    }
}
