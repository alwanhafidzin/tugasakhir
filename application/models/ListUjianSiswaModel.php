<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ListUjianSiswaModel extends CI_Model {
	public $table = 'ujian';

    function insert_soal_random($id_d_ujian,$id_k_ujian,$jumlah,$waktu)
	{
		$this->db->select('id');
		$this->db->from('bank_soal');
		$this->db->order_by('RAND()');
        $this->db->limit($jumlah);
		$ujian = $this->db->get();
		foreach ($ujian->result() as $row) {
			$soal = array(
				'id_u_detail'			=> $id_d_ujian,
				'id_soal'               => $row->id,
				'ragu'                  =>'N'
			);
			$this->db->insert('ujian_detail_soal', $soal);
            $datetime = date('Y-m-d H:i:s');
            $newTime = date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s")." +$waktu minutes"));
            $this->db->query('UPDATE ujian_detail SET waktu_mulai= "'.$datetime.'",waktu_selesai="'.$newTime.'" WHERE id= "'.$id_d_ujian.'"');
		}
	}
	public function insert_detail($id,$nis,$nilai)
	{
		return $this->db->query('INSERT INTO ujian_detail (id_ujian,nis,nilai) VALUES ("'.$id.'","'.$nis.'","'.$nilai.'")');
	}
	
	public function update($data, $id)
	{
		return $this->db->update($this->table, $data, array('id' => $id));
	}
	
	public function delete($id)
	{
		return $this->db->delete($this->table, array('id' => $id));
	}
	public function get_all($username){
		$sql="SELECT * FROM(
			(
			SELECT u.id,u.terlambat,k.nama_ujian,m.mapel,t.tipe,u.id_k_ujian,u.jenis,u.waktu,u.tgl_mulai,u.tgl_share,u.jumlah_soal FROM ujian u INNER JOIN kategori_ujian k ON u.id_k_ujian=k.id INNER JOIN mapel m ON m.kode_mapel=k.kode_mapel INNER JOIN tipe_ujian t ON t.id=k.id_t_ujian INNER JOIN jadwal j ON j.id=u.id_jadwal WHERE u.kode_kelas ='10-MIA1') as u,
			(SELECT COUNT(id) as jumlah,selesai FROM ujian_detail WHERE nis=?) as du)";
		return $this->db->query($sql, array($username));
	}
	public function get_by_id($id)
	{
		$query = $this->db->get_where($this->table, array('id' => $id));
		$data['object'] = $query->row();
		$data['array'] = $query->row_array();
		$data['count'] = $query->num_rows();
		return $data;
	}
}
?>