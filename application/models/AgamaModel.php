<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AgamaModel extends CI_Model {
	public $table = 'agama';

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
		$this->db->from('agama');
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
	public function isAgamaRelation($id) {
		$sql ="SELECT ((SELECT COUNT(id_agama) as jumlah FROM siswa WHERE id_agama=?)+(SELECT COUNT(id_agama)as jumlah FROM guru WHERE id_agama=?)+(SELECT COUNT(id_agama) as jumlah FROM biodata_admin WHERE id_agama=?)) as jumlah";
        $jumlah =$this->db->query($sql, array($id ,$id, $id));
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