<?php
class BankSoal extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('KategoriUjianModel');
        $this->load->model('BankSoalModel');
		$this->load->database();
	}
	public function index()
	{
        $data['kategori_soal'] = $this->BankSoalModel->get_kategori_soal();
        $data['kategori_ujian'] = $this->BankSoalModel->get_kategori_ujian();
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php');
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('guru/bank_soal/view.php',$data);
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('guru/bank_soal/script.php');
	}
	public function get_all()
	{
		if(!empty($_GET['id_tipe']) && empty($_GET['id_kategori']) ){
			$id_tipe= $_GET['id_tipe'];
			$id_kategori= null;
			$bank_soal = $this->BankSoalModel->get_all($id_tipe,$id_kategori);
		}else if(empty($_GET['id_tipe']) && !empty($_GET['id_kategori']) ){
			$id_tipe= null;
			$id_kategori= $_GET['id_kategori'];
			$bank_soal = $this->BankSoalModel->get_all($id_tipe,$id_kategori);
		}else if(!empty($_GET['id_tipe']) && !empty($_GET['id_kategori']) ){
			$id_tipe= $_GET['id_tipe'];
			$id_kategori= $_GET['id_kategori'];
			$bank_soal = $this->BankSoalModel->get_all($id_tipe,$id_kategori);
		}else if(empty($_GET['id_tipe']) && empty($_GET['id_kategori']) ){
			$id_tipe= null;
			$id_kategori= null;
			$bank_soal = $this->BankSoalModel->get_all($id_tipe,$id_kategori);
		}else if($_GET['id_tipe']==0 && $_GET['id_kategori']==0 ){
			$id_tipe= null;
			$id_kategori= null;
			$bank_soal = $this->BankSoalModel->get_all($id_tipe,$id_kategori);
		}
		$data['bank_soal'] = $bank_soal;
		$this->load->view('guru/bank_soal/data_soal',$data);
	}
	public function crud($mode)
	{
		if ($mode == 'insert') {
			if ($this->input->is_ajax_request()) {
				$datetime = date('Y-m-d H:i:s');
				$data = array(
					'id_k_ujian' => $_POST['id_k_ujian'],
					'id_k_soal' => $_POST['id_k_soal'],
					'soal' => $_POST['soal'],
					'opsi_a' => $_POST['opsi_a'],
					'opsi_b' => $_POST['opsi_b'],
					'opsi_c' => $_POST['opsi_c'],
					'opsi_d' => $_POST['opsi_d'],
					'opsi_e' => $_POST['opsi_e'],
					'dibuat_pada' => $datetime,
					'diupdate_pada' => $datetime
				);
				$result = $this->BankSoalModel->insert($data);
				echo json_encode($result);
			}
		}
		else if ($mode == 'update') {
			if ($this->input->is_ajax_request()) {
				$id= $this->input->post('id');
				$data = array(
					'judul' => $this->input->post('judul'),
					// 'content' => $_POST['content'],
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
	}	
	public function get_by_id() {
		$id = $this->input->get('id');
		$data = $this->TugasModel->get_by_id($id);
		echo json_encode($data);
	}
	public function get_tipe_soal() {
        $kategori = $_GET['kategori'];
        $data = $this->BankSoalModel->get_tipe_soal($kategori);
    }
	public function get_detail_ujian() {
        $id_kategori_ujian = $_GET['id_kategori'];
        $data = $this->BankSoalModel->get_detail_ujian($id_kategori_ujian);
        echo json_encode($data);
    }
}