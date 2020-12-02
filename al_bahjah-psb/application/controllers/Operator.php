<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id_role')) {
            redirect('login');
        }
    }

    public function index()
    {
        $this->load->view('admin/calon_santri');
    }

    public function detail()
    {
        $this->load->view('admin/detail');
    }

    public function jadwal()
    {
        $this->load->view('admin/jadwal');
    }
}
