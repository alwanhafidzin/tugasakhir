<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriUjianModel extends CI_Model {
	public $table = 'kategori_ujian';

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
	public function get_all($id_tipe,$id_mapel){
		$sql ='SELECT k.nama_ujian,k.id,t.tipe,m.mapel FROM kategori_ujian k  INNER JOIN tipe_ujian t ON t.id=k.id_t_ujian INNER JOIN mapel m ON k.kode_mapel=m.kode_mapel WHERE k.id_t_ujian = IFNULL(?,k.id_t_ujian) AND k.kode_mapel= IFNULL(?,k.kode_mapel) ORDER BY k.id DESC';
		return $this->db->query($sql, array($id_tipe, $id_mapel));
	}
	public function get_by_id($id)
	{
		$query = $this->db->get_where($this->table, array('id' => $id));
		$data['object'] = $query->row();
		$data['array'] = $query->row_array();
		$data['count'] = $query->num_rows();
		return $data;
	}
	public function get_tipe_ujian(){
		$this->db->select('*');
		$this->db->from('tipe_ujian');
		return $this->db->get()->result();
	}
}
?>