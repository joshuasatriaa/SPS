<?php
class m_pesan extends CI_Model{
	function tampilkanPesan($id1,$id2){
        return $this->db->query('SELECT COALESCE(pengguna.nama_pengguna,bengkel.nama_bengkel ) 
        AS nama_penerima,pesan.id_pesan ,pesan.pesan, pesan.waktu_kirim ,pesan.id_pengirim
        FROM Pesan
        LEFT JOIN pengguna ON pesan.id_pengirim = pengguna.id_pengguna
        LEFT JOIN bengkel ON bengkel.id_bengkel = pesan.id_pengirim   
        WHERE 
        Pesan.id_pengirim = "'.$id1.'" AND Pesan.id_penerima = "'.$id2.'" 
        OR 
        Pesan.id_pengirim = "'.$id2.'" AND Pesan.id_penerima = "'.$id1.'" 
        GROUP BY pesan.id_pesan');
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