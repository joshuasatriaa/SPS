<?php
class m_pesanan extends CI_Model{
	function tampilkanPesanan(){
		return $this->db->query('SELECT * FROM pesanan');
	}
	function tampilkanData()
	{
		return $this->db->query('SELECT a.id_pesanan, b.nama_pengguna, c.nama_barang, a.status_pesanan, a.waktu_pesanan FROM pesanan a JOIN user d ON a.id_pembeli=d.id_user JOIN pengguna b ON d.id_user=b.id_pengguna JOIN barang c ON a.id_barang=c.id_barang');
	}
	
	function insertTable($table,$where){
		$this->db->insert($table,$where);

	}

	function showCart($id){
		return $this->db->query('SELECT * FROM pesanan a
		JOIN barang b ON a.id_barang = b.id_barang
		JOIN foto_barang c ON b.id_barang = c.id_barang
		LEFT JOIN bengkel d ON b.id_penjual = d.id_bengkel
		LEFT JOIN pengguna e ON b.id_penjual = e.id_pengguna
		WHERE id_pembeli = "'.$id.'" AND a.status_pesanan = 0 AND id_foto_barang LIKE "FOTO-BARANG-%1"');
	}
	
	function searchCart($id){
		return $this->db->query('SELECT * FROM pesanan
		WHERE id_pembeli = "'.$id.'" AND status_pesanan = 0');
	}

<<<<<<< HEAD
	function editData($where, $table){
		return $this->db->get_where($table,$where);
	}
	
	function updateData($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
=======
	function remove($id, $id2){
		return $this->db->query('DELETE FROM pesanan WHERE id_barang = "'.$id.'" AND id_pembeli = "'.$id2.'" AND status_pesanan = 0');
>>>>>>> parent of 03ec31c... Revert "chat 2.0"
	}
	
	function hapusData($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}
?>