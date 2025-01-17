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
		$this->load->model('m_rating_barang');
		$this->load->model('m_signup_pengguna');
		$this->load->model('m_signup_bengkel');
		$this->load->model('m_bengkel');
		$this->load->model('m_promo');
	}

	public function index()
	{
		if (!isset($_GET['page'])) 
		{
			$page = 1;
		} 
		else 
		{
			$page = $_GET['page'];
		}

		//pagination

		//define berapa barang per page
		//harus sama 
		$data['results_per_page'] = 9;
		$results_per_page = 9;

		$this_page_first_result = ($page-1)*$results_per_page;

		$data['barang'] = $this->m_barang->tampilkanBarang($this_page_first_result,$results_per_page)->result();
		$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
		$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();	
		$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
		$data['countChat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->num_rows();

		$data['chat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->result();
		$data['member'] = $this->m_member->checkMembership($this->session->userdata('id_user'))->row_array();

		$data['totalbarang'] = $this->m_barang->tampilkanSemuaBarang()->num_rows();
		$data['jumlahDiscountCodes'] = $this->m_promo->cekKodeDiskon($this->session->userdata('id_user'))->num_rows();
		$data['message'] = "";
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
		$data['countChat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->num_rows();
		$data['member'] = $this->m_member->checkMembership($this->session->userdata('id_user'))->row_array();
		$data['chat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->result();
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
		$data['countChat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->num_rows();

		$data['review'] = $this->m_rating_barang->tampilkanDataIni($id)->result();

		$data['member'] = $this->m_member->checkMembership($this->session->userdata('id_user'))->row_array();

		$data['chat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->result();
		$this->load->view('v_shop_detail',$data);
	}

	function cart(){

		$data['cart'] = $this->m_pesanan->showCart($this->session->userdata('id_user'))->result();
		$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
		$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();	
		$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
		$data['countChat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->num_rows();
		$data['member'] = $this->m_member->checkMembership($this->session->userdata('id_user'))->row_array();
		$data['chat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->result();
		$data['discountCodes'] = $this->m_promo->cekKodeDiskon($this->session->userdata('id_user'))->result();
		$this->load->view('v_cart',$data);
	}

	function addCart(){
		
		$id = $this->input->post('id_barang');
		$jumlah = $this->input->post('jumlah_barang');
		
		$cek = $this->m_pesanan->searchBarangCart($this->session->userdata('id_user'), $id)->row_array();

		if($cek){
			$jumlah_baru = $cek['jumlah_barang'] + intval($jumlah);
			$where = [
				'id_pembeli'=>$this->session->userdata('id_user'),
				'id_barang'=>$id,
				'status_pesanan'=>0,
			];
			$data = [
				'jumlah_barang'=>$jumlah_baru,
			];
			
			$this->m_pesanan->updateData($where,$data,'pesanan');
			$this->session->set_flashdata('message', 'Added one more to Cart!');
			redirect('Shop/ShopDetail/'.$id);
		}
		else{

			$count = $this->m_pesanan->tampilkanPesanan()->num_rows()+1;
			$id_pesanan = "CART-".$count;
	
			$data = [
				'id_pesanan' => $id_pesanan, 
				'id_pembeli' => $this->session->userdata('id_user'), 
				'id_barang' => $id,
				'jumlah_barang' => $jumlah, 
				'status_pesanan' => 0, 
				 
			];
	
			$this->db->set('waktu_pesanan', 'NOW()', FALSE);
			$this->m_pesanan->insertTable('pesanan', $data);
	
			$this->session->set_flashdata('message', 'Added to Cart!');
			redirect('Shop/ShopDetail/'.$id);
		}
	}
	
	function updateCart(){

		$id = $this->input->post('id_barang');
		$jumlah = $this->input->post('jumlah_barang');
		
		$this->m_pesanan->gantiJumlah($this->session->userdata('id_user'),$id,$jumlah);

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
		
		$data['chat1'] = $this->m_pesan->tampilkanPesan($idSaya,$idDia)->result();
		$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();

		$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();
		$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();

		$data['countChat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->num_rows();

		$data['chat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->result();
		$data['member'] = $this->m_member->checkMembership($this->session->userdata('id_user'))->row_array();
		$this->load->view('v_chat_barang',$data);
	}

	function membership(){
		$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
		$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();	
		$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
		$data['countChat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->num_rows();

		$data['chat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->result();
		$data['checkmember'] = $this->m_member->searchNewestMembership($this->session->userdata('id_user'))->row_array();
		$data['member'] = $this->m_member->checkMembership($this->session->userdata('id_user'))->row_array();
		$this->load->view('v_member',$data);
	}

	function payMembership(){
		
		$data['checkmember'] = $this->m_member->searchNewestMembership($this->session->userdata('id_user'))->row_array();
		$data['myMember'] = $this->m_member->checkMyMembership($this->session->userdata('id_user'))->result();

		$data['cart'] = $this->m_pesanan->showCart($this->session->userdata('id_user'))->result();
		$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
		$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();	
		$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
		$data['countChat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->num_rows();
		

		$data['chat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->result();
		
		$text = substr($this->session->userdata('id_user'),0,4);
		if($text == "USER"){
			$data['profil'] = $this->m_signup_pengguna->tampilkanRecordProfile($this->session->userdata('id_user'))->row_array();
			$data['alamat'] = $data['profil']['alamat'];
		}else{
			$data['alamat'] = $this->m_bengkel->findDefaultAddress($this->session->userdata('id_user'))->row_array();
			$data['profil'] = $this->m_signup_bengkel->tampilkanRecordProfile($this->session->userdata('id_user'))->row_array();
		}
		$data['member'] = $this->m_member->checkMembership($this->session->userdata('id_user'))->row_array();
		$this->load->view('v_paymembership', $data);
	}


	function filterSearch(){

		$min = $this->input->get('minimum_price');
		$max = $this->input->get('maximum_price');
		
		$data['hasil'] = $this->m_barang->searchBarangAjax($min, $max)->result();
		
		$return_arr = [];
		foreach($data['hasil'] as $a){
			$image = base64_encode($a->gambar_barang);

			$return_arr[] = [
				'id_barang' => $a->id_barang,
				'nama_barang' => $a->nama_barang,
				'id_penjual' => $a->id_penjual, 
				'harga_barang'=> $a->harga_barang,
				'waktu_add' => $a->waktu_add, 
				'stok_barang' => $a->stok_barang, 
				'gambar_barang' => $image, 
				'nama_pengguna' => $a->nama_pengguna,
				'nama_bengkel' => $a->nama_bengkel,
				'alamat' => $a->alamat,
				'alamat_pengguna' =>$a->alamat_pengguna,
			];
		}
		$encode_data = json_encode($return_arr);
		echo $encode_data;
	}


	function process_checkout(){

		$data['cart'] = $this->m_pesanan->showCart($this->session->userdata('id_user'))->result();
		$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
		$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();	
		$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
		$data['countChat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->num_rows();
		$data['member'] = $this->m_member->checkMembership($this->session->userdata('id_user'))->row_array();
		$data['chat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->result();
		$data['discountCodes'] = $this->m_promo->cekKodeDiskon($this->session->userdata('id_user'))->result();
		$data['profil'] = $this->m_signup_pengguna->tampilkanRecordProfile($this->session->userdata('id_user'))->result();

		$data['total'] = htmlspecialchars($this->input->post('total_cart'));
		$data['promo'] = htmlspecialchars($this->input->post('promo_value'));
		$id_promo = htmlspecialchars($this->input->post('promo_id'));

		$data['rowPromo'] = $this->m_promo->getPromo($id_promo)->row_array();
		$this->load->view('v_checkout',$data);
	}

	function paidCart(){
		$id_cart = $this->input->post("id_pesanan");
		$id_promo = $this->input->post("id_promo");

		$this->m_pesanan->gantiStatusPesanan($this->session->userdata('id_user'), $id_cart);
		if($this->m_promo->getPromo($id_promo)->row_array()){
			$this->m_promo->updateStatusDiskon($id_promo, 1);
		}
		$this->session->set_flashdata(
			'message' , "You've just checkout! Feel free to look for more item!"
		);
		redirect('Shop/cart');
	}


	function payMember(){
		
		$id_member = $this->input->post("id_member");
		$where = array(
			'id_membership' => $id_member
		);

		$cek = $this->m_member->tampilkan_member('membership', $where)->num_rows();
		if($cek == 0){
			$data = array(
				'id_membership' => $id_member,
				'id_user' => $this->session->userdata('id_user'),
				'jenis_membership' => 1,
				'status_membership' => 1,
				'tanggal_mulai' => date("Y-m-d H:i:s"),
				'tanggal_selesai' => date('Y-m-d H:i:s', strtotime('+1 month')) 
			);
			$this->m_member->insert('membership', $data);
			

			$this->session->set_flashdata(
				'message' , "Congratulations, now you are a member! Please try our membership function!"
			);

		}else{
			$data = array(
				'status_membership' => 1,
				'tanggal_mulai' => date("Y-m-d H:i:s"),
				'tanggal_selesai' => date('Y-m-d H:i:s', strtotime('+1 month')) 
			);

			$this->m_member->update('membership', $data, $where);

			$this->session->set_flashdata(
				'message' , "Your membership have been renewed!"
			);
			

		}
		if($this->session->userdata('tipe_user') == "USER"){
			$count = $this->m_promo->tampilkan_semua_data()->num_rows();
			
			for($i = 1; $i <= 3; $i++){
				
				$data = [
					'id_promo' 	=> "PRO-".($count+$i),
					'id_user' 	=> $this->session->userdata('id_user'),
					'kode_promo'=> substr(md5(microtime()),rand(0,26),6),
					'jenis_promo' => $i,
					'tanggal_mulai' => date('Y-m-d'),
					'tanggal_selesai' => date('Y-m-d', strtotime('+1 month')),
					'status_used' => 0,
				];

				$this->m_promo->insertTable('promo', $data);
			}
			
		}

		$data['barang'] = $this->m_barang->tampilkanBarang()->result();
		$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
		$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();	
		$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
		$data['chat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->result();
		$data['countChat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->num_rows();
		$data['member'] = $this->m_member->checkMembership($this->session->userdata('id_user'))->row_array();
		
		$this->load->view('v_shop', $data);
	}

	function stopMember($id){
		$data = [
			'status_membership' => 0,
		];

		$where = [
			'id_user' => $id,
		];

		$this->m_member->update('membership', $data, $where);
	}

	function applyCode(){
		$id_promo = $this->input->post('id_promo');

		$cek = $this->m_promo->getPromo($id_promo)->row_array();
		if($cek){
			echo json_encode(['success' => "berhasil",'promo'=>$cek['jenis_promo'], 'id'=>$cek['id_promo']]);
		}
		else{
			echo json_encode(['error' => "gagal"]);
		}
	}
}
