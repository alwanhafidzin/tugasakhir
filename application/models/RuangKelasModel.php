<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class RuangKelasModel extends CI_Model {
	public $table = 'ruangan_siswa';

	public function update($data, $id)
	{
		return $this->db->update($this->table, $data, array('id' => $id));
	}
	public function get_all($id_jurusan,$id_kelas){
		$sql ='select r.id,r.kode_kelas,r.kode_ruangan,r.id_tahun_akademik,k.nama_kelas,t.tahun_akademik from ruangan_siswa r INNER JOIN kelas k ON r.kode_kelas=k.kode_kelas INNER JOIN tahun_akademik t ON r.id_tahun_akademik=t.id INNER JOIN tingkat_kelas t2 ON k.kode_tingkat=t2.kode_tingkat INNER JOIN jurusan j ON k.kode_jurusan=j.kode_jurusan
        WHERE k.kode_jurusan = IFNULL(?,k.kode_jurusan) AND k.kode_tingkat= IFNULL(?,k.kode_tingkat) AND t.is_aktif="Y" ORDER BY r.kode_kelas';
		return $this->db->query($sql, array($id_jurusan, $id_kelas));
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
	public function get_ruangan(){
		$this->db->select('r.kode_ruangan,r.ruangan');
		$this->db->from('ruangan r');
		$this->db->join('ruangan_siswa rs','r.kode_ruangan=rs.kode_ruangan','left');
		$this->db->where('rs.kode_ruangan',NULL);
		$this->db->order_by('r.kode_ruangan','ASC');
		return $this->db->get()->result();
	}
	public function get_ruangan2(){
		$this->db->select('r.kode_ruangan,r.ruangan');
		$this->db->from('ruangan r');
		$this->db->join('ruangan_siswa rs','r.kode_ruangan=rs.kode_ruangan');
		$this->db->order_by('r.kode_ruangan','ASC');
		return $this->db->get()->result();
	}
	public function get_tahun_aktif(){
		$this->db->select('*');
		$this->db->from('tahun_akademik');
		$this->db->where('is_aktif','Y');
		return $this->db->get();
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
    function insert_ruangkelas($id_tahun_akademik)
	{
		$kelas = $this->db->get('kelas');
		foreach ($kelas->result() as $row) {
		 	$ruangkelas = array(
		 		'kode_ruangan'				=> '0',
		 		'id_tahun_akademik'		=> $id_tahun_akademik,
		 		'kode_kelas'				=> $row->kode_kelas
		 	);
		 	$this->db->insert('ruangan_siswa', $ruangkelas);
		}
	}
}
?>