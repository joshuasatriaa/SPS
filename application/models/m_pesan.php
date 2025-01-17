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
    
    function insertTable($table,$data){
        $this->db->insert($table,$data);
    }

    function tampilkanData()
	{
		return $this->db->query('SELECT * FROM Pesan');
	}
    
    function cekPesan($idSaya)
    {
        /*
        return $this->db->query('SELECT pesan.id_pengirim,GROUP_CONCAT(pesan.pesan) as `chat`,
        COALESCE(pengguna.nama_pengguna,bengkel.nama_bengkel ) AS nama_pengirim
        FROM Pesan
        LEFT JOIN pengguna ON pesan.id_pengirim = pengguna.id_pengguna
        LEFT JOIN bengkel ON bengkel.id_bengkel = pesan.id_pengirim   
        WHERE 
        Pesan.id_pengirim = "'.$idSaya.'" OR Pesan.id_penerima = "'.$idSaya.'"
        GROUP BY pesan.id_pengirim
        ');*/

        return $this->db->query('SELECT pesan.id_penerima,GROUP_CONCAT(pesan.pesan) as `chat`,
        COALESCE(pengguna.nama_pengguna,bengkel.nama_bengkel ) AS nama_penerima
        FROM Pesan
        LEFT JOIN pengguna ON pesan.id_penerima = pengguna.id_pengguna
        LEFT JOIN bengkel ON bengkel.id_bengkel = pesan.id_penerima  
        WHERE 
        Pesan.id_pengirim = "'.$idSaya.'" OR Pesan.id_penerima = "'.$idSaya.'" AND id_penerima != "'.$idSaya.'"
        GROUP BY pesan.id_penerima');
    }

    function cekPesanAdmin($id){
        return $this->db->query('SELECT a.id_pengirim, a.id_penerima, a.pesan, b.nama_pengguna as nama_pengirim_pengguna, c.nama_bengkel as nama_pengirim_bengkel, d.nama_pengguna as nama_penerima_pengguna, e.nama_bengkel as nama_penerima_bengkel
        FROM pesan a 
        LEFT JOIN pengguna b ON (a.id_pengirim = b.id_pengguna)
        LEFT JOIN bengkel c ON (a.id_pengirim = c.id_bengkel)
        LEFT JOIN pengguna d ON (a.id_penerima = d.id_pengguna)
        LEFT JOIN bengkel e ON (a.id_penerima = e.id_bengkel) 
        WHERE a.id_pengirim IN ("'.$id.'", "ADMIN") AND a.id_penerima IN ("ADMIN", "'.$id.'") ORDER BY a.waktu_kirim 
        ');
    }

    function cekPesanAdminBaru($id, $jumlah){
        return $this->db->query('SELECT a.id_pengirim, a.id_penerima, a.pesan, b.nama_pengguna as nama_pengirim_pengguna, c.nama_bengkel as nama_pengirim_bengkel, d.nama_pengguna as nama_penerima_pengguna, e.nama_bengkel as nama_penerima_bengkel
        FROM pesan a 
        LEFT JOIN pengguna b ON (a.id_pengirim = b.id_pengguna)
        LEFT JOIN bengkel c ON (a.id_pengirim = c.id_bengkel)
        LEFT JOIN pengguna d ON (a.id_penerima = d.id_pengguna)
        LEFT JOIN bengkel e ON (a.id_penerima = e.id_bengkel) 
        WHERE a.id_pengirim IN ("'.$id.'", "ADMIN") AND a.id_penerima IN ("ADMIN", "'.$id.'") ORDER BY a.waktu_kirim LIMIT 10 OFFSET '.$jumlah.'
        ');
    }

}

?>