<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ujian extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('KategoriSoalModel');
		$this->load->model('UjianModel');
		$this->load->database();
	}
	public function index($id)
	{
		$data['ujian'] = $this->UjianModel->get_ujian_by_id($id);
        $this->load->view('templates/top-nav/header.php');
		$this->load->view('siswa/ujian/view.php',$data);
		$this->load->view('templates/top-nav/footer.php');
		$this->load->view('guru/kategori_soal/script.php');
	}
	public function mulai_ujian($id){
		$data['ujian'] = $this->UjianModel->get_ujian_by_id($id);
        $this->load->view('templates/top-nav/header.php');
		$this->load->view('siswa/ujian/view.php',$data);
		$this->load->view('templates/top-nav/footer.php');
		$this->load->view('siswa/ujian/script.php',$data);
	}
	public function get_soal()
	{
		$id= $_GET['id'];
		$data['soal'] = $this->UjianModel->get_soal($id);
		$this->load->view('siswa/ujian/data_soal',$data);
	}
	public function get_list_soal(){
		$id= $_GET['id'];
		$data['list_soal'] = $this->UjianModel->get_list_soal_by_id($id);
		$this->load->view('siswa/ujian/data_menu_soal',$data);
	}
	public function get_soal_button()
	{
		$id= $_GET['id'];
		$offset = $_GET['off'];
		$data['soal'] = $this->UjianModel->get_soal_button($id,$offset);
		$this->load->view('siswa/ujian/data_soal',$data);
	}
	
	public function crud($mode)
	{
		if ($mode == 'insert') {
			if ($this->input->is_ajax_request()) {
				$data = array(
					'kategori' => $this->input->post('kategori_soal'),
					'nip' => '3509176412630001'
				);
				$result = $this->KategoriSoalModel->insert($data);
				echo json_encode($result);
			}
		}
		else if ($mode == 'update') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$data = array(
					'kategori' => $this->input->post('kategori_soal')
				);
				$result = $this->KategoriSoalModel->update($data, $id);
				echo json_encode($result);
			}
		}
		else if ($mode == 'update_jawaban') {
			if ($this->input->is_ajax_request()) {
				$id = $_GET['id'];
				$data = array(
					'jawaban' => $_GET['jawaban']
				);
				$result = $this->UjianModel->update_jawaban($data, $id);
				echo json_encode($result);
			}
		}
		else if ($mode == 'update_ragu') {
			if ($this->input->is_ajax_request()) {
				$id = $_POST['id'];
				$data = array(
					'ragu' => $_POST['ragu']
				);
				$result = $this->UjianModel->update_ragu($data, $id);
				echo json_encode($result);
			}
		}
		else if ($mode == 'delete') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$result = $this->KategoriSoalModel->delete($id);
				echo json_encode($result);
			}
		}
	}
	public function get_by_id() {
		$id = $this->input->get('id');
		$data = $this->KategoriSoalModel->get_by_id($id);
		echo json_encode($data);
	}
}