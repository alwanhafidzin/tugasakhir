<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TahunAkademik extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper('url');
		$this->load->library('ssp');
		$this->load->helper('form');
		$this->load->model('TahunAkademikModel');
		$this->load->model('WaliKelasModel');
		$this->load->model('RuangKelasModel');
		$this->load->model('IdentityModel');
		$this->load->model('DataLainModel');
		$this->load->database();
		$this->load->library('ion_auth');
		if (!$this->ion_auth->logged_in()){
			redirect('auth/login');
		}
	}
	public function index()
	{
		$user = $this->ion_auth->user()->row();
		$tahun_aktif = $this->WaliKelasModel->get_tahun_aktif();
		$data['tahun_aktif'] = $tahun_aktif;
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
		$this->load->view('admin/tahun_akademik/view.php');
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('admin/tahun_akademik/script.php');
	}
	public function get_all()
	{
		$tahunakademik = $this->TahunAkademikModel->get_all();
		$data['tahunakademik'] = $tahunakademik;
		$this->load->view('admin/tahun_akademik/data_tahun_akademik',$data);
	}
	public function crud($mode)
	{
		if ($mode == 'insert') {
			if ($this->input->is_ajax_request()) {
				$data = array(
					'tahun_akademik' => $this->input->post('tahunakademik'),
					'is_aktif' => 'N'
				);
				$result =$this->TahunAkademikModel->insert($data);
				$id_tahun_akademik = $this->db->insert_id();
				$this->WaliKelasModel->insert_walikelas($id_tahun_akademik);
				$this->RuangKelasModel->insert_ruangkelas($id_tahun_akademik);
				$this->DataLainModel->insert_kkm($id_tahun_akademik);
				$this->DataLainModel->insert_hari_masuk($id_tahun_akademik);
				echo json_encode($result);
			}
		}
		else if ($mode == 'update') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				if($this->input->post('semester')==null){
					$data = array(
						'tahun_akademik' => $this->input->post('tahunakademik')
					);
				}else{
					$data = array(
						'tahun_akademik' => $this->input->post('tahunakademik'),
						'semester' => $this->input->post('semester')
					);
				}
				$result = $this->TahunAkademikModel->update($data, $id);
				echo json_encode($result);
			}
		}
	}
	public function get_by_id() {
		$id = $this->input->get('id');
		$data = $this->TahunAkademikModel->get_by_id($id);
		echo json_encode($data);
	}
	public function set_aktif()
		{
			$id_tahunakademik = $this->input->post('id');
			$result = $this->TahunAkademikModel->set_aktif($id_tahunakademik);
			echo json_encode($result);
		}
}