<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

	function __construct()
	{
		parent::__construct();		
		$this->load->model('m_login');
		$this->load->library('form_validation');
	}
		
	function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

		if($this->form_validation->run() == false){
			$errors = validation_errors();
            echo json_encode(['error'=>$errors]);
			
		}else{
			$email = htmlspecialchars($this->input->post('email'));
			$password =htmlspecialchars($this->input->post('password'));
			$where = array(
				'email' => $email,
				'password' => md5($password),
			);
			$cek = $this->m_login->cek_login('user', $where)->row_array();
			
			if($cek){

				//ambil nama
				$where1 = array(
					'email' => $email
					);
				$ceknama = $this->m_login->cek_login("pengguna", $where1)->row_array();

				//session
				$data_session = array(
					'nama' => $ceknama['nama_pengguna'],
					'id_user' => $cek['id_user'],
					'email' => $cek['email'],
					'password' => $cek['password']
				);
				$this->session->set_userdata($data_session);
				echo json_encode(['success'=>"berhasil login"]);
			}else{
				$where2 = array(
					'email' => $email,
				);
				$cek_email = $this->m_login->cek_login("user", $where2)->row_array();
				if($cek_email){
					echo json_encode(['error'=>"Wrong password!"]);
				}else{

					echo json_encode(['error'=>"Email not registered!"]);
				}
			}
		}	
	}
	
	function logout(){
		$this->session->sess_destroy();
		redirect('Home');
	}

	function changepassword()
	{
		$this->load->view('v_password');
	}

	function changepassword1()
	{
		$id = $this->session->userdata('id_user');
		$cekpassword = $this->m_login->cek_password($id)->row_array();

		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$cek1 = $this->encrypt->decode($cekpassword);
		
		if($cek1 == $password)
		{
			redirect('Home');
		}
		else
		{
			echo json_encode(['error'=>"Wrong password!"]);	
		}
	}

}
			
?>