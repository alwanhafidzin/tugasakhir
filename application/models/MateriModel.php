<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MateriModel extends CI_Model {
	public $table = 'materi';

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function update($data, $id)
	{
		return $this->db->update($this->table, $data, array('id' => $id));
	}
	
	public function delete($id)
	{
		return $this->db->delete($this->table, array('id' => $id));
	}
	public function get_all(){
		$this->db->select('m.id,m.judul,m.content,i.jenis,m.nip,m.path');
		$this->db->from('materi m');
		$this->db->join('materi_tipe i','m.id_m_tipe=i.id');
		$this->db->where('m.nip','3509176412630001');
		$this->db->order_by('m.id','DESC');
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
}
?>