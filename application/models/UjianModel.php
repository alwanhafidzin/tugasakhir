<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class UjianModel extends CI_Model {
	public $table = 'tugas';

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function update($data, $id)
	{
		return $this->db->update($this->table, $data, array('id' => $id));
	}
	public function update_jawaban($data, $id)
	{
		return $this->db->update('ujian_detail_soal', $data, array('id' => $id));
	}
	public function update_ragu($data, $id)
	{
		return $this->db->update('ujian_detail_soal', $data, array('id' => $id));
	}
	
	public function delete($id)
	{
		return $this->db->delete($this->table, array('id' => $id));
	}
    public function get_ujian_by_id($id){
        $this->db->select('*');
        $this->db->from('ujian_detail');
        $this->db->where('id',$id);
        return $this->db->get();
    }
    public function get_list_soal_by_id($id){
        $this->db->select('*');
        $this->db->from('ujian_detail_soal');
        $this->db->where('id_u_detail',$id);
        return $this->db->get();
    }
	public function get_all(){
		$this->db->select('t.id,t.judul,t.content,t.tgl_dibuat,m.kode_mapel,m.mapel');
		$this->db->from('tugas t');
		$this->db->join('mapel m', 't.kode_mapel=m.kode_mapel');
		$this->db->where('t.nip','3509176412630001');
		$this->db->order_by('t.tgl_dibuat','DESC');
		return $this->db->get();
	}
    public function get_soal($id){
		$this->db->select('b.soal,b.opsi_a,b.opsi_b,b.opsi_c,b.opsi_d,b.opsi_e,u1.id,u1.ragu,u1.jawaban');
        $this->db->from('ujian_detail u');
		$this->db->join('ujian_detail_soal u1','u1.id_u_detail=u.id');
        $this->db->join('bank_soal b','u1.id_soal=b.id');
        $this->db->where('u.id',$id);
        $this->db->limit('1');
		return $this->db->get();
	}
	public function get_soal_button($id,$offset){
		$this->db->select('b.soal,b.opsi_a,b.opsi_b,b.opsi_c,b.opsi_d,b.opsi_e,u1.id,u1.ragu,u1.jawaban');
        $this->db->from('ujian_detail u');
		$this->db->join('ujian_detail_soal u1','u1.id_u_detail=u.id');
        $this->db->join('bank_soal b','u1.id_soal=b.id');
        $this->db->where('u.id',$id);
        $this->db->limit(1,$offset);
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