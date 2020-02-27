<?php
class m_service extends CI_Model{
    
	function tampilkan_service(){
		$query=$this->db->get('service');
		return $query;
	}
	
	function insertTable($a,$b){
		$this->db->insert($a,$b);
	}	

	function tampilkan_serviceku($where){
		$query = $this->db->query('SELECT * FROM Service WHERE id_bengkel = "'.$where.'"');
		return $query;
	}
	function tampilkanData()
	{
		return $this->db->query('SELECT a.id_service, b.nama_bengkel, a.nama_service, a.harga_service, a.gambar FROM service a JOIN bengkel b ON a.id_bengkel=b.id_bengkel');
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