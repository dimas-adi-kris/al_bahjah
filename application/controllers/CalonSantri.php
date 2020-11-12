<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CalonSantri extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model('RuanganModel');
    // }
    public function index()
    {
        $this->load->view('calonSantri');
    }





    
    // FUNGSI DIBAWAH INI YANG DIPAKE UNTUK JOIN 3 TABEL
    public function getCalonSantri()
    {
        $CalonSantri = $this->CalonSantriModel->getTabelJoin();
        echo json_encode($CalonSantri);
    }
    // FUNGSI DIATAS INI YANG DIPAKE UNTUK JOIN 3 
    





    public function tambahCalonSantri()
    {
        $data = $_POST;
        $data = $this->CalonSantriModel->tambahCalonSantri($data);

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
        $id_jadwal_ujian_calon_santri = $_POST['id_calon_santri'];
        $data = $this->CalonSantriModel->getCalonSantriById($id_jadwal_ujian_calon_santri);
        echo json_encode($data);
    }

    public function updateCalonSantri()
    {
        $data = $_POST;
        $data = $this->CalonSantriModel->updateCalonSantri($data);
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
