<?php
	class Signup_pengguna extends CI_Controller{
		function __construct(){
		parent::__construct();		
		$this->load->model('m_signup_pengguna');
		$this->load->model('m_user');
		}
		
		function index(){	
			$data['count']=$this->m_signup_pengguna->tampilkanData()->num_rows();
			$this->load->view('v_signup_pengguna',$data);
			}
		 
		function insertData(){
			$id = $this->input->post('user_id');
			$nama = $this->input->post('user_name');
			$kelamin = $this->input->post('user_gender');
			$tglLahir = $this->input->post('user_birthdate');
			$tmpLahir = $this->input->post('user_birthplace');
			$alamat = $this->input->post('user_address');
			$email = $this->input->post('user_email');
			$pass = $this->input->post('user_password');
			$telp = $this->input->post('user_phonenumber');
			$tglRegis = $this->input->post('user_registrationdate');
			$gambar = $this->input->post('user_picture');
			$tipe = $this->input->post('user_type');
			
			$data = array(
				'id_pengguna' => $id,
				'nama_pengguna' => $nama,
				'jenis_kelamin' => $kelamin,
				'tanggal_lahir' => $tglLahir,
				'tempat_lahir' => $tmpLahir,
				'alamat' => $alamat,
				'email' => $email,
				'telepon' => $telp,
				'gambar' => $gambar,
				'tipe_pengguna' => $tipe,
				'user_add' => $id,
				'status_delete' => "0"
				);
				
			$this->db->set('tanggal_registrasi', 'NOW()', FALSE);
			$this->db->set('waktu_add', 'NOW()', FALSE);
			$this->m_signup_pengguna->insertTable('pengguna', $data);

			$data2 = array(
				'id_user' => $id,
				'email' => $email,
				'password' => md5($pass), 
			);
	
			$this->m_user->insertTable('user', $data2);
			redirect('../SPS');
			
			
			
			
			
			
		}
		
}	
?>