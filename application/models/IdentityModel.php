<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class IdentityModel extends CI_Model {

	public function get_siswa($username){
		$this->db->select('*');
		$this->db->from('siswa s');
		$this->db->join('agama a','s.id_agama=a.id');
        $this->db->where('nis',$username);
		return $this->db->get();
	}
    public function get_guru($username){
		$this->db->select('*');
		$this->db->from('guru g');
		$this->db->join('agama a','g.id_agama=a.id');
        $this->db->where('nip',$username);
		return $this->db->get();
	}
    public function get_admin($username){
		$this->db->select('b.id,b.username,b.nama,b.gender,b.foto,u.email,a.agama');
		$this->db->from('biodata_admin b');
		$this->db->join('users u','u.username=b.username');
		$this->db->join('agama a','b.id_agama=a.id');
        $this->db->where('u.username',$username);
		return $this->db->get();
	}
}
?>