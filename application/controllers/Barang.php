<?php
class Barang extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_barang');
	}
	function index(){
		$data['barang'] = $this->m_barang->tampilkan_barang()->result();
		$this->load->view('v_barang', $data);
	}
	function insertData(){
		$id_barang = $this->input->post('id_barang');
		$nama = $this->input->post('nama_barang');
		$id_penjual = $this->input->post('id_penjual');
		$gambar = $this->input->post('gambar_barang');
		$harga = $this->input->post('harga_barang');
		$stok = $this->input->post('stok_barang');
		$user_add = $this->input->post('user_add');
		$waktu_add = $this->input->post('waktu_add');
		
		$data = array(
			'id_barang' => $id_barang,
			'nama_barang' => $nama,
			'id_penjual' => $id_penjual,
			'gambar_barang' => $gambar,
			'harga_barang' => $harga,
			'stok_barang' => $stok,
			'user_add' => $user_add,
			'waktu_add' => $waktu_add
		);
		
		$this->m_barang->insertTable('barang', $data);
		redirect('barang');
	}
		
}
?>