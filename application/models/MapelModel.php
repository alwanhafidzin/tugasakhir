<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MapelModel extends CI_Model {
	public $table = 'mapel';

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function update($data, $id)
	{
		return $this->db->update($this->table, $data, array('kode_mapel' => $id));
	}

	public function delete($id)
	{
		return $this->db->delete($this->table, array('kode_mapel' => $id));
	}
	public function get_all($id_jurusan,$id_k_mapel){
		$sql ='select m.kode_mapel,m.mapel,m.id_k_mapel,m.kode_jurusan,k.kelompok_mapel,j.jurusan from mapel m INNER JOIN kelompok_mapel k ON 
		m.id_k_mapel = k.id INNER JOIN jurusan j ON m.kode_jurusan = j.kode_jurusan WHERE m.kode_jurusan = IFNULL(?,m.kode_jurusan) AND m.id_k_mapel= IFNULL(?,m.id_k_mapel) ORDER BY m.kode_mapel';
		return $this->db->query($sql, array($id_jurusan, $id_k_mapel));
	}
	public function get_kelompok_mapel(){
		$this->db->select('*');
		$this->db->from('kelompok_mapel');
		return $this->db->get()->result();
	}
	public function get_jurusan(){
		$this->db->select('*');
		$this->db->from('jurusan');
		$this->db->order_by('jurusan','ASC');
		return $this->db->get()->result();
	}
	public function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('mapel m');
		$query = $this->db->get_where($this->table, array('m.kode_mapel' => $id));
		$data['object'] = $query->row();
		$data['array'] = $query->row_array();
		$data['count'] = $query->num_rows();
		return $data;
	}
}
?>