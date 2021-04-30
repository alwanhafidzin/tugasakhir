<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('GuruModel');
		$this->load->library('upload');
		$this->load->library('Excel'); 
		$this->load->database();
	}
	public function index()
	{
		$agama = $this->GuruModel->get_agama();
		$data['agama'] = $agama;
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php');
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('admin/guru/view.php', $data);
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('admin/guru/script.php');
	}
	public function get_all()
	{
		if(!empty($_GET['agama']) && empty($_GET['gender']) ){
			$id_agama= $_GET['agama'];
			$gender= null;
			$guru = $this->GuruModel->get_all($id_agama,$gender);
		}else if(empty($_GET['agama']) && !empty($_GET['gender']) ){
			$id_agama= null;
			$gender= $_GET['gender'];
			$guru = $this->GuruModel->get_all($id_agama,$gender);
		}else if(!empty($_GET['agama']) && !empty($_GET['gender']) ){
			$id_agama= $_GET['agama'];
			$gender= $_GET['gender'];
			$guru = $this->GuruModel->get_all($id_agama,$gender);
		}else if(empty($_GET['agama']) && empty($_GET['gender']) ){
			$id_agama= null;
			$gender= null;
			$guru = $this->GuruModel->get_all($id_agama,$gender);
		}else if($_GET['agama']==0 && $_GET['gender']==0 ){
			$id_agama= null;
			$gender= null;
			$guru = $this->GuruModel->get_all($id_agama,$gender);
		}
		$data['guru'] = $guru;
		$agama = $this->GuruModel->get_agama();
		$data['agama'] = $agama;
		$this->load->view('admin/guru/data_guru',$data);
	}
	public function crud($mode)
	{
		if ($mode == 'insert') {
				$config['upload_path']          = './uploads/guru';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 10240;
				$config['width']                = 300;
                $config['height']               = 400;
				$filename = $this->input->post('nip');
				$config['file_name'] = $filename;
				$this->upload->initialize($config); 
				if($this->upload->do_upload("foto")){ 
					$gbr = $this->upload->data();
					$config['image_library']='gd2';
					$config['source_image']='./uploads/guru/'.$gbr['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '100%';
					$config['width']= 400;
					$config['height']= 600;
					$config['new_image']= './uploads/guru/'.$gbr['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					$data = array(
						'nip' => $this->input->post('nip'),
						'nama' => $this->input->post('nama'),
						'foto' => $gbr['file_name'],
						'email' => $this->input->post('email'),
						'id_agama' => $this->input->post('agama')
					);
					$result = $this->GuruModel->insert($data);
					echo json_decode($result);
				}
		}
		else if ($mode == 'update') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('ni');
				$data = array(
					'nip' => $this->input->post('nip'),
					'nama' => $this->input->post('nama'),
					'email' => $this->input->post('email'),
					'id_agama' => $this->input->post('agama')
				);
				if (empty($_FILES['foto']['name'])) 
				{
					// $data['foto']=harus null biar bisa diinsert
				}
				else
				{	
					$patch = $this->db->get_where('guru',['nip' => $id])->row();
					if($patch){
					  if(file_exists("uploads/guru/".$patch->foto)){
						unlink("uploads/guru/".$patch->foto);
					  }else{
					  }
				    }
					$config['upload_path']          = './uploads/guru';
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
						$config['source_image']='./uploads/guru/'.$gbr['file_name'];
						$config['create_thumb']= FALSE;
						$config['maintain_ratio']= FALSE;
						$config['quality']= '100%';
						$config['width']= 400;
						$config['height']= 600;
						$config['new_image']= './uploads/guru/'.$gbr['file_name'];
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();
						$data['foto'] = $gbr['file_name'];
					}
				}
				$result = $this->GuruModel->update($data, $id);
				echo json_decode($result);
			}
		}
		else if ($mode == 'delete') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$result = $this->GuruModel->delete($id);
				echo json_encode($result);
			}
		}
	}
	public function get_by_id() {
		$id = $this->input->get('id');
		$data = $this->GuruModel->get_by_id($id);
		echo json_encode($data);
	} 
	public function importExcel(){
        $fileName = time().'-'.$_FILES['excel']['name']; 
        $config['upload_path'] = './uploads/excel/guru/'; //path upload
        $config['file_name'] = $fileName;  // nama file
        $config['allowed_types'] = 'xls|xlsx|csv'; //tipe file yang diperbolehkan
        $config['max_size'] = 10000; // maksimal sizze
 
        $this->load->library('upload'); //meload librari upload
        $this->upload->initialize($config);
          
        if(! $this->upload->do_upload('excel') ){
            echo $this->upload->display_errors();exit();
        }
              
        $inputFileName = './uploads/excel/guru'.$fileName;
 
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
                    "nip"=> $rowData[0][0],
                    "nama"=> $rowData[0][1],
					"gender"=> $rowData[0][2],
					"id_agama"=> $rowData[0][3],
					"email"=> $rowData[0][4],
					"foto"=> $rowData[0][5]
                );
 
                $insert = $this->db->insert("guru",$data);                     
            }
    }
	public function multipleUpload() {
	$config['upload_path'] = './uploads/guru/';
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

        //Atur Resize Multiple
        $config_r['source_image']   = './uploads/guru/' . $tmp['file_name'];
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
