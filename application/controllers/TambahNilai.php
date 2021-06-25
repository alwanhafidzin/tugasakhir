<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TambahNilai extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('ion_auth');
        $this->load->helper('url');
		$this->load->helper('form');
        $this->load->model('WaliKelasModel');
		$this->load->model('AbsensiPermapelModel');
        $this->load->model('IdentityModel');
        $this->load->model('TambahNilaiModel');
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
		$tahun_akademik_share = $this->TambahNilaiModel->get_tahun_akademik_share($nip);
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
		$data['nilai_lain'] = $this->TambahNilaiModel->get_id_nilai_lain();
		$data['jadwal_guru_absen'] = $this->AbsensiPermapelModel->get_guru_jadwal_pertahunakademik($nip);
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php',$data);
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('guru/tambah_nilai/view.php', $data);
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('guru/tambah_nilai/script.php');
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
				$semester= null;
				$kode_mapel = $_GET['kode_mapel'];
				$kode_kelas =  $_GET['kode_kelas'];
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
				$semester= null;
				$kode_mapel = $_GET['kode_mapel'];
				$kode_kelas =  $_GET['kode_kelas'];
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
				$semester= null;
				$kode_mapel = $_GET['kode_mapel'];
				$kode_kelas =  $_GET['kode_kelas'];
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
		$data['tambah_nilai'] = $this->TambahNilaiModel->get_all_nilai_siswa_guru($id_t_akademik,$semester,$kode_mapel,$kode_kelas,$nip);
		$this->load->view('guru/tambah_nilai/data_nilai',$data);
	}
	public function get_table_tambah()
	{
		$tanggal = $_GET['tanggal'];
		$id_jadwal = $_GET['id_jadwal'];
		$data['absensi_permapel'] = $this->AbsensiPermapelModel->get_absensipermapel_tbh($tanggal,$id_jadwal);
		$this->load->view('guru/absensi_permapel/data_absensi',$data);
	}
	public function get_table_edit()
	{
		$tanggal = $_GET['tanggal'];
		$id_jadwal = $_GET['id_jadwal'];
		$data['absensi_permapel'] = $this->AbsensiPermapelModel->get_absensipermapel_tbh($tanggal,$id_jadwal);
		$this->load->view('guru/absensi_permapel/data_absensi_edit',$data);
	}
	public function crud($mode)
	{
		if ($mode == 'insert') {
			if ($this->input->is_ajax_request()) {
				$keterangan = $this->input->post('keterangan');
				$id_t_akademik = $this->input->post('id_t_akademik');
				$semester = $this->input->post('semester');
				$kode_mapel = $this->input->post('mapel');
				$kode_kelas = $this->input->post('kelas');
				$tanggal = $this->input->post('tanggal');
				$id_jadwal = $this->input->post('jam');
				$id_nilai_lain = $this->input->post('nilai_lain');
				$timezone = new DateTimeZone('Asia/Jakarta');
				$date = new DateTime();
		        $date->setTimeZone($timezone);
		
					$data = array(
						'id_t_akademik' =>$id_t_akademik,
						'semester' =>$semester,
						'kode_kelas' =>$kode_kelas,
						'id_jadwal' => $id_jadwal,
						'tgl_jadwal' =>$tanggal,
						'tgl_dibuat' => $date->format('Y-m-d H:i:s'),
						'kode_kelas' => $kode_kelas,
						'kode_mapel' =>$kode_mapel,
						'id_nilai_lain' =>$id_nilai_lain
					);
					$this->TambahNilaiModel->insert($data);
					$id_nilai_siswa = $this->db->insert_id();
					$this->TambahNilaiModdel->insert_nilai_siswa($id_nilai_siswa,$id_t_akademik,$kode_kelas);
					// echo json_encode($result);
					echo 'success';
			}
		}
		else if ($mode == 'update_absensi') {
			if ($this->input->is_ajax_request()) {
				$id = $_GET['id'];
				$absensi = $_GET['absensi'];
				$data = array(
					'absensi' => $absensi
				);
				$result = $this->AbsensiPermapelModel->update($data,$id);
				echo json_encode($result);
			}
		}
	}
	public function get_guru_mapel_jadwal() {
		$user = $this->ion_auth->user()->row();
		$nip =$user->username;
        $kode_mapel = $_GET['kode_mapel'];
        $data = $this->AbsensiPermapelModel->get_kelas_guru_absen($kode_mapel,$nip);
    }
	public function get_guru_mapel_jadwal_all() {
		$user = $this->ion_auth->user()->row();
		$nip =$user->username;
        $data = $this->AbsensiPermapelModel->get_kelas_guru_absen_all($nip);
    }
	public function get_hari_jadwal() {
		$user = $this->ion_auth->user()->row();
		$nip =$user->username;
		$kode_mapel = $_GET['kode_mapel'];
		$kode_kelas = $_GET['kode_kelas'];
        $data = $this->AbsensiPermapelModel->get_hari_jadwal($kode_mapel,$kode_kelas,$nip);
    }
	public function get_tanggal_jadwal() {
		$kode_mapel = $_GET['kode_mapel'];
		$kode_kelas = $_GET['kode_kelas'];
        $data = $this->AbsensiPermapelModel->get_tanggal_jadwal($kode_mapel,$kode_kelas);
    }
	public function get_jam_jadwal() {
		$user = $this->ion_auth->user()->row();
		$nip =$user->username;
        $hari = $_GET['hari'];
		$kode_mapel = $_GET['kode_mapel'];
		$kode_kelas = $_GET['kode_kelas'];
        $data = $this->AbsensiPermapelModel->get_jam_jadwal($kode_mapel,$kode_kelas,$hari,$nip);
    }
}