<?php 
	class Warna_m extends CI_Model{
	//insert data
		public function insertwarna($data){
			$this->db->insert('warna',$data);
		}
	//tampil data
		public function tampil_warna(){
			return $this->db->get('warna')->result();
		}
	}
?>