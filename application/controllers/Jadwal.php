<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('WaliKelasModel');
        $this->load->model('JadwalModel');
		$this->load->model('KelasSiswaModel');
		$this->load->database();
	}
	public function index()
	{
		$tahun_aktif = $this->WaliKelasModel->get_tahun_aktif();
		$data['tahun_aktif'] = $tahun_aktif;
        $nip = $this->JadwalModel->get_nip();
		$data['nip'] = $nip;
		$kelas = $this->KelasSiswaModel->get_kelas();
		$data['kelas'] = $kelas;
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php');
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('admin/jadwal/view.php', $data);
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('admin/jadwal/script.php');
	}
	public function get_all()
	{
		if(!empty($_GET['kelas']) && empty($_GET['guru']) ){
			$kode_kelas= $_GET['kelas'];
			$nip_guru= null;
			$jadwal = $this->JadwalModel->get_all($kode_kelas,$nip_guru);
		}else if(empty($_GET['kelas']) && !empty($_GET['guru']) ){
			$kode_kelas= null;
			$nip_guru= $_GET['guru'];
			$jadwal = $this->JadwalModel->get_all($kode_kelas,$nip_guru);
		}else if(!empty($_GET['kelas']) && !empty($_GET['guru']) ){
			$kode_kelas= $_GET['kelas'];
			$nip_guru= $_GET['guru'];
			$jadwal = $this->JadwalModel->get_all($kode_kelas,$nip_guru);
		}else if(empty($_GET['kelas']) && empty($_GET['guru']) ){
			$kode_kelas= null;
			$nip_guru= null;
			$jadwal = $this->JadwalModel->get_all($kode_kelas,$nip_guru);
		}else if($_GET['kelas']==0 && $_GET['guru']==0 ){
			$kode_kelas= null;
			$nip_guru= null;
			$jadwal = $this->JadwalModel->get_all($kode_kelas,$nip_guru);
		}
		$data['jadwal'] = $jadwal;
        $data['guru_mapel'] = $this->JadwalModel->get_guru_mapel();
		$data['hari'] = $this->JadwalModel->get_hari();
		$this->load->view('admin/jadwal/data_jadwal',$data);
	}
	public function crud($mode)
	{
		if ($mode == 'update_guru') {
			if ($this->input->is_ajax_request()) {
				$id = $_GET['id'];
				$data = array(
					'nip' => $_GET['nip']
				);
				$result = $this->JadwalModel->update($data, $id);
				echo json_encode($result);
			}
		}
		else if ($mode == 'update_hari') {
			if ($this->input->is_ajax_request()) {
				$id = $_GET['id'];
				$data = array(
					'id_hari' => $_GET['hari']
				);
				$result = $this->JadwalModel->update($data, $id);
				echo json_encode($result);
			}
		}
		else if ($mode == 'update_jam_mulai') {
			if ($this->input->is_ajax_request()) {
				$id = $_GET['id'];
				$data = array(
					'jam_mulai' => $_GET['jam_mulai']
				);
				$result = $this->JadwalModel->update($data, $id);
				echo json_encode($result);
			}
		}
		else if ($mode == 'update_jam_selesai') {
			if ($this->input->is_ajax_request()) {
				$id = $_GET['id'];
				$data = array(
					'jam_selesai' => $_GET['jam_selesai']
				);
				$result = $this->JadwalModel->update($data, $id);
				echo json_encode($result);
			}
		}
	}
	public function get_guru_mapel() {
        $kode_mapel = $_GET['kode_mapel'];
        $data = $this->JadwalModel->get_guru_mapel($kode_mapel);
    }
}