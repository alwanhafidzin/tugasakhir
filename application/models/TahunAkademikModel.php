<?php
 
	class TahunAkademikModel extends CI_Model
	{
		
		public $table = "tbl_tahun_akademik";

		function save()
		{
		 	$data = array(
		 		'tahun_akademik'	=> $this->input->post('tahun_akademik', TRUE),
		 		'is_aktif'			=> $this->input->post('is_aktif', TRUE)
		 	);
		 	$this->db->insert($this->table, $data);
		}

		function update()
		{
			if (empty('semester')) {
				$data = array(
			 		'tahun_akademik'	=> $this->input->post('tahun_akademik', TRUE),
			 	);
			} else {
				$data = array(
			 		'tahun_akademik'	=> $this->input->post('tahun_akademik', TRUE),
			 		'semester'			=> $this->input->post('semester', TRUE)
			 	);
			}
		 	$id_tahunakademik = $this->input->post('id_tahunakademik');
		 	$this->db->where('id_tahun_akademik', $id_tahunakademik);
		 	$this->db->update($this->table, $data);
		}

	}

?>