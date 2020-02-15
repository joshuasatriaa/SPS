<?php
class m_service extends CI_Model{
    
	function tampilkan_service(){
		$query=$this->db->get('service');
		return $query;
	}
	
	function insertTable($a,$b){
		$this->db->insert($a,$b);
	}	

	function tampilkan_serviceku($where){
		$query = $this->db->query('SELECT * FROM Service WHERE id_bengkel = "'.$where.'"');
		return $query;
	}
}
?>