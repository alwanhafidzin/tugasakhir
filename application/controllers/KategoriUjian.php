<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriUjian extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('ion_auth');
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('KategoriUjianModel');
		$this->load->model('AbsensiPermapelModel');
		$this->load->model('WaliKelasModel');
		$this->load->model('UjianModel');
		$this->load->database();
		if (!$this->ion_auth->logged_in()){
			redirect('auth/login');
		}
	}
	public function index()
	{
		$user = $this->ion_auth->user()->row();
		$nip =$user->username;
		$data['tipe_ujian'] = $this->KategoriUjianModel->get_tipe_ujian();
		$data['jadwal_guru_absen'] = $this->AbsensiPermapelModel->get_guru_jadwal_pertahunakademik($nip);
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php');
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('guru/kategori_ujian/view.php',$data);
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('guru/kategori_ujian/script.php');
	}
	public function get_all()
	{
		if(!empty($_GET['id_tipe']) && empty($_GET['kode_mapel']) ){
			$id_tipe= $_GET['id_tipe'];
			$id_mapel= null;
		}else if(empty($_GET['id_tipe']) && !empty($_GET['kode_mapel']) ){
			$id_tipe= null;
			$id_mapel= $_GET['kode_mapel'];
		}else if(!empty($_GET['id_tipe']) && !empty($_GET['kode_mapel']) ){
			$id_tipe= $_GET['id_tipe'];
			$id_mapel= $_GET['kode_mapel'];
		}else if(empty($_GET['id_tipe']) && empty($_GET['kode_mapel']) ){
			$id_tipe= null;
			$id_mapel= null;
		}else if($_GET['id_tipe']==0 && $_GET['kode_mapel']==0 ){
			$id_tipe= null;
			$id_mapel= null;
		}
		$user = $this->ion_auth->user()->row();
		$nip =$user->username;
		$tahun_aktif = $this->WaliKelasModel->get_tahun_aktif();
		$data['tahun_aktif'] = $tahun_aktif;
		$kategori_ujian = $this->KategoriUjianModel->get_all($id_tipe,$id_mapel,$nip);
		$data['kategori_ujian'] = $kategori_ujian;
		$data['tipe_ujian'] = $this->KategoriUjianModel->get_tipe_ujian();
		$data['jadwal_guru_absen'] = $this->AbsensiPermapelModel->get_guru_jadwal_pertahunakademik($nip);
		$this->load->view('guru/kategori_ujian/data_kategori_ujian',$data);
	}
	
	public function crud($mode)
	{
		if ($mode == 'insert') {
			if ($this->input->is_ajax_request()) {
				$user = $this->ion_auth->user()->row();
		        $nip =$user->username;
				$data = array(
					'nama_ujian' => $this->input->post('nama_ujian'),
					'kode_mapel' => $this->input->post('kode_mapel'),
					'id_t_ujian' => $this->input->post('id_t_ujian'),
					'nip' => $nip
				);
				$result = $this->KategoriUjianModel->insert($data);
				echo json_encode($result);
			}
		}
		else if ($mode == 'update') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$user = $this->ion_auth->user()->row();
	        	$nip =$user->username;
				$data = array(
					'nama_ujian' => $this->input->post('nama_ujian'),
					'kode_mapel' => $this->input->post('kode_mapel'),
					'id_t_ujian' => $this->input->post('id_t_ujian'),
					'nip' => $nip
				);
				$result = $this->KategoriUjianModel->update($data, $id);
				echo json_encode($result);
			}
		}
		else if ($mode == 'delete') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$result = $this->KategoriUjianModel->delete($id);
				echo json_encode($result);
			}
		}
		else if ($mode == 'share') {
			if ($this->input->is_ajax_request()) {
				function crypto_rand_secure($min, $max)
				{
					$range = $max - $min;
					if ($range < 1) return $min; // not so random...
					$log = ceil(log($range, 2));
					$bytes = (int) ($log / 8) + 1; // length in bytes
					$bits = (int) $log + 1; // length in bits
					$filter = (int) (1 << $bits) - 1; // set all lower bits to 1
					do {
						$rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
						$rnd = $rnd & $filter; // discard irrelevant bits
					} while ($rnd > $range);
					return $min + $rnd;
				}
				function getToken($length)
				{
					$token = "";
					$codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
					// $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
					// $codeAlphabet.= "0123456789";
					$max = strlen($codeAlphabet); // edited

					for ($i=0; $i < $length; $i++) {
						$token .= $codeAlphabet[crypto_rand_secure(0, $max-1)];
					}

					return $token;
				}
				$token_ujian = getToken(5);
				$id_k_ujian = $this->input->post('id');
				$id_t_akademik = $this->input->post('id_t_akademik');
				$semester = $this->input->post('semester');
				$timezone = new DateTimeZone('Asia/Jakarta');
				$date = new DateTime();
		        $date->setTimeZone($timezone);
				$kode_kelas = $this->input->post('kelas');
				$tanggal = $this->input->post('tanggal');
				$id_jadwal = $this->input->post('jam');
				$tgl_mulai= $this->input->post('tgl_mulai');
				$tgl_selesai= $this->input->post('tgl_selesai');
				$jumlah_soal = $this->input->post('jumlah_soal');
				$jenis_soal = $this->input->post('jenis_soal');
				$waktu = $this->input->post('waktu');
				$exists = $this->UjianModel->isUjianExist($id_jadwal,$tanggal,$id_k_ujian);
				if($exists->num_rows() > 0){
					// echo json_encode($exists);
					echo 'exists';
				 }else{
					$data = array(
						'id_k_ujian' =>$id_k_ujian,
						'id_t_akademik' =>$id_t_akademik,
						'semester' =>$semester,
						'kode_kelas' =>$kode_kelas,
						'id_jadwal' => $id_jadwal,
						'tgl_jadwal' =>$tanggal,
						'tgl_share' => $date->format('Y-m-d H:i:s'),
						'terlambat' => $tgl_selesai,
						'tgl_mulai' => $tgl_mulai,
						'jumlah_soal' => $jumlah_soal,
						'jenis'    =>$jenis_soal,
						'token'   =>$token_ujian,
						'waktu'  =>$waktu
					);
					$this->UjianModel->share($data);
					echo 'success';
				 }
			}
		}
	}
	public function get_by_id() {
		$id = $this->input->get('id');
		$data = $this->KategoriUjianModel->get_by_id($id);
		echo json_encode($data);
	}
	public function get_share_by_id() {
		$id = $this->input->get('id');
		$data = $this->KategoriUjianModel->get_share_by_id($id);
		echo json_encode($data);
	}
}