<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kurikulum extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('KurikulumModel');
        $this->load->model('MataPelajaranModel');
    }

    public function getData()
    {
        $listKurikulum = $this->KurikulumModel->getData();
        echo json_encode($listKurikulum);
    }
    public function simpanData()
    {
        $data = $_POST;

        $id_kurikulum = $_POST['id_kurikulum'];

        if ($id_kurikulum == '' || !isset($id_kurikulum)) {
            $data = $this->KurikulumModel->insertData($data);
        } else {
            $data = $this->KurikulumModel->updateData($data);
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
        $id = $data['id_kurikulum'];
        $status = $this->KurikulumModel->hapusData($id);
        $status = $this->MataPelajaranModel->hapusDataByIdKurikulum($id);
        echo $status;
    }
    public function getDataById()
    {
        $id_kurikulum = $_POST['id_kurikulum'];
        $data = $this->KurikulumModel->getDataById($id_kurikulum);
        echo json_encode($data);
    }
}
