<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('SiswaModel');
		$this->load->library('upload');
		$this->load->library('Excel'); 
		$this->load->database();
	}
	public function index()
	{
		$agama = $this->SiswaModel->get_agama();
		$data['agama'] = $agama;
		$tahunmasuk = $this->SiswaModel->get_tahun();
		$data['tahunmasuk'] = $tahunmasuk;
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php');
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('admin/siswa/view.php', $data);
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('admin/siswa/script.php');
	}
	public function get_all()
	{
		$siswa = $this->SiswaModel->get_all();
		$data['siswa'] = $siswa;
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
				$id = $this->input->post('nis');
				$data = array(
					'nis' => $this->input->post('nis'),
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
}
