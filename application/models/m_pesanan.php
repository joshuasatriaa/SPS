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
		JOIN foto_barang c ON b.id_barang = c.id_barang
		JOIN bengkel d ON b.id_penjual = d.id_bengkel
		JOIN pengguna e ON b.id_penjual = e.id_pengguna
		WHERE id_pembeli = "'.$id.'" AND a.status_pesanan = 0');
	}
	
	function searchCart($id){
		return $this->db->query('SELECT * FROM pesanan
		WHERE id_pembeli = "'.$id.'" AND status_pesanan = 0');
	}

	
	
}
?>