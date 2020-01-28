<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('m_user');
	}

	function index()
	{
		$this->load->view('v_signup');
	}

	function insertData(){
		$count = $this->m_signup_pengguna->tampilkanData()->num_rows();

		$id = 'USER-'.$count;
		$nama = $this->input->post('user_name');
		$kelamin = $this->input->post('user_gender');
		$tglLahir = $this->input->post('user_birthdate');
		$tmpLahir = $this->input->post('user_birthplace');
		$alamat = $this->input->post('user_address');
		$email = $this->input->post('user_email');
		$pass = $this->input->post('user_password');
		$telp = $this->input->post('user_phonenumber');
		$tglRegis = date();
		$gambar = 'default.jpg';
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
			'tanggal_registrasi' => $tglRegis,
			'gambar' => $gambar,
			'tipe_pengguna' => $tipe
		);
			
		$this->m_user->insertTable('pengguna', $data);

		$data2 = array(
			'id_user' => $id,
			'email' => $email,
			'password' => md5($pass), 
		);

		$this->m_user->insertTable('user', $data2);

	}

}
