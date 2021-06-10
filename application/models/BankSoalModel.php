<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class BankSoalModel extends CI_Model {
	public $table = 'bank_soal';

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
	public function get_all($id_tipe,$id_kategori){
		$sql ='SELECT b.soal,b.dibuat_pada,k.nama_ujian,b.id FROM bank_soal b  INNER JOIN kategori_ujian k ON b.id_k_ujian=k.id WHERE k.nip="3509176412630001" AND b.id_k_ujian = IFNULL(?,b.id_k_ujian) AND b.id_k_soal= IFNULL(?,b.id_k_soal) ORDER BY b.dibuat_pada DESC';
		return $this->db->query($sql, array($id_kategori, $id_tipe));
	}
	public function get_by_id($id)
	{
		$query = $this->db->get_where($this->table, array('id' => $id));
		$data['object'] = $query->row();
		$data['array'] = $query->row_array();
		$data['count'] = $query->num_rows();
		return $data;
	}
    public function get_kategori_ujian(){
		$this->db->select('*');
		$this->db->from('kategori_ujian');
		$this->db->where('nip', '3509176412630001');
		$this->db->order_by('id','DESC');
		return $this->db->get()->result();
	}
	public function get_kategori_soal(){
		$this->db->select('*');
		$this->db->from('kategori_soal');
		$this->db->where('nip', '3509176412630001');
		$this->db->order_by('kategori','ASC');
		return $this->db->get()->result();
	}
	public function get_tipe_soal($kategori){
		$this->db->select('DISTINCT(k.id),k.kategori');
		$this->db->from('bank_soal b');
		$this->db->join('kategori_soal k', 'k.id=b.id_k_soal');
        $this->db->where('b.id_k_ujian', $kategori);
		$this->db->where('k.nip', '3509176412630001');
        $result = $this->db->order_by('k.kategori', 'ASC')->get()->result();
        $data=array();
        foreach($result as $r)
        {
         $data['id']=$r->id;
         $data['kategori']=$r->kategori;
         $json[]=$data;
        }
		echo json_encode($json);
	}
	public function get_detail_ujian($id_kategori_ujian){
		$this->db->select('m.mapel,t.tipe');
		$this->db->join('tipe_ujian t','t.id=k.id_t_ujian');
		$this->db->join('mapel m', 'k.kode_mapel=m.kode_mapel');
        $query = $this->db->get_where('kategori_ujian k', array('k.id' => $id_kategori_ujian));
        $data['object'] = $query->row();
		$data['array'] = $query->row_array();
		$data['count'] = $query->num_rows();
		return $data;
	}
}
?>