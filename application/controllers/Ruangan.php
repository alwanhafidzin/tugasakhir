<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('RuanganModel');
		$this->load->database();
	}
	public function index()
	{
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php');
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('admin/ruangan/view.php');
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('admin/ruangan/script.php');
	}
	public function get_all()
	{
		$ruangan = $this->RuanganModel->get_all();
		$data['ruangan'] = $ruangan;
		$this->load->view('admin/ruangan/data_ruangan',$data);
	}
	public function crud($mode)
	{
		if ($mode == 'insert') {
			if ($this->input->is_ajax_request()) {
				$data = array(
					'kode_ruangan' => $this->input->post('kode_ruangan'),
					'ruangan' => $this->input->post('ruangan')
				);
				$result = $this->RuanganModel->insert($data);
				echo json_encode($result);
			}
		}
		else if ($mode == 'update') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$data = array(
					'kode_ruangan' => $this->input->post('kode_ruangan'),
					'ruangan' => $this->input->post('ruangan')
				);
				$result = $this->RuanganModel->update($data, $id);
				echo json_encode($result);
			}
		}
		else if ($mode == 'delete') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$result = $this->RuanganModel->delete($id);
				echo json_encode($result);
			}
		}
	}
	public function get_by_id() {
		$id = $this->input->get('id');
		$data = $this->RuanganModel->get_by_id($id);
		echo json_encode($data);
	}
}