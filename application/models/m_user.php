<?php 

class m_user extends Ci_Model
{
    function tampilkanData()
	{
		$query=$this->db->get('user');
		return $query;
		
	}
    
    function insertTable($table,$where)
	{
		$this->db->insert($table,$where);
	}
    
    function editRecord($where,$table)
	{
		return $this->db->get_where($table,$where);
	}
    
    function getRecord($where)
	{
		return $this->db->query('SELECT a.id_user, a.email, b.nama_pengguna 
		FROM user a 
		JOIN pengguna b
		WHERE a.email = "'.$where.'"');
    }
    
	function updateRecord($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function hapusRecord($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}




}





?>