<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_service');
		$this->load->model('m_signup_bengkel');
		$this->load->model('m_pesanan');
		$this->load->model('m_notif');
		$this->load->model('m_pesan');
	}
	public function index()
	{
		$data['bengkel'] = $this->m_signup_bengkel->tampilkanData()->result();
		$data['count'] = $this->m_service->tampilkan_service()->num_rows();

		$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
		$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();	
		$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
		$data['countChat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->num_rows();

		$data['chat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->result();

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
