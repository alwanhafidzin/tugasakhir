<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class KelompokMapelModel extends CI_Model {
	public $table = 'kelompok_mapel';

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
		$this->db->select('*');
		$this->db->from('kelompok_mapel');
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
	public function isKelompokMapelRelation($id) {
		$sql ="SELECT COUNT(id_k_mapel) as jumlah FROM mapel WHERE id_k_mapel=?";
        $jumlah =$this->db->query($sql, array($id));
		foreach($jumlah->result() as $result){
			$jumlah = $result->jumlah;
		}
		if($jumlah==0){
			echo 'hapus';
		}else if($jumlah > 0){
			echo 'gagal';
		}
    }
}
?>