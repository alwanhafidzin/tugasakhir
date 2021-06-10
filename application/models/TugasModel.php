<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class TugasModel extends CI_Model {
	public $table = 'tugas';

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
		$this->db->select('t.id,t.judul,t.content,t.tgl_dibuat,m.kode_mapel,m.mapel');
		$this->db->from('tugas t');
		$this->db->join('mapel m', 't.kode_mapel=m.kode_mapel');
		$this->db->where('t.nip','3509176412630001');
		$this->db->order_by('t.tgl_dibuat','DESC');
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