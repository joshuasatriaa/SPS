<?php
class m_login extends CI_Model{
	function cek_login($where){
		$this->db->select('*');
        $this->db->from('user a'); 
        $this->db->join('pengguna b', 'a.id_user = b.id_pengguna', 'left');
        $this->db->join('bengkel c', 'a.id_user = c.id_bengkel', 'left');
        $this->db->where('a.email',$where);
		$this->db->where('b.status_delete', 0);
		$this->db->or_where('c.status_delete',0); 
		
        $query = $this->db->get(); 
		
	}
	
	function cek_password($id_user)
	{
		return $this->db->query('SELECT password FROM user WHERE id_user="'.$id_user.'"');
	}
}
?>