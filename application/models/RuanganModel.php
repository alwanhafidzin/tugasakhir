<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class RuanganModel extends CI_Model {
	public $table = 'ruangan';

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function update($data, $id)
	{
		return $this->db->update($this->table, $data, array('kode_ruangan' => $id));
	}

	public function delete($id)
	{
		return $this->db->delete($this->table, array('kode_ruangan' => $id));
	}
	public function get_all(){
		$this->db->select('*');
		$this->db->from('ruangan');
		return $this->db->get();
	}
	public function get_by_id($id)
	{
		$query = $this->db->get_where($this->table, array('kode_ruangan' => $id));
		$data['object'] = $query->row();
		$data['array'] = $query->row_array();
		$data['count'] = $query->num_rows();
		return $data;
	}
	public function isRuanganRelation($id) {
		$sql ="SELECT COUNT(kode_ruangan) as jumlah FROM ruangan_siswa WHERE kode_ruangan=?";
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