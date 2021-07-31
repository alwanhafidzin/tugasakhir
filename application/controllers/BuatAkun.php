<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BuatAkun extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->library('ion_auth');
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('BuatAkunModel');
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
		$this->load->view('admin/buat_akun/view.php');
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('admin/buat_akun/script.php');
	}
	public function get_all()
	{
		if (!empty($_GET['tipe'])) {
            $tipe = $_GET['tipe'];
        } else if (empty($_GET['tipe'])) {
            $tipe = null;
        } else if ($_GET['tipe'] == 0) {
            $tipe = null;
        }
		$buat_akun = $this->BuatAkunModel->get_all($tipe);
		$data['buat_akun'] = $buat_akun;
		$this->load->view('admin/buat_akun/data_buat_akun',$data);
	}
	public function crud($mode)
	{
		if ($mode == 'insert_akun_guru') {
			if ($this->input->is_ajax_request()) {
				$identity =  $this->input->post('id');
				$email = $this->input->post('email_guru');
				$bytes = random_bytes(10);
                $password = bin2hex($bytes);
				$nama = $this->input->post('nama_guru');
				$additional_data = [
				    'nama' => $nama
				];
				$group = array('2');
				$result = $this->ion_auth->register($identity, $password, $email, $additional_data, $group);
				if($result){
					$config = [
						'protocol' => 'smtp',
						'smtp_host' => 'ssl://smtp.googlemail.com',
						'smtp_port' => 465,
						'smtp_user' => 'mediakucerdas@gmail.com',
						'smtp_pass' => '53907373',
						'mailtype' => 'html'
					];
					$this->load->library('email');
					$this->email->initialize($config);
					$this->load->helpers('url');
					$this->email->set_newline("\r\n");
					$this->email->from('mediakucerdas@gmail.com');
					$this->email->to($email);
					$this->email->subject("Password Sementara Guru");
					$this->email->message("Selamat akun guru untuk masuk portal pembelajaran Smansasoo Virtual Learn berhasil dibuat.
					<br><br>Anda Bisa login dengan menggunakan Nip/Email dan password sementara di bawah ini:<br>
					Nama                :".$nama."<br>
					Jenis Akun          :Guru SMAN 1 SOOKO<br>
					NIP/Email           :".$identity."/".$email."<br>
					Password Sementara  :".$password."<br><br>
					Anda Bisa mengganti password setelah login di portal pembelajaran
					");
					$this->email->send();
				}
				echo json_encode($result);
			}
		}
		else if ($mode == 'insert_akun_siswa') {
			if ($this->input->is_ajax_request()) {
				$identity =  $this->input->post('id');
				$email = $this->input->post('email_siswa');
				$bytes = random_bytes(10);
                $password = bin2hex($bytes);
				$nama = $this->input->post('nama_siswa');
				$additional_data = [
				    'nama' => $nama
				];
				$group = array('3');
				$result = $this->ion_auth->register($identity, $password, $email, $additional_data, $group);
				if($result){
					$config = [
						'protocol' => 'smtp',
						'smtp_host' => 'ssl://smtp.googlemail.com',
						'smtp_port' => 465,
						'smtp_user' => 'mediakucerdas@gmail.com',
						'smtp_pass' => '53907373',
						'mailtype' => 'html'
					];
					$this->load->library('email');
					$this->email->initialize($config);
					$this->load->helpers('url');
					$this->email->set_newline("\r\n");
					$this->email->from('mediakucerdas@gmail.com');
					$this->email->to($email);
					$this->email->subject("Password Sementara Siswa");
					$this->email->message("Selamat akun siswa untuk masuk portal pembelajaran Smansasoo Virtual Learn berhasil dibuat.
					<br><br>Anda Bisa login dengan menggunakan Nis/Email dan password sementara di bawah ini:<br>
					Nama                :".$nama."<br>
					Jenis Akun          :Siswa SMAN 1 SOOKO<br>
					NIS/Email           :".$identity."/".$email."<br>
					Password Sementara  :".$password."<br><br>
					Anda Bisa mengganti password setelah login di portal pembelajaran
					");
					$this->email->send();
				}
				echo json_encode($result);
			}
		}
	}
	public function get_by_id_guru() {
		$id = $this->input->get('id');
		$data = $this->BuatAkunModel->get_by_id_guru($id);
		echo json_encode($data);
	}
	public function get_by_id_siswa() {
		$id = $this->input->get('id');
		$data = $this->BuatAkunModel->get_by_id_siswa($id);
		echo json_encode($data);
	}
}