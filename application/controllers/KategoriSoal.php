<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriSoal extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('KategoriSoalModel');
		$this->load->database();
	}
	public function index()
	{
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php');
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('guru/kategori_soal/view.php');
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('guru/kategori_soal/script.php');
	}
	public function get_all()
	{
		$kategori_soal = $this->KategoriSoalModel->get_all();
		$data['kategori_soal'] = $kategori_soal;
		$this->load->view('guru/kategori_soal/data_kategori_soal',$data);
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