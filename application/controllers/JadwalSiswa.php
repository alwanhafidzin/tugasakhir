<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalSiswa extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper('url');
		$this->load->helper('form');
        $this->load->model('WaliKelasModel');
		$this->load->model('JadwalSiswaModel');
		$this->load->database();
	}
	public function index()
	{
		$data['jadwal_siswa'] = $this->JadwalSiswaModel->get_mapel_siswa();
        $tahun_aktif = $this->WaliKelasModel->get_tahun_aktif();
		$data['tahun_aktif'] = $tahun_aktif;
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php');
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('siswa/jadwal_siswa/view.php',$data);
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('siswa/jadwal_siswa/script.php');
	}
}