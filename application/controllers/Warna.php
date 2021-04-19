<?php
   class Warna extends CI_Controller{
    public function __construct(){
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('Warna_m');
		$this->load->database();
        $this->load->helper('form');
	}
       public function index(){
           $data['tampil_warna'] = $this->Warna_m->tampil_warna();
           $this->load->view('tes/Warna', $data);
       }
       public function insert(){
           $check = $this->input->post('check_list');
           foreach($check as $object){
               $this->Warna_m->insertwarna(array(
                   'option' => $object
               ));
           }
           redirect('warna');
       }
   }
?>