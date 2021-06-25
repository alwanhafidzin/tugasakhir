<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListUjianSiswa extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('ion_auth');
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('ListUjianSiswaModel');
		$this->load->model('IdentityModel');
		$this->load->database();
		if (!$this->ion_auth->logged_in()){
			redirect('auth/login');
		}
	}
	public function index()
	{
		$user = $this->ion_auth->user()->row();
		$user_id =$user->id;
		$username = $user->username;
        $id_user =$this->ion_auth->get_users_groups($user_id)->row()->id;
		if($id_user==1) {
			$data['identity'] = $this->IdentityModel->get_admin($user_id);
		}else if($id_user==2){
			$data['identity'] = $this->IdentityModel->get_guru($username);
		}else if($id_user==3){
			$data['identity'] = $this->IdentityModel->get_siswa($username);
		}
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php',$data);
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('siswa/list_ujian/view.php');
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('siswa/list_ujian/script.php');
	}
	public function get_all()
	{
		$user = $this->ion_auth->user()->row();
		$username = $user->username;
		$list_ujian = $this->ListUjianSiswaModel->get_all($username);
		$data['list_ujian'] = $list_ujian;
		$this->load->view('siswa/list_ujian/data_list',$data);
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