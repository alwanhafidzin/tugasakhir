<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agama extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper('url');
		$this->load->library('ssp');
		$this->load->helper('form');
		$this->load->model('AgamaModel');
		$this->load->database();
	}
	public function index()
	{
        $this->load->view('templates/dashboard/header.php');
        $this->load->view('templates/dashboard/navbar.php');
        $this->load->view('templates/dashboard/sidebar.php');
		$this->load->view('admin/agama/view.php');
		$this->load->view('templates/dashboard/footer.php');
		$this->load->view('admin/agama/script.php');
	}
	public function get_all()
	{
		$agama = $this->AgamaModel->get_all();
		$data['agama'] = $agama;
		$this->load->view('admin/agama/data_agama',$data);
	}
	public function data()
		{

			// nama table
			$table      = 'agama';
			// nama PK
			$primaryKey = 'id';
			// list field yang mau ditampilkan
			$columns    = array(
				//tabel db(kolom di database) => dt(nama datatable di view)
				array('db' => 'id', 'dt' => 'id_agama'),
		        array('db' => 'agama', 'dt' => 'agama'),
		        array(
		              'db' => 'id',
		              'dt' => 'aksi',
		              'formatter' => function($id) {
		               		return ('<i class="btn btn-xs btn-primary edit-data fa fa-edit" id="edit-data" data-target="" data-id="'.$id.'" data-placement="top" title="Edit"></i>').'
		               		'.anchor('tahunakademik/delete/'.$id, '<i class="fa fa-times fa fa-white"></i>', 'class="btn btn-xs btn-danger" data-placement="top" title="Delete"');
		            }
		        )
		    );

			$sql_details = array(
				'user' => $this->db->username,
				'pass' => $this->db->password,
				'db'   => $this->db->database,
				'host' => $this->db->hostname
		    );

		    echo json_encode(
		     	SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
		     );
		}
		
	public function crud($mode)
	{
		$this->load->model('AgamaModel');
		if ($mode == 'insert') {
			if ($this->input->is_ajax_request()) {
				$data = array(
					'agama' => $this->input->post('agama')
				);
				$result = $this->AgamaModel->insert($data);
				echo json_encode($result);
			}
		}
		else if ($mode == 'update') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$data = array(
					'agama' => $this->input->post('agama')
				);
				$result = $this->AgamaModel->update($data, $id);
				echo json_encode($result);
			}
		}
		else if ($mode == 'delete') {
			if ($this->input->is_ajax_request()) {
				$id = $this->input->post('id');
				$result = $this->AgamaModel->delete($id);
				echo json_encode($result);
			}
		}
	}
	public function get_by_id() {
		$id = $this->input->get('id');
		$data = $this->AgamaModel->get_by_id($id);
		echo json_encode($data);
	}
}