<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class WaliKelasModel extends CI_Model {
	public $table = 'wali_kelas';

	public function update($data, $id)
	{
		return $this->db->update($this->table, $data, array('id' => $id));
	}
	public function get_all($id_jurusan,$id_kelas){
		$sql ='select w.id,w.kode_kelas,w.nip,w.id_tahun_akademik,k.nama_kelas,t.tahun_akademik from wali_kelas w INNER JOIN kelas k ON w.kode_kelas=k.kode_kelas INNER JOIN tahun_akademik t ON w.id_tahun_akademik=t.id INNER JOIN tingkat_kelas t2 ON k.kode_tingkat=t2.kode_tingkat INNER JOIN jurusan j ON k.kode_jurusan=j.kode_jurusan
        WHERE k.kode_jurusan = IFNULL(?,k.kode_jurusan) AND k.kode_tingkat= IFNULL(?,k.kode_tingkat) AND t.is_aktif="Y" ORDER BY w.kode_kelas';
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
	public function get_guru(){
		// $this->db->select('g.nip,g.nama');
		// $this->db->from('guru g');
		// $this->db->join('wali_kelas w','g.nip=w.nip','left');
		// $this->db->where('w.nip',NULL);
		// $this->db->order_by('g.nip','ASC');
		// return $this->db->get()->result();
		$sql="SELECT g.nama,g.nip
		FROM guru g
		WHERE g.nip NOT IN
			(SELECT w.nip
			 FROM wali_kelas w INNER JOIN tahun_akademik t ON t.id=w.id_tahun_akademik WHERE t.is_aktif='Y') AND g.status='active'";
		return $this->db->query($sql);
	}
	public function get_guru2(){
		$this->db->select('*');
		$this->db->from('guru g');
		$this->db->join('wali_kelas w','g.nip=w.nip');
		$this->db->order_by('g.nip','ASC');
		return $this->db->get()->result();
	}
	public function get_tahun_aktif(){
		$this->db->select('*');
		$this->db->from('tahun_akademik');
		$this->db->where('is_aktif','Y');
		return $this->db->get();
	}
    function insert_walikelas($id_tahun_akademik)
		 {
		 	$kelas = $this->db->get('kelas');
		 	foreach ($kelas->result() as $row) {
		 		$walikelas = array(
		 			'nip'			     	=> '0',
		 			'id_tahun_akademik'		=> $id_tahun_akademik,
		 			'kode_kelas'			=> $row->kode_kelas
		 		);
		 		$this->db->insert('wali_kelas', $walikelas);
		 	}
		 }
   }
?>