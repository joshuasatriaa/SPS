<?php
class m_admin extends CI_Model{

	function tampilkanData()
	{
		return $this->db->query('SELECT * FROM admin');
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

	function tampilkanDataChat(){
		return $this->db->query('SELECT DISTINCT id_pengirim FROM pesan');
	}

	function ambilDataUser($where){
		return $this->db->query('SELECT nama_bengkel, nama_pengguna FROM pesan a JOIN bengkel b ON a.id_penerima = b.id_bengkel JOIN pengguna c ON a.id_penerima = c.id_pengguna WHERE id_pengirim = '.$where);
	}
}
?>