<?php
class m_promo extends CI_Model{
    
	function tampilkan_semua_data(){
		$query=$this->db->get('promo');
		return $query;
    }
    
    function updateRecord($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
    }
    
    function insertTable($a,$b){
		$this->db->insert($a,$b);
	}	
    
    function tampilkan_data_sekarang()
    {
        return $this->db->query('SELECT * FROM Promo WHERE status_delete = 0 AND tanggal_selesai >= CURDATE()');
    }

    function deleteRecord($where)
    {
        return $this->db->query('UPDATE Promo SET status_delete = 1 WHERE id_promo = "'.$where.'"');
    }
}
?>