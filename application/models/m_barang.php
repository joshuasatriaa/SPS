<?php
class m_barang extends CI_Model{
	function tampilkanBarang(){
		return $this->db->query('SELECT a.id_barang, a.nama_barang, a.id_penjual,
		a.harga_barang, a.waktu_add, a.stok_barang, b.nama_pengguna, c.nama_bengkel FROM barang a
		LEFT JOIN pengguna b ON a.id_penjual = b.id_pengguna
		LEFT JOIN bengkel c ON a.id_penjual = c.id_bengkel
		LEFT JOIN foto_barang d ON a.id_barang = d.id_barang');
	}
	
	
	function insertTable($table,$where){
		$this->db->insert($table,$where);

	}
	
	function searchBarang($keyword){
		return $this->db->query('SELECT * FROM barang a
		LEFT JOIN pengguna b ON a.id_penjual = b.id_pengguna
		LEFT JOIN bengkel c ON a.id_penjual = c.id_bengkel
		WHERE nama_barang LIKE "%'.$keyword.'%"');
	}
	
	function tampilkanBarangIni($where){
		return $this->db->query('SELECT * FROM barang a
		LEFT JOIN pengguna b ON a.id_penjual = b.id_pengguna
		LEFT JOIN bengkel c ON a.id_penjual = c.id_bengkel
		WHERE id_barang = "'.$where.'" ');
	}
	
	
}
?>