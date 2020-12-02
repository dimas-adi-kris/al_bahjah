<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Periodee extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PeriodeModel');
    }

    public function index()
    {
        $this->load->view('landing/home');
    }

    public function profile()
    {
        $this->load->view('landing/profilePeriode');
    }

    public function getPeriode()
    {
        $dataProgram = $this->PeriodeModel->getPeriode();
        echo json_encode($dataProgram);
    }

    public function getProgram()
    {
        $program = $this->PeriodeModel->getProgram();
        echo json_encode($program);
    }

    public function getListProgram()
    {
        $program = $this->PeriodeModel->getListProgram();
        echo json_encode($program);
    }

    public function tambahPeriode()
    {
        $data = $_POST;
        $data = $this->PeriodeModel->tambahPeriode($data);

        if ($data) {
            $status = 1;
        } else {
            $status = 0;
        }

        $res = array(
            "data" => $data,
            "status" => $status
        );
        print_r($res);
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

    public function updatePeriode()
    {
        $data = $_POST;
        $data = $this->PeriodeModel->updatePeriode($data);
        if ($data) {
            $status = 1;

            // close session
            // $this->session->unset_userdata('sekolah_id');

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
