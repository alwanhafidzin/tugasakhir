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
	public function get_all($id_tipe,$id_mapel,$nip){
		$sql ='SELECT k.nama_ujian,k.tgl_dibuat,k.id,t.tipe,m.mapel,COUNT(b.id) as jumlah_soal FROM kategori_ujian k  INNER JOIN tipe_ujian t ON t.id=k.id_t_ujian INNER JOIN mapel m ON k.kode_mapel=m.kode_mapel LEFT JOIN bank_soal b ON b.id_k_ujian=k.id WHERE k.id_t_ujian = IFNULL(?,k.id_t_ujian) AND k.kode_mapel= IFNULL(?,k.kode_mapel) AND k.nip=? GROUP BY k.id ORDER BY k.id DESC;';
		return $this->db->query($sql, array($id_tipe, $id_mapel,$nip));
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
	public function get_share_by_id($id)
	{
		$this->db->select('k.id,k.nama_ujian,k.tgl_dibuat,m.mapel,k.kode_mapel,t.tipe,COUNT(b.id) as jumlah_soal');
		$this->db->join('tipe_ujian t','t.id=k.id_t_ujian');
		$this->db->join('mapel m','m.kode_mapel=k.kode_mapel');
		$this->db->join('bank_soal b','b.id_k_ujian=k.id','LEFT');
		$query = $this->db->get_where('kategori_ujian k', array('k.id' => $id));
		$data['object'] = $query->row();
		$data['array'] = $query->row_array();
		$data['count'] = $query->num_rows();
		return $data;
	}
}
?>