<?php
class m_booking extends CI_Model{
    
	function tampilkan_booking(){
		$query=$this->db->get('booking');
		return $query;
	}
	
	function insertTable($a,$b){
		$this->db->insert($a,$b);

	}	
}
?>