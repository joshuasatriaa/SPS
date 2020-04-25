<?php
class m_notif extends CI_Model{
    
	function insertTable($table,$data){
		$this->db->insert($table,$data);

	}
	
	function tampilkan_notifku($where){
		$query = $this->db->query('SELECT *
        FROM notifikasi a 
		JOIN pengguna b ON a.id_user = b.id_pengguna
		WHERE a.id_user = "'.$where.'" ORDER BY waktu_notifikasi DESC');
		return $query;
	}

	function tampilkan_notif_belum_dilihat($where){
		$query = $this->db->query('SELECT *
        FROM notifikasi a 
		JOIN pengguna b ON a.id_user = b.id_pengguna
		WHERE a.id_user = "'.$where.'" AND status_notifikasi != 1');
		return $query;
	}

	function getPenggunaViaBooking($id){
        $query = $this->db->query('SELECT a.id_pengguna, b.nama_pengguna FROM booking a JOIN pengguna b ON a.id_pengguna = b.id_pengguna WHERE a.id_booking = "'.$id.'"');
        return $query;
	}

	function updateNotif($table, $data, $where){
		$this->db->where($where);
		$this->db->update($table, $data);
	}
}
?>