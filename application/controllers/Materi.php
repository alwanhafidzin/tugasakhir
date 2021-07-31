<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."/third_party/terceros/dropbox/vendor/autoload.php";
use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;
class Materi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('ion_auth');
        $this->load->helper('url');
		$this->load->library('ssp');
		$this->load->helper('form');
		$this->load->model('AgamaModel');
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
		$this->load->view('guru/materi/view.php');
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('guru/materi/script.php');
	}
	public function get_all()
	{
		$tahun_aktif = $this->WaliKelasModel->get_tahun_aktif();
		$data['tahun_aktif'] = $tahun_aktif;
		$user = $this->ion_auth->user()->row();
		$nip =$user->username;
		$data['materi'] = $this->MateriModel->get_all($nip);
		$data['jadwal_guru_absen'] = $this->AbsensiPermapelModel->get_guru_jadwal_pertahunakademik($nip);
		$this->load->view('guru/materi/data_materi',$data);
	}
	public function tambah()
	{
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
		$this->load->view('guru/materi/tambah_materi.php');
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('guru/materi/script_tambah.php');
	}
	public function edit($id)
	{
		$data['materi'] = $this->MateriModel->get_detail_by_id($id);
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php');
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('guru/materi/edit_materi.php',$data);
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('guru/materi/script_edit.php');
	}
	public function detail($encrypt)
	{
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
		function url_base64_decode($str = '')
		{
			return base64_decode(strtr($str, '.-~', '+=/'));
		}
		$id= url_base64_decode($encrypt);
		$data['materi'] = $this->MateriModel->get_detail_by_id($id);
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php',$data);
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('guru/materi/detail_materi.php',$data);
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('guru/materi/script_detail.php');
	}
	public function crud($mode)
	{
		if ($mode == 'insert') {
			if ($this->input->is_ajax_request()) {
				$user = $this->ion_auth->user()->row();
				$nip =$user->username;
				$timezone = new DateTimeZone('Asia/Jakarta');
				$date = new DateTime();
				$date->setTimeZone($timezone);
				$data = array(
					'judul' => $_POST['judul'],
					'content' => $_POST['content'],
					'nip' => $nip,
					'id_m_tipe' => 1,
					'tgl_dibuat' => $date->format('Y-m-d H:i:s')
				);
				$result = $this->MateriModel->insert($data);
				echo json_encode($result);
			}
		}
		else if ($mode == 'update') {
			if ($this->input->is_ajax_request()) {
				$id=$_POST['id'];
				$data = array(
					'judul' => $_POST['judul'],
					'content' => $_POST['content']
				);
				$result = $this->MateriModel->update($data,$id);
				echo json_encode($result);
			}
		}
		else if ($mode == 'delete') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$result = $this->MateriModel->delete($id);
				echo json_encode($result);
			}
		}
		else if ($mode == 'share') {
			if ($this->input->is_ajax_request()) {
				$id_materi = $this->input->post('id');
				$timezone = new DateTimeZone('Asia/Jakarta');
				$date = new DateTime();
		        $date->setTimeZone($timezone);
				$kode_mapel = $this->input->post('mapel');
				$kode_kelas = $this->input->post('kelas');
				$tanggal = $this->input->post('tanggal');
				$id_jadwal = $this->input->post('jam');
				$exists = $this->MateriModel->isMateriExist($id_jadwal,$tanggal,$id_materi);
				if($exists->num_rows() > 0){
					// echo json_encode($exists);
					echo 'exists';
				 }else{
					$data = array(
						'id_materi' =>$id_materi,
						'kode_mapel' =>$kode_mapel,
						'kode_kelas' =>$kode_kelas,
						'id_jadwal' => $id_jadwal,
						'tgl_jadwal' =>$tanggal,
						'tgl_dibagikan' => $date->format('Y-m-d H:i:s')
					);
					$this->MateriModel->share($data);
					// echo json_encode($result);
					echo 'success';
				 }
			}
		}
	}	
	public function upload_dropbox(){
		$dropboxKey ="tn2w1cd67x3fvq4";
		$dropboxSecret ="52mzy86wj55dti6";
		$dropboxToken="8lnfe9YQRHcAAAAAAAAAAQuWPIh3RDfxHyLxmzRa9NevJduF5faoZBajYHku4X6w";

		$app = new DropboxApp($dropboxKey,$dropboxSecret,$dropboxToken);
		$dropbox = new Dropbox($app);
	    $timezone = new DateTimeZone('Asia/Jakarta');
		$date = new DateTime();
		$date->setTimeZone($timezone);
		$name=$_FILES['file']['name'];
        $tempfile = $_FILES['file']['tmp_name'];
		$user = $this->ion_auth->user()->row();
		$nip =$user->username;
		$location = "/"."Materi/".$nip."/".$name;
		try{
			$file = $dropbox->simpleUpload( $tempfile,$location, ['autorename' => true]);
			$name_true = $file->getName();
			$location2 = "/"."Materi/".$nip."/".$name_true;
			$response = $dropbox->postToAPI("/sharing/create_shared_link", [
			"path" => $location2
			]);
			$data = $response->getDecodedBody();
			$result = json_encode($data);
			$get = json_decode($result,true);
			$url= $get['url'];
			$data = array(
			   'judul' => $_POST['judul'],
			   'content' => $url,
			   'nip' => '3509176412630001',
			   'path' => $location2,
			   'id_m_tipe' => 2,
			   'tgl_dibuat' => $date->format('Y-m-d H:i:s')
			);
			$result = $this->MateriModel->insert($data);
			echo json_encode($result);
		 }catch(\exception $e){
			  print_r($e);
		 }
	  
	}
	public function delete_upload(){
		$dropboxKey ="tn2w1cd67x3fvq4";
		$dropboxSecret ="52mzy86wj55dti6";
		$dropboxToken="8lnfe9YQRHcAAAAAAAAAAQuWPIh3RDfxHyLxmzRa9NevJduF5faoZBajYHku4X6w";

		$app = new DropboxApp($dropboxKey,$dropboxSecret,$dropboxToken);
		$dropbox = new Dropbox($app);
		$pathToFile = $_POST['path'];
		try{
			$response = $dropbox->postToAPI("/files/delete", [
				"path" => $pathToFile
			]);
			$id = $this->input->post('id');
			$result = $this->MateriModel->delete($id);
			echo json_encode($result);
		 }catch(\exception $e){
			  print_r($e);
		 }
	}
	public function update_dropbox(){
		$dropboxKey ="tn2w1cd67x3fvq4";
		$dropboxSecret ="52mzy86wj55dti6";
		$dropboxToken="8lnfe9YQRHcAAAAAAAAAAQuWPIh3RDfxHyLxmzRa9NevJduF5faoZBajYHku4X6w";

		$app = new DropboxApp($dropboxKey,$dropboxSecret,$dropboxToken);
		$id = $this->input->post('id');
		$dropbox = new Dropbox($app);
		$pathToFile = $_POST['path'];
		$date = $date = date('d-m-Y H:i');
		$name=$_FILES['file']['name'];
		$ext = end((explode(".", $name)));
		$namedate= $name."_".$date;
        $tempfile = $_FILES['file']['tmp_name'];
		$nip = '3509176412630001';
		$location = "/"."Materi/".$nip."/".$name;
		$data = array(
			'judul' => $_POST['judul'],
			'nip' => '3509176412630001',
			'id_m_tipe' => 2
		);
		if (empty($_FILES['file']['name'])) 
		{
			// $data['foto']=harus null biar bisa diinsert
		}
		else{
			try{
				$response = $dropbox->postToAPI("/files/delete", [
					"path" => $pathToFile
				]);
				$file = $dropbox->simpleUpload( $tempfile,$location, ['autorename' => true]);
				$name_true = $file->getName();
				$location2 = "/"."Materi/".$nip."/".$name_true;
				$response = $dropbox->postToAPI("/sharing/create_shared_link", [
				"path" => $location2
				]);
				$data = $response->getDecodedBody();
				$result = json_encode($data);
				$get = json_decode($result,true);
				$url= $get['url'];
				$data['content'] = $url;
				$data['path'] = $location2;
			 }catch(\exception $e){
				  print_r($e);
			 }
		}
		$result = $this->MateriModel->update($data,$id);
		echo json_encode($result);
	}
	public function get_by_id() {
		$id = $this->input->get('id');
		$data = $this->MateriModel->get_by_id($id);
		echo json_encode($data);
	}
	public function get_share_id() {
		$id = $this->input->get('id');
		$data = $this->MateriModel->get_share_id($id);
		echo json_encode($data);
	}
}