<?php
class m_promo extends CI_Model{
    
	function tampilkan_semua_data(){
		$query=$this->db->get('promo');
		return $query;
    }
    
    function updateRecord($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	
}
?>