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
			$id = $this->input->post('id_pengguna');
			$nama = $this->input->post('nama_pengguna');
			$kelamin = $this->input->post('jenis_kelamin');
			$tglLahir = $this->input->post('tanggal_lahir');
			$tmpLahir = $this->input->post('tempat_lahir');
			$alamat = $this->input->post('alamat');
			$email = $this->input->post('email');
			$telp = $this->input->post('telepon');
			$tglRegis = $this->input->post('tanggal_registrasi');
			$gambar = $this->input->post('gambar');
			$tipe = $this->input->post('tipe_pengguna');
			
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