<?php
	class Signup_pengguna extends CI_Controller{
		function __construct(){
		parent::__construct();		
		$this->load->model('m_signup_pengguna');
		}
		
		function index(){	
			$this->load->view('v_signup_pengguna');
			}
		
		function insertData(){
			$id = $this->input->post('id');
			$nama = $this->input->post('name');
			$kelamin = $this->input->post('gender');
			$tglLahir = $this->input->post('birthdate');
			$tmpLahir = $this->input->post('birthplace');
			$alamat = $this->input->post('address');
			$email = $this->input->post('email');
			$telp = $this->input->post('phonenumber');
			$tglRegis = $this->input->post('registrationdate');
			$gambar = $this->input->post('picture');
			$tipe = $this->input->post('usertype');
			
			$data = array(
				'id_pengguna' => $id,
				'nama_pengguna' => $nama,
				'jenis_kelamin' => $kelamin,
				'tanggal_lahir' => $tglLahir,
				'tempat_lahir' => $tmpLahir,
				'alamat' => $alamat,
				'email' => $email,
				'telepon' => $telp,
				'tanggal_registrasi' => $tglRegis,
				'gambar' => $gambar,
				'tipe_pengguna' => $tipe
				);
				
			$this->m_signup_pengguna->insertTable('pengguna', $data);
			
			
			
			
			
			
		}
		
}	
?>