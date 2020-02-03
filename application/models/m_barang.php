<?php
class m_barang extends CI_Model{
	function tampilkan_barang(){
		$query=$this->db->get('barang');
		return $query;
	}
	
	
	function insertTable($a,$b){
		$this->db->insert($a,$b);

	}	
	
	
	
	
}
?>