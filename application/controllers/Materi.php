<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."/third_party/terceros/dropbox/vendor/autoload.php";
use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;
class Materi extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper('url');
		$this->load->library('ssp');
		$this->load->helper('form');
		$this->load->model('AgamaModel');
		$this->load->model('MateriModel');
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
	public function get_all()
	{
		$data['materi'] = $this->MateriModel->get_all();
		$this->load->view('admin/materi/data_materi',$data);
	}
	public function tambah()
	{
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php');
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('admin/materi/tambah_materi.php');
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('admin/materi/script_tambah.php');
	}
	public function edit()
	{
		$id=3;
		$data['materi'] = $this->MateriModel->get_by_id($id);
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php');
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('admin/materi/edit_materi.php',$data);
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('admin/materi/script_materi.php');
	}
	public function detail()
	{
		$id=6;
		$data['materi'] = $this->MateriModel->get_by_id($id);
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php');
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('admin/materi/detail_materi.php',$data);
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('admin/materi/script_detail.php');
	}
	public function crud($mode)
	{
		if ($mode == 'insert') {
			if ($this->input->is_ajax_request()) {
				$data = array(
					'judul' => $_POST['judul'],
					'content' => $_POST['content'],
					'nip' => '3509176412630001'
				);
				$result = $this->MateriModel->insert($data);
				echo json_encode($result);
			}
		}
		else if ($mode == 'update') {
			if ($this->input->is_ajax_request()) {
				$id=6;
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
	}	
	public function upload_dropbox(){
		$dropboxKey ="tn2w1cd67x3fvq4";
		$dropboxSecret ="52mzy86wj55dti6";
		$dropboxToken="8lnfe9YQRHcAAAAAAAAAAQuWPIh3RDfxHyLxmzRa9NevJduF5faoZBajYHku4X6w";

		$app = new DropboxApp($dropboxKey,$dropboxSecret,$dropboxToken);
		$dropbox = new Dropbox($app);
		$date = $date = date('d-m-Y H:i');
		$name=$_FILES['file']['name'];
		$ext = end((explode(".", $name)));
		$namedate= $name."_".$date;
        $tempfile = $_FILES['file']['tmp_name'];
		$nip = '3509176412630001';
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
			   'id_m_tipe' => 2
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
}