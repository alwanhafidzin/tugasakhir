<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListUjianGuru extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('ion_auth');
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('ListUjianGuruModel');
		$this->load->model('AbsensiPermapelModel');
		$this->load->model('WaliKelasModel');
		$this->load->database();
		if (!$this->ion_auth->logged_in()){
			redirect('auth/login');
		}
	}
	public function index()
	{
		$user = $this->ion_auth->user()->row();
		$nip =$user->username;
		$tahun_aktif = $this->WaliKelasModel->get_tahun_aktif();
		$data['tahun_aktif'] = $tahun_aktif;
		$data['kategori_ujian'] = $this->ListUjianGuruModel->get_kategori_ujian($nip);
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php');
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('guru/list_ujian/view.php',$data);
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('guru/list_ujian/script.php');
	}
	public function get_all()
	{
		$user = $this->ion_auth->user()->row();
		$nip =$user->username;
		$tahun_aktif = $this->WaliKelasModel->get_tahun_aktif();
		$data['tahun_aktif'] = $tahun_aktif;
		$data['kategori_ujian'] = $this->ListUjianGuruModel->get_kategori_ujian($nip);
		$list_ujian = $this->ListUjianGuruModel->get_all($nip);
		$data['list_ujian'] = $list_ujian;
		$this->load->view('guru/list_ujian/data_list',$data);
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