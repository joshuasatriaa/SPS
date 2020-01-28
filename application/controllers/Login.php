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
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$where = array(
			'email' => $email,
			'password' => $password
			);
		$cek = $this->m_login->cek_login("user", $where)->row_array();
		
		if($email == "" && $password == "")
		{
			echo "Please input email and password";
		}
		else if($email == "")
		{
			echo "Please input email";
		}
		else if($password == "")
		{
			echo "Please input password";
		}
		else if($cek){
			$data_session = array(
				'email' => $cek['email'],
				'password' => $cek['password']
			);
			$this->session->set_userdata($data_session);
			
			redirect('Home');
		}else{
			echo "Wrong email and password !";
		}	
	}
	
	function logout(){
		$this->session->sess_destroy();
		redirect('Login');
	}
}
			
?>