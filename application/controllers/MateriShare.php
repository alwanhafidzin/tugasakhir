<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MateriShare extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('ion_auth');
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('MateriModel');
		$this->load->model('AbsensiPermapelModel');
		$this->load->model('WaliKelasModel');
		$this->load->model('IdentityModel');
		$this->load->database();
		if (!$this->ion_auth->logged_in()){
			redirect('auth/login');
		}
	}
	public function index()
	{
		$user = $this->ion_auth->user()->row();
		$nip =$user->username;
		$tahun_aktif = $this->WaliKelasModel->get_tahun_aktif();
		$data['tahun_aktif'] = $tahun_aktif;
		$tahun_akademik_share = $this->MateriModel->get_tahun_akademik_share($nip);
		$data['tahun_akademik'] = $tahun_akademik_share;
		$user_id =$user->id;
		$username = $user->username;
        $id_user =$this->ion_auth->get_users_groups($user_id)->row()->id;
		if($id_user==1) {
			$data['identity'] = $this->IdentityModel->get_admin($user_id);
		}else if($id_user==2){
			$data['identity'] = $this->IdentityModel->get_guru($username);
		}else if($id_user==3){
			$data['identity'] = $this->IdentityModel->get_siswa($username);
		}
		$data['jadwal_guru_absen'] = $this->AbsensiPermapelModel->get_guru_jadwal_pertahunakademik($nip);
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php',$data);
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('guru/materi_share/view.php',$data);
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('guru/materi_share/script.php');
	}
	public function get_all()
	{
		$user = $this->ion_auth->user()->row();
		$nip =$user->username;
		if(!empty($_GET['id_t_akademik'])){
			$id_t_akademik= $_GET['id_t_akademik'];
			if(!empty($_GET['semester']) && empty($_GET['kode_mapel']) && empty($_GET['kode_kelas']) ){
				$semester= $_GET['semester'];
				$kode_mapel = null;
				$kode_kelas = null;
			}else if(empty($_GET['semester']) && !empty($_GET['kode_mapel']) && empty($_GET['kode_kelas']) ){
				$semester= null;
				$kode_mapel = $_GET['kode_mapel'];
				$kode_kelas = null;
			}else if(empty($_GET['semester']) && empty($_GET['kode_mapel']) && !empty($_GET['kode_kelas']) ){
				$semester= null;
				$kode_mapel = null;
				$kode_kelas =  $_GET['kode_kelas'];
			}else if(!empty($_GET['semester']) && !empty($_GET['kode_mapel']) && !empty($_GET['kode_kelas']) ){
				$semester= $_GET['semester'];
				$kode_mapel = $_GET['kode_mapel'];
				$kode_kelas =  $_GET['kode_kelas'];
			}else if(!empty($_GET['semester']) && !empty($_GET['kode_mapel']) && empty($_GET['kode_kelas']) ){
				$semester= $_GET['semester'];
				$kode_mapel = $_GET['kode_mapel'];
				$kode_kelas = null;
			}else if(!empty($_GET['semester']) && empty($_GET['kode_mapel']) && !empty($_GET['kode_kelas']) ){
				$semester= $_GET['semester'];
				$kode_mapel = null;
				$kode_kelas = $_GET['kode_kelas'];
			}else if(empty($_GET['semester']) && !empty($_GET['kode_mapel']) && !empty($_GET['kode_kelas']) ){
				$semester= null;
				$kode_mapel = $_GET['kode_mapel'];
				$kode_kelas =  $_GET['kode_kelas'];
			}else if($_GET['semester']==0 && $_GET['kode_mapel']==0 && $_GET['kode_kelas']==0 ){
				$semester= null;
				$kode_mapel = null;
				$kode_kelas =  null;
			}else if($_GET['semester']==0 && $_GET['kode_mapel']==0 && !empty($_GET['kode_kelas']) ){
				$semester= null;
				$kode_mapel = null;
				$kode_kelas = $_GET['kode_kelas'];
			}else if($_GET['semester']==0 && !empty($_GET['kode_mapel']) && $_GET['kode_kelas']==0 ){
				$semester= null;
				$kode_mapel = $_GET['kode_mapel'];
				$kode_kelas =  null;
			}else if(!empty($_GET['semester']) && $_GET['kode_mapel']==0 && $_GET['kode_kelas']==0 ){
				$semester= $_GET['semester'];
				$kode_mapel = null;
				$kode_kelas =  null;
			}else if($_GET['semester']==0 && $_GET['kode_mapel']==0 && !empty($_GET['kode_kelas']) ){
				$semester= null;
				$kode_mapel = null;
				$kode_kelas =  $_GET['kode_kelas'];
			}else if($_GET['semester']==0 && !empty($_GET['kode_mapel']) && $_GET['kode_kelas']==0 ){
				$semester= null;
				$kode_mapel =  $_GET['kode_mapel'];
				$kode_kelas = null;
			}else if(!empty($_GET['semester']) && !empty($_GET['kode_mapel']) && $_GET['kode_kelas']==0 ){
				$semester= $_GET['semester'];
				$kode_mapel = null;
				$kode_kelas =  null;
			}else if($_GET['semester']==0 && !empty($_GET['kode_mapel']) && !empty($_GET['kode_kelas']) ){
				$semester= $_GET['semester'];
				$kode_mapel = null;
				$kode_kelas =  null;
			}else if(!empty($_GET['semester']) && $_GET['kode_mapel']==0 && !empty($_GET['kode_kelas']) ){
				$semester= $_GET['semester'];
				$kode_mapel = null;
				$kode_kelas =  null;
			}else if($_GET['semester']==0 && empty($_GET['kode_mapel']) && empty($_GET['kode_kelas']) ){
				$semester= $_GET['semester'];
				$kode_mapel = null;
				$kode_kelas =  null;
			}
		}else if(empty($_GET['id_t_akademik'])){
			$id_t_akademik= null;
			if(!empty($_GET['semester']) && empty($_GET['kode_mapel']) && empty($_GET['kode_kelas']) ){
				$semester= $_GET['semester'];
				$kode_mapel = null;
				$kode_kelas = null;
			}else if(empty($_GET['semester']) && !empty($_GET['kode_mapel']) && empty($_GET['kode_kelas']) ){
				$semester= null;
				$kode_mapel = $_GET['kode_mapel'];
				$kode_kelas = null;
			}else if(empty($_GET['semester']) && empty($_GET['kode_mapel']) && !empty($_GET['kode_kelas']) ){
				$semester= null;
				$kode_mapel = null;
				$kode_kelas =  $_GET['kode_kelas'];
			}else if(!empty($_GET['semester']) && !empty($_GET['kode_mapel']) && !empty($_GET['kode_kelas']) ){
				$semester= $_GET['semester'];
				$kode_mapel = $_GET['kode_mapel'];
				$kode_kelas =  $_GET['kode_kelas'];
			}else if(!empty($_GET['semester']) && !empty($_GET['kode_mapel']) && empty($_GET['kode_kelas']) ){
				$semester= $_GET['semester'];
				$kode_mapel = $_GET['kode_mapel'];
				$kode_kelas = null;
			}else if(!empty($_GET['semester']) && empty($_GET['kode_mapel']) && !empty($_GET['kode_kelas']) ){
				$semester= $_GET['semester'];
				$kode_mapel = null;
				$kode_kelas = $_GET['kode_kelas'];
			}else if(empty($_GET['semester']) && !empty($_GET['kode_mapel']) && !empty($_GET['kode_kelas']) ){
				$semester= null;
				$kode_mapel = $_GET['kode_mapel'];
				$kode_kelas =  $_GET['kode_kelas'];
			}else if($_GET['semester']==0 && $_GET['kode_mapel']==0 && $_GET['kode_kelas']==0 ){
				$semester= null;
				$kode_mapel = null;
				$kode_kelas =  null;
			}else if($_GET['semester']==0 && $_GET['kode_mapel']==0 && !empty($_GET['kode_kelas']) ){
				$semester= null;
				$kode_mapel = null;
				$kode_kelas = $_GET['kode_kelas'];
			}else if($_GET['semester']==0 && !empty($_GET['kode_mapel']) && $_GET['kode_kelas']==0 ){
				$semester= null;
				$kode_mapel = $_GET['kode_mapel'];
				$kode_kelas =  null;
			}else if(!empty($_GET['semester']) && $_GET['kode_mapel']==0 && $_GET['kode_kelas']==0 ){
				$semester= $_GET['semester'];
				$kode_mapel = null;
				$kode_kelas =  null;
			}else if($_GET['semester']==0 && $_GET['kode_mapel']==0 && !empty($_GET['kode_kelas']) ){
				$semester= null;
				$kode_mapel = null;
				$kode_kelas =  $_GET['kode_kelas'];
			}else if($_GET['semester']==0 && !empty($_GET['kode_mapel']) && $_GET['kode_kelas']==0 ){
				$semester= null;
				$kode_mapel =  $_GET['kode_mapel'];
				$kode_kelas = null;
			}else if(!empty($_GET['semester']) && !empty($_GET['kode_mapel']) && $_GET['kode_kelas']==0 ){
				$semester= $_GET['semester'];
				$kode_mapel = null;
				$kode_kelas =  null;
			}else if($_GET['semester']==0 && !empty($_GET['kode_mapel']) && !empty($_GET['kode_kelas']) ){
				$semester= $_GET['semester'];
				$kode_mapel = null;
				$kode_kelas =  null;
			}else if(!empty($_GET['semester']) && $_GET['kode_mapel']==0 && !empty($_GET['kode_kelas']) ){
				$semester= $_GET['semester'];
				$kode_mapel = null;
				$kode_kelas =  null;
			}else if($_GET['semester']==0 && empty($_GET['kode_mapel']) && empty($_GET['kode_kelas']) ){
				$semester= $_GET['semester'];
				$kode_mapel = null;
				$kode_kelas =  null;
			}
		}else if($_GET['id_t_akademik']==0){
			$id_t_akademik= null;
			if(!empty($_GET['semester']) && empty($_GET['kode_mapel']) && empty($_GET['kode_kelas']) ){
				$semester= $_GET['semester'];
				$kode_mapel = null;
				$kode_kelas = null;
			}else if(empty($_GET['semester']) && !empty($_GET['kode_mapel']) && empty($_GET['kode_kelas']) ){
				$semester= null;
				$kode_mapel = $_GET['kode_mapel'];
				$kode_kelas = null;
			}else if(empty($_GET['semester']) && empty($_GET['kode_mapel']) && !empty($_GET['kode_kelas']) ){
				$semester= null;
				$kode_mapel = null;
				$kode_kelas =  $_GET['kode_kelas'];
			}else if(!empty($_GET['semester']) && !empty($_GET['kode_mapel']) && !empty($_GET['kode_kelas']) ){
				$semester= $_GET['semester'];
				$kode_mapel = $_GET['kode_mapel'];
				$kode_kelas =  $_GET['kode_kelas'];
			}else if(!empty($_GET['semester']) && !empty($_GET['kode_mapel']) && empty($_GET['kode_kelas']) ){
				$semester= $_GET['semester'];
				$kode_mapel = $_GET['kode_mapel'];
				$kode_kelas = null;
			}else if(!empty($_GET['semester']) && empty($_GET['kode_mapel']) && !empty($_GET['kode_kelas']) ){
				$semester= $_GET['semester'];
				$kode_mapel = null;
				$kode_kelas = $_GET['kode_kelas'];
			}else if(empty($_GET['semester']) && !empty($_GET['kode_mapel']) && !empty($_GET['kode_kelas']) ){
				$semester= null;
				$kode_mapel = $_GET['kode_mapel'];
				$kode_kelas =  $_GET['kode_kelas'];
			}else if($_GET['semester']==0 && $_GET['kode_mapel']==0 && $_GET['kode_kelas']==0 ){
				$semester= null;
				$kode_mapel = null;
				$kode_kelas =  null;
			}else if($_GET['semester']==0 && $_GET['kode_mapel']==0 && !empty($_GET['kode_kelas']) ){
				$semester= null;
				$kode_mapel = null;
				$kode_kelas = $_GET['kode_kelas'];
			}else if($_GET['semester']==0 && !empty($_GET['kode_mapel']) && $_GET['kode_kelas']==0 ){
				$semester= null;
				$kode_mapel = $_GET['kode_mapel'];
				$kode_kelas =  null;
			}else if(!empty($_GET['semester']) && $_GET['kode_mapel']==0 && $_GET['kode_kelas']==0 ){
				$semester= $_GET['semester'];
				$kode_mapel = null;
				$kode_kelas =  null;
			}else if($_GET['semester']==0 && $_GET['kode_mapel']==0 && !empty($_GET['kode_kelas']) ){
				$semester= null;
				$kode_mapel = null;
				$kode_kelas =  $_GET['kode_kelas'];
			}else if($_GET['semester']==0 && !empty($_GET['kode_mapel']) && $_GET['kode_kelas']==0 ){
				$semester= null;
				$kode_mapel =  $_GET['kode_mapel'];
				$kode_kelas = null;
			}else if(!empty($_GET['semester']) && !empty($_GET['kode_mapel']) && $_GET['kode_kelas']==0 ){
				$semester= $_GET['semester'];
				$kode_mapel = null;
				$kode_kelas =  null;
			}else if($_GET['semester']==0 && !empty($_GET['kode_mapel']) && !empty($_GET['kode_kelas']) ){
				$semester= $_GET['semester'];
				$kode_mapel = null;
				$kode_kelas =  null;
			}else if(!empty($_GET['semester']) && $_GET['kode_mapel']==0 && !empty($_GET['kode_kelas']) ){
				$semester= $_GET['semester'];
				$kode_mapel = null;
				$kode_kelas =  null;
			}else if($_GET['semester']==0 && empty($_GET['kode_mapel']) && empty($_GET['kode_kelas']) ){
				$semester= $_GET['semester'];
				$kode_mapel = null;
				$kode_kelas =  null;
			}
		}
		$data['materi_share'] = $this->MateriModel->get_all_share_guru($id_t_akademik,$semester,$kode_mapel,$kode_kelas,$nip);
		$this->load->view('guru/materi_share/data_materi',$data);
	}
	public function detail($encrypt)
	{
		function url_base64_decode($str = '')
		{
			return base64_decode(strtr($str, '.-~', '+=/'));
		}
		$id= url_base64_decode($encrypt);
		$data['materi'] = $this->MateriModel->get_detail_by_id($id);
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php');
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('guru/materi_share/detail_share.php',$data);
		$this->load->view('templates/dashboard/footer.php');
	}
	public function crud($mode)
	{
		if ($mode == 'delete') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$result = $this->MateriModel->delete_share($id);
				echo json_encode($result);
			}
		}
	}	
}