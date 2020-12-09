<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $this->load->view('auth/auth');
    }

    public function profile()
    {
        $this->load->view('profile');
    }
}
