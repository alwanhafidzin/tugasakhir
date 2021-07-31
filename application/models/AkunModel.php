<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AkunModel extends CI_Model {
	public $table = 'users';

	public function update_status($ids)
	{
		$sql ="UPDATE users SET active = CASE WHEN active=1  THEN 0 WHEN active=0 THEN 1 ELSE active END WHERE id IN ('".$ids."')";
		return $this->db->query($sql);
	}
	public function get_all($tipe,$status){
		$sql ="Select  identity,nama,email,tipe,active,id
		From    (
			Select  s.nama,s.nis as identity,s.email, 'siswa' as tipe,u.active,u.id
			From  siswa s INNER JOIN users u ON s.nis=u.username  AND s.status='active'
			Union
			Select g.nama,g.nip as identity,g.email, 'guru' as tipe ,u.active,u.id
			From   guru g INNER JOIN users u ON g.nip=u.username  AND g.status='active'
            Union 
            SELECT b.nama,b.username as identity,u.email, 'admin' as tipe,u.active,u.id FROM biodata_admin b INNER JOIN users u ON b.username=u.username
		) As a
		WHERE tipe= IFNULL(?,tipe)
		AND active= IFNULL(?,active)
		Group By identity
		Order By identity;";
		return $this->db->query($sql, array($tipe,$status));
	}
}
?>