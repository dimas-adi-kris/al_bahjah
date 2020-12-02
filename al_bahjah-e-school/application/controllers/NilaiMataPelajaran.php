<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NilaiMataPelajaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('NilaiMataPelajaranModel');
        $this->load->model('SantriModel');
    }

    public function index()
    {
        $this->load->view('nilai_mata_pelajaran');
    }

    public function getData()
    {
        $list = $this->NilaiMataPelajaranModel->getData();
        echo json_encode($list);
    }

    public function getDataJoinAll()
    {
        $list = $this->NilaiMataPelajaranModel->getDataJoinAll();
        echo json_encode($list);
    }

    public function simpanData()
    {
        $data = $_POST;

        $id_nilai_mata_pelajaran = $_POST['id_nilai_mata_pelajaran'];

        if ($id_nilai_mata_pelajaran == '' || !isset($id_nilai_mata_pelajaran)) {
            $data = $this->NilaiMataPelajaranModel->insertData($data);
        } else {
            $data = $this->NilaiMataPelajaranModel->updateData($data);
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
        $id = $data['id_nilai_mata_pelajaran'];
        $status = $this->NilaiMataPelajaranModel->hapusData($id);
        echo $status;
    }

    public function getDataById()
    {
        $id = $_POST['id_nilai_mata_pelajaran'];
        $data = $this->NilaiMataPelajaranModel->getDataById($id);
        echo json_encode($data);
    }

    public function getDataByIdSantri()
    {
        if (isset($_POST['id_santri'])) {
            $id_santri = $_POST['id_santri'];
        } else {
            $id_santri = $this->getIdSantri();
        }
        $data = $this->NilaiMataPelajaranModel->getDataByIdSantri($id_santri);
        echo json_encode($data);
    }

    public function getIdSantri()
    {
        $id_user = $this->session->userdata('id_user');
        $santri = $this->SantriModel->getDataByIdUser($id_user)[0];
        $id_santri = $santri['id_santri'];

        return $id_santri;
    }
}
