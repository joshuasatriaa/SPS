<?php
class m_barang extends CI_Model{
	function tampilkanBarang(){
		return $this->db->query('SELECT a.id_barang, a.nama_barang, a.id_penjual,
		a.harga_barang, a.waktu_add, a.stok_barang, d.gambar_barang, b.nama_pengguna, c.nama_bengkel, e.alamat FROM barang a
		LEFT JOIN pengguna b ON a.id_penjual = b.id_pengguna
		LEFT JOIN bengkel c ON a.id_penjual = c.id_bengkel
		LEFT JOIN foto_barang d ON a.id_barang = d.id_barang
		LEFT JOIN lokasi_bengkel e ON c.id_bengkel = e.id_bengkel');
	}
	function tampilkanData()
	{
		return $this->db->query('SELECT a.id_barang, a.nama_barang, b.email, a.harga_barang, a.keterangan_barang, a.stok_barang FROM barang a JOIN user b ON a.id_penjual=b.id_user');
	}
	
	
	function insertTable($table,$where){
		$this->db->insert($table,$where);

	}
	
	function searchBarang($keyword){
		return $this->db->query('SELECT a.id_barang, a.nama_barang, a.id_penjual,
		a.harga_barang, a.waktu_add, a.stok_barang, d.gambar_barang, b.nama_pengguna, c.nama_bengkel, e.alamat FROM barang a
		LEFT JOIN pengguna b ON a.id_penjual = b.id_pengguna
		LEFT JOIN bengkel c ON a.id_penjual = c.id_bengkel
		LEFT JOIN foto_barang d ON a.id_barang = d.id_barang
		LEFT JOIN lokasi_bengkel e ON c.id_bengkel = e.id_bengkel
		WHERE nama_barang LIKE "%'.$keyword.'%"');
	}
	
	function tampilkanBarangIni($where){
		return $this->db->query('SELECT a.id_barang, a.nama_barang, a.id_penjual,
		a.harga_barang, a.waktu_add, a.stok_barang, d.gambar_barang, b.nama_pengguna, c.nama_bengkel, e.alamat FROM barang a
		LEFT JOIN pengguna b ON a.id_penjual = b.id_pengguna
		LEFT JOIN bengkel c ON a.id_penjual = c.id_bengkel
		LEFT JOIN foto_barang d ON a.id_barang = d.id_barang
		LEFT JOIN lokasi_bengkel e ON c.id_bengkel = e.id_bengkel
		WHERE a.id_barang = "'.$where.'" ');
	}
	
	function tampilkanBarangKu($where){
		return $this->db->query('SELECT a.id_barang, a.nama_barang, a.id_penjual, a.waktu_add,
		a.harga_barang, a.waktu_add, a.stok_barang, d.gambar_barang, b.nama_pengguna, c.nama_bengkel, e.alamat FROM barang a
		LEFT JOIN pengguna b ON a.id_penjual = b.id_pengguna
		LEFT JOIN bengkel c ON a.id_penjual = c.id_bengkel
		LEFT JOIN foto_barang d ON a.id_barang = d.id_barang
		LEFT JOIN lokasi_bengkel e ON c.id_bengkel = e.id_bengkel
		WHERE b.id_pengguna = "'.$where.'" ');
	}
	
	function editData($where, $table){
		return $this->db->get_where($table,$where);
	}
	
	function updateData($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	
	function hapusData($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}

?>