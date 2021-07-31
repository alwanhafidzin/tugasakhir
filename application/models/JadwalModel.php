<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalModel extends CI_Model {
	public $table = 'jadwal';

	public function update($data, $id)
	{
		return $this->db->update($this->table, $data, array('id' => $id));
	}
	public function get_all($kode_kelas,$nip_guru,$kode_mapel){
		$sql ='SELECT j.id,j.nip,k.nama_kelas,ju.jurusan,tk.tingkatan,m.mapel,km.kelompok_mapel,mp.kode_mapel,j.id_detail_hari,j.jam_mulai,j.jam_selesai FROM jadwal j INNER JOIN kelas k ON j.kode_kelas=k.kode_kelas INNER JOIN jurusan ju ON ju.kode_jurusan = k.kode_jurusan INNER JOIN tingkat_kelas tk ON tk.kode_tingkat=k.kode_tingkat INNER JOIN mapel_perminggu mp ON mp.id=j.id_m_perminggu INNER JOIN mapel m ON mp.kode_mapel=m.kode_mapel INNER JOIN tahun_akademik t ON t.id=mp.id_t_akademik LEFT JOIN guru g ON j.nip=g.nip INNER JOIN kelompok_mapel km ON km.id=m.id_k_mapel
        WHERE j.kode_kelas = IFNULL(?,j.kode_kelas) AND j.nip= IFNULL(?,j.nip) AND mp.kode_mapel= IFNULL(?,mp.kode_mapel) AND t.is_aktif="Y" AND t.semester=mp.semester ORDER BY j.kode_kelas';
		return $this->db->query($sql, array($kode_kelas, $nip_guru, $kode_mapel));
	}
    public function get_nip(){
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->order_by('nip', 'ASC');
        return $this->db->get()->result();
    }
	public function get_guru_mapel(){
		$this->db->select('g.nip,g.nama,gm.kode_mapel');
		$this->db->from('guru_mapel gm');
        $this->db->join('guru g', 'gm.nip=g.nip');
		return $this->db->get()->result();
	}
	public function get_hari(){
		$this->db->select('h.id,h2.hari');
		$this->db->from('hari_masuk_detail h');
		$this->db->join('hari_masuk h2','h2.id=h.id_hari');
		$this->db->join('tahun_akademik t','t.id=h.id_t_akademik');
		$this->db->where('h.status','masuk');
		$this->db->where('t.is_aktif="Y"');
		$this->db->where('t.semester=h.semester');
		return $this->db->get()->result();
	}
}
?>