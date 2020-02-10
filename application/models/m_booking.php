<?php
class m_booking extends CI_Model{
    
	function tampilkan_booking(){
		$query=$this->db->get('booking');
		return $query;
	}
	
	function insertTable($a,$b){
		$this->db->insert($a,$b);

	}
	
	function tampilkan_bookingku($where){
		$query = $this->db->query('SELECT *
        FROM booking a 
        JOIN service b ON a.id_service = b.id_service
		JOIN pengguna c ON a.id_pengguna = c.id_pengguna
		WHERE  b.id_bengkel="'.$where.'"');
		return $query;
	}

	function confirm($where)
	{
		$query = $this->db->query('UPDATE Booking SET status_booking = 2 WHERE id_booking = "'.$where.'"');
		return $query;
	}

	function reject($where)
	{
		$query = $this->db->query('UPDATE Booking SET status_booking = 1 WHERE id_booking = "'.$where.'"');
		return $query;
	}

	function cek_service($where)
	{
		$query = $this->db->query('SELECT * FROM Service WHERE id_bengkel = "'.$where.'"');
		return $query;
	}
}
?>