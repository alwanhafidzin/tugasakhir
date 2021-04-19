<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TingkatKelas extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('TingkatKelasModel');
		$this->load->database();
	}
	public function index()
	{
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php');
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('admin/tingkat_kelas/view.php');
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('admin/tingkat_kelas/script.php');
	}
	public function get_all()
	{
		$tingkat_kelas = $this->TingkatKelasModel->get_all();
		$data['tingkat_kelas'] = $tingkat_kelas;
		$this->load->view('admin/tingkat_kelas/data_tingkat_kelas',$data);
	}
	
	public function crud($mode)
	{
		if ($mode == 'insert') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('kode_tingkat');
				$data = array(
					'kode_tingkat' => $this->input->post('kode_tingkat'),
					'tingkatan' => $this->input->post('tingkatan')
				);
				$result = $this->TingkatKelasModel->insert($data);
				echo json_encode($result);
			}
		}
		else if ($mode == 'update') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$data = array(
					'kode_tingkat' => $this->input->post('kode_tingkat'),
					'tingkatan' => $this->input->post('tingkatan')
				);
				$result = $this->TingkatKelasModel->update($data, $id);
				echo json_encode($result);
			}
		}
		else if ($mode == 'delete') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$result = $this->TingkatKelasModel->delete($id);
				echo json_encode($result);
			}
		}
	}
	public function get_by_id() {
		$id = $this->input->get('id');
		$data = $this->TingkatKelasModel->get_by_id($id);
		echo json_encode($data);
	}
}