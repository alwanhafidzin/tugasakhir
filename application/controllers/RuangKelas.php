<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RuangKelas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('ion_auth');
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('RuangKelasModel');
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
			$data['identity'] = $this->IdentityModel->get_admin($username);
		}else if($id_user==2){
			$data['identity'] = $this->IdentityModel->get_guru($username);
		}else if($id_user==3){
			$data['identity'] = $this->IdentityModel->get_siswa($username);
		}
		$tingkat_kelas = $this->RuangKelasModel->get_tingkat_kelas();
		$data['tingkat_kelas'] = $tingkat_kelas;
		$jurusan = $this->RuangKelasModel->get_jurusan();
		$data['jurusan'] = $jurusan;
		$tahun_aktif = $this->RuangKelasModel->get_tahun_aktif();
		$data['tahun_aktif'] = $tahun_aktif;
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php',$data);
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('admin/ruangkelas/view.php', $data);
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('admin/ruangkelas/script.php');
	}
	public function get_all()
	{
		if(!empty($_GET['jurusan']) && empty($_GET['kelas']) ){
			$id_jurusan= $_GET['jurusan'];
			$id_kelas= null;
			$ruangkelas = $this->RuangKelasModel->get_all($id_jurusan,$id_kelas);
		}else if(empty($_GET['jurusan']) && !empty($_GET['kelas']) ){
			$id_jurusan= null;
			$id_kelas= $_GET['kelas'];
			$ruangkelas = $this->RuangKelasModel->get_all($id_jurusan,$id_kelas);
		}else if(!empty($_GET['jurusan']) && !empty($_GET['kelas']) ){
			$id_jurusan= $_GET['jurusan'];
			$id_kelas= $_GET['kelas'];
			$ruangkelas = $this->RuangKelasModel->get_all($id_jurusan,$id_kelas);
		}else if(empty($_GET['jurusan']) && empty($_GET['kelas']) ){
			$id_jurusan= null;
			$id_kelas= null;
			$ruangkelas = $this->RuangKelasModel->get_all($id_jurusan,$id_kelas);
		}else if($_GET['jurusan']==0 && $_GET['kelas']==0 ){
			$id_jurusan= null;
			$id_kelas= null;
			$ruangkelas = $this->RuangKelasModel->get_all($id_jurusan,$id_kelas);
		}
		$data['ruangkelas'] = $ruangkelas;
		$tingkat_kelas = $this->RuangKelasModel->get_tingkat_kelas();
		$data['tingkat_kelas'] = $tingkat_kelas;
		$jurusan = $this->RuangKelasModel->get_jurusan();
		$data['jurusan'] = $jurusan;
		$ruangan = $this->RuangKelasModel->get_ruangan();
		$data['ruangan'] = $ruangan;
		$ruangan2 = $this->RuangKelasModel->get_ruangan2();
		$data['ruangan2'] = $ruangan2;
		$this->load->view('admin/ruangkelas/data_ruangkelas',$data);
	}
	public function crud($mode)
	{
		if ($mode == 'update') {
			if ($this->input->is_ajax_request()) {
				$id = $_GET['id'];
				$data = array(
					'kode_ruangan' => $_GET['kode_ruangan']
				);
				$result = $this->RuangKelasModel->update($data, $id);
				echo json_encode($result);
			}
		}
	}
}