<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class IdentityModel extends CI_Model {

	public function get_siswa($username){
		$this->db->select('*');
		$this->db->from('siswa');
        $this->db->where('nis',$username);
		return $this->db->get();
	}
    public function get_guru($username){
		$this->db->select('*');
		$this->db->from('guru');
        $this->db->where('nip',$username);
		return $this->db->get();
	}
    public function get_admin($user_id){
		$this->db->select('*');
		$this->db->from('users');
        $this->db->where('nip',$user_id);
		return $this->db->get();
	}
}
?>