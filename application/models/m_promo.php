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

    function getPromo($id){
      return $this->db->query('SELECT * FROM Promo WHERE id_promo = "'.$id.'"');
    }

    function updateStatusDiskon($id, $data){
      return $this->db->query('UPDATE promo set status_used = '.$data.' WHERE id_promo = "'.$id.'"');
    }
    
    function insertTable($table,$data){
      $this->db->insert($table,$data);
  
    }
    
    function tampilkan_data_sekarang()
    {
        return $this->db->query('SELECT * FROM Promo WHERE status_used = 0 AND tanggal_selesai >= CURDATE()');
    }

    function deleteRecord($where)
    {
        return $this->db->query('UPDATE Promo SET status_delete = 1 WHERE id_promo = "'.$where.'"');
    }

    function cekKodeDiskon($id){
      return $this->db->query('SELECT * FROM promo WHERE id_user = "'.$id.'" AND status_used = 0 AND tanggal_selesai >= CURDATE()');
    }
}
?>