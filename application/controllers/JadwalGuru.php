<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalGuru extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('ion_auth');
        $this->load->helper('url');
		$this->load->helper('form');
        $this->load->model('WaliKelasModel');
		$this->load->model('JadwalGuruModel');
		$this->load->database();
		if (!$this->ion_auth->logged_in()){
			redirect('auth/login');
		}
	}
	public function index()
	{
		$user = $this->ion_auth->user()->row();
		$username =$user->username;
		$data['jadwal_guru'] = $this->JadwalGuruModel->get_mapel_guru($username);
        $tahun_aktif = $this->WaliKelasModel->get_tahun_aktif();
		$data['tahun_aktif'] = $tahun_aktif;
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php');
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('guru/jadwal_guru/view.php',$data);
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('guru/jadwal_guru/script.php');
	}
}