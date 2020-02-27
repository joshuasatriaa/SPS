<?php
class m_pesan extends CI_Model{
	function tampilkanPesan($id1,$id2){
        return $this->db->query('SELECT * FROM Pesan
        LEFT JOIN pengguna ON pesan.id_pengirim = pengguna.id_pengguna
        LEFT JOIN bengkel ON bengkel.id_bengkel = pesan.id_pengirim
        LEFT JOIN pengguna ON pesan.id_penerima = pengguna.id_pengguna
        LEFT JOIN bengkel ON bengkel.id_bengkel = pesan.id_penerima
        WHERE Pesan.id_pengirim = "'.$id1.'" AND Pesan.id_penerima = "'.$id2.'" 
        OR Pesan.id_pengirim = "'.$id2.'" AND Pesan.id_penerima = "'.$id1.'" ');
    }
    
    function insertTable($a,$b){
        $this->db->insert($a,$b);
    }

    function tampilkanData()
	{
		return $this->db->query('SELECT * FROM Pesan');
	}
	
	
}

?>