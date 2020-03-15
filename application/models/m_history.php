<?php 
class m_history extends CI_Model{
    function tampil_history(){
		return $this->db->query('select id_pesanan, id_pembeli, id_penjual, id_barang, status_pesanan, waktu_pesanan FROM pesanan');
	}
	
	
	
	
?>