<?php
	class m_signup_pengguna extends CI_Model{
		
		function insertTable($a,$b){
			$this->db->insert($a,$b);
		}
		function tampilkanData()
	{
		$query=$this->db->get('pengguna');
		return $query;
		
	}
	function tampilkanRecordProfile($id_pengguna)
	{
		return $this->db->query('SELECT id_pengguna, nama_pengguna, jenis_kelamin, tanggal_lahir, tempat_lahir, alamat, telepon, email FROM pengguna WHERE id_pengguna="'.$id_pengguna.'"');
	}
	function updateRecord($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}
?>	