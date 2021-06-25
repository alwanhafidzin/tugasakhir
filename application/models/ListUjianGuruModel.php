<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ListUjianGuruModel extends CI_Model {
	public $table = 'ujian';

    function insert_soal_random($id_d_ujian,$id_k_ujian,$jumlah,$waktu)
	{
		$this->db->select('id');
		$this->db->from('bank_soal');
		$this->db->order_by('RAND()');
        $this->db->limit($jumlah);
		$ujian = $this->db->get();
		foreach ($ujian->result() as $row) {
			$soal = array(
				'id_u_detail'			=> $id_d_ujian,
				'id_soal'               => $row->id,
				'ragu'                  =>'N'
			);
			$this->db->insert('ujian_detail_soal', $soal);
            $datetime = date('Y-m-d H:i:s');
            $newTime = date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s")." +$waktu minutes"));
            $this->db->query('UPDATE ujian_detail SET waktu_mulai= "'.$datetime.'",waktu_selesai="'.$newTime.'" WHERE id= "'.$id_d_ujian.'"');
		}
	}
	public function insert_detail($id,$nis,$nilai)
	{
		return $this->db->query('INSERT INTO ujian_detail (id_ujian,nis,nilai) VALUES ("'.$id.'","'.$nis.'","'.$nilai.'")');
	}
	
	public function update($data, $id)
	{
		return $this->db->update($this->table, $data, array('id' => $id));
	}
	
	public function delete($id)
	{
		return $this->db->delete($this->table, array('id' => $id));
	}
	public function get_all($nip){
		$this->db->select('u.id,u.terlambat,k.nama_ujian,u.terlambat,m.mapel,t.tipe,u.id_k_ujian,u.jenis,u.waktu');
		$this->db->from('ujian u');
        $this->db->join('kategori_ujian k','k.id=u.id_k_ujian');
        $this->db->join('mapel m','m.kode_mapel=k.kode_mapel');
        $this->db->join('tipe_ujian t','t.id=k.id_t_ujian');
		$this->db->where('k.nip',$nip);
        $this->db->order_by('u.tgl_mulai','DESC');
        $this->db->order_by('u.terlambat','DESC');
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
	public function get_kategori_ujian($nip){
		$this->db->select('*');
		$this->db->from('kategori_ujian');
		$this->db->where('nip',$nip);
		return $this->db->get()->result();
	}
}
?>