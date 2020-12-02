<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel');
        $this->load->model('PembayaranModel');
        $this->load->model('CalonSantriModel');
        $this->load->model('WaliCalonSantriModel');
        if ($this->session->userdata('id_role')) {
            redirect('admin');
        }
    }

    public function index()
    {
        $this->load->view('admin/login');
    }

    public function autentikasi()
    {
        $email = $_POST['email'];
        $user = $this->LoginModel->getDataByEmail($email);
        if ($user) {
            $password = $_POST['password'];
            if (password_verify($password, $user['password'])) {
                $status = 1;
                $this->session->set_userdata('email', $email);
                $this->session->set_userdata('id_role', $user['id_role']);
                $this->session->unset_userdata('otp_pembayaran');
                $this->session->unset_userdata('id_pembayaran');
                print_r($user);
            }
        } else {
            $status = 0;
        }
        return $status;
    }

    public function otp()
    {
        $this->session->unset_userdata('id_pembayaran');
        if ($this->session->userdata('id_pembayaran')) {
            redirect('auth/registrasi');
        } else {
            $this->load->view('user/otp');
        }
    }

    public function registrasi()
    {
        if ($this->session->userdata('id_pembayaran')) {
            $this->load->view('user/registrasi');
        } else {
            redirect('auth/otp');
        }
    }

    public function registrasi_santri()
    {
        $this->load->view('user/registrasi_santri');
    }

    public function registrasi_wali()
    {

        $this->load->view('user/registrasi_wali');
    }

    public function registrasi_berkas()
    {
        $this->load->view('user/registrasi_berkas');
    }

    public function registrasi_finalisasi()
    {
        $this->load->view('user/registrasi_finalisasi');
    }
}
