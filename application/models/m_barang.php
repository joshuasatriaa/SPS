<?php
class m_barang extends CI_Model{
	function tampilkan_barang(){
		return $this->db->query('select id_barang, nama_barang, id_penjual, gambar_barang, harga_barang, stok_barang, user_add, waktu_add from barang');
	}
	
	
	function insertTable($a,$b){
		$this->db->insert($a,$b);

	}	
	
	
	
	
}
?>