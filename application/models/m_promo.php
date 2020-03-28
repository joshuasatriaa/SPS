<?php
class m_promo extends CI_Model{
    
	function tampilkan_semua_data(){
		$query=$this->db->get('promo');
		return $query;
	}
	
}
?>