<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AbsensiPermapel extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper('url');
		$this->load->helper('form');
        $this->load->model('WaliKelasModel');
		$this->load->model('AbsensiPermapelModel');
		$this->load->database();
	}
	public function index()
	{
		$tahun_aktif = $this->WaliKelasModel->get_tahun_aktif();
		$data['tahun_aktif'] = $tahun_aktif;
		// $data['kelas_guru_absen'] = $this->AbsensiPermapelModel->get_kelas_guru_absen();
		$data['jadwal_guru_absen'] = $this->AbsensiPermapelModel->get_guru_jadwal_pertahunakademik();
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php');
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('admin/absensi_permapel/view.php', $data);
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('admin/absensi_permapel/script.php');
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
		$data['absensi_permapel'] = $this->AbsensiPermapelModel->get_all($kode_kelas);
		// $data['kelas_guru_absen'] = $this->AbsensiPermapelModel->get_kelas_guru_absen();
		$data['jadwal_guru_absen'] = $this->AbsensiPermapelModel->get_guru_jadwal_pertahunakademik();
		$this->load->view('admin/absensi_permapel/data_a_permapel',$data);
	}
	public function get_table_tambah()
	{
		$tanggal = $_GET['tanggal'];
		$id_jadwal = $_GET['id_jadwal'];
		$data['absensi_permapel'] = $this->AbsensiPermapelModel->get_absensipermapel_tbh($tanggal,$id_jadwal);
		$this->load->view('admin/absensi_permapel/data_absensi',$data);
	}
	public function get_table_edit()
	{
		$tanggal = $_GET['tanggal'];
		$id_jadwal = $_GET['id_jadwal'];
		$data['absensi_permapel'] = $this->AbsensiPermapelModel->get_absensipermapel_tbh($tanggal,$id_jadwal);
		$this->load->view('admin/absensi_permapel/data_absensi_edit',$data);
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
        $kode_mapel = $_GET['kode_mapel'];
        $data = $this->AbsensiPermapelModel->get_kelas_guru_absen($kode_mapel);
    }
	public function get_hari_jadwal() {
		$kode_mapel = $_GET['kode_mapel'];
		$kode_kelas = $_GET['kode_kelas'];
        $data = $this->AbsensiPermapelModel->get_hari_jadwal($kode_mapel,$kode_kelas);
    }
	public function get_tanggal_jadwal() {
		$kode_mapel = $_GET['kode_mapel'];
		$kode_kelas = $_GET['kode_kelas'];
        $data = $this->AbsensiPermapelModel->get_tanggal_jadwal($kode_mapel,$kode_kelas);
    }
	public function get_jam_jadwal() {
        $hari = $_GET['hari'];
		$kode_mapel = $_GET['kode_mapel'];
		$kode_kelas = $_GET['kode_kelas'];
        $data = $this->AbsensiPermapelModel->get_jam_jadwal($kode_mapel,$kode_kelas,$hari);
    }
}