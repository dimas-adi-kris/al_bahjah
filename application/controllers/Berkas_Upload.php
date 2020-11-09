<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berkas_Upload extends CI_Controller
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
    //     $this->load->model('BerkasUploadModel');
    // }
    public function index()
    {
        $this->load->view('berkas_upload');
    }
    public function getListTabel()
    {
        $listJenisRuangan = $this->BerkasUploadModel->getListTabel();
        echo json_encode($listJenisRuangan);
    }
    // public function getListTabelJoin()
    // {
    //     $listJenisRuangan = $this->BerkasUploadModel->getListTabelJoin();
    //     echo json_encode($listJenisRuangan);
    // }
    public function simpanData()
    {
        $data = $_POST;

        $id_ruangan = $_POST['id_ruangan'];

        if($id_ruangan==''||!isset($id_ruangan)){
            $data = $this->BerkasUploadModel->insertData($data);
        }
        else{
            $data = $this->BerkasUploadModel->updateData($data);
            // print_r($data);
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

    public function hapusData(){
        $id_ruangan = $_POST['id_ruangan'];

        $status = $this->BerkasUploadModel->hapusData($id_ruangan);

        echo $status;
    }

    public function getDataById(){
        $id_ruangan = $_POST['id_ruangan'];

        $data = $this->BerkasUploadModel->getDataById($id_ruangan);

        echo json_encode($data);
    }
}
