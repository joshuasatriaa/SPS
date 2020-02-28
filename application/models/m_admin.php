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
}
?>