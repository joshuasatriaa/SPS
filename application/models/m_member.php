<?php
class m_member extends CI_Model{
    
	function tampilkan_semua_member(){
		$query=$this->db->get('membership');
		return $query;
	}
	
	function insert($a,$b){
		$this->db->insert($a,$b);
	}	

	function insertTable($a,$b){
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

	function dataAdmin()
	{
		return $this->db->query('SELECT * FROM membership 
		LEFT JOIN bengkel ON bengkel.id_bengkel = membership.id_user 
		LEFT JOIN pengguna ON pengguna.id_pengguna = membership.id_user');
	}

	function dataAdmin1()
	{
		return $this->db->query('SELECT * FROM pengguna WHERE status_delete != 1');
	}

	function remove($idM)
	{
		return $this->db->query('UPDATE membership SET
								status_membership = 0
								WHERE id_membership = "'.$idM.'"');
	}
	
}
?>