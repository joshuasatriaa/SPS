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

		function tampilkanData1($this_page_first_result,$results_per_page)
		{
			return $this->db->query('SELECT * FROM bengkel JOIN lokasi_bengkel ON 
			bengkel.id_bengkel = lokasi_bengkel.id_bengkel
			LIMIT ' . $this_page_first_result . ',' .  $results_per_page . '
			');
		}

		function tampilkanDataLokasi()
		{
			$query=$this->db->get('lokasi_bengkel');
			return $query;
		}

		function tampilkanRecordProfile($id_bengkel)
		{
			return $this->db->query('SELECT id_bengkel, nama_bengkel, jam_buka, jam_tutup, telepon, email FROM bengkel WHERE id_bengkel="'.$id_bengkel.'"');
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
			$query = $this->db->query('SELECT * FROM Bengkel a 
			JOIN lokasi_bengkel b 
			ON a.id_bengkel = b.id_bengkel 
			WHERE a.id_bengkel = "'.$where.'"');
			return $query;
		}

		function tampilkan_rating($where)
		{
			$query = $this->db->query('	SELECT AVG(rating_bengkel) AS rating FROM Rating WHERE id_penerima = "'.$where.'"');
			return $query;
		}
}
?>	