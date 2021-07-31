<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class TugasModel extends CI_Model {
	public $table = 'tugas';

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}
	public function share($data)
	{
		return $this->db->insert('tugas_share', $data);
	}
	public function update($data, $id)
	{
		return $this->db->update($this->table, $data, array('id' => $id));
	}
	
	public function delete($id)
	{
		return $this->db->delete($this->table, array('id' => $id));
	}
	public function delete_share($id)
	{
		$this->db->delete('tugas_share_siswa', array('id_t_share' => $id));
		return $this->db->delete('tugas_share', array('id' => $id));
	}
	public function get_all($nip){
		$this->db->select('t.id,t.judul,t.content,t.tgl_dibuat,m.kode_mapel,m.mapel');
		$this->db->from('tugas t');
		$this->db->join('mapel m', 't.kode_mapel=m.kode_mapel');
		$this->db->where('t.nip',$nip);
		$this->db->order_by('t.tgl_dibuat','DESC');
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
	public function get_share_by_id($id)
	{
		$this->db->select('t.id,t.judul,t.tgl_dibuat,m.mapel,t.kode_mapel');
		$this->db->join('mapel m', 'm.kode_mapel=t.kode_mapel');
		$query = $this->db->get_where('tugas t', array('id' => $id));
		$data['object'] = $query->row();
		$data['array'] = $query->row_array();
		$data['count'] = $query->num_rows();
		return $data;
	}
	public function get_detail_by_id($id)
	{
		$this->db->select('g.nama,t.judul,t.content,t.tgl_dibuat,m.mapel,g.foto');
		$this->db->join('mapel m','m.kode_mapel=t.kode_mapel');
		$this->db->join('guru g', 'g.nip=t.nip');
		$query = $this->db->get_where('tugas t', array('id' => $id));
		return $query;
	}
	public function isTugasExist($id_jadwal,$tanggal,$id_materi) {
        $this->db->select('*');
        $this->db->from('tugas_share');
        $this->db->where('id_jadwal', $id_jadwal);
		$this->db->where('id_tugas', $id_materi);
        $this->db->where('tgl_jadwal', $tanggal);
        return $this->db->get();
    }
	function insert_tugas_siswa($id_t_share,$id_t_akademik,$kode_kelas)
	{
		$this->db->select('nis');
		$this->db->from('data_kelas_siswa');
		$this->db->where('id_tahun_akademik',$id_t_akademik);
		$this->db->where('kode_kelas',$kode_kelas);
		$kelas = $this->db->get();
		foreach ($kelas->result() as $row) {
			$jadwal = array(
				'nis'		        	=> $row->nis,
				'id_t_share'            => $id_t_share,
				'nilai'                 =>0
			);
			$this->db->insert('tugas_share_siswa', $jadwal);
		}
	}
	public function get_tugas_share_guru($id){
		$this->db->select('t.judul,t.content,g.nama,m.mapel,t.tgl_dibuat,ts.semester,ts.tanggal_jadwal,ts.tgl_share,ts.tgl_selesai,k.kelas,k.nama_kelas,TIME_FORMAT(j.jam_mulai, "%H:%i") AS jam_mulai,TIME_FORMAT(j.jam_selesai, "%H:%i") AS jam_selesai');
		$this->db->from('tugas_share ts');
		$this->db->join('tugas t','t.id=ts.id_tugas');
		$this->db->join('mapel m','m.kode_mapel=t.kode_mapel');
		$this->db->join('guru g','g.nip=t.nip');
		$this->db->join('kelas k','k.kode_kelas=ts.kode_kelas');
		$this->db->join('tahun_akademik ta','ts.id_t_akademik=ta.id');
		$this->db->join('jadwal j','j.id=ts.id_jadwal');
		$this->db->where('ts.id',$id);
		return $this->db->get();
	}
	public function get_nilai_t_share($id){
		$this->db->select('tss.nilai,tss.status,tss.tanggal_pengumpulan,tss.file,tss.file,tss.path,tss.url,tss.status,s.nama,d.no_absen');
		$this->db->from('tugas_share ts');
		$this->db->join('siswa','s.nis=ts.nis');
		$this->db->join('data_kelas_siswa d','d.nis=s.nis');
		$this->db->join('tugas_share_siswa tss','tss.id_t_share=ts.id');
		$this->db->where('ts.id',$id);
		$this->db->where('ts.id_t_akademik=d.id_t_akademik');
		return $this->db->get();
	}
	public function get_detail_share_by_id($id)
	{
		$this->db->select('t2.id as id_tugas,ts.id,t2.content,t.tahun_akademik,k.nama_kelas,mp.mapel,DATE_FORMAT(ts.tgl_jadwal, "%d-%m-%Y") as tgl_jadwal,TIME_FORMAT(j.jam_mulai, "%H:%i") AS jam_mulai,TIME_FORMAT(j.jam_selesai, "%H:%i") AS jam_selesai,t2.judul,ts.tgl_share,ts.tgl_selesai,g.nama,g.foto,ts.tgl_share');
		$this->db->from('tugas_share ts');
		$this->db->join('tugas t2','ts.id_tugas=t2.id');
		$this->db->join('guru g','g.nip=t2.nip');
		$this->db->join('kelas k','k.kode_kelas=ts.kode_kelas');
		$this->db->join('mapel mp','mp.kode_mapel=t2.kode_mapel');
		$this->db->join('jadwal j','j.id=ts.id_jadwal');
		$this->db->join('mapel_perminggu mp2','mp2.id=j.id_m_perminggu');
		$this->db->join('tahun_akademik t','t.id=mp2.id_t_akademik');
		$query = $this->db->get_where('tugas_share', array('ts.id' => $id));
		return $query;
	}
	public function cek_waktu($id){
		$this->db->select('*');
		$this->db->from('tugas_share_siswa');
		$this->db->where('id', $id);
		$tugas = $this->db->get();
		foreach ($tugas->result() as $row) {
			$id_t_share = $row->id_t_share;
		}
		$this->db->select('tgl_share,tgl_selesai');
		$this->db->from('tugas_share');
		$this->db->where('id',$id_t_share);
		$tugas_share = $this->db->get();
		foreach ($tugas_share->result() as $row) {
			$tgl_share = $row->tgl_share;
			$tgl_selesai = $row->tgl_selesai;
		}
		$timezone = new DateTimeZone('Asia/Jakarta');
		$date = new DateTime();
		$date->setTimeZone($timezone);
		$now =$date->format('Y-m-d H:i:s');
		if($now <= $tgl_selesai){
			echo 'kumpulkan';
		}else if($now > $tgl_selesai){
			echo 'selesai';
		}else{
			echo 'error';
		}	
	}
	public function get_all_share_guru($id_t_akademik,$semester,$kode_mapel,$kode_kelas,$nip){
		$sql ='SELECT t2.id as id_tugas,ts.id,t2.content,t.tahun_akademik,k.nama_kelas,mp.mapel,DATE_FORMAT(ts.tgl_jadwal, "%d-%m-%Y") as tgl_jadwal,TIME_FORMAT(j.jam_mulai, "%H:%i") AS jam_mulai,TIME_FORMAT(j.jam_selesai, "%H:%i") AS jam_selesai,t2.judul,ts.tgl_share,ts.tgl_selesai FROM tugas_share ts INNER JOIN tugas t2 ON ts.id_tugas=t2.id INNER JOIN jadwal j ON j.id=ts.id_jadwal INNER JOIN mapel_perminggu mp2 ON mp2.id=j.id_m_perminggu INNER JOIN tahun_akademik t ON t.id=mp2.id_t_akademik INNER JOIN kelas k ON k.kode_kelas=ts.kode_kelas INNER JOIN mapel mp ON mp.kode_mapel=t2.kode_mapel WHERE mp2.id_t_akademik = IFNULL(?,mp2.id_t_akademik) AND mp2.semester = IFNULL(?,mp2.semester) AND t2.kode_mapel = IFNULL(?,t2.kode_mapel) AND ts.kode_kelas = IFNULL(?,ts.kode_kelas);';
		return $this->db->query($sql, array($id_t_akademik,$semester,$kode_mapel,$kode_kelas));
	}
	public function get_tahun_akademik_share($nip){
		$this->db->select('DISTINCT(mp.id_t_akademik) as id,t.tahun_akademik');
		$this->db->from('tugas_share ts');
		$this->db->join('jadwal j','ts.id_jadwal=j.id');
		$this->db->join('mapel_perminggu mp','mp.id=j.id_m_perminggu');
		$this->db->join('tahun_akademik t', 'mp.id_t_akademik=t.id');
		$this->db->join('tugas t2', 't2.id=ts.id_tugas');
		$this->db->where('t2.nip',$nip);
		$this->db->order_by('t.tahun_akademik', 'DESC');
		return $this->db->get()->result();
	}
	public function get_nilai($id){
		$this->db->select('tss.id,tss.nis,s.nama,tss.tanggal_pengumpulan,tss.nilai,tss.file,tss.path');
		$this->db->from('tugas_share_siswa tss');
		$this->db->join('tugas_share ts','tss.id_t_share=ts.id');
		$this->db->join('siswa s','s.nis=tss.nis');
		$this->db->where('ts.id',$id);
		return $this->db->get();
	}
}
?>