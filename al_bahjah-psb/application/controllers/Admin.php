<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('id_role') != 1) {
			$this->session->unset_userdata('id_role');
			$this->session->unset_userdata('email');
			redirect('auth');
		}
	}

	public function index()
	{
		$this->load->view('admin/home');
	}

	public function hasil_kelulusan()
	{
		$this->load->view('admin/hasil_kelulusan');
	}

	public function periode()
	{
		$this->load->view('admin/periode');
	}
}
