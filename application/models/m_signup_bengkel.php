<?php
	class m_signup_bengkel extends CI_Model{
		
		function insertTable($a,$b){
			$this->db->insert($a,$b);
		}
		function tampilkanData()
		{
			$query=$this->db->get('bengkel');
			return $query;
			
		}

		function tampilkanRecordProfile($id_bengkel)
		{
			return $this->db->query('SELECT id_bengkel, nama_bengkel, jam_buka, jam_tutup, alamat, telepon, email FROM bengkel WHERE id_bengkel="'.$id_bengkel.'"');
		}

		function getRecord($table,$where){
			return $this->db->get_where($table, $where);
		}

		function updateRecord($where,$data,$table)
		{
			$this->db->where($where);
			$this->db->update($table,$data);
		}

		function tampilkan_profile($where)
		{
			$query = $this->db->query('	SELECT * FROM Bengkel WHERE id_bengkel = "'.$where.'"');
			return $query;
		}

		function tampilkan_rating($where)
		{
			$query = $this->db->query('	SELECT * FROM Rating WHERE id_penerima = "'.$where.'"');
			return $query;
		}
}
?>	