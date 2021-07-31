<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('ion_auth');
		if (!$this->ion_auth->logged_in()){
			redirect('auth/login');
		}
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('SiswaModel');
		$this->load->library('upload');
		$this->load->library('Excel'); 
		$this->load->model('IdentityModel');
		$this->load->database();
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
		$agama = $this->SiswaModel->get_agama();
		$data['agama'] = $agama;
		$tahunmasuk = $this->SiswaModel->get_tahun();
		$data['tahunmasuk'] = $tahunmasuk;
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php',$data);
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('admin/siswa/view.php', $data);
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('admin/siswa/script.php');
	}
	public function get_all()
	{
		if(!empty($_GET['tahun_masuk'])){
			$tahun_masuk= $_GET['tahun_masuk'];
			if(!empty($_GET['agama']) && empty($_GET['jkelamin']) && empty($_GET['status']) ){
				$id_agama= $_GET['agama'];
				$j_kelamin = null;
				$status = null;
			}else if(empty($_GET['agama']) && !empty($_GET['jkelamin']) && empty($_GET['status']) ){
				$id_agama= null;
				$j_kelamin = $_GET['jkelamin'];
				$status = null;
			}else if(empty($_GET['agama']) && empty($_GET['jkelamin']) && !empty($_GET['status']) ){
				$id_agama= null;
				$j_kelamin = null;
				$status =  $_GET['status'];
			}else if(!empty($_GET['agama']) && !empty($_GET['jkelamin']) && !empty($_GET['status']) ){
				$id_agama= $_GET['agama'];
				$j_kelamin = $_GET['jkelamin'];
				$status =  $_GET['status'];
			}else if(!empty($_GET['agama']) && !empty($_GET['jkelamin']) && empty($_GET['status']) ){
				$id_agama= $_GET['agama'];
				$j_kelamin = $_GET['jkelamin'];
				$status = null;
			}else if(!empty($_GET['agama']) && empty($_GET['jkelamin']) && !empty($_GET['status']) ){
				$id_agama= $_GET['agama'];
				$j_kelamin = null;
				$status = $_GET['status'];
			}else if(empty($_GET['agama']) && !empty($_GET['jkelamin']) && !empty($_GET['status']) ){
				$id_agama= null;
				$j_kelamin = $_GET['jkelamin'];
				$status =  $_GET['status'];
			}else if($_GET['agama']==0 && $_GET['jkelamin']==0 && $_GET['status']==0 ){
				$id_agama= null;
				$j_kelamin = null;
				$status =  null;
			}else if($_GET['agama']==0 && $_GET['jkelamin']==0 && !empty($_GET['status']) ){
				$id_agama= null;
				$j_kelamin = null;
				$status = $_GET['status'];
			}else if($_GET['agama']==0 && !empty($_GET['jkelamin']) && $_GET['status']==0 ){
				$id_agama= null;
				$j_kelamin = $_GET['jkelamin'];
				$status =  null;
			}else if(!empty($_GET['agama']) && $_GET['jkelamin']==0 && $_GET['status']==0 ){
				$id_agama= $_GET['agama'];
				$j_kelamin = null;
				$status =  null;
			}else if($_GET['agama']==0 && $_GET['jkelamin']==0 && !empty($_GET['status']) ){
				$id_agama= null;
				$j_kelamin = null;
				$status =  $_GET['status'];
			}else if($_GET['agama']==0 && !empty($_GET['jkelamin']) && $_GET['status']==0 ){
				$id_agama= null;
				$j_kelamin =  $_GET['jkelamin'];
				$status = null;
			}else if(!empty($_GET['agama']) && !empty($_GET['jkelamin']) && $_GET['status']==0 ){
				$id_agama= $_GET['agama'];
				$j_kelamin = null;
				$status =  null;
			}else if($_GET['agama']==0 && !empty($_GET['jkelamin']) && !empty($_GET['status']) ){
				$id_agama= $_GET['agama'];
				$j_kelamin = null;
				$status =  null;
			}else if(!empty($_GET['agama']) && $_GET['jkelamin']==0 && !empty($_GET['status']) ){
				$id_agama= $_GET['agama'];
				$j_kelamin = null;
				$status =  null;
			}else if($_GET['agama']==0 && empty($_GET['jkelamin']) && empty($_GET['status']) ){
				$id_agama= $_GET['agama'];
				$j_kelamin = null;
				$status =  null;
			}else if(empty($_GET['agama']) && empty($_GET['jkelamin']) && empty($_GET['status']) ){
				$id_agama= $_GET['agama'];
				$j_kelamin = null;
				$status = null;
			}else if(empty($_GET['agama']) && empty($_GET['jkelamin']) && $_GET['status']==0 ){
				$id_agama= null;
				$j_kelamin = null;
				$status = null;
			}
		}else if(empty($_GET['tahun_masuk'])){
			$tahun_masuk= null;
			if(!empty($_GET['agama']) && empty($_GET['jkelamin']) && empty($_GET['status']) ){
				$id_agama= $_GET['agama'];
				$j_kelamin = null;
				$status = null;
			}else if(empty($_GET['agama']) && !empty($_GET['jkelamin']) && empty($_GET['status']) ){
				$id_agama= null;
				$j_kelamin = $_GET['jkelamin'];
				$status = null;
			}else if(empty($_GET['agama']) && empty($_GET['jkelamin']) && !empty($_GET['status']) ){
				$id_agama= null;
				$j_kelamin = null;
				$status =  $_GET['status'];
			}else if(!empty($_GET['agama']) && !empty($_GET['jkelamin']) && !empty($_GET['status']) ){
				$id_agama= $_GET['agama'];
				$j_kelamin = $_GET['jkelamin'];
				$status =  $_GET['status'];
			}else if(!empty($_GET['agama']) && !empty($_GET['jkelamin']) && empty($_GET['status']) ){
				$id_agama= $_GET['agama'];
				$j_kelamin = $_GET['jkelamin'];
				$status = null;
			}else if(!empty($_GET['agama']) && empty($_GET['jkelamin']) && !empty($_GET['status']) ){
				$id_agama= $_GET['agama'];
				$j_kelamin = null;
				$status = $_GET['status'];
			}else if(empty($_GET['agama']) && !empty($_GET['jkelamin']) && !empty($_GET['status']) ){
				$id_agama= null;
				$j_kelamin = $_GET['jkelamin'];
				$status =  $_GET['status'];
			}else if($_GET['agama']==0 && $_GET['jkelamin']==0 && $_GET['status']==0 ){
				$id_agama= null;
				$j_kelamin = null;
				$status =  null;
			}else if($_GET['agama']==0 && $_GET['jkelamin']==0 && !empty($_GET['status']) ){
				$id_agama= null;
				$j_kelamin = null;
				$status = $_GET['status'];
			}else if($_GET['agama']==0 && !empty($_GET['jkelamin']) && $_GET['status']==0 ){
				$id_agama= null;
				$j_kelamin = $_GET['jkelamin'];
				$status =  null;
			}else if(!empty($_GET['agama']) && $_GET['jkelamin']==0 && $_GET['status']==0 ){
				$id_agama= $_GET['agama'];
				$j_kelamin = null;
				$status =  null;
			}else if($_GET['agama']==0 && $_GET['jkelamin']==0 && !empty($_GET['status']) ){
				$id_agama= null;
				$j_kelamin = null;
				$status =  $_GET['status'];
			}else if($_GET['agama']==0 && !empty($_GET['jkelamin']) && $_GET['status']==0 ){
				$id_agama= null;
				$j_kelamin =  $_GET['jkelamin'];
				$status = null;
			}else if(!empty($_GET['agama']) && !empty($_GET['jkelamin']) && $_GET['status']==0 ){
				$id_agama= $_GET['agama'];
				$j_kelamin = null;
				$status =  null;
			}else if($_GET['agama']==0 && !empty($_GET['jkelamin']) && !empty($_GET['status']) ){
				$id_agama= $_GET['agama'];
				$j_kelamin = null;
				$status =  null;
			}else if(!empty($_GET['agama']) && $_GET['jkelamin']==0 && !empty($_GET['status']) ){
				$id_agama= $_GET['agama'];
				$j_kelamin = null;
				$status =  null;
			}else if($_GET['agama']==0 && empty($_GET['jkelamin']) && empty($_GET['status']) ){
				$id_agama= $_GET['agama'];
				$j_kelamin = null;
				$status =  null;
			}else if(empty($_GET['agama']) && empty($_GET['jkelamin']) && empty($_GET['status']) ){
				$id_agama= $_GET['agama'];
				$j_kelamin = null;
				$status = null;
			}else if(empty($_GET['agama']) && empty($_GET['jkelamin']) && $_GET['status']==0 ){
				$id_agama= null;
				$j_kelamin = null;
				$status = null;
			}
		}else if($_GET['tahun_masuk']==0){
			$tahun_masuk= null;
			if(!empty($_GET['agama']) && empty($_GET['jkelamin']) && empty($_GET['status']) ){
				$id_agama= $_GET['agama'];
				$j_kelamin = null;
				$status = null;
			}else if(empty($_GET['agama']) && !empty($_GET['jkelamin']) && empty($_GET['status']) ){
				$id_agama= null;
				$j_kelamin = $_GET['jkelamin'];
				$status = null;
			}else if(empty($_GET['agama']) && empty($_GET['jkelamin']) && !empty($_GET['status']) ){
				$id_agama= null;
				$j_kelamin = null;
				$status =  $_GET['status'];
			}else if(!empty($_GET['agama']) && !empty($_GET['jkelamin']) && !empty($_GET['status']) ){
				$id_agama= $_GET['agama'];
				$j_kelamin = $_GET['jkelamin'];
				$status =  $_GET['status'];
			}else if(!empty($_GET['agama']) && !empty($_GET['jkelamin']) && empty($_GET['status']) ){
				$id_agama= $_GET['agama'];
				$j_kelamin = $_GET['jkelamin'];
				$status = null;
			}else if(!empty($_GET['agama']) && empty($_GET['jkelamin']) && !empty($_GET['status']) ){
				$id_agama= $_GET['agama'];
				$j_kelamin = null;
				$status = $_GET['status'];
			}else if(empty($_GET['agama']) && !empty($_GET['jkelamin']) && !empty($_GET['status']) ){
				$id_agama= null;
				$j_kelamin = $_GET['jkelamin'];
				$status =  $_GET['status'];
			}else if($_GET['agama']==0 && $_GET['jkelamin']==0 && $_GET['status']==0 ){
				$id_agama= null;
				$j_kelamin = null;
				$status =  null;
			}else if($_GET['agama']==0 && $_GET['jkelamin']==0 && !empty($_GET['status']) ){
				$id_agama= null;
				$j_kelamin = null;
				$status = $_GET['status'];
			}else if($_GET['agama']==0 && !empty($_GET['jkelamin']) && $_GET['status']==0 ){
				$id_agama= null;
				$j_kelamin = $_GET['jkelamin'];
				$status =  null;
			}else if(!empty($_GET['agama']) && $_GET['jkelamin']==0 && $_GET['status']==0 ){
				$id_agama= $_GET['agama'];
				$j_kelamin = null;
				$status =  null;
			}else if($_GET['agama']==0 && $_GET['jkelamin']==0 && !empty($_GET['status']) ){
				$id_agama= null;
				$j_kelamin = null;
				$status =  $_GET['status'];
			}else if($_GET['agama']==0 && !empty($_GET['jkelamin']) && $_GET['status']==0 ){
				$id_agama= null;
				$j_kelamin =  $_GET['jkelamin'];
				$status = null;
			}else if(!empty($_GET['agama']) && !empty($_GET['jkelamin']) && $_GET['status']==0 ){
				$id_agama= $_GET['agama'];
				$j_kelamin = null;
				$status =  null;
			}else if($_GET['agama']==0 && !empty($_GET['jkelamin']) && !empty($_GET['status']) ){
				$id_agama= $_GET['agama'];
				$j_kelamin = null;
				$status =  null;
			}else if(!empty($_GET['agama']) && $_GET['jkelamin']==0 && !empty($_GET['status']) ){
				$id_agama= $_GET['agama'];
				$j_kelamin = null;
				$status =  null;
			}else if($_GET['agama']==0 && empty($_GET['jkelamin']) && empty($_GET['status']) ){
				$id_agama= $_GET['agama'];
				$j_kelamin = null;
				$status =  null;
			}else if(empty($_GET['agama']) && empty($_GET['jkelamin']) && empty($_GET['status']) ){
				$id_agama= $_GET['agama'];
				$j_kelamin = null;
				$status = null;
			}else if(empty($_GET['agama']) && empty($_GET['jkelamin']) && $_GET['status']==0 ){
				$id_agama= null;
				$j_kelamin = null;
				$status = null;
			}
		}
		$data['siswa'] = $this->SiswaModel->get_all($tahun_masuk,$id_agama,$j_kelamin,$status);
		$agama = $this->SiswaModel->get_agama();
		$data['agama'] = $agama;
		$this->load->view('admin/siswa/data_siswa',$data);
	}
	public function crud($mode)
	{
		if ($mode == 'insert') {
				$config['upload_path']          = './uploads/siswa';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 10240;
				$config['width']                = 300;
                $config['height']               = 400;
				$filename = $this->input->post('nis');
				$config['file_name'] = $filename;
				$this->upload->initialize($config); 
				if($this->upload->do_upload("foto")){ 
					$gbr = $this->upload->data();
					$config['image_library']='gd2';
					$config['source_image']='./uploads/siswa/'.$gbr['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '100%';
					$config['width']= 400;
					$config['height']= 600;
					$config['new_image']= './uploads/siswa/'.$gbr['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					$data = array(
						'nis' => $this->input->post('nis'),
						'nisn' => $this->input->post('nisn'),
						'email' => $this->input->post('email'),
						'nama' => $this->input->post('nama'),
						'foto' => $gbr['file_name'],
						'tempat_lahir' => $this->input->post('tempatlahir'),
						'tanggal_lahir' => $this->input->post('tanggallahir'),
						'id_agama' => $this->input->post('agama'),
						'tahun_masuk' => $this->input->post('tahunmasuk'),
						'j_kelamin' => $this->input->post('jkelamin')
					);
					$result = $this->SiswaModel->insert($data); //kirim value ke model m_upload
					echo json_decode($result);
				}
		}
		else if ($mode == 'update') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$data = array(
					'nisn' => $this->input->post('nisn'),
					'email' => $this->input->post('email'),
					'nama' => $this->input->post('nama'),
                    'j_kelamin' => $this->input->post('jkelamin'),
                    'tempat_lahir' => $this->input->post('tempatlahir'),
					'tanggal_lahir' => $this->input->post('tanggallahir'),
					'tahun_masuk' => $this->input->post('tahunmasuk'),
					'id_agama' => $this->input->post('agama')
				);
				if (empty($_FILES['foto']['name'])) 
				{
					// $data['foto']=harus null biar bisa diinsert
				}
				else
				{	
					$patch = $this->db->get_where('siswa',['nis' => $id])->row();
					if($patch){
					  if(file_exists("uploads/siswa/".$patch->foto)){
						unlink("uploads/siswa/".$patch->foto);
					  }else{
					  }
				    }
					$config['upload_path']          = './uploads/siswa';
					$config['allowed_types']        = 'gif|jpg|png';
					$config['max_size']             = 10240;
					$config['width']                = 300;
					$config['height']               = 400;
					$filename = $this->input->post('nis');
					$config['file_name'] = $filename;
					$this->upload->initialize($config); 
					if($this->upload->do_upload("foto")){ 
						$gbr = $this->upload->data();
						$config['image_library']='gd2';
						$config['source_image']='./uploads/siswa/'.$gbr['file_name'];
						$config['create_thumb']= FALSE;
						$config['maintain_ratio']= FALSE;
						$config['quality']= '100%';
						$config['width']= 400;
						$config['height']= 600;
						$config['new_image']= './uploads/siswa/'.$gbr['file_name'];
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();
						$data['foto'] = $gbr['file_name'];
					}
				}
				$result = $this->SiswaModel->update($data, $id);
				echo json_decode($result);
			}
		}
		else if ($mode == 'delete') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$result = $this->SiswaModel->delete($id);
				echo json_encode($result);
			}
		}
		else if ($mode == 'update_status') {
			if ($this->input->is_ajax_request()) {
				$arr = $_POST['arr'];
				$ids = implode("','", $arr);
				$result = $this->SiswaModel->update_status($ids);
				echo json_encode($result);
			}
		}
	}
	public function get_by_id() {
		$id = $this->input->get('id');
		$data = $this->SiswaModel->get_by_id($id);
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
                    "nama"=> $rowData[0][1],
					"j_kelamin"=> $rowData[0][2],
					"tempat_lahir"=> $rowData[0][3],
					"tanggal_lahir"=> \PHPExcel_Style_NumberFormat::toFormattedString($rowData[0][4], 'YYYY-MM-DD'),
					"id_agama"=> $rowData[0][5],
					"tahun_masuk"=> $rowData[0][6],
					"foto"=> $rowData[0][7]
                );
 
                $insert = $this->db->insert("siswa",$data);                     
            }
    }
	// public function multipleUpload() { 
	// 	$this->load->library('upload');
	// 	$image = array();
	// 	$ImageCount = count($_FILES['image_name']['name']);
	// 		  for($i = 0; $i < $ImageCount; $i++){
	// 			  $_FILES['file']['name']       = $_FILES['image_name']['name'][$i];
	// 			  $_FILES['file']['type']       = $_FILES['image_name']['type'][$i];
	// 			  $_FILES['file']['tmp_name']   = $_FILES['image_name']['tmp_name'][$i];
	// 			  $_FILES['file']['error']      = $_FILES['image_name']['error'][$i];
	// 			  $_FILES['file']['size']       = $_FILES['image_name']['size'][$i];
	  
	// 			  // File upload configuration
	// 			  $uploadPath = './assets/images/profiles/';
	// 			  $config['upload_path'] = $uploadPath;
	// 			  $config['allowed_types'] = 'jpg|jpeg|png|gif';
	  
	// 			  // Load and initialize upload library
	// 			  $this->load->library('upload', $config);
	// 			  $this->upload->initialize($config);
	  
	// 			  // Upload file to server
	// 			  if($this->upload->do_upload('file')){
	// 				  // Uploaded file data
	// 				  $imageData = $this->upload->data();
	// 				   $uploadImgData[$i]['image_name'] = $imageData['file_name'];
	  
	// 			  }
	// 		  }
	// 	}

	// Upload multi Image With Resize
	public function multipleUpload() {
	$config['upload_path'] = './uploads/siswa/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = 1024;
    $config['encrypt_name'] = FALSE;

    $this->load->library('upload');

    $files = $_FILES;
    $cpt = count($_FILES['files']['name']);
    for($i=0; $i<$cpt; $i++)
    {
        $_FILES['files']['name']= $files['files']['name'][$i];
        $_FILES['files']['type']= $files['files']['type'][$i];
        $_FILES['files']['tmp_name']= $files['files']['tmp_name'][$i];
        $_FILES['files']['error']= $files['files']['error'][$i];
        $_FILES['files']['size']= $files['files']['size'][$i];    

        $this->upload->initialize($config);
        $this->upload->do_upload('files');
        $tmp = $this->upload->data();

        $this->load->library('image_lib'); 
        // //Pembuatan Thumnail
        // $config_t['source_image']   = '---path---' . $tmp['file_name'];
        // $config_t['new_image']  = '--path to thumbnail ---' . $tmp['file_name'];
        // $config_t['create_thumb'] = FALSE;///change this
        // $config_t['maintain_ratio'] = TRUE;
        // $config_t['width']   = 110;
        // $config_t['height'] = 110;
        // //end of configs

        //     $this->load->library('image_lib', $config_t); 
        //     $this->image_lib->initialize($config_t);
        //     if(!$this->image_lib->resize())
        //         echo "Failed." . $this->image_lib->display_errors();

        //Atur Resize Multiple
        $config_r['source_image']   = './uploads/siswa/' . $tmp['file_name'];
		$config_r['create_thumb']= FALSE;
		$config_r['maintain_ratio']= FALSE;
        $config_r['quality'] = 100;
		$config_r['width']= 300;
		$config_r['height']= 400;
        //end of configs
            $this->load->library('image_lib', $config_r); 
            $this->image_lib->initialize($config_r);
            if(!$this->image_lib->resize())
                echo "Failed." . $this->image_lib->display_errors();

      }
	}
	public function export(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();
		// Settingan awal fil excel
		$excel->getProperties()->setCreator('My Notes Code')
					 ->setLastModifiedBy('My Notes Code')
					 ->setTitle("Data Siswa")
					 ->setSubject("Siswa")
					 ->setDescription("Laporan Semua Data Siswa")
					 ->setKeywords("Data Siswa");
		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
		  'font' => array('bold' => true), // Set font nya jadi bold
		  'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ),
		  'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		  )
		);
		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
		  'alignment' => array(
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ),
		  'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		  )
		);
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SISWA"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "NIS"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "FOTO"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "TEMPAT LAHIR"); // Set kolom E3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "TANGGAL LAHIR");
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "AGAMA");
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "Jenis Kelamin");
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$siswa = $this->SiswaModel->get_all();
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($siswa as $data){ // Lakukan looping pada variabel siswa
		  $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
		  $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nis);
		  $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama);
		  $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->foto);
		  $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->tempat_lahir);
		  $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->tanggal_lahir);
		  $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->agama);
		  $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->j_kelamin);
		  
		  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		  $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		  
		  $no++; // Tambah 1 setiap kali looping
		  $numrow++; // Tambah 1 setiap kali looping
		}
		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(30); 
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Laporan Data Siswa");
		$excel->setActiveSheetIndex(0);
		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Siswa.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	  }
}
