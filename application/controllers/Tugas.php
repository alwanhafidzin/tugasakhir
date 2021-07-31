<?php
class Tugas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('ion_auth');
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('AbsensiPermapelModel');
		$this->load->model('WaliKelasModel');
		$this->load->model('KelasSiswaModel');
		$this->load->model('IdentityModel');
		$this->load->model('TugasModel');
		$this->load->database();
		if (!$this->ion_auth->logged_in()){
			redirect('auth/login');
		}
	}
	public function index()
	{
		$user = $this->ion_auth->user()->row();
		$nip =$user->username;
		$data['jadwal_guru_absen'] = $this->AbsensiPermapelModel->get_guru_jadwal_pertahunakademik($nip);
		$tahun_aktif = $this->WaliKelasModel->get_tahun_aktif();
		$data['tahun_aktif'] = $tahun_aktif;
		$tahun_akademik = $this->KelasSiswaModel->get_tahun_akademik();
		$data['tahun_akademik'] = $tahun_akademik;
		$user = $this->ion_auth->user()->row();
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
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php',$data);
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('guru/tugas/view.php',$data);
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('guru/tugas/script.php');
	}
	public function get_all()
	{
		$user = $this->ion_auth->user()->row();
		$nip =$user->username;
		$data['jadwal_guru_absen'] = $this->AbsensiPermapelModel->get_guru_jadwal_pertahunakademik($nip);
		$tahun_aktif = $this->WaliKelasModel->get_tahun_aktif();
		$data['tahun_aktif'] = $tahun_aktif;
		$tahun_akademik = $this->KelasSiswaModel->get_tahun_akademik();
		$data['tahun_akademik'] = $tahun_akademik;
		$data['tugas'] = $this->TugasModel->get_all($nip);
		$this->load->view('guru/tugas/data_tugas',$data);
	}
	public function detail($encrypt)
	{
		function url_base64_decode($str = '')
		{
			return base64_decode(strtr($str, '.-~', '+=/'));
		}
		$id= url_base64_decode($encrypt);
		$data['tugas'] = $this->TugasModel->get_detail_by_id($id);
		$user = $this->ion_auth->user()->row();
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
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php',$data);
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('guru/tugas/detail_tugas.php',$data);
		$this->load->view('templates/dashboard/footer.php');
	}
	public function crud($mode)
	{
		if ($mode == 'insert') {
			if ($this->input->is_ajax_request()) {
				$timezone = new DateTimeZone('Asia/Jakarta');
				$date = new DateTime();
				$date->setTimeZone($timezone);
				$data = array(
					'judul' => $_POST['judul'],
					'content' => $_POST['content'],
					'tgl_dibuat' => $date->format('Y-m-d H:i:s'),
					'nip' => '3509176412630001',
					'kode_mapel' => $_POST['kode_mapel']
				);
				$result = $this->TugasModel->insert($data);
				echo json_encode($result);
			}
		}
		else if ($mode == 'update') {
			if ($this->input->is_ajax_request()) {
				$id= $this->input->post('id');
				$data = array(
					'judul' => $this->input->post('judul'),
					'content' => $_POST['content'],
					'kode_mapel' => $this->input->post('kode_mapel')
				);
				$result = $this->TugasModel->update($data,$id);
				echo json_encode($result);
			}
		}
		else if ($mode == 'delete') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$result = $this->TugasModel->delete($id);
				echo json_encode($result);
			}
		}
		else if ($mode == 'share') {
			if ($this->input->is_ajax_request()) {
				$id_tugas = $this->input->post('id');
				$timezone = new DateTimeZone('Asia/Jakarta');
				$id_t_akademik = $this->input->post('id_t_akademik');
				$date = new DateTime();
		        $date->setTimeZone($timezone);
				$kode_kelas = $this->input->post('kelas');
				$tanggal = $this->input->post('tanggal');
				$id_jadwal = $this->input->post('jam');
				$tgl_selesai= $this->input->post('tgl_batas');
				$exists = $this->TugasModel->isTugasExist($id_jadwal,$tanggal,$id_tugas);
				if($exists->num_rows() > 0){
					// echo json_encode($exists);
					echo 'exists';
				 }else{
					$data = array(
						'id_tugas' =>$id_tugas,
						'kode_kelas' =>$kode_kelas,
						'id_jadwal' => $id_jadwal,
						'tgl_jadwal' =>$tanggal,
						'tgl_share' => $date->format('Y-m-d H:i:s'),
						'tgl_selesai' => $tgl_selesai
					);
					$this->TugasModel->share($data);
					$id_t_share = $this->db->insert_id();
					$this->TugasModel->insert_tugas_siswa($id_t_share,$id_t_akademik,$kode_kelas);
					// echo json_encode($result);
					echo 'success';
				 }
			}
		}
	}	
	public function get_by_id() {
		$id = $this->input->get('id');
		$data = $this->TugasModel->get_by_id($id);
		echo json_encode($data);
	}
	public function get_share_by_id() {
		$id = $this->input->get('id');
		$data = $this->TugasModel->get_share_by_id($id);
		echo json_encode($data);
	}
	public function cek_waktu(){
		$id = $_GET['id'];
		$this->TugasModel->cek_waktu($id);
	}
}