<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
    }

    public function index()
    {
        $this->load->view('user/dashboard');
    }

    public function getListTabel()
    {
        $listJenisRuangan = $this->UserModel->getListTabel();
        echo json_encode($listJenisRuangan);
    }
    public function getListTabelJoin()
    {
        $listJenisRuangan = $this->UserModel->getListTabelJoin();
        echo json_encode($listJenisRuangan);
    }
    public function simpanData()
    {
        $data = $_POST;

        $id_user = $_POST['id_user'];

        if ($id_user == '' || !isset($id_user)) {
            $data = $this->UserModel->insertData($data);
        } else {
            $data = $this->UserModel->updateData($data);
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
        $id_user = $_POST['id_user'];

        $status = $this->UserModel->hapusData($id_user);

        echo $status;
    }

    public function getDataById()
    {
        $id_user = $_POST['id_user'];

        $data = $this->UserModel->getDataById($id_user);

        // print_r('p'.$id_user);
        echo json_encode($data);
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_role');
        echo "1";
    }
}
