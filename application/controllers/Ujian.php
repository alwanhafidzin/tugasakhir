<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ujian extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('ion_auth');
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('KategoriSoalModel');
		$this->load->model('UjianModel');
		$this->load->model('IdentityModel');
		$this->load->database();
		if (!$this->ion_auth->logged_in()){
			redirect('auth/login');
		}
	}
	public function index()
	{
		$data['ujian'] = $this->UjianModel->get_ujian_by_id($id);
        $this->load->view('templates/top-nav/header.php');
		$this->load->view('siswa/ujian/view.php');
		$this->load->view('templates/top-nav/footer.php');
		$this->load->view('guru/kategori_soal/script.php');
	}
	public function token($id)
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
		$data['kelas_siswa'] = $this->UjianModel->get_kelas_ujian($id,$username);
		$data['ujian'] = $this->UjianModel->get_ujian_by_id($id);
        $this->load->view('templates/top-nav/header.php',$data);
		$this->load->view('siswa/ujian/view.php',$data);
		$this->load->view('templates/top-nav/footer.php');
		$this->load->view('siswa/ujian/script_token.php');
	}
	public function hasil($id)
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
		$data['ujian'] = $this->UjianModel->get_hasil_ujian($id);
		$data['nilai_akhir'] = $this->UjianModel->get_detail_soal_nilai($id);
		$data['top5'] = $this->UjianModel->five_leaderboard_siswa($id);
		$data['leaderboard'] = $this->UjianModel->get_leaderboard($id);
        $this->load->view('templates/top-nav/header.php',$data);
		$this->load->view('siswa/ujian/ujian_hasil.php',$data);
		$this->load->view('templates/top-nav/footer.php');
		$this->load->view('siswa/ujian/script_hasil.php',$data);
	}
	public function mulai_ujian($id){
		$data['ujian'] = $this->UjianModel->get_ujian_detail_by_id($id);
        $this->load->view('templates/top-nav/header.php');
		$this->load->view('siswa/ujian/mulai_ujian.php',$data);
		$this->load->view('templates/top-nav/footer.php');
		$this->load->view('siswa/ujian/script.php',$data);
	}
	public function get_soal()
	{
		$id= $_GET['id'];
		$data['soal'] = $this->UjianModel->get_soal($id);
		$this->load->view('siswa/ujian/data_soal',$data);
	}
	public function get_list_soal(){
		$id= $_GET['id'];
		$data['list_soal'] = $this->UjianModel->get_list_soal_by_id($id);
		$this->load->view('siswa/ujian/data_menu_soal',$data);
	}
	public function get_soal_button()
	{
		$id= $_GET['id'];
		$offset = $_GET['off'];
		$data['soal'] = $this->UjianModel->get_soal_button($id,$offset);
		$this->load->view('siswa/ujian/data_soal',$data);
	}
	
	public function crud($mode)
	{
		if ($mode == 'update_jawaban') {
			if ($this->input->is_ajax_request()) {
				$id = $_GET['id'];
				$jawaban = $_GET['jawaban'];
				$result = $this->UjianModel->update_jawaban($jawaban, $id);
				echo json_encode($result);
			}
		}
		else if ($mode == 'update_ragu') {
			if ($this->input->is_ajax_request()) {
				$id = $_POST['id'];
				$data = array(
					'ragu' => $_POST['ragu']
				);
				$result = $this->UjianModel->update_ragu($data, $id);
				echo json_encode($result);
			}
		}
	}
	public function akhiri_ujian(){
		$id_ujian= $_POST['id'];
		$result = $this->UjianModel->akhiri_ujian($id_ujian);
		echo json_encode($result);
	}
	public function cek_waktu(){
		$id = $_GET['id'];
		$this->UjianModel->cek_waktu($id);
	}
	public function cek_token(){
		$token = $_GET['token'];
		$id = $_GET['id'];
		$this->UjianModel->cek_token($token,$id);
	}
	public function cek_ujian_detail_exist(){
		$nis = $_GET['nis'];
		$id = $_GET['id'];
		$exists = $this->UjianModel->cek_ujian_detail_exist($id,$nis);
		if($exists->num_rows() > 0){
			// echo json_encode($exists);
			echo 'exists';
		}else{
		echo 'create';
		}
	}
	public function buat_soal(){
		$nis = $_GET['nis'];
		$id = $_POST['id'];
		$result = $this->UjianModel->insert_soal_random($id_d_ujian,$id_k_ujian,$jumlah,$waktu);
		echo json_encode($result);
	}
	public function insert_soal(){
		$id= $_POST['id'];
		$nis= $_POST['nis'];
		$result = $this->UjianModel->insert_soal_ujian($id,$nis);
		echo json_encode($result);
	}
	public function cek_status_ujian(){
		$id= $_GET['id'];
		$nis= $_GET['nis'];
		$result = $this->UjianModel->cek_status_ujian($id,$nis);
	}
	public function get_id_detail_ujian(){
		$id= $_GET['id'];
		$nis= $_GET['nis'];
		$result = $this->UjianModel->get_id_detail_ujian($id,$nis);
		echo json_encode($result);
	}
}