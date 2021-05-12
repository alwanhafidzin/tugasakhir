<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TahunAkademik extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper('url');
		$this->load->library('ssp');
		$this->load->helper('form');
		$this->load->model('TahunAkademikModel');
		$this->load->model('WaliKelasModel');
		$this->load->model('RuangKelasModel');
		$this->load->database();
	}
	public function index()
	{
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php');
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('admin/tahun_akademik/view.php');
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('admin/tahun_akademik/script.php');
	}
	public function get_all()
	{
		$tahunakademik = $this->TahunAkademikModel->get_all();
		$data['tahunakademik'] = $tahunakademik;
		$this->load->view('admin/tahun_akademik/data_tahun_akademik',$data);
	}
	public function crud($mode)
	{
		if ($mode == 'insert') {
			if ($this->input->is_ajax_request()) {
				$data = array(
					'tahun_akademik' => $this->input->post('tahunakademik'),
					'is_aktif' => 'N'
				);
				$result =$this->TahunAkademikModel->insert($data);
				$id_tahun_akademik = $this->db->insert_id();
				$this->WaliKelasModel->insert_walikelas($id_tahun_akademik);
				$this->RuangKelasModel->insert_ruangkelas($id_tahun_akademik);
				echo json_encode($result);
			}
		}
		else if ($mode == 'update') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$data = array(
					'semester' => $this->input->post('semester')
				);
				$result = $this->TahunAkademikModel->update($data, $id);
				echo json_encode($result);
			}
		}
		else if ($mode == 'delete') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$result = $this->TahunAkademikModel->delete($id);
				echo json_encode($result);
			}
		}
	}
	public function get_by_id() {
		$id = $this->input->get('id');
		$data = $this->TahunAkademikModel->get_by_id($id);
		echo json_encode($data);
	}
	public function set_aktif()
		{
			$id_tahunakademik = $this->input->post('id');
			$result = $this->TahunAkademikModel->set_aktif($id_tahunakademik);
			echo json_encode($result);
		}
}