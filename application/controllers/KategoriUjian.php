<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriUjian extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('KategoriUjianModel');
		$this->load->model('AbsensiPermapelModel');
		$this->load->database();
	}
	public function index()
	{
		$data['tipe_ujian'] = $this->KategoriUjianModel->get_tipe_ujian();
		$data['jadwal_guru_absen'] = $this->AbsensiPermapelModel->get_guru_jadwal_pertahunakademik();
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php');
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('guru/kategori_ujian/view.php',$data);
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('guru/kategori_ujian/script.php');
	}
	public function get_all()
	{
		if(!empty($_GET['id_tipe']) && empty($_GET['kode_mapel']) ){
			$id_tipe= $_GET['id_tipe'];
			$id_mapel= null;
			$kategori_ujian = $this->KategoriUjianModel->get_all($id_tipe,$id_mapel);
		}else if(empty($_GET['id_tipe']) && !empty($_GET['kode_mapel']) ){
			$id_tipe= null;
			$id_mapel= $_GET['kode_mapel'];
			$kategori_ujian = $this->KategoriUjianModel->get_all($id_tipe,$id_mapel);
		}else if(!empty($_GET['id_tipe']) && !empty($_GET['kode_mapel']) ){
			$id_tipe= $_GET['id_tipe'];
			$id_mapel= $_GET['kode_mapel'];
			$kategori_ujian = $this->KategoriUjianModel->get_all($id_tipe,$id_mapel);
		}else if(empty($_GET['id_tipe']) && empty($_GET['kode_mapel']) ){
			$id_tipe= null;
			$id_mapel= null;
			$kategori_ujian = $this->KategoriUjianModel->get_all($id_tipe,$id_mapel);
		}else if($_GET['id_tipe']==0 && $_GET['kode_mapel']==0 ){
			$id_tipe= null;
			$id_mapel= null;
			$kategori_ujian = $this->KategoriUjianModel->get_all($id_tipe,$id_mapel);
		}
		$data['kategori_ujian'] = $kategori_ujian;
		$data['tipe_ujian'] = $this->KategoriUjianModel->get_tipe_ujian();
		$data['jadwal_guru_absen'] = $this->AbsensiPermapelModel->get_guru_jadwal_pertahunakademik();
		$this->load->view('guru/kategori_ujian/data_kategori_ujian',$data);
	}
	
	public function crud($mode)
	{
		if ($mode == 'insert') {
			if ($this->input->is_ajax_request()) {
				$data = array(
					'nama_ujian' => $this->input->post('nama_ujian'),
					'kode_mapel' => $this->input->post('kode_mapel'),
					'id_t_ujian' => $this->input->post('id_t_ujian'),
					'nip' => '3509176412630001'
				);
				$result = $this->KategoriUjianModel->insert($data);
				echo json_encode($result);
			}
		}
		else if ($mode == 'update') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$data = array(
					'nama_ujian' => $this->input->post('nama_ujian'),
					'kode_mapel' => $this->input->post('kode_mapel'),
					'id_t_ujian' => $this->input->post('id_t_ujian'),
					'nip' => '3509176412630001'
				);
				$result = $this->KategoriUjianModel->update($data, $id);
				echo json_encode($result);
			}
		}
		else if ($mode == 'delete') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$result = $this->KategoriUjianModel->delete($id);
				echo json_encode($result);
			}
		}
	}
	public function get_by_id() {
		$id = $this->input->get('id');
		$data = $this->KategoriUjianModel->get_by_id($id);
		echo json_encode($data);
	}
}