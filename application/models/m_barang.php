<?php
class m_barang extends CI_Model{
	function tampilkanBarang(){
		return $this->db->query('SELECT a.id_barang, a.nama_barang, a.id_penjual, a.gambar_barang,
		a.harga_barang, a.waktu_add, a.stok_barang, b.nama_pengguna, c.nama_bengkel FROM barang a
		LEFT JOIN pengguna b ON a.id_penjual = b.id_pengguna
		LEFT JOIN bengkel c ON a.id_penjual = c.id_bengkel');
	}
	
	
	function insertTable($table,$where){
		$this->db->insert($table,$where);

	}
	
	function searchBarang($keyword){
		return $this->db->query('SELECT * FROM barang a
		LEFT JOIN pengguna b ON a.id_penjual = b.id_pengguna
		LEFT JOIN bengkel c ON a.id_penjual = c.id_bengkel
		WHERE nama_barang LIKE "%'.$keyword.'%"');
	}
	
	function tampilkanBarangIni($where){
		return $this->db->query('SELECT * FROM barang a
		LEFT JOIN pengguna b ON a.id_penjual = b.id_pengguna
		LEFT JOIN bengkel c ON a.id_penjual = c.id_bengkel
		WHERE id_barang = "'.$where.'" ');
	}
	
	function maxe_query($minimum_price, $maximum_price)
	{
		$query = " SELECT * FROM barang";
		if(isset($minimum_price,$maximum_price) && !empty($minimum_price) && !empty($maximum_price))
		{
			$query .= " AND harga_barang BETWEEN '".$minimum_price."' AND '".$maximum_price."'";
		}
	}

	function count_all($minimum_price, $maximum_price)
	{
		$query = $this->make_query($minimum_price, $maximum_price);
		$data - $this->db->query($query);
		return $data->num_rows();
	}

	function fetch_data($limit, $start, $minimum_price, $maximum_price)
	{
		$query = $this->make_query($minimum_price, $maximum_price);
		$query .= 'LIMIT '.$start.' , ' . $limit;
		$data = $this->db->query($query);
		$output = '';
		if($data->num_rows()>0)
		{
			foreach($data->result_array() as $row)
			{
				$output .= '<div class="card-body">
				<h4 class="card-title"><a href="<?php echo base_url() ?>Shop/ShopDetail/ '. $list->id_barang .'">'. $list->nama_barang .'</a></h4>
				<ul class="list-inline product-meta">
					<li class="list-inline-item">
						<a href="single.html"><i class="fa fa-male"></i>'. (substr($list->id_penjual, 0, 4) == "USER") ? $list->nama_pengguna : $list->nama_bengkel.'</a>
					</li>
					<li class="list-inline-item">
						<a href="#"><i class="fa fa-calendar"></i>'. $list->waktu_add.'</a>
					</li>
					<li class="list-inline-item">
						<a href="#"><i class="fa fa-shopping-basket"></i>'. $list->stok_barang .'left !</a>
					</li>
				</ul>
				<p class="card-text">Rp '. $list->harga_barang .'</p>
			</div>';
			}
		}
		else
		{
			$output = '<h3> No Item Found</h3>';
		}
		return $output;
	}
	function tampilkanData()
	{
		$query=$this->db->get('dosen');
		return $query;
		
	}
	function insertTable($a,$b)
	{
		$this->db->insert($a,$b);
	}
	function editRecord($where,$table)
	{
		return $this->db->get_where($table,$where);
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

	
}
?>
}
?>