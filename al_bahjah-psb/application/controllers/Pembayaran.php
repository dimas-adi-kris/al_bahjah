<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PembayaranModel');
    }

    public function index()
    {
        $this->load->view('admin/pembayaran');
    }

    public function getData()
    {
        $listJenisRuangan = $this->PembayaranModel->getData();
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
        $data['id_bendahara'] = $this->session->userdata('id');
        $id_pembayaran = $_POST['id_pembayaran'];

        if ($id_pembayaran == '' || !isset($id_pembayaran)) {
            $otp = random_int(10000000, 99999999);
            $data['otp_pembayaran'] = str_replace(str_split('\\/:*?"<>|=+'), '', $otp);
            $data = $this->PembayaranModel->insertData($data);
        } else {
            $data = $this->PembayaranModel->updateData($data);
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
        $id_pembayaran = $_POST['id_pembayaran'];

        $status = $this->PembayaranModel->hapusData($id_pembayaran);

        echo $status;
    }

    public function getDataById()
    {
        if (isset($_POST['id_pembayaran'])) {
            $id_pembayaran = $_POST['id_pembayaran'];
        } else {
            $id_pembayaran = $this->session->userdata('id_pembayaran');
        }

        $data = $this->PembayaranModel->getDataById($id_pembayaran);

        echo json_encode($data);
    }

    public function getDataByOtp()
    {
        $data = $_POST;

        $data = $this->PembayaranModel->getDataByotp($data);
        if ($data) {
            $data = $data[0];
            $status = 1;
            if ($data['status_verifikasi'] == "TERVERIFIKASI") {
                $this->session->set_userdata('id_pembayaran', $data['id_pembayaran']);
            }
        } else {
            $status = 0;
        }

        $res = [
            "data" => $data,
            "status" => $status
        ];

        echo json_encode($res);
    }

    public function updateStatusPembayaran()
    {
        $data = $_POST;
        $data = $this->PembayaranModel->updateStatus($data);

        echo json_encode(($data));
    }

    public function getDataByProgram()
    {
        $id_program = $_POST['id_program'];
        $data = $this->PembayaranModel->getDataByProgram($id_program);

        echo json_encode($data);
    }
}
