<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper('url');
		$this->load->library('ssp');
		$this->load->helper('form');
		$this->load->model('AgamaModel');
		$this->load->database();
	}
	public function index()
	{
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php');
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('admin/materi/view.php');
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('admin/materi/script.php');
	}
	
}