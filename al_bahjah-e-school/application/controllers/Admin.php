<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('id_role') != 1) {
			redirect('auth');
		}
	}

	public function index()
	{
		$this->load->view('admin/home');
	}

	public function periode()
	{
		$this->load->view('admin/periode');
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('id_role');
		echo 1;
	}

	public function dashboard()
	{
		$this->load->view('admin/dashboard');
	}

	public function santri()
	{
		$this->load->view('admin/santri');
	}

	public function asatidz()
	{
		$this->load->view('admin/asatidz');
	}

	public function asatidz_kelas()
	{
		$this->load->view('admin/asatidz_kelas');
	}

	public function pembayaran()
	{
		$this->load->view('admin/pembayaran');
	}

	public function ruang()
	{
		$this->load->view('admin/ruang');
	}

	public function kelas_mata_pelajaran()
	{
		$this->load->view('admin/kelas_mata_pelajaran');
	}

	public function mata_pelajaran()
	{
		$this->load->view('admin/mata_pelajaran');
	}

	public function nilai_mata_pelajaran()
	{
		$this->load->view('admin/nilai_mata_pelajaran');
	}

	public function tahun_pelajaran()
	{
		$this->load->view('admin/tahun_pelajaran');
	}

	public function peserta_kelas()
	{
		$this->load->view('admin/peserta_kelas');
	}

	public function kurikulum()
	{
		$this->load->view('admin/kurikulum');
	}

	public function detail()
	{
		$this->load->view('admin/detail');
	}
}
