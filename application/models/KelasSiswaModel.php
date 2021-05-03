<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class KelasSiswaModel extends CI_Model {
	public $table = 'data_kelas_siswa';

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
	public function get_all($tahun_akademik,$j_kelamin,$id_kelas){
		$sql ='select d.id,d.nis,d.kode_kelas,d.id_tahun_akademik,d.no_absen,s.nama,s.j_kelamin,k.nama_kelas,k.kode_jurusan,j.jurusan,t.tahun_akademik from data_kelas_siswa d INNER JOIN siswa s ON d.nis=s.nis INNER JOIN 
        kelas k ON d.kode_kelas=k.kode_kelas INNER JOIN jurusan j ON j.kode_jurusan=k.kode_jurusan INNER JOIN tahun_akademik t ON t.id=d.id_tahun_akademik WHERE d.id_tahun_akademik = IFNULL(?,d.id_tahun_akademik) AND k.kode_kelas= IFNULL(?,k.kode_kelas) AND s.j_kelamin= IFNULL(?,s.j_kelamin) ORDER BY s.nis ASC';
		return $this->db->query($sql, array($tahun_akademik, $id_kelas, $j_kelamin));
	}
	public function get_tahun_akademik(){
		$this->db->select('*');
		$this->db->from('tahun_akademik');
		$this->db->order_by('tahun_akademik', 'DESC');
		return $this->db->get()->result();
	}
	public function get_jurusan(){
		$this->db->select('*');
		$this->db->from('jurusan');
		$this->db->order_by('jurusan','ASC');
		return $this->db->get()->result();
	}
    public function get_kelas(){
		$this->db->select('*');
		$this->db->from('kelas');
		$this->db->order_by('kode_kelas','ASC');
		return $this->db->get()->result();
	}
    public function get_siswa(){
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->order_by('nis','ASC');
		return $this->db->get()->result();
	}
	public function get_by_id($id)
	{
		$this->db->select('d.id,d.nis,d.kode_kelas,d.id_tahun_akademik,d.no_absen,s.nama,s.j_kelamin,k.nama_kelas,k.kode_jurusan,t.tahun_akademik');
		$this->db->from('data_kelas_siswa d');
        $this->db->join('kelas k', 'd.kode_kelas = d.kode_kelas');
        $this->db->join('tahun_akademik t', 't.id = d.id_tahun_akademik');
		$this->db->join('siswa s', 's.nis = d.nis');
		$query = $this->db->get_where($this->table, array('d.id' => $id));
		$data['object'] = $query->row();
		$data['array'] = $query->row_array();
		$data['count'] = $query->num_rows();
		return $data;
	}
}
?>