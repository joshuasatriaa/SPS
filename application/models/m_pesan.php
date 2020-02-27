<?php
class m_pesan extends CI_Model{
	function tampilkanPesan($id1,$id2){
        return $this->db->query('SELECT * FROM Pesan
        WHERE Pesan.id_pengirim = "'.$id1.'" AND Pesan.id_penerima = "'.$id2.'" ');
	}
	
}

?>