<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GuruMapel extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('GuruMapelModel');
		$this->load->database();
	}
	public function index()
	{
		$mapel = $this->GuruMapelModel->get_mapel();
		$data['mapel'] = $mapel;
		$jurusan = $this->GuruMapelModel->get_jurusan();
		$data['jurusan'] = $jurusan;
        $guru = $this->GuruMapelModel->get_guru();
		$data['guru'] = $guru;
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php');
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('admin/gurumapel/view.php', $data);
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('admin/gurumapel/script.php');
	}
	public function get_all()
	{
		if(!empty($_GET['jurusan']) && empty($_GET['mapel']) ){
			$id_jurusan= $_GET['jurusan'];
			$id_mapel= null;
			$gurumapel = $this->GuruMapelModel->get_all($id_jurusan,$id_mapel);
		}else if(empty($_GET['jurusan']) && !empty($_GET['mapel']) ){
			$id_jurusan= null;
			$id_mapel= $_GET['mapel'];
			$gurumapel = $this->GuruMapelModel->get_all($id_jurusan,$id_mapel);
		}else if(!empty($_GET['jurusan']) && !empty($_GET['mapel']) ){
			$id_jurusan= $_GET['jurusan'];
			$id_mapel= $_GET['mapel'];
			$gurumapel = $this->GuruMapelModel->get_all($id_jurusan,$id_mapel);
		}else if(empty($_GET['jurusan']) && empty($_GET['mapel']) ){
			$id_jurusan= null;
			$id_mapel= null;
			$gurumapel = $this->GuruMapelModel->get_all($id_jurusan,$id_mapel);
		}else if($_GET['jurusan']==0 && $_GET['mapel']==0 ){
			$id_jurusan= null;
			$id_mapel= null;
			$gurumapel = $this->GuruMapelModel->get_all($id_jurusan,$id_mapel);
		}
		$data['gurumapel'] = $gurumapel;
		$mapel = $this->GuruMapelModel->get_mapel();
		$data['mapel'] = $mapel;
		$jurusan = $this->GuruMapelModel->get_jurusan();
		$data['jurusan'] = $jurusan;
        $guru = $this->GuruMapelModel->get_guru();
		$data['guru'] = $guru;
		$this->load->view('admin/gurumapel/data_guru_mapel',$data);
	}
	public function crud($mode)
	{
		if ($mode == 'insert') {
			if ($this->input->is_ajax_request()) {
				$data = array(
					'nip' => $this->input->post('guru'),
					'kode_mapel' => $this->input->post('mapel')
				);
				$result = $this->GuruMapelModel->insert($data);
				echo json_encode($result);
			}
		}
		else if ($mode == 'update') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$data = array(
					'nip' => $this->input->post('guru'),
					'kode_mapel' => $this->input->post('mapel')
				);
				$result = $this->GuruMapelModel->update($data, $id);
				echo json_encode($result);
			}
		}
		else if ($mode == 'delete') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$result = $this->GuruMapelModel->delete($id);
				echo json_encode($result);
			}
		}
	}
	public function get_by_id() {
		$id = $this->input->get('id');
		$data = $this->GuruMapelModel->get_by_id($id);
		echo json_encode($data);
	}
    public function get_detail_mapel() {
        $id_mapel = $_GET['id_mapel'];
        $data = $this->GuruMapelModel->get_detail_mapel($id_mapel);
        echo json_encode($data);
    }
}