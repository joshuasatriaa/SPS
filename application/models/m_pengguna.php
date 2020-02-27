<?php
class m_pengguna extends CI_Model{

	function tampilkanData()
	{
		return $this->db->query('SELECT id_pengguna, nama_pengguna,jenis_kelamin,tempat_lahir,alamat, email, telepon, tanggal_registrasi, gambar FROM pengguna');
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