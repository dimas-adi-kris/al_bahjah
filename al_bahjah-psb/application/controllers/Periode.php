<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Periode extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PeriodeModel');
    }

    public function getPeriode()
    {
        $dataProgram = $this->PeriodeModel->getPeriode();
        echo json_encode($dataProgram);
    }

    public function getProgram()
    {
        $progarm = $this->PeriodeModel->getProgram();
        echo json_encode($progarm);
    }

    public function getListProgram()
    {
        $progarm = $this->PeriodeModel->getListProgram();
        echo json_encode($progarm);
    }

    public function simpanData()
    {
        $data = $_POST;
        $id_periode = $_POST['id_periode'];
        if ($id_periode == '' || !isset($id_periode)) {
            $data = $this->PeriodeModel->tambahPeriode($data);
        } else {
            $data = $this->PeriodeModel->updatePeriode($data);
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

    public function hapusPeriode()
    {
        $data = $_POST['id_periode'];
        $status = $this->PeriodeModel->hapusPeriode($data);
        echo $status;
    }

    public function getPeriodeById()
    {
        $id_periode = $_POST['id_periode'];
        $data = $this->PeriodeModel->getPeriodeById($id_periode);
        echo json_encode($data);
    }
}
