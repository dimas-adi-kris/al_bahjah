<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JadwalUjian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('JadwalUjianModel');
    }

    public function index()
    {
        $this->load->view('jadwalUjian');
    }


    public function getJadwalUjian()
    {
        // echo json_encode(array('tes' => "tes"));
        $dataProgram = $this->JadwalUjianModel->getJadwalUjian();
        echo json_encode($dataProgram);
    }

    public function tambahJadwalUjian()
    {
        $data = $_POST;

        if ($data['id_jadwal_ujian'] != "") {
            $data = $this->JadwalUjianModel->updateJadwalUjian($data);
            $type = 'diedit';
        } else {
            $data = $this->JadwalUjianModel->tambahJadwalUjian($data);
            $type = 'ditambahkan';
        }


        if ($data) {
            $status = 1;
        } else {
            $status = 0;
        }

        $res = array(
            "data" => $data,
            "status" => $status,
            "type" => $type
        );

        echo json_encode($res);
    }

    public function hapusJadwalUjian()
    {
        $data = $_POST['id_jadwal_ujian'];
        $status = $this->JadwalUjianModel->hapusJadwalUjian($data);
        echo $status;
    }

    public function getJadwalUjianById()
    {
        $id_jadwal_ujian = $_POST['id_jadwal_ujian'];
        $data = $this->JadwalUjianModel->getJadwalUjianById($id_jadwal_ujian);
        echo json_encode($data);
    }

    public function updateJadwalUjian()
    {
        $data = $_POST;
        $data = $this->JadwalUjianModel->updateJadwalUjian($data);
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
}
