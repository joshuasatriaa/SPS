<?php
class m_member extends CI_Model{
    
	function tampilkan_semua_member(){
		$query=$this->db->get('membership');
		return $query;
	}
	
	function insert($a,$b){
		$this->db->insert($a,$b);
	}	

	function tampilkan_member($table, $where){
		return $this->db->get_where($table,$where);
    }
 
    function editData($where, $table){
		return $this->db->get_where($table,$where);
	}

	function checkMembership($id){
		return $this->db->query('SELECT * FROM membership WHERE id_user = "'.$id.'" AND status_membership = 1');
	}

	function searchNewestMembership($id){
		return $this->db->query('SELECT * FROM membership WHERE id_user = "'.$id.'" ORDER BY tanggal_selesai DESC LIMIT 1');
	}

	function checkMyMembership($id){
		return $this->db->query('SELECT * FROM membership WHERE id_user = "'.$id.'"');
	}
	function update($table,$data,$where){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	
	function hapusData($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	
}
?>