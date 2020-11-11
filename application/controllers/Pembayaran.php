<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{

    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model('PembayaranModel');
    // }
    public function index()
    {
        $this->load->view('pembayaran');
    }
    public function getListTabel()
    {
        $listJenisRuangan = $this->PembayaranModel->getListTabel();
        echo json_encode($listJenisRuangan);
    }
    public function getListTabelJoin()
    {
        $listJenisRuangan = $this->PembayaranModel->getListTabelJoin();
        echo json_encode($listJenisRuangan);
    }
    public function simpanData()
    {
        $data = $_POST;

        $id_ruangan = $_POST['id_ruangan'];

        if($id_ruangan==''||!isset($id_ruangan)){
            $data = $this->PembayaranModel->insertData($data);
        }
        else{
            $data = $this->PembayaranModel->updateData($data);
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

        $status = $this->PembayaranModel->hapusData($id_ruangan);

        echo $status;
    }

    public function getDataById(){
        $id_ruangan = $_POST['id_ruangan'];

        $data = $this->PembayaranModel->getDataById($id_ruangan);

        echo json_encode($data);
    }
}
