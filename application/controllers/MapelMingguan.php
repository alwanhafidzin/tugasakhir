<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MapelMingguan extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('MapelPermingguModel');
		$this->load->model('WaliKelasModel');
		$this->load->model('KelasModel');
		$this->load->library('ion_auth');
		$this->load->database();
		if (!$this->ion_auth->logged_in()){
			redirect('auth/login');
		}
		$this->load->model('IdentityModel');
	}
	public function index()
	{
		$user = $this->ion_auth->user()->row();
		$nip =$user->username;
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
		$jurusan = $this->MapelPermingguModel->get_jurusan();
		$data['jurusan'] = $jurusan;
		$mapel = $this->MapelPermingguModel->get_mapel();
		$data['mapel'] = $mapel;
		$tahun_aktif = $this->WaliKelasModel->get_tahun_aktif();
		$data['tahun_aktif'] = $tahun_aktif;
		$jurusan = $this->MapelPermingguModel->get_jurusan();
		$data['jurusan'] = $jurusan;
		$tingkat_kelas = $this->KelasModel->get_tingkat_kelas();
		$data['tingkat_kelas'] = $tingkat_kelas;
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php',$data);
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('admin/mapelmingguan/view.php', $data);
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('admin/mapelmingguan/script.php');
	}
	public function get_all()
	{
		if(!empty($_GET['jurusan']) && empty($_GET['kelas']) ){
			$id_jurusan= $_GET['jurusan'];
			$id_kelas= null;
			$mapelmingguan = $this->MapelPermingguModel->get_all($id_jurusan,$id_kelas);
		}else if(empty($_GET['jurusan']) && !empty($_GET['kelas']) ){
			$id_jurusan= null;
			$id_kelas= $_GET['kelas'];
			$mapelmingguan = $this->MapelPermingguModel->get_all($id_jurusan,$id_kelas);
		}else if(!empty($_GET['jurusan']) && !empty($_GET['kelas']) ){
			$id_jurusan= $_GET['jurusan'];
			$id_kelas= $_GET['kelas'];
			$mapelmingguan = $this->MapelPermingguModel->get_all($id_jurusan,$id_kelas);
		}else if(empty($_GET['jurusan']) && empty($_GET['kelas']) ){
			$id_jurusan= null;
			$id_kelas= null;
			$mapelmingguan = $this->MapelPermingguModel->get_all($id_jurusan,$id_kelas);
		}else if($_GET['jurusan']==0 && $_GET['kelas']==0 ){
			$id_jurusan= null;
			$id_kelas= null;
			$mapelmingguan = $this->MapelPermingguModel->get_all($id_jurusan,$id_kelas);
		}
		$data['mapelmingguan'] = $mapelmingguan;
		$mapel = $this->MapelPermingguModel->get_mapel();
		$data['mapel'] = $mapel;
		$jurusan = $this->MapelPermingguModel->get_jurusan();
		$data['jurusan'] = $jurusan;
		$tingkat_kelas = $this->KelasModel->get_tingkat_kelas();
		$data['tingkat_kelas'] = $tingkat_kelas;
		$tahun_aktif = $this->WaliKelasModel->get_tahun_aktif();
		$data['tahun_aktif'] = $tahun_aktif;
		$this->load->view('admin/mapelmingguan/data_mapelmingguan',$data);
	}
	public function crud($mode)
	{
		if ($mode == 'insert') {
			if ($this->input->is_ajax_request()) {
				$id_tahun_akademik = $this->input->post('tahunakademik');
				$semester = $this->input->post('semester');
				$jumlah = $this->input->post('jumlah');
				$kode_mapel = $this->input->post('mapel');
				$kode_jurusan = $this->input->post('jurusan');
				$kode_tingkat = $this->input->post('tingkatkelas');
				$this->MapelPermingguModel->insert($id_tahun_akademik,$semester,$jumlah,$kode_mapel,$kode_tingkat);
				$id_mapel_perminggu = $this->db->insert_id();
				$result = $this->MapelPermingguModel->insert_jadwal($jumlah,$id_mapel_perminggu,$kode_jurusan,$kode_tingkat);
				echo json_encode($result);
			}
		}
		else if ($mode == 'update') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$id_mapel_perminggu = $this->input->post('id');
				$id_tahun_akademik = $this->input->post('tahunakademik');
				$semester = $this->input->post('semester');
				$jumlah = $this->input->post('jumlah');
				$kode_mapel = $this->input->post('mapel');
				$kode_jurusan = $this->input->post('jurusan');
				$kode_tingkat = $this->input->post('tingkatkelas');
				$result = $this->MapelPermingguModel->delete_jadwal($id);
				$result = $this->MapelPermingguModel->insert_jadwal($jumlah,$id_mapel_perminggu,$kode_jurusan,$kode_tingkat);
				$result = $this->MapelPermingguModel->update($id_tahun_akademik,$semester,$jumlah,$kode_mapel,$kode_tingkat, $id);
				echo json_encode($result);
			}
		}
		else if ($mode == 'delete') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$result = $this->MapelPermingguModel->delete_jadwal($id);
				$result = $this->MapelPermingguModel->delete($id);
				echo json_encode($result);
			}
		}
	}
	public function get_by_id() {
		$id = $this->input->get('id');
		$data = $this->MapelPermingguModel->get_by_id($id);
		echo json_encode($data);
	}
    public function get_detail_mapel() {
        $id_mapel = $_GET['id_mapel'];
        $data = $this->MapelPermingguModel->get_detail_mapel($id_mapel);
        echo json_encode($data);
    }
	public function get_mapel_jurusan() {
        $id_jurusan = $_GET['id_jurusan'];
        $data = $this->MapelPermingguModel->get_mapel_jurusan($id_jurusan);
    }
}