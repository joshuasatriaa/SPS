<?php
class m_admin extends CI_Model{

	function tampilkanData()
	{
		return $this->db->query('SELECT * FROM admin');
	}
    function insertTable($table,$data){
		$this->db->insert($table,$data);

	}
    function editData($where, $table){
		return $this->db->get_where($table,$where);
	}
	function getData($where, $table){
	
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
		return $this->db->query('SELECT DISTINCT id_pengirim FROM pesan WHERE id_penerima = "ADMIN"');
	}

	function ambilDataUser($where){
		return $this->db->query('SELECT id_pengirim, nama_bengkel, nama_pengguna, pesan, waktu_kirim 
		FROM pesan a 
		LEFT JOIN bengkel b ON a.id_pengirim = b.id_bengkel 
		LEFT JOIN pengguna c ON a.id_pengirim = c.id_pengguna 
		WHERE id_pengirim = "'.$where.'" AND id_penerima = "ADMIN"
		ORDER BY waktu_kirim DESC
		LIMIT 1');
	}
}
?>