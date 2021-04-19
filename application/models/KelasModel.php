<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class KelasModel extends CI_Model {
	public $table = 'kelas';

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function update($data, $id)
	{
		return $this->db->update($this->table, $data, array('kode_kelas' => $id));
	}

	public function delete($id)
	{
		return $this->db->delete($this->table, array('kode_kelas' => $id));
	}
	public function get_all($id_jurusan,$id_kelas){
		$sql ='select k.kode_kelas,k.nama_kelas,k.kode_tingkat,k.kode_jurusan,t.tingkatan,j.jurusan from kelas k INNER JOIN tingkat_kelas t ON 
		k.kode_tingkat = t.kode_tingkat INNER JOIN jurusan j ON k.kode_jurusan = j.kode_jurusan WHERE k.kode_jurusan = IFNULL(?,k.kode_jurusan) AND k.kode_tingkat= IFNULL(?,k.kode_tingkat) ORDER BY k.kode_kelas';
		return $this->db->query($sql, array($id_jurusan, $id_kelas));
		// $this->db->select('k.kode_kelas,k.nama_kelas,k.kode_tingkat,k.kode_jurusan,t.tingkatan,j.jurusan');
		// $this->db->from('kelas k');
        // $this->db->join('tingkat_kelas t', 'k.kode_tingkat = t.kode_tingkat');
        // $this->db->join('jurusan j', 'k.kode_jurusan = j.kode_jurusan');
		// $this->db->where('k.kode_jurusan','IFNULL("'.$id_jurusan.'",k.kode_jurusan');
		// $this->db->where('k.kode_tingkat','IFNULL("'.$id_kelas.'",k.kode_tingkat');
		// $this->db->order_by('kode_kelas', 'ASC');
		// return $this->db->get();
	}
	public function get_tingkat_kelas(){
		$this->db->select('*');
		$this->db->from('tingkat_kelas');
		$this->db->order_by('tingkatan', 'ASC');
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
		$this->db->select('k.kode_kelas,k.nama_kelas,k.kode_tingkat,k.kode_jurusan,t.tingkatan,j.jurusan');
		$this->db->from('kelas k');
        $this->db->join('tingkat_kelas t', 'k.kode_tingkat = t.kode_tingkat');
        $this->db->join('jurusan j', 'k.kode_jurusan = j.kode_jurusan');
		$query = $this->db->get_where($this->table, array('k.kode_kelas' => $id));
		$data['object'] = $query->row();
		$data['array'] = $query->row_array();
		$data['count'] = $query->num_rows();
		return $data;
	}
}
?>