<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListUjianSiswa extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('ListUjianSiswaModel');
		$this->load->database();
	}
	public function index()
	{
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php');
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('siswa/list_ujian/view.php');
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('siswa/list_ujian/script.php');
	}
	public function get_all()
	{
		$list_ujian = $this->ListUjianSiswaModel->get_all();
		$data['list_ujian'] = $list_ujian;
		$this->load->view('siswa/list_ujian/data_list',$data);
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
	public function buat_soal(){
		$nis = '1234';
		$nilai=0;
		$jumlah= 4;
		$id = $_POST['id'];
		$id_k_ujian = $_POST['id_k_ujian'];
		$waktu = $_POST['waktu'];
		$jenis = $_POST['jenis'];
		$this->ListUjianSiswaModel->insert_detail($id,$nis,$nilai);
		$id_d_ujian = $this->db->insert_id();
		$result = $this->ListUjianSiswaModel->insert_soal_random($id_d_ujian,$id_k_ujian,$jumlah,$waktu);
		echo json_encode($result);
	}
}