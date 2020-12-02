<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PesertaKelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PesertaKelasModel');
        $this->load->model('NilaiMataPelajaranModel');
        $this->load->model('SantriModel');
    }

    public function getData()
    {
        $res = $this->PesertaKelasModel->getData();
        echo json_encode($res);
    }

    public function getDataJoinAll()
    {
        $res = $this->PesertaKelasModel->getDataJoinAll();
        echo json_encode($res);
    }

    public function simpanData()
    {
        $data = $_POST;

        $id_peserta_kelas = $_POST['id_peserta_kelas'];

        if ($id_peserta_kelas == '' || !isset($id_peserta_kelas)) {
            $data = $this->PesertaKelasModel->insertData($data);

            $nilai_mata_pelajaran['id_peserta_kelas'] = $data['id_peserta_kelas'];
            $nilai_mata_pelajaran['nilai_huruf'] = "F";
            $nilai_mata_pelajaran['nilai_angka'] = 0;
            $nilai_mata_pelajaran['keterangan'] = "-";

            $data = $this->NilaiMataPelajaranModel->insertData($nilai_mata_pelajaran);
        } else {
            $data = $this->PesertaKelasModel->updateData($data);
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
        $data = $_POST;
        $id = $data['id_peserta_kelas'];
        $status = $this->PesertaKelasModel->hapusData($id);
        $status = $this->NilaiMataPelajaranModel->hapusDataByIdPesertaKelas($id);
        echo $status;
    }

    public function getDataById()
    {
        $id = $_POST['id_peserta_kelas'];

        $data = $this->PesertaKelasModel->getDataById($id);
        echo json_encode($data);
    }

    public function getDataByIdSantri()
    {
        if (isset($_POST['id_santri'])) {
            $id_santri = $_POST['id_santri'];
        } else {
            $id_santri = $this->getIdSantri();
        }
        $data = $this->PesertaKelasModel->getDataByIdSantri($id_santri);
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
