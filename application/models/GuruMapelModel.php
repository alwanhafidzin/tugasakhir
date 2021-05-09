<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class GuruMapelModel extends CI_Model {
	public $table = 'guru_mapel';

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
	public function get_all($id_jurusan,$id_mapel){
		$sql ='select gm.id,g.nip,g.nama,m.mapel,m.kode_jurusan,k.kelompok_mapel,j.jurusan from guru_mapel gm INNER JOIN mapel m ON gm.kode_mapel=m.kode_mapel INNER JOIN guru g ON gm.nip=g.nip INNER JOIN kelompok_mapel k ON 
		m.id_k_mapel = k.id INNER JOIN jurusan j ON m.kode_jurusan = j.kode_jurusan WHERE m.kode_jurusan = IFNULL(?,m.kode_jurusan) AND gm.kode_mapel= IFNULL(?,gm.kode_mapel) ORDER BY m.kode_mapel';
		return $this->db->query($sql, array($id_jurusan, $id_mapel));
	}
	public function get_mapel(){
		$this->db->select('*');
		$this->db->from('mapel');
        $this->db->order_by('kode_mapel','ASC');
		return $this->db->get()->result();
	}
    public function get_guru(){
		$this->db->select('*');
		$this->db->from('guru');
        $this->db->order_by('nip','ASC');
		return $this->db->get()->result();
	}
	public function get_jurusan(){
		$this->db->select('*');
		$this->db->from('jurusan');
		$this->db->order_by('jurusan','ASC');
		return $this->db->get()->result();
	}
    public function get_detail_mapel($kode_mapel){
		$this->db->select('k.kelompok_mapel,j.jurusan');
		$this->db->from('mapel m');
        $this->db->join('kelompok_mapel k', 'k.id=m.id_k_mapel');
        $this->db->join('jurusan j', 'm.kode_jurusan=j.kode_jurusan');
        $query = $this->db->get_where('mapel', array('m.kode_mapel' => $kode_mapel));
        $data['object'] = $query->row();
		$data['array'] = $query->row_array();
		$data['count'] = $query->num_rows();
		return $data;
	}
	public function get_by_id($id)
	{
		$this->db->select('gm.id,gm.kode_mapel,j.jurusan,k.kelompok_mapel,gm.nip,j.jurusan,m.id_k_mapel');
		$this->db->from('guru_mapel gm');
		$this->db->join('mapel m', 'm.kode_mapel=gm.kode_mapel');
		$this->db->join('kelompok_mapel k', 'k.id=m.id_k_mapel');
        $this->db->join('jurusan j', 'm.kode_jurusan=j.kode_jurusan');
		$query = $this->db->get_where($this->table, array('gm.id' => $id));
		$data['object'] = $query->row();
		$data['array'] = $query->row_array();
		$data['count'] = $query->num_rows();
		return $data;
	}
}
?>