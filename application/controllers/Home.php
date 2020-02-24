<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_signup_bengkel');
		$this->load->model('m_pesanan');
		$this->load->model('m_notif');
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

			$this->load->view('v_home', $data);
		}
		else{
			$data['countCart'] = 0;
			$this->load->view('v_home', $data);
		}
		
		

	}

	public function get_image(){
		$id = $this->session->userdata('id_user');
		$text = substr($id,0,4);

		if($text == "USER"){
			$this->db->where('id_pengguna', $id);
			$result = $this->db->get('pengguna');
			header("Content-type: image/jpeg");
			echo $result['image'];
		}
		else if($text == "ADMN"){
			$this->db->where('id_admin', $id);
			$result = $this->db->get('admin');
			header("Content-type: image/jpeg");
			echo $result['image'];
		}else{
			$this->db->where('id_bengkel', $id);
			$result = $this->db->get('bengkel');
			header("Content-type: image/jpeg");
			echo $result['image'];
		}	
	}
	 
	function getImage(){
		$this->load->model('m_signup_bengkel');
		$where = array(
			'id_bengkel' => $this->session->userdata('id_user'),
		);

		$data['image'] = $this->m_signup_bengkel->getRecord('bengkel', $where)->result_array();
		$finfo    = new finfo(FILEINFO_MIME);
		$data['imageType'] = $finfo->buffer($data['image']['gambar']);
		
		$this->load->view('v_home', $data);
	}
	
}
