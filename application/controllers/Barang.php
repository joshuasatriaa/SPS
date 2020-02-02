<?php
class Barang extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_barang');
	}
	function index(){
		$data['count'] = $this->m_barang->tampilkan_barang()->num_rows();
		$this->load->view('v_shop_add_item', $data);
	}
	function insertData(){
		$id_barang = $this->input->post('id_barang');
		$nama = $this->input->post('nama_barang');
		$id_penjual = $this->input->post('id_penjual');
		//$gambar = $this->input->post('gambar_barang');
		$gambar = 'default.jpg';
		$harga = $this->input->post('harga_barang');
		$stok = $this->input->post('stok_barang');
		$user_add = $this->input->post('id_penjual');
		//$waktu_add = $this->input->post('waktu_add');
		
		$data = array(
			'id_barang' => $id_barang,
			'nama_barang' => $nama,
			'id_penjual' => $id_penjual,
			'gambar_barang' => $gambar,
			'harga_barang' => $harga,
			'stok_barang' => $stok,
			'user_add' => $user_add,
			'status_delete' => "0"
		);
		
		$this->db->set('waktu_add', 'NOW()', FALSE);
		$this->m_barang->insertTable('barang', $data);
		redirect('Shop');
	}
		
}
?>