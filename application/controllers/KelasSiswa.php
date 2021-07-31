<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelasSiswa extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('ion_auth');
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('KelasSiswaModel');
		$this->load->library('upload');
		$this->load->library('Excel'); 
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
		$tahun_akademik = $this->KelasSiswaModel->get_tahun_akademik();
		$data['tahun_akademik'] = $tahun_akademik;
        $kelas = $this->KelasSiswaModel->get_kelas();
		$data['kelas'] = $kelas;
        $siswa = $this->KelasSiswaModel->get_siswa();
		$data['siswa'] = $siswa;
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php',$data);
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('admin/kelas_siswa/view.php', $data);
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('admin/kelas_siswa/script.php');
	}
	public function get_all()
	{
		if(!empty($_GET['tahunakademik']) && empty($_GET['jkelamin']) && empty($_GET['kelas']) ){
			$tahun_akademik= $_GET['tahunakademik'];
			$j_kelamin = null;
			$id_kelas = null;
		}else if(empty($_GET['tahunakademik']) && !empty($_GET['jkelamin']) && empty($_GET['kelas']) ){
			$tahun_akademik= null;
			$j_kelamin = $_GET['jkelamin'];
			$id_kelas = null;
		}else if(empty($_GET['tahunakademik']) && empty($_GET['jkelamin']) && !empty($_GET['kelas']) ){
			$tahun_akademik= null;
			$j_kelamin = null;
			$id_kelas =  $_GET['kelas'];
		}else if(!empty($_GET['tahunakademik']) && !empty($_GET['jkelamin']) && !empty($_GET['kelas']) ){
			$tahun_akademik= $_GET['tahunakademik'];
			$j_kelamin = $_GET['jkelamin'];
			$id_kelas =  $_GET['kelas'];
		}else if(!empty($_GET['tahunakademik']) && !empty($_GET['jkelamin']) && empty($_GET['kelas']) ){
			$tahun_akademik= $_GET['tahunakademik'];
			$j_kelamin = $_GET['jkelamin'];
			$id_kelas = null;
		}else if(!empty($_GET['tahunakademik']) && empty($_GET['jkelamin']) && !empty($_GET['kelas']) ){
			$tahun_akademik= $_GET['tahunakademik'];
			$j_kelamin = null;
			$id_kelas = $_GET['kelas'];
		}else if(empty($_GET['tahunakademik']) && !empty($_GET['jkelamin']) && !empty($_GET['kelas']) ){
			$tahun_akademik= null;
			$j_kelamin = $_GET['jkelamin'];
			$id_kelas =  $_GET['kelas'];
		}else if($_GET['tahunakademik']==0 && $_GET['jkelamin']==0 && $_GET['kelas']==0 ){
			$tahun_akademik= null;
			$j_kelamin = null;
			$id_kelas =  null;
		}else if($_GET['tahunakademik']==0 && $_GET['jkelamin']==0 && !empty($_GET['kelas']) ){
			$tahun_akademik= null;
			$j_kelamin = null;
			$id_kelas = $_GET['kelas'];
		}else if($_GET['tahunakademik']==0 && !empty($_GET['jkelamin']) && $_GET['kelas']==0 ){
			$tahun_akademik= null;
			$j_kelamin = $_GET['jkelamin'];
			$id_kelas =  null;
		}else if(!empty($_GET['tahunakademik']) && $_GET['jkelamin']==0 && $_GET['kelas']==0 ){
			$tahun_akademik= $_GET['tahunakademik'];
			$j_kelamin = null;
			$id_kelas =  null;
		}else if($_GET['tahunakademik']==0 && $_GET['jkelamin']==0 && !empty($_GET['kelas']) ){
			$tahun_akademik= null;
			$j_kelamin = null;
			$id_kelas =  $_GET['kelas'];
		}else if($_GET['tahunakademik']==0 && !empty($_GET['jkelamin']) && $_GET['kelas']==0 ){
			$tahun_akademik= null;
			$j_kelamin =  $_GET['jkelamin'];
			$id_kelas = null;
		}else if(!empty($_GET['tahunakademik']) && !empty($_GET['jkelamin']) && $_GET['kelas']==0 ){
			$tahun_akademik= $_GET['tahunakademik'];
			$j_kelamin = null;
			$id_kelas =  null;
		}else if($_GET['tahunakademik']==0 && !empty($_GET['jkelamin']) && !empty($_GET['kelas']) ){
			$tahun_akademik= $_GET['tahunakademik'];
			$j_kelamin = null;
			$id_kelas =  null;
		}else if(!empty($_GET['tahunakademik']) && $_GET['jkelamin']==0 && !empty($_GET['kelas']) ){
			$tahun_akademik= $_GET['tahunakademik'];
			$j_kelamin = null;
			$id_kelas =  null;
		}else if($_GET['tahunakademik']==0 && empty($_GET['jkelamin']) && empty($_GET['kelas']) ){
			$tahun_akademik= $_GET['tahunakademik'];
			$j_kelamin = null;
			$id_kelas =  null;
		}else if(empty($_GET['tahunakademik']) && empty($_GET['jkelamin']) && empty($_GET['kelas']) ){
			$tahun_akademik= null;
			$j_kelamin = null;
			$id_kelas =  null;
		}
		$data['kelass'] = $this->KelasSiswaModel->get_all($tahun_akademik,$j_kelamin,$id_kelas);
		$tahun_akademik = $this->KelasSiswaModel->get_tahun_akademik();
		$data['tahun_akademik'] = $tahun_akademik;
        $kelas = $this->KelasSiswaModel->get_kelas();
		$data['kelas'] = $kelas;
        $siswa = $this->KelasSiswaModel->get_siswa();
		$data['siswa'] = $siswa;
		$this->load->view('admin/kelas_siswa/data_kelas_siswa',$data);
	}
    public function crud($mode)
	{
		if ($mode == 'insert') {
			if ($this->input->is_ajax_request()) {
				$data = array(
					'nis' => $this->input->post('nis'),
					'kode_kelas' => $this->input->post('kelas'),
                    'id_tahun_akademik' => $this->input->post('tahunakademik'),
                    'no_absen' => $this->input->post('no_absen')
				);
				$result = $this->KelasSiswaModel->insert($data);
				echo json_encode($result);
			}
		}
		else if ($mode == 'update') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$data = array(
				    'nis' => $this->input->post('nis'),
					'kode_kelas' => $this->input->post('kelas'),
                    'id_tahun_akademik' => $this->input->post('tahunakademik'),
                    'no_absen' => $this->input->post('no_absen')
				);
				$result = $this->KelasSiswaModel->update($data, $id);
				echo json_encode($result);
			}
		}
		else if ($mode == 'delete') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$result = $this->KelasSiswaModel->delete($id);
				echo json_encode($result);
			}
		}
	}
	public function get_by_id() {
		$id = $this->input->get('id');
		$data = $this->KelasSiswaModel->get_by_id($id);
		echo json_encode($data);
	}
	public function importExcel(){
        $fileName = time().'-'.$_FILES['excel']['name']; 
        $config['upload_path'] = './uploads/excel/'; //path upload
        $config['file_name'] = $fileName;  // nama file
        $config['allowed_types'] = 'xls|xlsx|csv'; //tipe file yang diperbolehkan
        $config['max_size'] = 10000; // maksimal sizze
 
        $this->load->library('upload'); //meload librari upload
        $this->upload->initialize($config);
          
        if(! $this->upload->do_upload('excel') ){
            echo $this->upload->display_errors();exit();
        }
              
        $inputFileName = './uploads/excel/'.$fileName;
 
        try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }
 
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
 
            for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);   
                 // Sesuaikan key array dengan nama kolom di database                                                   
                 $data = array(
                    "nis"=> $rowData[0][0],
                    "no_absen"=> $rowData[0][1],
					"id_tahun_akademik"=> $rowData[0][2],
					"kode_kelas"=> $rowData[0][3]
                );
 
                $insert = $this->db->insert("data_kelas_siswa",$data);                     
            }
    }
}
