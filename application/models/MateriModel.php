<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MateriModel extends CI_Model {
	public $table = 'materi';

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}
	public function share($data)
	{
		return $this->db->insert('materi_share', $data);
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
		return $this->db->delete('materi_share', array('id' => $id));
	}
	public function get_all($nip){
		$this->db->select('m.id,m.judul,m.content,i.jenis,m.nip,m.path,m.tgl_dibuat');
		$this->db->from('materi m');
		$this->db->join('materi_tipe i','m.id_m_tipe=i.id');
		$this->db->where('m.nip',$nip);
		$this->db->order_by('m.id','DESC');
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
	public function get_detail_by_id($id)
	{
		$query = $this->db->get_where($this->table, array('id' => $id));
		return $query;
	}
	public function get_share_id($id)
	{
		$this->db->select('mt.jenis,m.id,m.judul,m.tgl_dibuat');
		$this->db->join('materi_tipe mt','mt.id=m.id_m_tipe');
		$query = $this->db->get_where('materi m', array('m.id' => $id));
		$data['object'] = $query->row();
		$data['array'] = $query->row_array();
		$data['count'] = $query->num_rows();
		return $data;
	}
	public function isMateriExist($id_jadwal,$tanggal,$id_materi) {
        $this->db->select('*');
        $this->db->from('materi_share');
        $this->db->where('id_jadwal', $id_jadwal);
		$this->db->where('id_materi', $id_materi);
        $this->db->where('tgl_jadwal', $tanggal);
        return $this->db->get();
    }
	public function get_tahun_akademik_share($nip){
		$this->db->select('DISTINCT(ms.id_t_akademik) as id,t.tahun_akademik');
		$this->db->from('materi_share ms');
		$this->db->join('tahun_akademik t', 'ms.id_t_akademik=t.id');
		$this->db->join('materi m', 'm.id=ms.id_materi');
		$this->db->where('m.nip',$nip);
		$this->db->order_by('tahun_akademik', 'DESC');
		return $this->db->get()->result();
	}
	public function get_all_share_guru($id_t_akademik,$semester,$kode_mapel,$kode_kelas,$nip){
		$sql ='SELECT m.id as id_materi,ms.id,m.content,m.path,t.tahun_akademik,k.nama_kelas,mp.mapel,mt.jenis,ms.tgl_dibagikan,DATE_FORMAT(ms.tgl_jadwal, "%d-%m-%Y") as tgl_jadwal,TIME_FORMAT(j.jam_mulai, "%H:%i") AS jam_mulai,TIME_FORMAT(j.jam_selesai, "%H:%i") AS jam_selesai,m.judul FROM materi_share ms INNER JOIN materi m ON ms.id_materi=m.id INNER JOIN tahun_akademik t ON t.id=ms.id_t_akademik INNER JOIN kelas k ON k.kode_kelas=ms.kode_kelas INNER JOIN mapel mp ON mp.kode_mapel=ms.kode_mapel INNER JOIN materi_tipe mt ON mt.id=m.id_m_tipe INNER JOIN jadwal j ON ms.id_jadwal=j.id WHERE ms.id_t_akademik = IFNULL(?,ms.id_t_akademik) AND ms.semester = IFNULL(?,ms.semester) AND ms.kode_mapel = IFNULL(?,ms.kode_mapel) AND ms.kode_kelas = IFNULL(?,ms.kode_kelas)';
		return $this->db->query($sql, array($id_t_akademik,$semester,$kode_mapel,$kode_kelas));
	}
}
?>