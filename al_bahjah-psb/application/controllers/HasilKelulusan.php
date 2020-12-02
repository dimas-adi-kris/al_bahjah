<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HasilKelulusan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('HasilKelulusanModel');
    }

    public function getHasilKelulusan()
    {
        $hasilKelulusan = $this->HasilKelulusanModel->getHasilKelulusan();
        echo json_encode($hasilKelulusan);
    }

    public function tambahHasilKelulusan()
    {
        $data = $_POST;
        $data = $this->HasilKelulusanModel->tambahHasilKelulusan($data);
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

    public function hapusHasilKelulusan()
    {
        $data = $_POST['id_hasil_kelulusan'];
        $status = $this->HasilKelulusanModel->hapusHasilKelulusan($data);
        echo $status;
    }

    public function getHasilKelulusanById()
    {
        $id_periode = $_POST['id_hasil_kelulusan'];
        $data = $this->HasilKelulusanModel->getHasilKelulusanById($id_periode);
        echo json_encode($data);
    }

    public function updateHasilKelulusan()
    {
        $data = $_POST;
        $data = $this->HasilKelulusanModel->updateHasilKelulusan($data);
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
    public function updateStatusHasilKelulusan()
    {
        $data = $_POST;
        $data = $this->HasilKelulusanModel->updateStatusHasilKelulusan($data);

        echo json_encode($data);
    }
}
