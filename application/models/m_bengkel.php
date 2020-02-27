<?php
class m_bengkel extends CI_Model{

	function tampilkanData()
	{
		return $this->db->query('SELECT id_bengkel, nama_bengkel, email, telepon, tanggal_registrasi, gambar, jam_buka, jam_tutup FROM bengkel');
	}
    function insertTable($table,$where){
		$this->db->insert($table,$where);

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