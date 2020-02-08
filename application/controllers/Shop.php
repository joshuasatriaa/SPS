<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_barang');
	}

	public function index()
	{
		$data['barang'] = $this->m_barang->tampilkan_barang()->result();
		$this->load->view('v_shop',$data);
	}

}
