<?php
class m_rating_barang extends CI_Model{
	
	function tampilkanData()
	{
		return $this->db->query('SELECT * FROM rating_barang');
    }

    function tampilkanDataIni($idB)
	{
        return $this->db->query('SELECT * FROM rating_barang 
        JOIN pengguna ON id_pengguna = id_pemberi_rating
        WHERE id_barang = "'.$idB.'" ');
    }
    
    function insertTable($table,$data){
		$this->db->insert($table,$data);

	}
	
}
?>