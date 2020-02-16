<?php
class m_pesanan extends CI_Model{
	function tampilkanPesanan(){
		return $this->db->query('SELECT * FROM pesanan');
	}
	
	
	function insertTable($table,$where){
		$this->db->insert($table,$where);

	}

	function showCart($id){
		return $this->db->query('SELECT * FROM pesanan a
		JOIN barang b ON a.id_barang = b.id_barang
		WHERE id_pembeli = "'.$id.'" AND status_pesanan = 0');
	}
	
	function searchCart($id){
		return $this->db->query('SELECT * FROM pesanan
		WHERE id_pembeli = "'.$id.'" AND status_pesanan = 0');
	}

	
	
}
?>