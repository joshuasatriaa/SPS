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
}
?>