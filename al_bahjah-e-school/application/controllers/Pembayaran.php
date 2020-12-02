<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PembayaranModel');
        $this->load->model('SantriModel');
    }

    public function getData()
    {
        $res = $this->PembayaranModel->getData();
        echo json_encode($res);
    }

    public function getListTabelJoin()
    {
        $listJenisRuangan = $this->PembayaranModel->getListTabelJoin();
        echo json_encode($listJenisRuangan);
    }

    public function simpanData()
    {
        $data = $_POST;

        $id_pembayaran = $_POST['id_pembayaran'];
        if ($id_pembayaran == '' || !isset($id_pembayaran)) {
            $id_santri = $_POST['id_santri'];
            if ($id_santri == '' || !isset($id_santri)) {
                $id_santri = $this->getIdSantri();
            }
            if (!isset($data['status_verifikasi'])) {
                $data['status_verifikasi'] = "BELUM";
            }

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
        $id_pembayaran = $_POST['id_pembayaran'];

        $data = $this->PembayaranModel->getDataById($id_pembayaran);

        echo json_encode($data);
    }

    public function getDataByIdSantri()
    {
        if (isset($_POST['id_santri'])) {
            $id_santri = $_POST['id_santri'];
        } else {
            $id_santri = $this->getIdSantri();
        }
        $data = $this->PembayaranModel->getDataByIdSantri($id_santri);

        echo json_encode($data);
    }

    public function updateStatusPembayaran()
    {
        $data = $_POST;
        $data = $this->PembayaranModel->updateStatus($data);

        echo json_encode($data);
    }

    public function getIdSantri()
    {
        $id_user = $this->session->userdata('id_user');
        $santri = $this->SantriModel->getDataByIdUser($id_user)[0];
        $id_santri = $santri['id_santri'];

        return $id_santri;
    }
}
