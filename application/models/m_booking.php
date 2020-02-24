<?php
class m_booking extends CI_Model{
    
	function tampilkan_booking(){
		$query=$this->db->get('booking');
		return $query;
	}
	
	function insertTable($a,$b){
		$this->db->insert($a,$b);

	}
	
	function tampilkan_bookingku($where){
		$query = $this->db->query('SELECT *
        FROM booking a 
        JOIN service b ON a.id_service = b.id_service
		JOIN pengguna c ON a.id_pengguna = c.id_pengguna
		WHERE  b.id_bengkel="'.$where.'" AND waktu_service >= NOW();');
		return $query;
	}

	function tampilkan_bookingku1($where){
		$query = $this->db->query('SELECT *
        FROM booking a 
        JOIN service b ON a.id_service = b.id_service
		JOIN pengguna c ON a.id_pengguna = c.id_pengguna
		WHERE  b.id_bengkel="'.$where.'" AND status_booking = 2;');
		return $query;
	}

	function tampilkan_mybooking($where)
	{
		$query = $this->db->query('SELECT * FROM booking a
		JOIN service b ON a.id_service = b.id_service
		JOIN bengkel c ON b.id_bengkel = c.id_bengkel
		WHERE a.id_pengguna="'.$where.'"');
		return $query;
	}

	function tampilkan_booking_sekarang($where)
	{
		$query = $this->db->query('SELECT * FROM booking a
		JOIN service b ON a.id_service = b.id_service
		JOIN bengkel c ON b.id_bengkel = c.id_bengkel
		LEFT JOIN rating d ON a.id_booking = d.id_transaksi
		WHERE a.id_pengguna="'.$where.'" AND waktu_service >= NOW();');
		return $query;
	}

	function confirm($where)
	{
		$query = $this->db->query('UPDATE Booking SET status_booking = 2 WHERE id_booking = "'.$where.'"');
		return $query;
	}

	function reject($where)
	{
		$query = $this->db->query('UPDATE Booking SET status_booking = 1 WHERE id_booking = "'.$where.'"');
		return $query;
	}

	function done($where)
	{
		$query = $this->db->query('UPDATE Booking SET status_booking = 3 WHERE id_booking = "'.$where.'"');
		return $query;
	}

	function cek_service($where)
	{
		$query = $this->db->query('SELECT * FROM Service WHERE id_bengkel = "'.$where.'"');
		return $query;
	}

	function rate($angka,$where)
	{
		$query = $this->db->query('INSERT INTO Rating ()* FROM Service WHERE id_bengkel = "'.$where.'"');
		return $query;
	}

	function hitung_jumlah_rating()
	{
		$query=$this->db->get('rating');
		return $query;
	}

	function getPenggunaViaBooking($id){
		$query = $this->db->query('SELECT a.id_pengguna, b.nama_pengguna FROM booking a JOIN pengguna b ON a.id_pengguna = b.id_pengguna WHERE a.id_pengguna = "'.$id.'"');
	}
}
?>