<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalSiswaModel extends CI_Model {

	public function get_mapel_siswa()
	{
		$this->db->select('m.mapel,h.hari,j.id_hari,TIME_FORMAT(j.jam_mulai, "%H:%i") AS jam_mulai,TIME_FORMAT(j.jam_selesai, "%H:%i") AS jam_selesai,g.nama');
        $this->db->from('jadwal j');
        $this->db->join('mapel_perminggu mp','j.id_m_perminggu=mp.id');
        $this->db->join('mapel m','m.kode_mapel=mp.kode_mapel');
        $this->db->join('hari_masuk h', 'h.id=j.id_hari');
        $this->db->join('data_kelas_siswa d','j.kode_kelas=d.kode_kelas');
        $this->db->join('tahun_akademik t','t.id=mp.id_t_akademik');
        $this->db->join('guru g','g.nip=j.nip', 'left');
        $this->db->where('t.is_aktif', 'Y');
        $this->db->where('t.semester=mp.semester');
        $this->db->where('d.nis','1234');
        $this->db->where('d.id_tahun_akademik=mp.id_t_akademik');
        $this->db->order_by('j.id_hari');
        $this->db->order_by('j.jam_mulai');
        return $this->db->get();
	}
}
?>