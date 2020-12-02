<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Program extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProgramModel');
    }

    public function getProgram()
    {
        $dataProgram = $this->ProgramModel->getProgram();
        echo json_encode($dataProgram);
    }

    public function tambahProgram()
    {
        $data = $_POST;
        $data = $this->ProgramModel->tambahProgram($data);

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

    public function hapusProgram()
    {
        $data = $_POST['id_program'];
        $status = $this->ProgramModel->hapusProgram($data);
        echo $status;
    }

    public function getProgramById()
    {
        $id_program = $_POST['id_program'];
        $data = $this->ProgramModel->getProgramById($id_program);
        echo json_encode($data);
    }

    public function updateProgram()
    {
        $data = $_POST;
        $data = $this->ProgramModel->updateProgram($data);
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
