<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Santri extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_role') != 4) {
            redirect('index.php/auth');
        }
        $this->load->model('SantriModel');
    }

    public function index()
    {
        $this->load->view('santri/home');
    }

    public function dashboard()
    {
        $this->load->view('santri/dashboard');
    }

    public function pembayaran()
    {
        $this->load->view('santri/pembayaran');
    }

    public function profile()
    {
        $this->load->view('santri/profile');
    }

    public function daftar_pelajaran()
    {
        $this->load->view('santri/daftar_pelajaran');
    }

    public function nilai()
    {
        $this->load->view("santri/nilai");
    }

    public function logout()
    {
        $this->session->unset_userdata('emailSantri');
        $this->session->unset_userdata('id_role');
        echo 1;
    }

    public function getDataCalonSantri()
    {
        $santri = file_get_contents('http://localhost/al_bahjah/al_bahjah-psb/api/getAPIInfoDasarCalonSantri');
        echo $santri;
    }

    public function getDataCalonSantriLulus()
    {
        $santri = file_get_contents('http://localhost/al_bahjah/al_bahjah-psb/api/getAPICalonSantriLulus');
        echo $santri;
    }

    public function getCalonSantriById()
    {
        if (isset($_POST['id_calon_santri'])) {
            $id_calon_santri = $_POST['id_calon_santri'];
        } else {
            $id_user = $this->session->userdata('id_user');
            $santri = $this->SantriModel->getDataByIdUser($id_user)[0];
            $id_calon_santri = $santri['id_calon_santri'];
        }
        $res = $this->SantriModel->getCalonSantriById($id_calon_santri);
        echo json_encode((array) $res);
    }

    public function getWaliCalonSantriById()
    {
        if (isset($_POST['id_calon_santri'])) {
            $id_calon_santri = $_POST['id_calon_santri'];
        } else {
            $id_user = $this->session->userdata('id_user');
            $santri = $this->SantriModel->getDataByIdUser($id_user)[0];
            $id_calon_santri = $santri['id_calon_santri'];
        }
        $res = $this->SantriModel->getWaliCalonSantriById($id_calon_santri);
        echo json_encode($res);
    }

    public function getDataSantri()
    {
        $res = $this->SantriModel->getDataSantri();
        echo json_encode($res);
    }

    public function getDataSantriById()
    {
        $id_santri = $_POST['id_santri'];
        $santri = $this->SantriModel->getDataSantriById($id_santri);
        $calon_santri = file_get_contents('http://localhost/al_bahjah/al_bahjah-psb/api/getAPIInfoDasarCalonSantriById/' . $santri[0]['id_calon_santri']);
        $data['santri'] = $santri;
        $data['calon_santri'] = (array) json_decode($calon_santri);

        echo json_encode($data);
    }

    public function getDataByIdCalonSantri()
    {
        $id_calon_santri = $_POST['id_calon_santri'];
        $res = $this->SantriModel->getDataByIdCalonSantri($id_calon_santri);

        echo json_encode($res);
    }

    public function getIdSantri()
    {
        $id_user = $this->session->userdata('id_user');
        $santri = $this->SantriModel->getDataByIdUser($id_user)[0];
        $id_santri = $santri['id_santri'];

        echo $id_santri;
    }
}
