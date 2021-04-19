<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('KelasModel');
		$this->load->database();
	}
	public function index()
	{
		$tingkat_kelas = $this->KelasModel->get_tingkat_kelas();
		$data['tingkat_kelas'] = $tingkat_kelas;
		$jurusan = $this->KelasModel->get_jurusan();
		$data['jurusan'] = $jurusan;
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php');
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('admin/kelas/view.php', $data);
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('admin/kelas/script.php');
	}
	public function get_all()
	{
		if(!empty($_GET['jurusan']) && empty($_GET['kelas']) ){
			$id_jurusan= $_GET['jurusan'];
			$id_kelas= null;
			$kelas = $this->KelasModel->get_all($id_jurusan,$id_kelas);
		}else if(empty($_GET['jurusan']) && !empty($_GET['kelas']) ){
			$id_jurusan= null;
			$id_kelas= $_GET['kelas'];
			$kelas = $this->KelasModel->get_all($id_jurusan,$id_kelas);
		}else if(!empty($_GET['jurusan']) && !empty($_GET['kelas']) ){
			$id_jurusan= $_GET['jurusan'];
			$id_kelas= $_GET['kelas'];
			$kelas = $this->KelasModel->get_all($id_jurusan,$id_kelas);
		}else if(empty($_GET['jurusan']) && empty($_GET['kelas']) ){
			$id_jurusan= null;
			$id_kelas= null;
			$kelas = $this->KelasModel->get_all($id_jurusan,$id_kelas);
		}else if($_GET['jurusan']==0 && $_GET['kelas']==0 ){
			$id_jurusan= null;
			$id_kelas= null;
			$kelas = $this->KelasModel->get_all($id_jurusan,$id_kelas);
		}
		$data['kelas'] = $kelas;
		$tingkat_kelas = $this->KelasModel->get_tingkat_kelas();
		$data['tingkat_kelas'] = $tingkat_kelas;
		$jurusan = $this->KelasModel->get_jurusan();
		$data['jurusan'] = $jurusan;
		$this->load->view('admin/kelas/data_kelas',$data);
	}
	public function crud($mode)
	{
		if ($mode == 'insert') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('kode_kelas');
				$data = array(
					'kode_kelas' => $this->input->post('kode_kelas'),
					'nama_kelas' => $this->input->post('nama_kelas'),
                    'kode_tingkat' => $this->input->post('kode_tingkat'),
                    'kode_jurusan' => $this->input->post('kode_jurusan')
				);
				$result = $this->KelasModel->insert($data);
				echo json_encode($result);
			}
		}
		else if ($mode == 'update') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$data = array(
					'kode_kelas' => $this->input->post('kode_kelas'),
					'nama_kelas' => $this->input->post('nama_kelas'),
                    'kode_tingkat' => $this->input->post('kode_tingkat'),
                    'kode_jurusan' => $this->input->post('kode_jurusan')
				);
				$result = $this->KelasModel->update($data, $id);
				echo json_encode($result);
			}
		}
		else if ($mode == 'delete') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$result = $this->KelasModel->delete($id);
				echo json_encode($result);
			}
		}
	}
	public function get_by_id() {
		$id = $this->input->get('id');
		$data = $this->KelasModel->get_by_id($id);
		echo json_encode($data);
	}
}