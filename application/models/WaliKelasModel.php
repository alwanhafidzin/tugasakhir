<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class WaliKelasModel extends CI_Model {
    function insert_walikelas($id_tahun_akademik)
		 {
		 	$kelas = $this->db->get('kelas');
		 	foreach ($kelas->result() as $row) {
		 		$walikelas = array(
		 			'id_guru'				=> '0',
		 			'id_tahun_akademik'		=> $id_tahun_akademik,
		 			'kode_kelas'				=> $row->kode_kelas
		 		);
		 		$this->db->insert('wali_kelas', $walikelas);
		 	}
		 }

}
?>