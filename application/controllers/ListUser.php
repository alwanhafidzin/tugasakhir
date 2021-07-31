<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListUser extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->library('ion_auth');
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('AkunModel');
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
		$this->load->view('admin/list_user/view.php');
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('admin/list_user/script.php');
	}
	public function get_all()
	{
		if(!empty($_GET['tipe']) && empty($_GET['status']) ){
			$tipe= $_GET['tipe'];
			$status= null;
		}else if(empty($_GET['tipe']) && !empty($_GET['status']) ){
			$tipe= null;
			$status= $_GET['status'];
		}else if(!empty($_GET['tipe']) && !empty($_GET['status']) ){
			$tipe= $_GET['tipe'];
			$status= $_GET['status'];
		}else if(empty($_GET['tipe']) && empty($_GET['status']) ){
			$tipe= null;
			$status= null;
		}else if($_GET['tipe']==0 && !empty($_GET['status']) ){
			$tipe= null;
			$status= $_GET['status'];
		}else if($_GET['tipe']==0 && empty($_GET['status']) ){
			$tipe= null;
			$status= null;
		}
		$buat_akun = $this->AkunModel->get_all($tipe,$status);
		$data['buat_akun'] = $buat_akun;
		$this->load->view('admin/list_user/data_list',$data);
	}
	public function crud($mode)
	{
	   if ($mode == 'update_status') {
			if ($this->input->is_ajax_request()) {
				$arr = $_POST['arr'];
				$ids = implode("','", $arr);
				$result = $this->AkunModel->update_status($ids);
				echo json_encode($result);
			}
		}
	}
}