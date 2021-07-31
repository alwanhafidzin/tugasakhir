<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataLain extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('ion_auth');
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('WaliKelasModel');
		$this->load->model('DataLainModel');
		if (!$this->ion_auth->logged_in()){
			redirect('auth/login');
		}
		$this->load->model('IdentityModel');
		$this->load->database();
	}
	public function index()
	{
		$user = $this->ion_auth->user()->row();
		$user_id =$user->id;
		$username = $user->username;
		$tahun_aktif = $this->WaliKelasModel->get_tahun_aktif();
		$data['tahun_aktif'] = $tahun_aktif;
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
		$this->load->view('admin/data_lain/view.php',$data);
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('admin/data_lain/script.php');
	}
	public function get_all_hari_masuk_detail()
	{
		$data['hari_masuk'] = $this->DataLainModel->get_hari_masuk_detail();
		$this->load->view('admin/data_lain/data_h_masuk',$data);
	}	
    public function get_all_kkm()
	{
		$data['kkm'] = $this->DataLainModel->get_kkm();
		$this->load->view('admin/data_lain/data_kkm',$data);
	}
	public function crud($mode)
	{
	    if ($mode == 'update_kkm') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$data = array(
					'kkm' => $this->input->post('kkm')
				);
				$result = $this->DataLainModel->update($data, $id);
				echo json_encode($result);
			}
		}
        if ($mode == 'update_hari_masuk') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$result = $this->DataLainModel->update_status_hari($id);
				echo json_encode($result);
			}
		}
	}
	public function get_by_id_kkm() {
		$id = $this->input->get('id');
		$data = $this->DataLainModel->get_by_id_kkm($id);
		echo json_encode($data);
	}
}