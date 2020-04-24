<?php
class m_barang extends CI_Model{
	function tampilkanBarang(){
		return $this->db->query('SELECT a.id_barang, a.nama_barang, a.id_penjual,
		a.harga_barang, a.waktu_add, a.stok_barang, b.nama_pengguna, b.alamat alamat_pengguna, d.gambar_barang, d.id_foto_barang, c.nama_bengkel, e.alamat FROM barang a
		LEFT JOIN pengguna b ON a.id_penjual = b.id_pengguna
		LEFT JOIN bengkel c ON a.id_penjual = c.id_bengkel
		LEFT JOIN foto_barang d ON a.id_barang = d.id_barang
		LEFT JOIN lokasi_bengkel e ON c.id_bengkel = e.id_bengkel
		WHERE d.id_foto_barang LIKE "FOTO-BARANG-%1" AND a.status_delete != 1
		');
	}

	function tampilkanBarangP($this_page_first_result,$results_per_page){
		return $this->db->query('SELECT a.id_barang, a.nama_barang, a.id_penjual,
		a.harga_barang, a.waktu_add, a.stok_barang, b.nama_pengguna, b.alamat alamat_pengguna, d.gambar_barang, d.id_foto_barang, c.nama_bengkel, e.alamat FROM barang a
		LEFT JOIN pengguna b ON a.id_penjual = b.id_pengguna
		LEFT JOIN bengkel c ON a.id_penjual = c.id_bengkel
		LEFT JOIN foto_barang d ON a.id_barang = d.id_barang
		LEFT JOIN lokasi_bengkel e ON c.id_bengkel = e.id_bengkel
		LEFT JOIN membership f ON a.id_penjual = f.id_user
		WHERE d.id_foto_barang LIKE "FOTO-BARANG-%1" AND a.status_delete != 1 AND (f.status_membership = 0 OR f.status_membership IS NULL)
		LIMIT ' . $this_page_first_result . ',' .  $results_per_page . '
		');
	}

	function tampilkanBarangMemberP($this_page_first_result,$results_per_page){
		return $this->db->query('SELECT a.id_barang, a.nama_barang, a.id_penjual,
		a.harga_barang, a.waktu_add, a.stok_barang, b.nama_pengguna, b.alamat alamat_pengguna, d.gambar_barang, d.id_foto_barang, c.nama_bengkel, e.alamat FROM barang a
		LEFT JOIN pengguna b ON a.id_penjual = b.id_pengguna
		LEFT JOIN bengkel c ON a.id_penjual = c.id_bengkel
		LEFT JOIN foto_barang d ON a.id_barang = d.id_barang
		LEFT JOIN lokasi_bengkel e ON c.id_bengkel = e.id_bengkel
		LEFT JOIN membership f ON a.id_penjual = f.id_user
		WHERE d.id_foto_barang LIKE "FOTO-BARANG-%1" AND a.status_delete != 1 AND f.status_membership = 1
		LIMIT ' . $this_page_first_result . ',' .  $results_per_page . '
		');
	}

	function tampilkanSemuaBarang()
	{
		return $this->db->query('SELECT * FROM barang');
	}

	function tampilkanData()
	{
		return $this->db->query('SELECT a.id_barang, a.nama_barang, b.email, a.harga_barang, a.keterangan_barang, a.stok_barang FROM barang a JOIN user b ON a.id_penjual=b.id_user');
	}


	function tampilkanData1()
	{
		return $this->db->query('SELECT * FROM 
								barang a JOIN user b ON a.id_penjual=b.id_user
								WHERE status_delete != 1');
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
		WHERE nama_barang LIKE "%'.$keyword.'%" AND d.id_foto_barang LIKE "FOTO-BARANG-%1"');
	}

	function searchBarangAjax($min, $max){
		return $this->db->query('SELECT a.id_barang, a.nama_barang, a.id_penjual, a.harga_barang, a.waktu_add, a.stok_barang, d.gambar_barang, b.nama_pengguna, c.nama_bengkel, e.alamat, b.alamat as alamat_pengguna 
		FROM barang a 
		LEFT JOIN pengguna b ON a.id_penjual = b.id_pengguna 
		LEFT JOIN bengkel c ON a.id_penjual = c.id_bengkel 
		LEFT JOIN foto_barang d ON a.id_barang = d.id_barang 
		LEFT JOIN lokasi_bengkel e ON c.id_bengkel = e.id_bengkel 
		WHERE d.id_foto_barang LIKE "FOTO-BARANG-%1" AND a.harga_barang BETWEEN '.$min.' AND '.$max);
	}
	
	function tampilkanBarangIni($where){
		return $this->db->query('SELECT a.id_barang, a.nama_barang, a.id_penjual,COALESCE(b.gambar,c.gambar) AS gambar,
		a.harga_barang, a.waktu_add, a.stok_barang, d.gambar_barang, b.nama_pengguna, c.nama_bengkel, e.alamat FROM barang a
		LEFT JOIN pengguna b ON a.id_penjual = b.id_pengguna
		LEFT JOIN bengkel c ON a.id_penjual = c.id_bengkel
		LEFT JOIN foto_barang d ON a.id_barang = d.id_barang
		LEFT JOIN lokasi_bengkel e ON c.id_bengkel = e.id_bengkel
		WHERE a.id_barang = "'.$where.'" AND d.id_foto_barang LIKE "FOTO-BARANG-%1" LIMIT 1');
	}
	
	function tampilkanBarangKu($where){
		return $this->db->query('SELECT a.id_barang, a.nama_barang, a.id_penjual, a.waktu_add,
		a.harga_barang, a.waktu_add, a.stok_barang, d.gambar_barang, b.nama_pengguna, c.nama_bengkel, e.alamat FROM barang a
		LEFT JOIN pengguna b ON a.id_penjual = b.id_pengguna
		LEFT JOIN bengkel c ON a.id_penjual = c.id_bengkel
		LEFT JOIN foto_barang d ON a.id_barang = d.id_barang
		LEFT JOIN lokasi_bengkel e ON c.id_bengkel = e.id_bengkel
		WHERE a.id_penjual = "'.$where.'" AND d.id_foto_barang LIKE "FOTO-BARANG-%1" AND a.status_delete != 1 AND a.stok_barang > 0');
	}

	function tampilkanBarangKuSemua($where){
		return $this->db->query('SELECT a.id_barang, a.nama_barang, a.id_penjual, a.waktu_add,
		a.harga_barang, a.waktu_add, a.stok_barang, d.gambar_barang, b.nama_pengguna, c.nama_bengkel, e.alamat FROM barang a
		LEFT JOIN pengguna b ON a.id_penjual = b.id_pengguna
		LEFT JOIN bengkel c ON a.id_penjual = c.id_bengkel
		LEFT JOIN foto_barang d ON a.id_barang = d.id_barang
		LEFT JOIN lokasi_bengkel e ON c.id_bengkel = e.id_bengkel
		WHERE a.id_penjual = "'.$where.'" AND d.id_foto_barang LIKE "FOTO-BARANG-%1" AND a.status_delete != 1 ');
	}
	
	function editData($where, $table){
		return $this->db->get_where($table,$where);
	}
	
	function updateData($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	
	function hapusData($where){
		return $this->db->query('UPDATE Barang
		SET status_delete=1
		WHERE id_barang= "'.$where.'" ');
	}

	function tampilkanFotoBarangIni($where){
		return $this->db->query('SELECT * FROM foto_barang
		JOIN barang ON foto_barang.id_barang = barang.id_barang
		WHERE barang.id_barang = "'.$where.'"');
		
	}

	function tampilkanDataAdmin()
	{
		return $this->db->query('SELECT barang.nama_barang,pengguna.nama_pengguna,
								bengkel.nama_bengkel,bengkel.email as email_b,pengguna.email as email_a,
								barang.harga_barang,barang.status_delete 
								FROM barang
								LEFT JOIN pengguna ON barang.id_penjual = pengguna.id_pengguna
								LEFT JOIN bengkel ON barang.id_penjual = bengkel.id_bengkel
								WHERE barang.status_delete !=1 ');
	}
}

?>