<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class BuatAkunModel extends CI_Model {
	public function get_all($tipe){
		$sql ="Select  identity,nama,email,tipe
		From    (
			Select  s.nama,s.nis as identity,s.email, 'siswa' as tipe
			From  siswa s LEFT JOIN users u ON s.nis=u.username WHERE u.username IS NULL AND s.status='active'
			Union
			Select g.nama,g.nip as identity,g.email, 'guru' as tipe 
			From   guru g LEFT JOIN users u ON g.nip=u.username WHERE u.username IS NULL AND g.status='active'
		) As a
		WHERE tipe= IFNULL(?,tipe)
		Group By identity
		Order By identity";
		return $this->db->query($sql, array($tipe));
	}
	public function get_by_id_siswa($id)
	{
		$query = $this->db->get_where('siswa', array('nis' => $id));
		$data['object'] = $query->row();
		$data['array'] = $query->row_array();
		$data['count'] = $query->num_rows();
		return $data;
	}
	public function get_by_id_guru($id)
	{
		$query = $this->db->get_where('guru', array('nip' => $id));
		$data['object'] = $query->row();
		$data['array'] = $query->row_array();
		$data['count'] = $query->num_rows();
		return $data;
	}
}
?>