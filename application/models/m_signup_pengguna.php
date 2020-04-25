<?php
	class m_signup_pengguna extends CI_Model{
		
		function insertTable($table,$data){
			$this->db->insert($table,$data);
	
		}
		function tampilkanData()
		{
			$query=$this->db->get('pengguna');
			return $query;
		}

		function tampilkanRecordProfile($id_pengguna)
		{
			return $this->db->query('SELECT * FROM pengguna WHERE id_pengguna="'.$id_pengguna.'"');
		}
		
		function updateRecord($where,$data,$table)
		{
			$this->db->where($where);
			$this->db->update($table,$data);
		}
	}
?>	