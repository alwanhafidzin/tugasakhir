<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class SiswaModel extends CI_Model {
	public $table = 'siswa';

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function update($data, $id)
	{
		return $this->db->update($this->table, $data, array('nis' => $id));
	}

	public function delete($id)
	{
		$get_siswa = $this->db->get_where('siswa',['nis' => $id])->row();
        if ($get_siswa){
           if ($get_siswa->foto == NULL) {
		      $query = $this->db->delete('siswa',['nis'=>$id]);
		   }
           else {
			  $query = $this->db->delete('siswa',['nis'=>$id]);
			  if($query){
				return unlink("uploads/siswa/".$get_siswa->foto);
			}
		  }
        }
	}
	public function get_all(){
        $this->db->select('s.nis,s.nama,s.j_kelamin,s.tempat_lahir,s.tanggal_lahir,s.tahun_masuk,s.foto,a.agama');
        $this->db->from('siswa s');
        $this->db->join('agama a', 's.id_agama = a.id');
		$this->db->order_by('s.nis', 'ASC');
		return $this->db->get();
	}
	public function get_agama(){
		$this->db->select('*');
		$this->db->from('agama');
		return $this->db->get()->result();
	}
	public function get_tahun(){
		$this->db->select('Distinct(tahun_masuk)');
		$this->db->from('siswa');
		return $this->db->get()->result();
	}
	public function get_by_id($id)
	{
		$this->db->select('s.nis,s.nama,s.foto,s.j_kelamin,s.tempat_lahir,s.id_agama,s.tahun_masuk,s.tanggal_lahir,a.agama');
		$this->db->from('siswa s');
        $this->db->join('agama a', 'a.id = s.id_agama');
		$query = $this->db->get_where($this->table, array('s.nis' => $id));
		$data['object'] = $query->row();
		$data['array'] = $query->row_array();
		$data['count'] = $query->num_rows();
		return $data;
	}
}
?>