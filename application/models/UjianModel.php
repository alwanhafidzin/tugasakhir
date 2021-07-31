<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class UjianModel extends CI_Model {
	public $table = 'tugas';

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}
	public function share($data)
	{
		return $this->db->insert('ujian', $data);
	}
	public function update($data, $id)
	{
		return $this->db->update($this->table, $data, array('id' => $id));
	}
	public function update_jawaban($jawaban, $id)
	{
		$this->db->select('b.jawaban');
		$this->db->from('ujian_detail_soal u');
		$this->db->join('bank_soal b','u.id_soal=b.id');
		$this->db->where('u.id',$id);
		$jawaban_check = $this->db->get();
		foreach ($jawaban_check->result() as $row) {
			$cek = $row->jawaban;
		}
		if($cek==$jawaban){
			$data = array(
				'jawaban' => $jawaban,
				'status_jawaban' => 'B'
			);
		}else{
			$data = array(
				'jawaban' => $jawaban,
				'status_jawaban' => 'S'
			);
		}
		return $this->db->update('ujian_detail_soal', $data, array('id' => $id));
	}
	public function update_ragu($data, $id)
	{
		return $this->db->update('ujian_detail_soal', $data, array('id' => $id));
	}
	
	public function delete($id)
	{
		return $this->db->delete($this->table, array('id' => $id));
	}
	public function get_ujian_detail_by_id($id){
        $this->db->select('*');
        $this->db->from('ujian_detail');
        $this->db->where('id',$id);
        return $this->db->get();
    }
    public function get_ujian_by_id($id){
        $this->db->select('m.mapel,ke.nama_kelas,tu.tipe,u.tgl_jadwal,u.jumlah_soal,u.waktu,u.tgl_mulai,u.terlambat,mp.semester,t.tahun_akademik,g.nama as nama_guru,k.nama_ujian,u.waktu,u.id');
        $this->db->from('ujian u');
		$this->db->join('kelas ke','ke.kode_kelas=u.kode_kelas');
		$this->db->join('kategori_ujian k','u.id_k_ujian=k.id');
		$this->db->join('tipe_ujian tu','tu.id=k.id_t_ujian');
		$this->db->join('mapel m','k.kode_mapel=m.kode_mapel');
		$this->db->join('jadwal j','u.id_jadwal=j.id');
		$this->db->join('mapel_perminggu mp','mp.id=j.id_m_perminggu');
		$this->db->join('tahun_akademik t','mp.id_t_akademik=t.id');
		$this->db->join('guru g','g.nip=k.nip');
        $this->db->where('u.id',$id);
        return $this->db->get();
    }
    public function get_list_soal_by_id($id){
        $this->db->select('*');
        $this->db->from('ujian_detail_soal');
        $this->db->where('id_u_detail',$id);
        return $this->db->get();
    }
	public function get_all(){
		$this->db->select('t.id,t.judul,t.content,t.tgl_dibuat,m.kode_mapel,m.mapel');
		$this->db->from('tugas t');
		$this->db->join('mapel m', 't.kode_mapel=m.kode_mapel');
		$this->db->where('t.nip','3509176412630001');
		$this->db->order_by('t.tgl_dibuat','DESC');
		return $this->db->get();
	}
    public function get_soal($id){
		$this->db->select('b.soal,b.opsi_a,b.opsi_b,b.opsi_c,b.opsi_d,b.opsi_e,u1.id,u1.ragu,u1.jawaban');
        $this->db->from('ujian_detail u');
		$this->db->join('ujian_detail_soal u1','u1.id_u_detail=u.id');
        $this->db->join('bank_soal b','u1.id_soal=b.id');
        $this->db->where('u.id',$id);
        $this->db->limit('1');
		return $this->db->get();
	}
	public function get_soal_button($id,$offset){
		$this->db->select('b.soal,b.opsi_a,b.opsi_b,b.opsi_c,b.opsi_d,b.opsi_e,u1.id,u1.ragu,u1.jawaban');
        $this->db->from('ujian_detail u');
		$this->db->join('ujian_detail_soal u1','u1.id_u_detail=u.id');
        $this->db->join('bank_soal b','u1.id_soal=b.id');
        $this->db->where('u.id',$id);
        $this->db->limit(1,$offset);
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
	public function akhiri_ujian($id_ujian){
		// $this->db->query("SELECT status_jawaban,
		// count(*) AS total,
		// sum(case when status_jawaban = 'B' then 1 else 0 end) AS Betul
	    // FROM ujian_detail_soal
	    // WHERE id_u_detail='".$id_ujian."'");
		$this->db->select("FORMAT((sum(case when status_jawaban = 'B' then 1 else 0 end)/count(*)) *100,0) as total");
		$this->db->from('ujian_detail_soal');
		$this->db->where('id_u_detail',$id_ujian);
		$jawaban_check = $this->db->get();
		foreach ($jawaban_check->result() as $row) {
			$total = $row->total;
		}
		$data = array(
			'nilai' => $total,
			'selesai' => 'Y'
		);
		return $this->db->update('ujian_detail', $data, array('id' => $id_ujian));
	}
	public function isUjianExist($id_jadwal,$tanggal,$id_k_ujian) {
        $this->db->select('*');
        $this->db->from('ujian');
        $this->db->where('id_jadwal', $id_jadwal);
		$this->db->where('id_k_ujian', $id_k_ujian);
        $this->db->where('tgl_jadwal', $tanggal);
        return $this->db->get();
    }
	public function cek_waktu($id){
		$this->db->select('*');
		$this->db->from('ujian');
		$this->db->where('id', $id);
		$ujian = $this->db->get();
		foreach ($ujian->result() as $row) {
			$tgl_mulai = $row->tgl_mulai;
			$terlambat = $row->terlambat;
		}
		$timezone = new DateTimeZone('Asia/Jakarta');
		$date = new DateTime();
		$date->setTimeZone($timezone);
		$now =$date->format('Y-m-d H:i:s');
		if($now < $tgl_mulai){
			echo 'belum';
		}else if($now >= $tgl_mulai && $terlambat >$now){
			echo 'kerjakan';
		}else if($terlambat <$now){
			echo 'selesai';
		}else{
			echo 'error';
		}	
	}
	public function get_kelas_ujian($id,$username){
		$this->db->select('mp.id_t_akademik,mp.semester');
		$this->db->from('ujian u');
		$this->db->join('jadwal j', 'j.id=u.id_jadwal');
		$this->db->join('mapel_perminggu mp','j.id_m_perminggu=mp.id');
		$this->db->where('u.id',$id);
		$ujian = $this->db->get();
		foreach ($ujian->result() as $row) {
			$id_t_akademik = $row->id_t_akademik;
			$semester = $row->semester;
		}
		$this->db->select('*');
		$this->db->from('data_kelas_siswa');
		$this->db->where('nis',$username);
		$this->db->where('id_tahun_akademik=2');
		return $this->db->get();
	}
	public function cek_token($token,$id){
		$this->db->select('*');
		$this->db->from('ujian');
		$this->db->where('id', $id);
		$ujian = $this->db->get();
		foreach ($ujian->result() as $row) {
			$token_ujian = $row->token;
		}
		if($token == $token_ujian){
			echo 'benar';
		}else{
			echo 'salah';
		}
	}
	public function cek_ujian_detail_exist($id,$nis){
		$this->db->select('*');
		$this->db->from('ujian_detail');
		$this->db->where('id_ujian',$id);
		$this->db->where('nis',$nis);
		return $this->db->get();
	}
	function insert_soal_ujian($id,$nis)
	{
		$this->db->select('*');
		$this->db->from('ujian');
		$this->db->where('id',$id);
		$ujian = $this->db->get();
		foreach ($ujian->result() as $row) {
			$jumlah = $row->jumlah_soal;
			$waktu = $row->waktu;
			$id_k_ujian = $row->id_k_ujian;
			$jenis = $row->jenis;
			$timezone = new DateTimeZone('Asia/Jakarta');
		    $date = new DateTime();
		    $date->setTimeZone($timezone);
			$datetime = $date->format('Y-m-d H:i:s');
			$newTime = $date->format('Y-m-d H:i:s',strtotime($date->format('Y-m-d H:i:s')." +$waktu minutes"));
			$ujian_detail = array(
				'id_ujian'			=> $id,
				'nis'               => $nis,
				'nilai'             =>0,
				'waktu_mulai'       =>$datetime,
				'waktu_selesai'     =>$newTime
			);
			$this->db->insert('ujian_detail', $ujian_detail);
		}
		$id_d_ujian = $this->db->insert_id();
		$this->db->select('id');
		$this->db->from('bank_soal');
		if($jenis=='acak'){
			$this->db->order_by('RAND()');
		}else if($jenis=='urut'){
			$this->db->order_by('id');
		}
		$this->db->where('id_k_ujian',$id_k_ujian);
        $this->db->limit($jumlah);
		$ujian = $this->db->get();
		foreach ($ujian->result() as $row) {
			$soal = array(
				'id_u_detail'			=> $id_d_ujian,
				'id_soal'               => $row->id,
				'ragu'                  =>'N'
			);
			$this->db->insert('ujian_detail_soal', $soal);
            $this->db->query('UPDATE ujian_detail SET waktu_mulai= "'.$datetime.'",waktu_selesai="'.$newTime.'" WHERE id= "'.$id_d_ujian.'"');
		}
	}
	public function cek_status_ujian($id,$nis){
		$this->db->select('*');
		$this->db->from('ujian_detail');
		$this->db->where('id_ujian',$id);
		$this->db->where('nis',$nis);
		$ujian_detail = $this->db->get();
		foreach($ujian_detail->result() as $row){
			$selesai = $row->selesai;
		}
		if($selesai=='Y'){
			echo 'selesai';
		}else if($selesai=='N'){
			echo 'lanjut';
		}
	}
	public function get_id_detail_ujian($id,$nis){
		$this->db->select('id');
		$query = $this->db->get_where('ujian_detail', array('id_ujian' => $id,'nis' =>$nis));
		$data['object'] = $query->row();
		return $data;
	}
	public function get_detail_soal_nilai($id){
		$sql="SELECT k.kategori,COUNT(us.id) as jumlah_soal,
		COUNT(CASE WHEN us.`status_jawaban` LIKE '%B%' THEN 1 END) AS benar,
		COUNT(CASE WHEN us.`status_jawaban` LIKE '%S%' THEN 1 END) AS salah,
		COUNT(CASE WHEN us.`status_jawaban` LIKE '%0%' THEN 1 END) AS tidak_diisi,
		CAST((COUNT(CASE WHEN us.`status_jawaban` LIKE '%B%' THEN 1 END))/COUNT(us.status_jawaban)*100 AS decimal(10,0)) AS persentase
		FROM ujian_detail ud INNER JOIN ujian_detail_soal us ON ud.id=us.id_u_detail INNER JOIN bank_soal b ON b.id=us.id_soal INNER JOIN kategori_soal k ON k.id=b.id_k_soal WHERE ud.id=? GROUP by k.id ORDER BY k.kategori ASC";
		return $this->db->query($sql, array($id));
	}
	public function get_leaderboard($id){
		$this->db->select('*');
		$this->db->from('ujian_detail');
		$this->db->where('id',$id);
		$ujian_detail = $this->db->get();
		foreach($ujian_detail->result() as $row ){
			$id_ujian = $row->id_ujian;
		}
		$this->db->select('nis,count(nis) as jumlah_mengerjakan');
		$this->db->from('ujian_detail');
		$this->db->where('id_ujian',$id_ujian);
		$this->db->order_by('nilai','DESC');
		return $this->db->get();
	}
	public function five_leaderboard_siswa($id){
		$this->db->select('id_ujian');
		$this->db->from('ujian_detail');
		$this->db->where('id',$id);
		$ujian_detail = $this->db->get();
		foreach($ujian_detail->result() as $row ){
			$id_ujian = $row->id_ujian;
		}
		$this->db->select('s.nama,ud.nilai');
		$this->db->from('ujian_detail ud');
		$this->db->join('ujian u','u.id=ud.id_ujian');
		$this->db->join('siswa s','s.nis=ud.nis');
		$this->db->where('u.id',$id_ujian);
		$this->db->order_by('ud.nilai','DESC');
		$this->db->limit(5);
		return $this->db->get();
	}
	public function five_leaderboard($id_ujian){
		$this->db->select('s.nama');
		$this->db->from('ujian_detail ud');
		$this->db->join('siswa s','s.nis=ud.nis');
		$this->db->order_by('ud.nilai','DESC');
		$this->db->limit(5);
		return $this->db->get();
	}
	public function nilai_ujian_siswa($id,$kode_kelas,$id_t_akademik){
		$sql = "SELECT s.nama,d.no_absen,IFNULL(ud.nilai,0) FROM data_kelas_siswa d INNER JOIN siswa s ON s.nis=d.nis LEFT JOIN ujian u ON u.kode_kelas=d.kode_kelas LEFT JOIN ujian_detail ud ON ud.nis=d.nis WHERE d.kode_kelas=? AND d.id_tahun_akademik=? AND u.id=?";
		return $this->db->query($sql, array($kode_kelas,$id_t_akademik,$id));
	}
	public function get_hasil_ujian($id){
		$this->db->select('u.tgl_mulai,u.terlambat,ud.nis,s.nama,u.waktu,u.jumlah_soal,k.nama_kelas,ku.nama_ujian,g.nama as nama_guru,u.id as id_ujian,d.no_absen,ud.nilai,u.semester,t.tahun_akademik,tu.tipe,m.mapel,u.tgl_jadwal,TIME_FORMAT(j.jam_mulai, "%H:%i") AS jam_mulai,TIME_FORMAT(j.jam_selesai, "%H:%i") AS jam_selesai,COUNT(d.nis) as jumlah_siswa');
		$this->db->from('ujian_detail ud');
		$this->db->join('ujian u','ud.id_ujian=u.id');
		$this->db->join('siswa s','s.nis=ud.nis');
		$this->db->join('kelas k','k.kode_kelas=u.kode_kelas');
		$this->db->join('kategori_ujian ku','ku.id=u.id_k_ujian');
		$this->db->join('guru g','g.nip=ku.nip');
		$this->db->join('data_kelas_siswa d','d.nis=ud.nis');
		$this->db->join('mapel m','m.kode_mapel=ku.kode_mapel');
		$this->db->join('tahun_akademik t','t.id=u.id_t_akademik');
		$this->db->join('tipe_ujian tu','tu.id=ku.id_t_ujian');
		$this->db->join('jadwal j','j.id=u.id_jadwal');
		$this->db->where('u.id_t_akademik=d.id_tahun_akademik');
		$this->db->where('ud.id',$id);
		return $this->db->get();
	}
}
?>