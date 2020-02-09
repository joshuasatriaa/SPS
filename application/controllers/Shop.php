<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_barang');
	}

	public function index()
	{
		$data['barang'] = $this->m_barang->tampilkanBarang()->result();
		$this->load->view('v_shop',$data);
	}

	function searchBarang(){
		$keyword = $this->input->post('nama_barang');

		$data['barang'] = $this->m_barang->searchBarang($keyword)->result();
		$data['hasils'] = $keyword;
		$data['jumlah'] = $this->m_barang->searchBarang($keyword)->num_rows();
		$this->load->view('v_shopsearch',$data);
	}

}
