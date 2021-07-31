<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileGuru extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->library('ion_auth');
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('ProfileModel');
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
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php',$data);
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('guru/profile/view.php');
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('guru/profile/script.php',$data);
	}
}