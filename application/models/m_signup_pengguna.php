<?php
	class m_signup_pengguna extends CI_Model{
		
		function insertTable($a,$b){
			$this->db->insert($a,$b);
		}
		
}
?>	