<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

	function __construct()
	{
		parent::__construct();		
		$this->load->model('m_login');
	}
		
	function index()
	{
		$this->load->view('v_login');
	}
	
	
	function login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$where = array(
			'email' => $email,
			'password' => $password
			);
		$cek = $this->m_login->cek_login("user", $where)->num_rows();
		
		if($cek > 0){
			$data_session = array(
				'email' => $email,
				'password' => $password,
				'login' => TRUE
				);
			$this->session->set_userdata($data_session);
			
			//redirect('');
		}else{
			echo "email dan password salah !";
		}	
	}
	
	
	
	
	
	function logout(){
		$this->session->sess_destroy();
		redirect('Login');
	}
}
			
?>