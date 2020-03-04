<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_barang');
		$this->load->model('m_notif');
		$this->load->model('m_pesanan');
		$this->load->model('m_pesan');
		$this->load->model('m_pengguna');
		$this->load->model('m_member');
	}

	public function index()
	{
		$data['barang'] = $this->m_barang->tampilkanBarang()->result();
		$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
		$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();	
		$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
		$data['member'] = $this->m_member-->checkMembership($this->session->userdata('id_user'))->result();
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

		$data['jumlahfoto'] = $this->m_barang->tampilkanFotoBarangIni($id)->num_rows();
		$data['foto'] = $this->m_barang->tampilkanFotoBarangIni($id)->result();
		$this->load->view('v_shop_detail',$data);
	}

	function cart(){
		$data['cart'] = $this->m_pesanan->showCart($this->session->userdata('id_user'))->result();
		$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
		$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();	
		$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
		$this->load->view('v_cart',$data);
	}

	function addCart(){

		$id = $this->input->post('id_barang');
		$jumlah = $this->input->post('jumlah_barang');
		
		$count = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows()+1;
		$id_pesanan = "CART-".$count;
		$detail_barang = $this->m_barang->tampilkanBarangIni($id)->row_array();

		$data = [
			'id_pesanan' => $id_pesanan, 
			'id_pembeli' => $this->session->userdata('id_user'), 
			'id_barang' => $id,
			'jumlah_barang' => $jumlah, 
			'status_pesanan' => 0, 
			 
		];

		$this->db->set('waktu_pesanan', 'NOW()', FALSE);
		$this->m_pesanan->insertTable('pesanan', $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Added to Cart!</div>');
		redirect('Shop/ShopDetail/'.$id);


	}

	function removeFromCart($id){

		$this->m_pesanan->remove($id, $this->session->userdata('id_user'));
		redirect('Shop/cart');

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

	function ContactBarang($idSaya,$idDia)
	{
		
		$data['chat'] = $this->m_pesan->tampilkanPesan($idSaya,$idDia)->result();
		$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();

		$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();
		$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();

		$this->load->view('v_chat_barang',$data);
	}

	function membership(){
		$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
		$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();	
		$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
		$this->load->view('v_member',$data);
	}

	function payMembership(){
		$this->load->view('v_paymembership');
	}

	function editMembership(){
		$where = array(
			'id_user' => $this->session->userdata('id_user')
		);

		$cek = $this->m_member->cek('membership', $where)->num_rows();
		$count = $this->m_member->tampilkan_semua_member()->num_rows();
		if($cek < 1){
			$data = array(
				'id_membership' => 'MBR-'.$count+1,
				'id_user' => $this->session->userdata('id_user'),
				'jenis_membership' => 1,
				'status_membership' => 1,
				'tanggal_mulai' => date("Y-m-d H:i:s"),
				'tanggal_selesai' => date('Y-m-d H:i:s', strtotime('+1 month')) 
			);
			$this->m_member->insert('membership', $data);
			$data['barang'] = $this->m_barang->tampilkanBarang()->result();
			$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
			$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();	
			$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
			$data['member'] = 1;

			$this->session->set_flashdata(
				'message' => ""
			)
			$this->load->view('v_shop', $data);
		}else{
			$data = array(
				'status_membership' => 1,
				'tanggal_mulai' => date("Y-m-d H:i:s"),
				'tanggal_selesai' => date('Y-m-d H:i:s', strtotime('+1 month')) 
			);

			$this->m_member->update('membership', $data, $where);
			$data['barang'] = $this->m_barang->tampilkanBarang()->result();
			$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
			$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();	
			$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
			$data['member'] = 1;

			$this->session->set_flashdata(
				'message' => ""
			)
			$this->load->view('v_shop', $data);

		}
	}

}
