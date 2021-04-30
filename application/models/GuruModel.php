<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class GuruModel extends CI_Model {
	public $table = 'guru';

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
		$get_guru = $this->db->get_where('guru',['nip' => $id])->row();
        if ($get_guru){
           if ($get_guru->foto == NULL) {
		      $query = $this->db->delete('guru',['nip'=>$id]);
		   }
           else {
			  $query = $this->db->delete('guru',['nip'=>$id]);
			  if($query){
				return unlink("uploads/guru".$get_siswa->foto);
			}
		  }
        }
	}
	public function get_all($id_agama,$gender){
		$sql ='select g.nip,g.nama,g.foto,g.id_agama,g.gender,g.email,a.agama FROM guru g INNER JOIN agama a ON 
		g.id_agama = a.id WHERE g.id_agama= IFNULL(?,g.id_agama) AND g.gender= IFNULL(?,g.gender) ORDER BY g.nip ASC';
		return $this->db->query($sql, array($id_agama,$gender));
	}
	public function get_agama(){
		$this->db->select('*');
		$this->db->from('agama');
		return $this->db->get()->result();
	}
	public function get_by_id($id)
	{
		$this->db->select('g.nip,g.nama,g.foto,g.id_agama,g.gender,g.email,a.agama');
		$this->db->from('guru g');
        $this->db->join('agama a', 'a.id = g.id_agama');
		$query = $this->db->get_where($this->table, array('g.nip' => $id));
		$data['object'] = $query->row();
		$data['array'] = $query->row_array();
		$data['count'] = $query->num_rows();
		return $data;
	}
}
?>