<?php
class m_bengkel extends CI_Model{

	function tampilkanData()
	{
		return $this->db->query('SELECT id_bengkel, nama_bengkel, email, telepon, tanggal_registrasi, gambar, jam_buka, jam_tutup FROM bengkel');
	}
	
	function tampilkanData1()
	{
		return $this->db->query('SELECT * FROM bengkel JOIN lokasi_bengkel WHERE bengkel.id_bengkel = lokasi_bengkel.id_bengkel AND bengkel.status_delete != 1');
	}

    function insertTable($table,$data){
		$this->db->insert($table,$data);

	}
    function editData($where, $table){
		return $this->db->get_where($table,$where);
	}
	
	function updateData($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	
	function hapusData($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function hapusData1($where){
		return $this->db->query('UPDATE bengkel
		SET bengkel.status_delete=1
		WHERE id_bengkel= "'.$where.'" ');
	}

	function findAddress($id){
		return $this->db->query('SELECT * FROM lokasi_bengkel WHERE id_bengkel = "'.$id.'"');
	}

	function findDefaultAddress($id){
		return $this->db->query('SELECT * FROM lokasi_bengkel WHERE id_bengkel = "'.$id.'" LIMIT 1');
	}

	function checkLocation()
	{
		return $this->db->query('SELECT * FROM lokasi_bengkel');
	}
}
?>