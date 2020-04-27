<?php 

class m_user extends Ci_Model
{
    function tampilkanData()
	{
		$query=$this->db->get('user');
		return $query;
	}
	
	function tampilkanData1()
	{
		return $this->db->query('SELECT * FROM Pengguna WHERE status_delete != 1');
	}

	function tampilkanData2($where)
	{
		return $this->db->query('SELECT * FROM admin WHERE id_admin = "'.$where.'" ');
	}

	function hapusData1($where){
		return $this->db->query('UPDATE Pengguna
		SET status_delete=1
		WHERE id_pengguna = "'.$where.'" ');
	}

    function insertTable($table,$data)
	{
		$this->db->insert($table,$data);
	}
    
    function editRecord($where,$table)
	{
		return $this->db->get_where($table,$where);
	}
    
    function getRecord($where)
	{
		return $this->db->query('SELECT a.id_user, a.email, b.nama_pengguna 
		FROM user a 
		JOIN pengguna b ON a.id_user = b.id_pengguna
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

	function tampilkanPenggunaPadaBulan($month){
		return $this->db->query('SELECT *
		FROM pengguna
		WHERE MONTH(waktu_add) = '.$month);
	}

	function tampilkanBengkelPadaBulan($month){
		return $this->db->query('SELECT *
		FROM bengkel
		WHERE MONTH(waktu_add) = '.$month);
	}




}





?>