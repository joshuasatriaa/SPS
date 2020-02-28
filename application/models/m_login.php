<?php
class m_login extends CI_Model{
	
	
	function cek_login($email, $password){
		return $this->db->query('SELECT * FROM user a 
		LEFT JOIN pengguna b ON a.id_user = b.id_pengguna 
		LEFT JOIN bengkel c ON a.id_user = c.id_bengkel
		LEFT JOIN admin d ON a.id_user = d.id_admin 
		WHERE a.email = "'.$email.'" 
		AND a.password = "'.$password.'" 
		OR b.status_delete = 0 AND c.status_delete = 0');
		
	}
	
	function cek_password($id_user)
	{
		return $this->db->query('SELECT password FROM user WHERE id_user="'.$id_user.'"');
	}

	function cek_email($email)
	{
		return $this->db->query('SELECT * FROM user WHERE email="'.$email.'"');
	}

}
?>