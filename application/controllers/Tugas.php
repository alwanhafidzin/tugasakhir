<?php
class Tugas extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('AbsensiPermapelModel');
		$this->load->model('WaliKelasModel');
		$this->load->model('KelasSiswaModel');
		$this->load->model('TugasModel');
		$this->load->database();
	}
	public function index()
	{
		$data['jadwal_guru_absen'] = $this->AbsensiPermapelModel->get_guru_jadwal_pertahunakademik();
		$tahun_aktif = $this->WaliKelasModel->get_tahun_aktif();
		$data['tahun_aktif'] = $tahun_aktif;
		$tahun_akademik = $this->KelasSiswaModel->get_tahun_akademik();
		$data['tahun_akademik'] = $tahun_akademik;
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php');
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('guru/tugas/view.php',$data);
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('guru/tugas/script.php');
	}
	public function get_all()
	{
		$data['jadwal_guru_absen'] = $this->AbsensiPermapelModel->get_guru_jadwal_pertahunakademik();
		$data['tugas'] = $this->TugasModel->get_all();
		$this->load->view('guru/tugas/data_tugas',$data);
	}
	public function crud($mode)
	{
		if ($mode == 'insert') {
			if ($this->input->is_ajax_request()) {
				$datetime = date('Y-m-d H:i:s');
				$data = array(
					'judul' => $_POST['judul'],
					'content' => $_POST['content'],
					'tgl_dibuat' => $datetime,
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
}