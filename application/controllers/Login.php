<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

	function __construct()
	{
		parent::__construct();		
		$this->load->model('m_login');
		$this->load->model('m_pesanan');
		$this->load->model('m_notif');
		$this->load->model('m_pesan');
		$this->load->library('form_validation');
		$this->load->model('m_member');
	}
		
	function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

		if($this->form_validation->run() == false){
			$errors = validation_errors();
            echo json_encode(['error'=>$errors]);
			
		}else{
			$email = htmlspecialchars($this->input->post('email'));
			$password = md5(htmlspecialchars($this->input->post('password')));
			
			$cek = $this->m_login->cek_login($email, $password)->row_array();
			
			if($cek){
				
				 //ambil nama
				 $where1 = array(
					'email' => $email
					);
				$id=$cek['id_user'];
				$text = substr($id,0,4);
				
				if($text == "USER"){
					$data_session = array(
						'nama' 	=> $cek['nama_pengguna'],
						'id_user' => $cek['id_user'],
						'email' => $email,
						'tipe_user' => 'USER'
					);
					$this->session->set_userdata($data_session);
					
					$member = $this->m_member->checkMembership($this->session->userdata('id_user'))->row_array();
					if($member){
						$datenow = date("d-m-y");
						$tglselesai = date("d-m-y",$member['tanggal_selesai']);
						if($datenow == $tglselesai){
							$this->load->model('m_notif');
							$countNotif = $this->m_notif->tampilkan_notifku($pengguna['id_pengguna'])->num_rows()+1;
							$data = [
								'id_notifikasi' => 'NTF-'.$this->session->userdata('id_user').'-'.$countNotif,
								'id_user' => $this->session->userdata('id_user'),
								'id_tipe_notifikasi' => 3,
								'isi_notifikasi' => "Hi, ".$this->session->userdata('id_user').", <br> Your membership is over today! <br> Please renew your membership as soon as possible!",
								'status_notifikasi' => 0,
							];

							$this->db->set('waktu_notifikasi', 'NOW()', FALSE);
							$this->m_notif->insertTable('notifikasi', $data);
						}else if($datenow > $tglselesai){
							$this->load->model('m_member');
							$data = [
								'status_membership' => 0,
							];
					
							$where = [
								'id_user' => $this->session->userdata('id_user'),
							];
					
							$this->m_member->update('membership', $data, $where);
						}
						else{

						}
					}
					
					echo json_encode(['success'=>"berhasil login"]);
				}
				else if($text == "ADMN"){
					//session
					$data_session = array(
						'nama' => $cek['nama_admin'],
						'id_user' => $cek['id_user'],
						'email' => $email,
						'tipe_user' => 'ADMN'
					);
					$this->session->set_userdata($data_session);
					echo json_encode(['success'=>"berhasil login"]);
				}
				else{
					//session
					$data_session = array(
						'nama' => $cek['nama_bengkel'],
						'id_user' => $cek['id_user'],
						'email' => $email,
						'tipe_user' => 'BID'
					);
					$this->session->set_userdata($data_session);

					$member = $this->m_member->checkMembership($this->session->userdata('id_user'))->row_array();
					
					if($member){
						$datenow = date("d-m-y");
						$tglselesai = date("d-m-y",$member['tanggal_selesai']);
						if($datenow == $tglselesai){
							$this->load->model('m_notif');
							$countNotif = $this->m_notif->tampilkan_notifku($pengguna['id_pengguna'])->num_rows()+1;
							$data = [
								'id_notifikasi' => 'NTF-'.$this->session->userdata('id_user').'-'.$countNotif,
								'id_user' => $this->session->userdata('id_user'),
								'id_tipe_notifikasi' => 3,
								'isi_notifikasi' => "Hi, ".$this->session->userdata('id_user').", <br> Your membership is over today! <br> Please renew your membership as soon as possible!",
								'status_notifikasi' => 0,
							];

							$this->db->set('waktu_notifikasi', 'NOW()', FALSE);
							$this->m_notif->insertTable('notifikasi', $data);
						}else if($datenow > $tglselesai){
							$this->load->model('m_member');
							$data = [
								'status_membership' => 0,
							];
					
							$where = [
								'id_user' => $this->session->userdata('id_user'),
							];
					
							$this->m_member->update('membership', $data, $where);
						}
						else{

						}
					}
				
					echo json_encode(['success'=>"berhasil login"]);
				}
				
			}else{
				
					$cek_email = $this->m_login->cek_email($email)->row_array();
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
		$data['label'] = "";
		$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
		$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();	
		$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
		$data['countChat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->num_rows();

		$data['chat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->result();
		$this->load->view('v_password', $data);
	}

	function changepassword1()
	{
		$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();

		$this->form_validation->set_rules('password1', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('password2', 'New Password', 'required|trim|matches[password3]|min_length[6]');
        $this->form_validation->set_rules('password3', 'Confirm New Password', 'required|trim|matches[password2]|min_length[6]');
		
		$where = array(
			'id_user' => $this->session->userdata('id_user'),
		);
		$cekpassword = $this->m_login->cek_password($where['id_user'])->row_array();

		$password = md5($this->input->post('password1'));
		

		if($this->form_validation->run() == false){
			$data['label'] = "";
			$this->load->view('v_password', $data);
		}
		else{
			if($password == $cekpassword['password'])
			{
				
				$datapost = array(
					'password' => md5($this->input->post('password2')),
				);
				
				$this->load->model('m_user');
				$this->m_user->updateRecord($where, $datapost, 'user');
				redirect('Login/changePasswordSuccess');
			}
			else
			{
				
				$data['label'] = "Your Current Password is wrong";
				$this->load->view('v_password', $data);
			}
		}
		
	}

	function changePasswordSuccess(){
		$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
		$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();	
		$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
		$this->load->view('v_changepasswordsuccess', $data);
	}

}
			
?>