<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('ion_auth');
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('MapelModel');
		$this->load->database();
		$this->load->model('IdentityModel');
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
		$kelompok_mapel = $this->MapelModel->get_kelompok_mapel();
		$data['kelompok_mapel'] = $kelompok_mapel;
		$jurusan = $this->MapelModel->get_jurusan();
		$data['jurusan'] = $jurusan;
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php',$data);
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('admin/mapel/view.php', $data);
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('admin/mapel/script.php');
	}
	public function get_all()
	{
		if(!empty($_GET['jurusan']) && empty($_GET['kelompok_mapel']) ){
			$id_jurusan= $_GET['jurusan'];
			$id_k_mapel= null;
			$mapel = $this->MapelModel->get_all($id_jurusan,$id_k_mapel);
		}else if(empty($_GET['jurusan']) && !empty($_GET['kelompok_mapel']) ){
			$id_jurusan= null;
			$id_k_mapel= $_GET['kelompok_mapel'];
			$mapel = $this->MapelModel->get_all($id_jurusan,$id_k_mapel);
		}else if(!empty($_GET['jurusan']) && !empty($_GET['kelompok_mapel']) ){
			$id_jurusan= $_GET['jurusan'];
			$id_k_mapel= $_GET['kelompok_mapel'];
			$mapel = $this->MapelModel->get_all($id_jurusan,$id_k_mapel);
		}else if(empty($_GET['jurusan']) && empty($_GET['kelompok_mapel']) ){
			$id_jurusan= null;
			$id_k_mapel= null;
			$mapel = $this->MapelModel->get_all($id_jurusan,$id_k_mapel);
		}else if($_GET['jurusan']==0 && $_GET['kelompok_mapel']==0 ){
			$id_jurusan= null;
			$id_k_mapel= null;
			$mapel = $this->MapelModel->get_all($id_jurusan,$id_k_mapel);
		}
		$data['mapel'] = $mapel;
		$kelompok_mapel = $this->MapelModel->get_kelompok_mapel();
		$data['kelompok_mapel'] = $kelompok_mapel;
		$jurusan = $this->MapelModel->get_jurusan();
		$data['jurusan'] = $jurusan;
		$this->load->view('admin/mapel/data_mapel',$data);
	}
	public function crud($mode)
	{
		if ($mode == 'insert') {
			if ($this->input->is_ajax_request()) {
				$data = array(
					'kode_mapel' => $this->input->post('kode_mapel'),
					'mapel' => $this->input->post('mapel'),
                    'id_k_mapel' => $this->input->post('kelompok_mapel'),
                    'kode_jurusan' => $this->input->post('jurusan')
				);
				$result = $this->MapelModel->insert($data);
				echo json_encode($result);
			}
		}
		else if ($mode == 'update') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('kode_mapel');
				if($this->input->post('kode_mapel')==null){
					$data = array(
						'mapel' => $this->input->post('mapel'),
						'id_k_mapel' => $this->input->post('kelompok_mapel'),
						'kode_jurusan' => $this->input->post('jurusan')
					);
				}else{
					$data = array(
						'kode_mapel' => $this->input->post('kode_mapel'),
						'mapel' => $this->input->post('mapel'),
						'id_k_mapel' => $this->input->post('kelompok_mapel'),
						'kode_jurusan' => $this->input->post('jurusan')
					);
				}
				$result = $this->MapelModel->update($data, $id);
				echo json_encode($result);
			}
		}
		else if ($mode == 'delete') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$result = $this->MapelModel->delete($id);
				echo json_encode($result);
			}
		}
	}
	public function get_by_id() {
		$id = $this->input->get('id');
		$data = $this->MapelModel->get_by_id($id);
		echo json_encode($data);
	}
	public function cek_relasi(){
		$id = $_GET['id'];
		$this->MapelModel-> isMapelRelation($id);
	}
}