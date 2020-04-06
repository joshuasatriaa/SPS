<?php
class m_pesanan extends CI_Model{
	function tampilkanPesanan(){
		return $this->db->query('SELECT * FROM pesanan');
	}
	function tampilkanData()
	{
		return $this->db->query('SELECT a.id_pesanan, b.nama_pengguna, c.nama_barang, a.status_pesanan, a.waktu_pesanan, b.gambar, a.jumlah_barang FROM pesanan a JOIN user d ON a.id_pembeli=d.id_user JOIN pengguna b ON d.id_user=b.id_pengguna JOIN barang c ON a.id_barang=c.id_barang');
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

	function showThisCart($id,$idB){
		return $this->db->query('SELECT * FROM pesanan a
		JOIN barang b ON a.id_barang = b.id_barang
		JOIN foto_barang c ON b.id_barang = c.id_barang
		LEFT JOIN bengkel d ON b.id_penjual = d.id_bengkel
		LEFT JOIN pengguna e ON b.id_penjual = e.id_pengguna
		WHERE id_pembeli = "'.$id.'" AND a.status_pesanan = 0 AND id_foto_barang LIKE "FOTO-BARANG-%1" AND b.id_barang ="'.$idB.'"');
	}
	
	function searchCart($id){
		return $this->db->query('SELECT * FROM pesanan
		WHERE id_pembeli = "'.$id.'" AND status_pesanan = 0');
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

	function gantiJumlah($idB,$jumlah)
	{
		return $this->db->query('UPDATE pesanan
		SET jumlah_barang="'.$jumlah.'"
		WHERE id_barang="'.$idB.'" ');
	}

	function remove($id_barang, $id_user){
		return $this->db->query('DELETE FROM pesanan WHERE id_barang = "'.$id_barang.'" AND id_pembeli = "'.$id_user.'" AND status_pesanan = 0');
	}
	
	function reporting1($where)
	{
		//Penjualan bulan lalu
		return $this->db->query('SELECT * FROM pesanan 
		JOIN barang ON pesanan.id_barang = barang.id_barang
		WHERE status_pesanan = 1 
		AND YEAR(waktu_pesanan) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)
		AND MONTH(waktu_pesanan) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)
		AND barang.id_penjual = "'.$where.'"');
	}

	function reporting2($where)
	{
		//Penjualan bulan ini
		return $this->db->query('SELECT * FROM pesanan 
		JOIN barang ON pesanan.id_barang = barang.id_barang
		WHERE status_pesanan = 1 
		AND MONTH(waktu_pesanan) = MONTH(CURRENT_DATE())
		AND YEAR(waktu_pesanan) = YEAR(CURRENT_DATE())
		AND barang.id_penjual = "'.$where.'"');
	}

	function reporting3($where)
	{
		//total Penjualan
		return $this->db->query('SELECT * FROM pesanan 
		JOIN barang ON pesanan.id_barang = barang.id_barang
		WHERE status_pesanan = 1
		AND barang.id_penjual = "'.$where.'"
		');
	}

	function reporting4($where)
	{
		//servis bulan lalu
		return $this->db->query('SELECT * FROM booking
		JOIN service ON booking.id_service = service.id_service
		WHERE booking.status_booking = 3
		AND YEAR(waktu_service) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)
		AND MONTH(waktu_service) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)
		AND service.id_bengkel = "'.$where.'"');
	}

	function reporting5($where)
	{
		//servis bulan ini
		return $this->db->query('SELECT * FROM booking
		JOIN service ON booking.id_service = service.id_service
		WHERE booking.status_booking = 3
		AND MONTH(waktu_service) = MONTH(CURRENT_DATE())
		AND YEAR(waktu_service) = YEAR(CURRENT_DATE())
		AND service.id_bengkel = "'.$where.'"');
	}

	function reporting6($where)
	{
		//Total servis
		return $this->db->query('SELECT * FROM booking
		JOIN service ON booking.id_service = service.id_service
		WHERE booking.status_booking = 3
		AND service.id_bengkel = "'.$where.'"');
	}
}
?>