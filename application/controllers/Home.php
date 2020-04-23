<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_signup_bengkel');
		$this->load->model('m_pesanan');
		$this->load->model('m_notif');
		$this->load->model('m_pesan');
		$this->load->model('m_member');
	}
	
	public function index()
	{
		
		
		if($this->session->userdata('id_user')){
			$where = array(
				'id_bengkel' => $this->session->userdata('id_user'),
			);
	
			$data['image'] = $this->m_signup_bengkel->getRecord('bengkel', $where);
			
			$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();

			$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();
			
			$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();

			$data['countChat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->num_rows();

			$data['chat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->result();
			
			$data['chatAdmin'] = $this->m_pesan->cekPesanAdmin($this->session->userdata('id_user'))->result();
			
			$data['member'] = $this->m_member->checkMembership($this->session->userdata('id_user'))->row_array();
			$this->load->view('v_home', $data);
		}
		else{
			$data['countCart'] = 0;
			$this->load->view('v_home', $data);
		}
		
	}

	public function comingSoon()
	{
		$this->load->view('v_comingsoon1');
	}
	
}
