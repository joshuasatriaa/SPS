<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_barang');
		$this->load->model('m_notif');
		$this->load->model('m_pesanan');
	}

	public function index()
	{
		$data['barang'] = $this->m_barang->tampilkanBarang()->result();
		$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
		$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();	
		$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
		$this->load->view('v_shop',$data);
	}

	function searchBarang(){
		$keyword = $this->input->post('nama_barang');

		$data['barang'] = $this->m_barang->searchBarang($keyword)->result();
		$data['hasils'] = $keyword;
		$data['jumlah'] = $this->m_barang->searchBarang($keyword)->num_rows();
		$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
		$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();	
		$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
		$this->load->view('v_shopsearch',$data);
	}

	function ShopDetail($id)
	{
		$data['barang'] = $this->m_barang->tampilkanBarangIni($id)->result();
		$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
		$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();	
		$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
		$this->load->view('v_shop_detail',$data);
	}

	function cart(){
		$data['cart'] = $this->m_pesanan->showCart($this->session->userdata('id_user'))->result();
		$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
		$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();	
		$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
		$this->load->view('v_cart',$data);
	}

	function addCart($id){

		$count = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows()+1;
		$id_pesanan = "CART-".$count;
		$detail_barang = $this->m_barang->tampilkanBarangIni($id)->row_array();

		$data = [
			'id_pesanan' => $id_pesanan, 
			'id_pembeli' => $this->session->userdata('id_user'), 
			'id_penjual' => $detail_barang['id_penjual'], 
			'id_barang' => $id, 
			'status_pesanan' => 0, 
			 
		];

		$this->db->set('waktu_pesanan', 'NOW()', FALSE);
		$this->m_pesanan->insertTable('pesanan', $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Added to Cart!</div>');
		redirect('Shop/ShopDetail/'.$id);


	}

	function loadImage($id){
		$data = $this->m_pesanan->getImage($id)->row_array();
		return $data;
	}

	function fetch_data()
	{
		$minimum_price = $this->input->post('minimum_price');
		$maximum_price = $this->input->post('maximum_price');
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->m_barang->count_all($minimum_price, $maximum_price);
		$config['per_page'] = 8;
		$config['uri_segment'] = 3;
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config);
		$page = $this->uri->segment(3);
		$start = ($page - 1) * $config['per_page'];
		$output = array('pagination_link' => $this->pagination->create_links(), 'product_list' => $this->m_barang->fetch_data($config["per_page"],$start,$minimum_price, $maximum_price));
		echo json_encode($output);
	}

}
