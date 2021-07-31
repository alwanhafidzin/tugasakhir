<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MapelPermingguModel extends CI_Model {
	public $table = 'mapel_perminggu';

	function insert_jadwal($jumlah,$id_mapel_perminggu,$kode_jurusan,$kode_tingkat)
	{
		$this->db->select('h.id');
		$this->db->from('hari_masuk_detail h');
		$this->db->join('tahun_akademik t','t.id=h.id_t_akademik');
		$this->db->where('t.is_aktif="Y"');
		$this->db->where('t.semester=h.semester');
		$this->db->where('h.id_hari=8');
		$id_hari = $this->db->get();
		foreach($id_hari->result() as $row){
			$id_h_detail = $row->id;
		}
		$this->db->select('k.kode_kelas');
		$this->db->from('kelas k');
		$this->db->join('jurusan j', 'k.kode_jurusan= j.kode_jurusan');
		$this->db->join('tingkat_kelas t', 'k.kode_tingkat = t.kode_tingkat');
		$this->db->where('k.kode_jurusan',$kode_jurusan);
		$this->db->where('k.kode_tingkat', $kode_tingkat);
		$kelas = $this->db->get();
		foreach ($kelas->result() as $row) {
			$jadwal = array(
				'kode_kelas'			=> $row->kode_kelas,
				'id_m_perminggu'        => $id_mapel_perminggu,
				'id_detail_hari'               =>$id_h_detail
			);
			for ($i=0; $i<$jumlah; $i++){
				$this->db->insert('jadwal', $jadwal);
			}
		}
	}
	public function update($id_tahun_akademik,$semester,$jumlah,$kode_mapel,$kode_tingkat, $id)
	{
		return $this->db->query('UPDATE mapel_perminggu SET kode_mapel="'.$kode_mapel.'",id_t_akademik="'.$id_tahun_akademik.'",semester="'.$semester.'",kode_tingkat="'.$kode_tingkat.'",jumlah="'.$jumlah.'" WHERE id="'.$id.'"');
	}

	public function insert($id_tahun_akademik,$semester,$jumlah,$kode_mapel,$kode_tingkat)
	{
		return $this->db->query('INSERT INTO mapel_perminggu (kode_mapel,jumlah,id_t_akademik,semester,kode_tingkat) VALUES ("'.$kode_mapel.'","'.$jumlah.'","'.$id_tahun_akademik.'","'.$semester.'","'.$kode_tingkat.'")');
	}
	
	public function delete($id)
	{
		return $this->db->delete($this->table, array('id' => $id));
	}
	public function delete_jadwal($id)
	{
		// $this->db->select('mp.kode_mapel,mp.id_t_akademik,mp.semester,mp.kode_tingkat,j.kode_jurusan');
		// $this->db->from('mapel_perminggu mp');
		// $this->db->join('mapel m', 'mp.kode_mapel = m.kode_mapel');
		// $this->db->join('jurusan j', 'j.kode_jurusan = m.kode_jurusan');
		// $this->db->where('mp.id', $id);
		// $MapelPerhari = $this->db->get();
		// foreach ($MapelPerhari->result() as $row) {
		// 	$kode_mapel = $row->kode_mapel;
		// 	$semester = $row->semester;
		// 	$id_t_akademik = $row->id_t_akademik;
	    //     $this->db->delete('jadwal', array(
		// 		'kode_mapel' => $kode_mapel,
		// 		'semester'  => $semester,
		// 		'id_t_akademik' => $id_t_akademik
		// 	));
		// }
		//Delete Join
// 		DELETE mapel_perminggu,jadwal
// FROM mapel_perminggu
// INNER JOIN jadwal ON mapel_perminggu.id = jadwal.id_m_perminggu
// WHERE jadwal.id_m_perminggu=3;
        return $this->db->delete('jadwal', array('id_m_perminggu' => $id));
	}
	public function get_all($id_jurusan,$id_kelas){
		$sql ='select mp.id,mp.jumlah,m.mapel,m.kode_jurusan,k.kelompok_mapel,j.jurusan,tk.tingkatan,j.jurusan from mapel_perminggu mp INNER JOIN mapel m ON mp.kode_mapel=m.kode_mapel INNER JOIN kelompok_mapel k ON 
		m.id_k_mapel = k.id INNER JOIN jurusan j ON m.kode_jurusan = j.kode_jurusan INNER JOIN tahun_akademik t ON mp.id_t_akademik=t.id INNER JOIN tingkat_kelas tk ON tk.kode_tingkat=mp.kode_tingkat WHERE m.kode_jurusan = IFNULL(?,m.kode_jurusan) AND mp.kode_tingkat = IFNULL(?,mp.kode_tingkat) AND t.is_aktif="Y"  AND t.semester=mp.semester ORDER BY m.kode_mapel';
		return $this->db->query($sql, array($id_jurusan,$id_kelas));
	}
	public function get_mapel(){
		$this->db->select('*');
		$this->db->from('mapel');
        $this->db->order_by('kode_mapel','ASC');
		return $this->db->get()->result();
	}
    public function get_guru(){
		$this->db->select('*');
		$this->db->from('guru');
        $this->db->order_by('nip','ASC');
		return $this->db->get()->result();
	}
	public function get_jurusan(){
		$this->db->select('*');
		$this->db->from('jurusan');
		$this->db->order_by('jurusan','ASC');
		return $this->db->get()->result();
	}
    public function get_detail_mapel($kode_mapel){
		$this->db->select('k.kelompok_mapel,j.jurusan');
		$this->db->from('mapel m');
        $this->db->join('kelompok_mapel k', 'k.id=m.id_k_mapel');
        $this->db->join('jurusan j', 'm.kode_jurusan=j.kode_jurusan');
        $query = $this->db->get_where('mapel', array('m.kode_mapel' => $kode_mapel));
        $data['object'] = $query->row();
		$data['array'] = $query->row_array();
		$data['count'] = $query->num_rows();
		return $data;
	}
	public function get_mapel_jurusan($id_jurusan){
		$this->db->select('m.kode_mapel,m.mapel');
		$this->db->from('mapel m');
        $this->db->join('kelompok_mapel k', 'k.id=m.id_k_mapel');
        $this->db->join('jurusan j', 'm.kode_jurusan=j.kode_jurusan');
		$result=$this->db->where('j.kode_jurusan',$id_jurusan)->get()->result();
        $data=array();
        foreach($result as $r)
        {
         $data['kode_mapel']=$r->kode_mapel;
         $data['mapel']=$r->mapel;
         $json[]=$data;
        }
		echo json_encode($json);
	}
	public function get_by_id($id)
	{
		$this->db->select('mp.id,mp.kode_mapel,mp.id_t_akademik,mp.semester,mp.kode_tingkat,mp.jumlah,m.kode_jurusan,k.kelompok_mapel,j.jurusan');
		$this->db->from('mapel_perminggu mp');
		$this->db->join('mapel m','mp.kode_mapel=m.kode_mapel');
		$this->db->join('jurusan j', 'j.kode_jurusan=m.kode_jurusan');
		$this->db->join('kelompok_mapel k', 'm.id_k_mapel = k.id');
		$this->db->where('mp.id', $id);
		$query = $this->db->get_where($this->table, array('mp.id' => $id));
		$data['object'] = $query->row();
		$data['array'] = $query->row_array();
		$data['count'] = $query->num_rows();
		return $data;
	}
}
?>