<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelompokMapel extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('KelompokMapelModel');
		$this->load->database();
	}
	public function index()
	{
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php');
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('admin/kelompok_mapel/view.php');
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('admin/kelompok_mapel/script.php');
	}
	public function get_all()
	{
		$kelompok_mapel = $this->KelompokMapelModel->get_all();
		$data['kelompok_mapel'] = $kelompok_mapel;
		$this->load->view('admin/kelompok_mapel/data_kelompok_mapel',$data);
	}
	
	public function crud($mode)
	{
		if ($mode == 'insert') {
			if ($this->input->is_ajax_request()) {
				$data = array(
					'kelompok_mapel' => $this->input->post('kelompokmapel')
				);
				$result = $this->KelompokMapelModel->insert($data);
				echo json_encode($result);
			}
		}
		else if ($mode == 'update') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$data = array(
					'kelompok_mapel' => $this->input->post('kelompokmapel')
				);
				$result = $this->KelompokMapelModel->update($data, $id);
				echo json_encode($result);
			}
		}
		else if ($mode == 'delete') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$result = $this->KelompokMapelModel->delete($id);
				echo json_encode($result);
			}
		}
	}
	public function get_by_id() {
		$id = $this->input->get('id');
		$data = $this->KelompokMapelModel->get_by_id($id);
		echo json_encode($data);
	}
}