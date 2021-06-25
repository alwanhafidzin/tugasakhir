<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class TambahNilaiModel extends CI_Model {
	public $table = 'nilai_siswa';
	public function get_tahun_akademik_share($nip){
		$this->db->select('DISTINCT(n.id_t_akademik) as id,t.tahun_akademik');
		$this->db->from('nilai_siswa n');
		$this->db->join('tahun_akademik t', 'n.id_t_akademik=t.id');
		$this->db->where('n.nip',$nip);
		$this->db->order_by('tahun_akademik', 'DESC');
		return $this->db->get()->result();
	}
	public function get_all_nilai_siswa_guru($id_t_akademik,$semester,$kode_mapel,$kode_kelas,$nip){
		$sql ='SELECT ns.id as id_nilai,ns.keterangan,t.tahun_akademik,k.nama_kelas,mp.mapel,DATE_FORMAT(ns.tgl_jadwal, "%d-%m-%Y") as tgl_jadwal,TIME_FORMAT(j.jam_mulai, "%H:%i") AS jam_mulai,TIME_FORMAT(j.jam_selesai, "%H:%i") AS jam_selesai,ns.tgl_dibuat FROM nilai_siswa ns INNER JOIN tahun_akademik t ON t.id=ns.id_t_akademik INNER JOIN kelas k ON k.kode_kelas=ns.kode_kelas INNER JOIN mapel mp ON mp.kode_mapel=ns.kode_mapel INNER JOIN jadwal j ON ns.id_jadwal=j.id WHERE ns.id_t_akademik = IFNULL(?,ns.id_t_akademik) AND ns.semester = IFNULL(?,ns.semester) AND ns.kode_mapel = IFNULL(?,ns.kode_mapel) AND ns.kode_kelas = IFNULL(?,ns.kode_kelas)';
		return $this->db->query($sql, array($id_t_akademik,$semester,$kode_mapel,$kode_kelas));
	}
	public function isNilaiExist($id_jadwal,$tanggal,$id_materi) {
        $this->db->select('*');
        $this->db->from('nilai_siswa');
        $this->db->where('id_jadwal', $id_jadwal);
		$this->db->where('id_tugas', $id_materi);
        $this->db->where('tgl_jadwal', $tanggal);
        return $this->db->get();
    }
	public function insert($data)
	{
		return $this->db->insert('nilai_siswa', $data);
	}
	function insert_nilai_siswa($id_nilai_siswa,$id_t_akademik,$kode_kelas)
	{
		$this->db->select('nis');
		$this->db->from('data_kelas_siswa');
		$this->db->where('id_tahun_akademik',$id_t_akademik);
		$this->db->where('kode_kelas',$kode_kelas);
		$kelas = $this->db->get();
		foreach ($kelas->result() as $row) {
			$nilai = array(
				'nis'		        	=> $row->nis,
				'id_nilai_siswa'        => $id_nilai_siswa,
				'nilai'                 =>0
			);
			$this->db->insert('nilai_siswa_detail', $nilai);
		}
	}
	function get_id_nilai_lain(){
		$this->db->select('*');
		$this->db->from('nilai_lain');
		return $this->db->get();
	}
}
?>