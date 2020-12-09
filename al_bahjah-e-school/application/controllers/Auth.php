<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        if ($this->session->userdata('id_role')) {
            redirect('admin');
        }
    }

    public function index()
    {
        if ($this->session->userdata('')) {
            # code...
        }
        $this->load->view('auth/auth');
    }

    public function akunLogin()
    {
        $this->load->view('auth/login');
    }

    public function registrasi()
    {
        if ($this->session->userdata('id_calon_santri')) {
            $this->load->view('auth/registrasi');
        } else {
            redirect('auth');
        }
    }

    public function cek_hasil_kelulusan()
    {
        $this->load->view('auth/cek_hasil_kelulusan');
    }

    public function registrasi_validasi()
    {
        if ($this->session->userdata('id_calon_santri')) {
            $this->load->view('auth/registrasi_validasi');
        } else {
            redirect('auth');
        }
    }

    public function autentikasi()
    {
        $email = $_POST['email'];
        $user = $this->AuthModel->getDataByEmail($email);

        if ($user) {
            $password = $_POST['password'];
            if (password_verify($password, $user['password'])) {
                if ($user['id_role'] == 1) {
                    $status = 3;
                    $this->session->set_userdata('emailAdmin', $email);
                    $this->session->set_userdata('id_role', $user['id_role']);
                    $this->session->set_userdata('id_user', $user['id_user']);
                    $this->session->unset_userdata('otp_pembayaran');
                    $this->session->unset_userdata('id_pembayaran');
                } elseif ($user['id_role'] == 4) {
                    if ($user['Aktif'] == "BELUM_AKTIF") {
                        $status = 5;
                    } else {
                        $status = 2;
                        $this->session->set_userdata('emailSantri', $email);
                        $this->session->set_userdata('id_user', $user['id_user']);
                        $this->session->set_userdata('id_role', $user['id_role']);
                        $this->session->unset_userdata('otp_pembayaran');
                        $this->session->unset_userdata('id_pembayaran');
                    }
                } else {
                    $status = 1;
                }
            } else {
                $status = 0;
            }
        } else {
            $status = 0;
        }
        echo $status;
    }

    // ADMIN

    public function admin()
    {
        $this->load->view('admin/login');
    }

    public function autentikasi_admin()
    {
        $email = $_POST['email'];
        $user = $this->AuthModel->getDataByEmail($email);
        if ($user) {
            $password = $_POST['password'];
            if (password_verify($password, $user['password'])) {
                if ($user['id_role'] == 1) {
                    $status = 2;
                    $this->session->set_userdata('email', $email);
                    $this->session->set_userdata('id_role', $user['id_role']);
                    $this->session->set_userdata('id_user', $user['id_user']);
                    $this->session->unset_userdata('otp_pembayaran');
                    $this->session->unset_userdata('id_pembayaran');
                } else {
                    $status = 1;
                }
            } else {
                $status = 0;
            }
        } else {
            $status = 0;
        }
        echo $status;
    }

    public function sandbox()
    {
        $data = $this->AuthModel->cekAktifasiByKode('353535');
        print_r($data[0]["Aktif"]);
    }

    public function successful()
    {
        $this->load->view('auth/successful');
    }

    public function verification($Kode_verifikasi)
    {
        $data = $this->AuthModel->cekAktifasiByKode($Kode_verifikasi);
        if ($data[0]["Aktif"] == "BELUM_AKTIF") {
            $this->AuthModel->verifikasiEmail($Kode_verifikasi);
            $this->load->view('auth/successful');
        } else if ($data[0]["Aktif"] == "AKTIF") {
            print_r('sudah pernah terdaftar');
            // $this->AuthModel->verifikasiEmail($Kode_verifikasi);
            // $this->load->view('auth/successful');
        } else {
            print_r('eror');
        }
    }

}
