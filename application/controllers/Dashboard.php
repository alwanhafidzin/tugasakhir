<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper('url');
		$this->load->database();
		// if (!$this->ion_auth->logged_in()){
		// 	redirect('auth');
		// }
		// $this->load->model('Dashboard_model', 'dashboard');
		// $this->user = $this->ion_auth->user()->row();
	}
	public function index()
	{
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php');
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('admin/dashboard/view.php');
		$this->load->view('templates/dashboard/footer.php');
		// $this->load->view('templates/dashboard.php');
	}
}