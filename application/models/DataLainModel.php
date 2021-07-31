<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DataLainModel extends CI_Model {
    function insert_kkm($id_tahun_akademik)
		 {
            $kkm_ganjil = array(
                'id_t_akademik' =>$id_tahun_akademik,
                'semester' => 'ganjil',
                'kkm'  =>75
            );
            $this->db->insert('kkm', $kkm_ganjil);
            $kkm_genap = array(
                'id_t_akademik' =>$id_tahun_akademik,
                'semester' => 'genap',
                'kkm'  =>75
            );
            $this->db->insert('kkm', $kkm_genap);
		 }
    function insert_hari_masuk($id_tahun_akademik)
        {
        $hari = $this->db->get('hari_masuk');
        foreach ($hari->result() as $row) {
            if ($row->id==1 || $row->id==7 || $row->id==8){
                $hari_masuk_ganjil = array(
                    'id_hari'			     	=> $row->id,
                    'id_t_akademik'		=> $id_tahun_akademik,
                    'semester'			=> 'ganjil',
                    'status'            =>'libur'
                );
            }else{
                $hari_masuk_ganjil = array(
                    'id_hari'			     	=> $row->id,
                    'id_t_akademik'		=> $id_tahun_akademik,
                    'semester'			=> 'ganjil',
                    'status'            =>'masuk'
                );
            }
            $this->db->insert('hari_masuk_detail', $hari_masuk_ganjil);
        }
        foreach ($hari->result() as $row) {
            if ($row->id==1 || $row->id==7 || $row->id==8){
                $hari_masuk_ganjil = array(
                    'id_hari'			     	=> $row->id,
                    'id_t_akademik'		=> $id_tahun_akademik,
                    'semester'			=> 'genap',
                    'status'            =>'libur'
                );
            }else{
                $hari_masuk_ganjil = array(
                    'id_hari'			     	=> $row->id,
                    'id_t_akademik'		=> $id_tahun_akademik,
                    'semester'			=> 'genap',
                    'status'            =>'masuk'
                );
            }
            $this->db->insert('hari_masuk_detail', $hari_masuk_ganjil);
        }
    }
    function get_kkm(){
        $this->db->select('k.id,k.kkm');
        $this->db->from('kkm k');
        $this->db->join('tahun_akademik t','t.id=k.id_t_akademik');
        $this->db->where('t.is_aktif="Y"');
        $this->db->where('t.semester=k.semester');
        return $this->db->get();
    }
    function get_hari_masuk_detail(){
        $this->db->select('');
        $this->db->from('hari_masuk_detail hd');
        $this->db->join('hari_masuk h','h.id=hd.id_hari');
        $this->db->join('tahun_akademik t','t.id=h2.id_t_akademik');
        $this->db->where('t.is_aktif="Y"');
        $this->db->where('t.semester=k.semester');
        return $this->db->get();
    }
    public function update_kkm($data, $id)
	{
		return $this->db->update('kkm', $data, array('id' => $id));
	}
    public function update_status_hari($id)
	{
		$sql ="UPDATE hari_masuk_detail SET status = CASE WHEN status='masuk'  THEN 'libur' WHEN status='libur' THEN 'masuk' ELSE status END WHERE id='".$id."'";
		return $this->db->query($sql);
	}
    public function get_by_id_kkm($id)
	{
		$query = $this->db->get_where('kkm', array('id' => $id));
		$data['object'] = $query->row();
		$data['array'] = $query->row_array();
		$data['count'] = $query->num_rows();
		return $data;
	}
}
?>