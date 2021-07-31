<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('ion_auth');
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('RuanganModel');
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
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php',$data);
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('admin/ruangan/view.php');
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('admin/ruangan/script.php');
	}
	public function get_all()
	{
		$ruangan = $this->RuanganModel->get_all();
		$data['ruangan'] = $ruangan;
		$this->load->view('admin/ruangan/data_ruangan',$data);
	}
	public function crud($mode)
	{
		if ($mode == 'insert') {
			if ($this->input->is_ajax_request()) {
				$data = array(
					'kode_ruangan' => $this->input->post('kode_ruangan'),
					'ruangan' => $this->input->post('ruangan')
				);
				$result = $this->RuanganModel->insert($data);
				echo json_encode($result);
			}
		}
		else if ($mode == 'update') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				if($this->input->post('kode_ruangan')==null){
					$data = array(
						'ruangan' => $this->input->post('ruangan')
					);
				}else{
					$data = array(
						'kode_ruangan' => $this->input->post('kode_ruangan'),
						'ruangan' => $this->input->post('ruangan')
					);
				}
				$result = $this->RuanganModel->update($data, $id);
				echo json_encode($result);
			}
		}
		else if ($mode == 'delete') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$result = $this->RuanganModel->delete($id);
				echo json_encode($result);
			}
		}
	}
	public function get_by_id() {
		$id = $this->input->get('id');
		$data = $this->RuanganModel->get_by_id($id);
		echo json_encode($data);
	}
	public function cek_relasi(){
		$id = $_GET['id'];
		$this->RuanganModel-> isRuanganRelation($id);
	}
}