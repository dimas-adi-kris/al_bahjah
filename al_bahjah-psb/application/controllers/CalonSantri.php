<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CalonSantri extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('CalonSantriModel');
        $this->load->model('PembayaranModel');
        $this->load->model('HasilKelulusanModel');
    }

    public function getCalonSantri()
    {
        $CalonSantri = $this->CalonSantriModel->getCalonSantri();
        echo json_encode($CalonSantri);
    }

    public function simpanCalonSantri()
    {
        $data = $_POST;
        $id_calon_santri = $_POST['id_calon_santri'];

        if ($id_calon_santri == '' || !isset($id_calon_santri)) {
            $data = $this->CalonSantriModel->tambahCalonSantri($data);
            $data['keterangan'] = "-";
            $data['status_lulus'] = "BELUM DITERIMA";
            $data = $this->HasilKelulusanModel->tambahHasilKelulusan($data);
        } else {
            $data = $this->CalonSantriModel->updateCalonSantri($data);
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
        // print_r($res);
        echo json_encode($res);
    }

    public function hapusCalonSantri()
    {
        $data = $_POST;
        $id = $data['id_calon_santri'];
        $status = $this->CalonSantriModel->hapusCalonSantri($id);
        echo $status;
    }

    public function getCalonSantriById()
    {
        $id_calon_santri = $_POST['id_calon_santri'];
        $data = $this->CalonSantriModel->getCalonSantriById($id_calon_santri);
        echo json_encode($data);
    }

    public function updateCalonSantri()
    {
        $data = $_POST;
        $data = $this->CalonSantriModel->updateCalonSantri($data);
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

    public function updateStatusCalonSantri()
    {
        $data = $_POST;
        $status = $this->CalonSantriModel->updateStatus($data);

        echo json_encode(($status));
    }

    public function getCalonSantriByPembayaran()
    {
        if (isset($_POST['id_pembayaran'])) {
            $id_pembayaran = $_POST['id_pembayaran'];
        } else {
            $id_pembayaran = $this->session->userdata("id_pembayaran");
        }

        $data = $this->CalonSantriModel->getCalonSantriByPembayaran($id_pembayaran);

        echo json_encode($data);
    }

    public function getCalonSantriByProgram()
    {
        $id_program = $_POST['id_program'];
        $data = $this->CalonSantriModel->getCalonSantriByProgram($id_program);

        echo json_encode($data);
    }

    public function getCalonSantriJoinPembayaran()
    {
        if (isset($_POST['id_pembayaran'])) {
            $id_pembayaran = $_POST['id_pembayaran'];
        } else {
            $id_pembayaran = $this->session->userdata("id_pembayaran");
        }

        $data = $this->CalonSantriModel->getCalonSantriJoinPembayaran($id_pembayaran);

        if ($data) {
            $status = 1;
        } else {
            $status = 0;
        }

        $res = [
            "status" => $status,
            "data" => $data
        ];

        echo json_encode($res);
    }

    function getAllCalonSantriJoin()
    {
        $CalonSantri = $this->CalonSantriModel->getTabelJoinProgram();
        echo json_encode($CalonSantri);
    }

    function getAllCalonSantriJoinProgram()
    {
        $id_program = $_POST['id_program'];

        $CalonSantri = $this->CalonSantriModel->getTabelJoinProgramById($id_program);
        echo json_encode($CalonSantri);
    }

    function getCalonSantriJoinbyProgram()
    {
        $CalonSantri = $this->CalonSantriModel->getTabelJoinProgram();
        echo json_encode($CalonSantri);
    }
}
