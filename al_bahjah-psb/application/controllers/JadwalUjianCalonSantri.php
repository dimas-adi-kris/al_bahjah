<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JadwalUjianCalonSantri extends CI_Controller
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
        $this->load->view('jadwalUjianCalonSantri');
    }
    public function getJadwalUjianCalonSantri()
    {
        $jadwalUjianCalonSantri = $this->JadwalUjianCalonSantriModel->getJadwalUjianCalonSantri();
        echo json_encode($jadwalUjianCalonSantri);
    }

    public function tambahJadwalUjianCalonSantri()
    {
        $data = $_POST;
        $data = $this->JadwalUjianCalonSantriModel->tambahJadwalUjianCalonSantri($data);

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

    public function hapusJadwalUjianCalonSantri()
    {
        $data = $_POST;
        $id = $data['id_jadwal_ujian_calon_santri'];
        $status = $this->JadwalUjianCalonSantriModel->hapusJadwalUjianCalonSantri($id);
        echo $status;
    }

    public function getJadwalUjianCalonSantriById()
    {
        $id_jadwal_ujian_calon_santri = $_POST['id_jadwal_ujian_calon_santri'];
        $data = $this->JadwalUjianCalonSantriModel->getJadwalUjianCalonSantriById($id_jadwal_ujian_calon_santri);
        echo json_encode($data);
    }


    public function getListRuangan()
    {
        $listJenisRuangan = $this->RuanganModel->getListRuangan();
        echo json_encode($listJenisRuangan);
    }
    public function simpanData()
    {
        $data = $_POST;

        $id_ruangan = $_POST['id_ru'];

        if ($id_ruangan == '' || !isset($id_ruangan)) {
            $data = $this->RuanganModel->insertData($data);
        } else {
            $data = $this->RuanganModel->updateData($data);
        }

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
