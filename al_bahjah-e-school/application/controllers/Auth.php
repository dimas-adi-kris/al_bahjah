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
        print_r($user);
        die;
        if ($user) {
            $password = $_POST['password'];
            if (password_verify($password, $user['password'])) {
                if ($user['id_role'] == 1) {
                    $status = 3;
                    $this->session->set_userdata('email', $email);
                    $this->session->set_userdata('id_role', $user['id_role']);
                    $this->session->set_userdata('id_user', $user['id_user']);
                    $this->session->unset_userdata('otp_pembayaran');
                    $this->session->unset_userdata('id_pembayaran');
                } elseif ($user['id_role'] == 4) {
                    if ($user['Aktif'] == "BELUM_AKTIF") {
                        $status = 5;
                    } else {
                        $status = 2;
                        $this->session->set_userdata('email', $email);
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
        print_r(rand(10000000, 100000000));
    }

    public function successful()
    {
        $this->load->view('auth/successful');
    }

    public function verification($Kode_verifikasi)
    {
        $data = $this->AuthModel->cekaktifasi($Kode_verifikasi);
        if ($data) {
            $this->AuthModel->verifikasiemail($Kode_verifikasi);
            $this->load->view('auth/successful');
        } else {
            print_r('eror');
        }
    }

    public function tes()
    {
        // $data = $_POST['email'];
        // $data = str_replace('data:application/pdf;base64', '', $data);
        // $data = str_replace(' ', '+', $data);
        // $data = base64_decode($data);
        // $img_name = "test" . random_int(1, 1000) . ".pdf";
        // $file = FCPATH . "/asset/pdf/" . $img_name;
        // file_put_contents($file, $data);
        // $this->db->insert('snapshot', ['image' => $img_name]);
        // print_r($data);
        // $email = $this->input->post('email', true);

        $config = [
            'protocol' => "smtp",
            'smtp_host' => "ssl://smtp.googlemail.com",
            'smtp_user' => "cerelisasi55@gmail.com",
            'smtp_pass' => "po21po32",
            'smtp_port' => 465,
            'mailtype' => "html",
            'charset' => "utf-8",
            'priority' => 1,
            'newline' => "\r\n",
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from("cerelisasi55@gmail.com", "Sysadmin");
        $this->email->to('dimaskristianto1999@gmail.com');
        $this->email->subject("Verify New Account");
        $this->email->message();
        // $this->email->attach($file);
        $this->email->send();
        print_r('sukses??');
        // if ($type == "activate") {
        //     $this->email->subject("Verify New Account");
        //     $this->email->message('<a href="' . base_url() . 'auth/verify?email=' . $email . '&token=' . urlencode($token) . '&type=activate' . '">Click this link to verify your account</a>');
        // } else if ($type == "forgot_pass") {
        //     $this->email->subject("Reset Password");
        //     $this->email->message('<a href="' . base_url() . 'auth/verify?email=' . $email . '&token=' . urlencode($token) .  '&type=forgot_pass' . '">Click this link to reset your password</a>');
        // }

        // if ($this->email->send()) {
        //     return true;
        // } else {
        //     echo $this->email->print_debugger();
        //     die;
        // }
    }
}
