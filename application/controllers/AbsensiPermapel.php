<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AbsensiPermapel extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('ion_auth');
        $this->load->helper('url');
		$this->load->helper('form');
        $this->load->model('WaliKelasModel');
		$this->load->model('AbsensiPermapelModel');
		$this->load->database();
		if (!$this->ion_auth->logged_in()){
			redirect('auth/login');
		}
	}
	public function index()
	{
		$tahun_aktif = $this->WaliKelasModel->get_tahun_aktif();
		$data['tahun_aktif'] = $tahun_aktif;
		// $data['kelas_guru_absen'] = $this->AbsensiPermapelModel->get_kelas_guru_absen();
		$user = $this->ion_auth->user()->row();
		$nip =$user->username;
		$data['jadwal_guru_absen'] = $this->AbsensiPermapelModel->get_guru_jadwal_pertahunakademik($nip);
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php');
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('guru/absensi_permapel/view.php', $data);
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('guru/absensi_permapel/script.php');
	}
	public function get_all()
	{
		if(!empty($_GET['kelas']) ){
			$kode_kelas= $_GET['kelas'];
		}else if(empty($_GET['kelas']) ){
			$kode_kelas= null;
		}else if($_GET['kelas'] == 0){
			$kode_kelas= null;
		}
		$user = $this->ion_auth->user()->row();
		$nip =$user->username;
		$data['absensi_permapel'] = $this->AbsensiPermapelModel->get_all($kode_kelas);
		// $data['kelas_guru_absen'] = $this->AbsensiPermapelModel->get_kelas_guru_absen();
		$data['jadwal_guru_absen'] = $this->AbsensiPermapelModel->get_guru_jadwal_pertahunakademik($nip);
		$this->load->view('guru/absensi_permapel/data_a_permapel',$data);
	}
	public function get_table_tambah()
	{
		$tanggal = $_GET['tanggal'];
		$id_jadwal = $_GET['id_jadwal'];
		$data['absensi_permapel'] = $this->AbsensiPermapelModel->get_absensipermapel_tbh($tanggal,$id_jadwal);
		$this->load->view('guru/absensi_permapel/data_absensi',$data);
	}
	public function get_table_edit()
	{
		$tanggal = $_GET['tanggal'];
		$id_jadwal = $_GET['id_jadwal'];
		$data['absensi_permapel'] = $this->AbsensiPermapelModel->get_absensipermapel_tbh($tanggal,$id_jadwal);
		$this->load->view('guru/absensi_permapel/data_absensi_edit',$data);
	}
	public function crud($mode)
	{
		if ($mode == 'insert') {
			if ($this->input->is_ajax_request()) {
				$kode_mapel = $this->input->post('mapel');
				$kode_kelas = $this->input->post('kelas');
				$tanggal = $this->input->post('tanggal');
				$id_jadwal = $this->input->post('jam');
				$exists = $this->AbsensiPermapelModel->isAbsensiExist($id_jadwal,$tanggal);
				if($exists->num_rows() > 0){
					// echo json_encode($exists);
					echo 'exists';
				 }else{
					$this->AbsensiPermapelModel->insert($tanggal,$id_jadwal);
					$id_a_permapel = $this->db->insert_id();
					$result = $this->AbsensiPermapelModel->insert_absensi($kode_mapel,$kode_kelas,$tanggal,$id_jadwal,$id_a_permapel);
					// echo json_encode($result);
					echo 'success';
				 }
			}
		}
		else if ($mode == 'update_absensi') {
			if ($this->input->is_ajax_request()) {
				$id = $_GET['id'];
				$absensi = $_GET['absensi'];
				$data = array(
					'absensi' => $absensi
				);
				$result = $this->AbsensiPermapelModel->update($data,$id);
				echo json_encode($result);
			}
		}
	}
	public function get_guru_mapel_jadwal() {
		$user = $this->ion_auth->user()->row();
		$nip =$user->username;
        $kode_mapel = $_GET['kode_mapel'];
        $data = $this->AbsensiPermapelModel->get_kelas_guru_absen($kode_mapel,$nip);
    }
	public function get_guru_mapel_jadwal_all() {
		$user = $this->ion_auth->user()->row();
		$nip =$user->username;
        $data = $this->AbsensiPermapelModel->get_kelas_guru_absen_all($nip);
    }
	public function get_hari_jadwal() {
		$user = $this->ion_auth->user()->row();
		$nip =$user->username;
		$kode_mapel = $_GET['kode_mapel'];
		$kode_kelas = $_GET['kode_kelas'];
        $data = $this->AbsensiPermapelModel->get_hari_jadwal($kode_mapel,$kode_kelas,$nip);
    }
	public function get_tanggal_jadwal() {
		$kode_mapel = $_GET['kode_mapel'];
		$kode_kelas = $_GET['kode_kelas'];
        $data = $this->AbsensiPermapelModel->get_tanggal_jadwal($kode_mapel,$kode_kelas);
    }
	public function get_jam_jadwal() {
		$user = $this->ion_auth->user()->row();
		$nip =$user->username;
        $hari = $_GET['hari'];
		$kode_mapel = $_GET['kode_mapel'];
		$kode_kelas = $_GET['kode_kelas'];
        $data = $this->AbsensiPermapelModel->get_jam_jadwal($kode_mapel,$kode_kelas,$hari,$nip);
    }
}