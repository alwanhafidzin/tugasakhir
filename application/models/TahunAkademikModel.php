<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class TahunAkademikModel extends CI_Model {
	public $table = 'tahun_akademik';

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function update($data, $id)
	{
		return $this->db->update($this->table, $data, array('id' => $id));
	}
	public function get_all(){
		$this->db->select('*');
		$this->db->from('tahun_akademik');
		$this->db->order_by('tahun_akademik','DESC');
		return $this->db->get();
	}
	public function get_by_id($id)
	{
		$query = $this->db->get_where($this->table, array('id' => $id));
		$data['object'] = $query->row();
		$data['array'] = $query->row_array();
		$data['count'] = $query->num_rows();
		return $data;
	}
	public function set_aktif($id_tahunakademik){
		$off_all = "UPDATE tahun_akademik SET is_aktif = 'N' WHERE is_aktif = 'Y'";
		$off 	 = $this->db->query($off_all);
		$on 	 = "UPDATE tahun_akademik SET is_aktif = 'Y' WHERE id = '$id_tahunakademik'";
		$active	 = $this->db->query($on);
		return $active;
	}
}
?>