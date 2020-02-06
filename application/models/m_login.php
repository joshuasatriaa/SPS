<?php
class m_login extends CI_Model{
	function cek_login($email, $password){

		$this->db->select('*');
        $this->db->from('user a'); 
        $this->db->join('pengguna b', 'a.id_user = b.id_pengguna', 'left');
       	$this->db->join('bengkel c', 'a.id_user = c.id_bengkel', 'left');
		$this->db->where('a.email',$email);
		$this->db->where('a.password', md5($password));
		$this->db->where('b.status_delete', '0');
		$this->db->or_where('c.status_delete','0');
		
		$query = $this->db->get(); 
		return $query;
		
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