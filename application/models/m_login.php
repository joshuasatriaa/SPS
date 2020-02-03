<?php
class m_login extends CI_Model{
	function cek_login($table,$where){
		return $this->db->get_where($table, $where);
		
	}
	
	function cek_password($id_user)
	{
		return $this->db->query('SELECT password FROM user WHERE id_user="'.$id_user.'"');
	}
}
?>