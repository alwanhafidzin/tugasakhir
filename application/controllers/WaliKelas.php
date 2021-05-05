<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WaliKelas extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('WaliKelasModel');
		$this->load->database();
	}
	public function index()
	{
		$tingkat_kelas = $this->WaliKelasModel->get_tingkat_kelas();
		$data['tingkat_kelas'] = $tingkat_kelas;
		$jurusan = $this->WaliKelasModel->get_jurusan();
		$data['jurusan'] = $jurusan;
		$tahun_aktif = $this->WaliKelasModel->get_tahun_aktif();
		$data['tahun_aktif'] = $tahun_aktif;
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php');
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('admin/wali_kelas/view.php', $data);
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('admin/wali_kelas/script.php');
	}
	public function get_all()
	{
		if(!empty($_GET['jurusan']) && empty($_GET['kelas']) ){
			$id_jurusan= $_GET['jurusan'];
			$id_kelas= null;
			$walikelas = $this->WaliKelasModel->get_all($id_jurusan,$id_kelas);
		}else if(empty($_GET['jurusan']) && !empty($_GET['kelas']) ){
			$id_jurusan= null;
			$id_kelas= $_GET['kelas'];
			$walikelas = $this->WaliKelasModel->get_all($id_jurusan,$id_kelas);
		}else if(!empty($_GET['jurusan']) && !empty($_GET['kelas']) ){
			$id_jurusan= $_GET['jurusan'];
			$id_kelas= $_GET['kelas'];
			$walikelas = $this->WaliKelasModel->get_all($id_jurusan,$id_kelas);
		}else if(empty($_GET['jurusan']) && empty($_GET['kelas']) ){
			$id_jurusan= null;
			$id_kelas= null;
			$walikelas = $this->WaliKelasModel->get_all($id_jurusan,$id_kelas);
		}else if($_GET['jurusan']==0 && $_GET['kelas']==0 ){
			$id_jurusan= null;
			$id_kelas= null;
			$walikelas = $this->WaliKelasModel->get_all($id_jurusan,$id_kelas);
		}
		$data['walikelas'] = $walikelas;
		$tingkat_kelas = $this->WaliKelasModel->get_tingkat_kelas();
		$data['tingkat_kelas'] = $tingkat_kelas;
		$jurusan = $this->WaliKelasModel->get_jurusan();
		$data['jurusan'] = $jurusan;
		$guru = $this->WaliKelasModel->get_guru();
		$data['guru'] = $guru;
		$guru2 = $this->WaliKelasModel->get_guru2();
		$data['guru2'] = $guru2;
		$this->load->view('admin/wali_kelas/data_walikelas',$data);
	}
	public function crud($mode)
	{
		if ($mode == 'update') {
			if ($this->input->is_ajax_request()) {
				$id = $_GET['id'];
				$data = array(
					'nip' => $_GET['nip']
				);
				$result = $this->WaliKelasModel->update($data, $id);
				echo json_encode($result);
			}
		}
	}
}