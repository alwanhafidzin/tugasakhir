<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AbsensiPermapelModel extends CI_Model {

	public function get_all($kode_kelas){
		$sql ="SELECT
        s.nama,dt.no_absen,dp.nis,CAST((COUNT(CASE WHEN dp.`absensi` LIKE '%H%' THEN 1 END))/COUNT(dp.absensi)*100 AS decimal(10,0)) AS persentase,
        COUNT(CASE WHEN dp.`absensi` LIKE '%H%' THEN 1 END) AS hadir,
        COUNT(CASE WHEN dp.`absensi` LIKE '%I%' THEN 1 END) AS izin,
        COUNT(CASE WHEN dp.`absensi` LIKE '%A%' THEN 1 END) AS alpha,
        COUNT(CASE WHEN dp.`absensi` LIKE '%S%' THEN 1 END) AS sakit,
        COUNT(dp.absensi) AS tatap_muka
        FROM detail_a_permapel dp INNER JOIN data_kelas_siswa dt ON dp.nis=dt.nis INNER JOIN absensi_permapel ap ON ap.id=dp.id_a_permapel INNER JOIN jadwal j ON j.id=ap.id_jadwal INNER JOIN mapel_perminggu mp ON mp.id=j.id_m_perminggu INNER JOIN tahun_akademik t ON t.id=mp.id_t_akademik INNER JOIN kelas k ON k.kode_kelas=j.kode_kelas 
        INNER JOIN siswa s ON s.nis=dp.nis WHERE j.kode_kelas = IFNULL(?,j.kode_kelas) AND t.is_aktif='Y' AND t.semester=mp.semester GROUP BY nis";
		return $this->db->query($sql, array($kode_kelas));
	}
	public function get_kelas_guru_absen($kode_mapel,$nip){
		$this->db->select('DISTINCT(k.kode_kelas),k.nama_kelas');
		$this->db->from('jadwal j');
        $this->db->join('mapel_perminggu mp', 'mp.id= j.id_m_perminggu');
        $this->db->join('tahun_akademik t', 'mp.id_t_akademik=t.id');
        $this->db->join('kelas k', 'k.kode_kelas = j.kode_kelas');
		$this->db->where('j.nip',$nip);
        $this->db->where('mp.kode_mapel', $kode_mapel);
        $this->db->where('t.is_aktif', 'Y');
        $this->db->where('t.semester=mp.semester');
        $result = $this->db->order_by('k.kode_kelas', 'ASC')->get()->result();
        $data=array();
        foreach($result as $r)
        {
         $data['kode_kelas']=$r->kode_kelas;
         $data['nama_kelas']=$r->nama_kelas;
         $json[]=$data;
        }
		echo json_encode($json);
	}
    public function get_kelas_guru_absen_all($nip){
		$this->db->select('DISTINCT(k.kode_kelas),k.nama_kelas');
		$this->db->from('jadwal j');
        $this->db->join('mapel_perminggu mp', 'mp.id= j.id_m_perminggu');
        $this->db->join('tahun_akademik t', 'mp.id_t_akademik=t.id');
        $this->db->join('kelas k', 'k.kode_kelas = j.kode_kelas');
		$this->db->where('j.nip',$nip);
        $this->db->where('t.is_aktif', 'Y');
        $this->db->where('t.semester=mp.semester');
        $result = $this->db->order_by('k.kode_kelas', 'ASC')->get()->result();
        $data=array();
        foreach($result as $r)
        {
         $data['kode_kelas']=$r->kode_kelas;
         $data['nama_kelas']=$r->nama_kelas;
         $json[]=$data;
        }
		echo json_encode($json);
	}
    public function get_jam_jadwal($kode_mapel,$kode_kelas,$hari,$nip){
		$this->db->select('j.id,TIME_FORMAT(j.jam_mulai, "%H:%i") AS jam_mulai,TIME_FORMAT(j.jam_selesai, "%H:%i") AS jam_selesai');
		$this->db->from('jadwal j');
        $this->db->join('mapel_perminggu mp', 'mp.id= j.id_m_perminggu');
        $this->db->join('tahun_akademik t', 'mp.id_t_akademik=t.id');
        $this->db->join('kelas k', 'k.kode_kelas = j.kode_kelas');
        $this->db->join('hari_masuk_detail h', 'j.id_detail_hari = h.id');
        $this->db->join('hari_masuk h2','h2.id=h.id_hari');
		$this->db->where('j.nip',$nip);
        $this->db->where('mp.kode_mapel', $kode_mapel);
        $this->db->where('t.is_aktif', 'Y');
        $this->db->where('t.semester=mp.semester');
        $this->db->where('j.kode_kelas', $kode_kelas);
        $this->db->where('h2.hari', $hari);
        $result = $this->db->order_by('j.jam_mulai', 'ASC')->get()->result();
        $data=array();
        foreach($result as $r)
        {
         $data['id']=$r->id;
         $data['jam_mulai']=$r->jam_mulai;
         $data['jam_selesai']=$r->jam_selesai;
         $json[]=$data;
        }
		echo json_encode($json);
	}
    public function get_hari_jadwal($kode_mapel,$kode_kelas,$nip){
		$this->db->select('h.id_hari');
		$this->db->from('jadwal j');
        $this->db->join('mapel_perminggu mp', 'mp.id= j.id_m_perminggu');
        $this->db->join('tahun_akademik t', 'mp.id_t_akademik=t.id');
        $this->db->join('kelas k', 'k.kode_kelas = j.kode_kelas');
        $this->db->join('hari_masuk_detail h', 'j.id_detail_hari = h.id');
		$this->db->where('j.nip',$nip);
        $this->db->where('mp.kode_mapel', $kode_mapel);
        $this->db->where('t.is_aktif', 'Y');
        $this->db->where('t.semester=mp.semester');
        $this->db->where('j.kode_kelas', $kode_kelas);
        $result = $this->db->order_by('j.jam_mulai', 'ASC')->get()->result_array();
        foreach($result as $row){
            $id_hari_jadwal[] = $row['id_hari'];
        }
        $days=[];
        foreach  ($id_hari_jadwal as $hj){
            if ($hj == '1') $days[]=0;
            if ($hj == '2') $days[]=1;
            if ($hj == '3') $days[]=2;
            if ($hj == '4') $days[]=3;
            if ($hj == '5') $days[]=4;
            if ($hj == '6') $days[]=5;
            if ($hj == '7') $days[]=6;
        }
        echo json_encode($days,true);
	}
    public function get_tanggal_jadwal($kode_mapel,$kode_kelas){
		$this->db->select('DATE_FORMAT(ap.tanggal,"%e/%c/%Y") AS tanggal');
		$this->db->from('absensi_permapel ap');
        $this->db->join('jadwal j', 'ap.id_jadwal=j.id');
        $this->db->join('mapel_perminggu mp', 'mp.id= j.id_m_perminggu');
        $this->db->join('tahun_akademik t', 'mp.id_t_akademik=t.id');
        $this->db->join('kelas k', 'k.kode_kelas = j.kode_kelas');
        $this->db->join('hari_masuk h', 'j.id_hari = h.id');
		$this->db->where('j.nip','3509176412630001');
        $this->db->where('mp.kode_mapel', $kode_mapel);
        $this->db->where('t.is_aktif', 'Y');
        $this->db->where('t.semester=mp.semester');
        $this->db->where('j.kode_kelas', $kode_kelas);
        $result = $this->db->order_by('ap.tanggal', 'ASC')->get()->result_array();
        foreach($result as $row){
            $tanggal_jadwal[] = $row['tanggal'];
        }
        echo json_encode($tanggal_jadwal,true);
	}
    public function get_guru_jadwal_pertahunakademik($nip){
        $this->db->select('DISTINCT(m.kode_mapel),m.mapel');
        $this->db->from('jadwal j');
        $this->db->join('mapel_perminggu mp', 'mp.id= j.id_m_perminggu');
        $this->db->join('mapel m', 'mp.kode_mapel=m.kode_mapel');
        $this->db->join('tahun_akademik t', 'mp.id_t_akademik=t.id');
        $this->db->where('j.nip', $nip);
        $this->db->where('t.is_aktif', 'Y');
        $this->db->where('t.semester=mp.semester');
        $this->db->order_by('m.mapel', 'ASC');
        return $this->db->get()->result();
    }
    public function insert($tanggal,$id_jadwal)
	{
		return $this->db->query('INSERT INTO absensi_permapel (tanggal,id_jadwal,nip) VALUES ("'.$tanggal.'","'.$id_jadwal.'","3509176412630001")');
	}
    function insert_absensi($kode_mapel,$kode_kelas,$tanggal,$id_jadwal,$id_a_permapel)
	{
        $this->db->select('d.nis');
		$this->db->from('jadwal j');
        $this->db->join('mapel_perminggu mp', 'mp.id= j.id_m_perminggu');
        $this->db->join('tahun_akademik t', 'mp.id_t_akademik=t.id');
        $this->db->join('kelas k', 'k.kode_kelas = j.kode_kelas');
        $this->db->join('hari_masuk_detail hd','hd.id=j.id_detail_hari');
        $this->db->join('data_kelas_siswa d', 'd.kode_kelas=j.kode_kelas');
		$this->db->where('j.nip','3509176412630001');
        $this->db->where('mp.kode_mapel', $kode_mapel);
        $this->db->where('t.is_aktif', 'Y');
        $this->db->where('t.semester=mp.semester');
        $this->db->group_by('d.nis');
        $this->db->where('j.kode_kelas', $kode_kelas);
		$kelas_siswa = $this->db->get();
		foreach ($kelas_siswa->result() as $row) {
			$detail = array(
				'nis'			        => $row->nis,
				'id_a_permapel'         => $id_a_permapel,
			);
			$this->db->insert('detail_a_permapel', $detail);
		}
	}
    public function get_absensipermapel_tbh($tanggal,$id_jadwal){
        $this->db->select('d.id,dk.nis,s.nama,dk.no_absen,d.absensi');
        $this->db->from('absensi_permapel a');
        $this->db->join('detail_a_permapel d', 'a.id=d.id_a_permapel');
        $this->db->join('data_kelas_siswa dk', 'd.nis=dk.nis');
        $this->db->join('siswa s','s.nis=dk.nis');
        $this->db->where('a.tanggal', $tanggal);
        $this->db->where('a.id_jadwal', $id_jadwal);
        return $this->db->get();
    }
    public function update($data, $id)
	{
		return $this->db->update('detail_a_permapel', $data, array('id' => $id));
	}
    public function isAbsensiExist($id_jadwal,$tanggal) {
        $this->db->select('*');
        $this->db->from('absensi_permapel');
        $this->db->where('id_jadwal', $id_jadwal);
        $this->db->where('tanggal', $tanggal);
        return $this->db->get();
    }
}
?>