<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalGuruModel extends CI_Model {

	public function get_mapel_guru($username)
	{
		$sql ='Select ruangan,nama_kelas,id_hari,mapel,hari,jam_mulai,jam_selesai
        From (
            Select r.ruangan,k.nama_kelas,h2.id as id_hari,m.mapel,h.hari,TIME_FORMAT(j.jam_mulai, "%H:%i") AS jam_mulai,TIME_FORMAT(j.jam_selesai,"%H:%i") AS jam_selesai
            From  jadwal j INNER JOIN mapel_perminggu mp ON j.id_m_perminggu=mp.id INNER JOIN mapel m ON mp.kode_mapel=m.kode_mapel INNER JOIN tahun_akademik t ON t.id=mp.id_t_akademik INNER JOIN hari_masuk_detail h2 ON h2.id=j.id_detail_hari INNER JOIN hari_masuk h ON h.id=h2.id_hari LEFT JOIN guru g ON g.nip=j.nip INNER JOIN kelas k ON k.kode_kelas=j.kode_kelas LEFT JOIN ruangan_siswa rs ON j.kode_kelas=rs.kode_kelas LEFT JOIN ruangan r ON r.kode_ruangan=rs.kode_ruangan  WHERE t.is_aktif="Y" AND t.semester=mp.semester AND j.nip="'.$username.'" AND mp.id_t_akademik=rs.id_tahun_akademik
            UNION
            Select "" as ruangan,"-" as nama_kelas,hi.id as id_hari,"Istirahat" as mapel,h3.hari,TIME_FORMAT(ji.jam_mulai, "%H:%i") AS jam_mulai,TIME_FORMAT(ji.jam_selesai,"%H:%i") AS jam_selesai
            From jam_istirahat ji INNER JOIN tahun_akademik ti ON ti.id=ji.id_t_akademik INNER JOIN hari_masuk_detail hi ON hi.id=ji.id_hari INNER JOIN hari_masuk h3 ON h3.id=hi.id_hari INNER JOIN mapel_perminggu mpi ON mpi.semester=ji.semester WHERE ti.is_aktif="Y" AND mpi.semester=ji.semester
 ) As a  
 ORDER BY id_hari,jam_mulai,jam_selesai ASC';
        return $this->db->query($sql);
	}
}
?>