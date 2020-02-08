<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_service');
		$this->load->model('m_signup_bengkel');
	}
	public function index()
	{
		$data['bengkel'] = $this->m_signup_bengkel->tampilkanData()->result();
		$data['count'] = $this->m_service->tampilkan_service()->num_rows();
		$this->load->view('v_input_service', $data);
	}

	function insertData(){
		$id_service = $this->input->post('id_service');
		$nama = $this->input->post('nama_service');
		$id_bengkel = $this->input->post('bengkel');
		$harga = $this->input->post('harga_service');
		
		$data = array(
			'id_service' => $id_service,
			'nama_service' => $nama,
			'id_bengkel' => $id_bengkel,
			'harga_service' => $harga,
		);
		
		$this->m_service->insertTable('service', $data);
		redirect('Service');
	}
	
}
