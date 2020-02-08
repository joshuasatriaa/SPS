<?php
class m_barang extends CI_Model{
	function tampilkan_barang(){
		return $this->db->query('SELECT * FROM barang JOIN pengguna ON barang.id_penjual = pengguna.id_pengguna');
	}
	
	
	function insertTable($a,$b){
		$this->db->insert($a,$b);

	}	
	
	
	
	
}
?>