<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardModel extends CI_Model {
	public function get_all_count(){
		$sql="Select (select count(*) from agama) as jumlah_agama,(select count(*) from jurusan) as jumlah_jurusan, (select count(*) from kelas) as jumlah_kelas,(select count(*) from siswa WHERE status='active') as jumlah_siswa_aktif,(select count(*) from siswa) as jumlah_siswa,(select count(*) from siswa WHERE status='lulus') as jumlah_siswa_lulus,(select count(*) from guru WHERE status='active') as jumlah_guru_aktif,(select count(*) from ruangan) as jumlah_ruangan,(select count(*) from mapel) as jumlah_mapel,(select count(*) from users) as jumlah_users,(select count(*) from users_groups WHERE group_id=1) as jumlah_user_admin,(select count(*) from users_groups WHERE group_id=2) as jumlah_user_guru,(select count(*) from users_groups WHERE group_id=3) as jumlah_user_siswa,(select count(*) from users WHERE active=1) as jumlah_user_active,(select count(*) from users WHERE active=0) as jumlah_user_unactive,(select count(*) from users_groups ug INNER JOIN users u WHERE ug.user_id=u.id AND u.active=1 AND ug.group_id=1) as jumlah_a_admin,(select count(*) from users_groups ug INNER JOIN users u WHERE ug.user_id=u.id AND u.active=1 AND ug.group_id=2) as jumlah_a_guru,(select count(*) from users_groups ug INNER JOIN users u WHERE ug.user_id=u.id AND u.active=1 AND ug.group_id=3) as jumlah_a_siswa,(select count(*) from users_groups ug INNER JOIN users u WHERE ug.user_id=u.id AND u.active=0 AND ug.group_id=1) as jumlah_un_admin,(select count(*) from users_groups ug INNER JOIN users u WHERE ug.user_id=u.id AND u.active=0 AND ug.group_id=2) as jumlah_un_guru,(select count(*) from users_groups ug INNER JOIN users u WHERE ug.user_id=u.id AND u.active=0 AND ug.group_id=3) as jumlah_un_siswa;";
		return $this->db->query($sql);
	}
	public function get_all_siswa(){
		$this->db->select('*');
		$this->db->from('tahun_akademik');
		$this->db->where('is_aktif="Y"');
		$t_akademik = $this->db->get();
		foreach($t_akademik->result() as $row){
			$id_t_akademik= $row->id;
		}
		$sql="Select (select count(*) from data_kelas_siswa d INNER JOIN kelas k ON k.kode_kelas=d.kode_kelas INNER JOIN tingkat_kelas t ON t.kode_tingkat=k.kode_tingkat INNER JOIN siswa s ON d.nis=s.nis WHERE k.kode_tingkat=10 AND d.id_tahun_akademik=? AND s.status='active' AND s.j_kelamin='L') as jumlah_siswa_10_l,(select count(*) from data_kelas_siswa d INNER JOIN kelas k ON k.kode_kelas=d.kode_kelas INNER JOIN tingkat_kelas t ON t.kode_tingkat=k.kode_tingkat INNER JOIN siswa s ON d.nis=s.nis WHERE k.kode_tingkat=10 AND d.id_tahun_akademik=? AND s.status='active' AND s.j_kelamin='P') as jumlah_siswa_10_p,(select count(*) from data_kelas_siswa d INNER JOIN kelas k ON k.kode_kelas=d.kode_kelas INNER JOIN tingkat_kelas t ON t.kode_tingkat=k.kode_tingkat INNER JOIN siswa s ON d.nis=s.nis WHERE k.kode_tingkat=11 AND d.id_tahun_akademik=? AND s.status='active' AND s.j_kelamin='L') as jumlah_siswa_11_l,(select count(*) from data_kelas_siswa d INNER JOIN kelas k ON k.kode_kelas=d.kode_kelas INNER JOIN tingkat_kelas t ON t.kode_tingkat=k.kode_tingkat INNER JOIN siswa s ON d.nis=s.nis WHERE k.kode_tingkat=11 AND d.id_tahun_akademik=? AND s.status='active' AND s.j_kelamin='P') as jumlah_siswa_11_p,(select count(*) from data_kelas_siswa d INNER JOIN kelas k ON k.kode_kelas=d.kode_kelas INNER JOIN tingkat_kelas t ON t.kode_tingkat=k.kode_tingkat INNER JOIN siswa s ON d.nis=s.nis WHERE k.kode_tingkat=12 AND d.id_tahun_akademik=? AND s.status='active' AND s.j_kelamin='L') as jumlah_siswa_12_l,(select count(*) from data_kelas_siswa d INNER JOIN kelas k ON k.kode_kelas=d.kode_kelas INNER JOIN tingkat_kelas t ON t.kode_tingkat=k.kode_tingkat INNER JOIN siswa s ON d.nis=s.nis WHERE k.kode_tingkat=12 AND d.id_tahun_akademik=? AND s.status='active' AND s.j_kelamin='P') as jumlah_siswa_12_p";
		return $this->db->query($sql, array($id_t_akademik,$id_t_akademik,$id_t_akademik,$id_t_akademik,$id_t_akademik,$id_t_akademik));
	}
	public function get_all_guru(){
		$sql="Select (select count(*) from guru WHERE gender='P' AND status='active') as jumlah_guru_pria,(select count(*) from guru WHERE gender='W' AND status='active') as jumlah_guru_wanita";
		return $this->db->query($sql);
	}
}
?>