<?php
	class Signup_bengkel extends CI_Controller{
		function __construct(){
		parent::__construct();		
		$this->load->model('m_signup_bengkel');
        $this->load->model('m_user');
        $this->load->library('form_validation');
		}
		
		function index(){	
			
			$this->load->view('v_signup_bengkel');
		}
		 
		function insertData(){
			
            $this->form_validation->set_rules('user_name', 'Workshop/Garage Name', 'required|trim');
            $this->form_validation->set_rules('user_email', 'Workshop/Garage Email', 'required|trim|valid_email|is_unique[user.email]');
            $this->form_validation->set_rules('user_address', 'Address', 'required|trim');
            $this->form_validation->set_rules('user_phonenumber', 'Telephone Number', 'required|trim|numeric');
			$this->form_validation->set_rules('user_password', 'Password', 'required|trim|min_length[6]|matches[user_password2]');
			$this->form_validation->set_rules('user_password2', 'Confirm Password', 'required|trim|min_length[6]|matches[user_password]');
            $this->form_validation->set_rules('user_opentime', 'Open Time', 'required|trim');
            $this->form_validation->set_rules('user_closetime', 'Close Time', 'required|trim');
			if (empty($_FILES['userfile']['name']))
			{
				$this->form_validation->set_rules('userfile', 'Profile Picture', 'required');
			}

			if($this->form_validation->run() == FALSE){
				$this->load->view('v_signup_bengkel');
			}
			else{
				$count=$this->m_user->tampilkanData()->num_rows()+1;

				$id = 'BID-'.$count;
				$nama = htmlspecialchars($this->input->post('user_name'), TRUE);
				$jamBuka = htmlspecialchars($this->input->post('user_opentime'), TRUE);
				$jamTutup = htmlspecialchars($this->input->post('user_closetime'), TRUE);
				$alamat = htmlspecialchars($this->input->post('user_address'), TRUE);
				$email = htmlspecialchars($this->input->post('user_email'), TRUE);
				$pass = htmlspecialchars($this->input->post('user_password'), TRUE);
				$telp = htmlspecialchars($this->input->post('user_phonenumber'), TRUE);
				$gambar = 'default.jpg';
				
				$data = array(
					'id_bengkel' => $id,
					'nama_bengkel' => $nama,
					'jam_buka' => $jamBuka,
					'jam_tutup' => $jamTutup,
					'alamat' => $alamat,
					'email' => $email,
					'telepon' => $telp,
					'gambar' => $gambar,
					'user_add' => $id,
					'status_delete' => "0"
					);
					
				$this->db->set('tanggal_registrasi', 'NOW()', FALSE);
				$this->db->set('waktu_add', 'NOW()', FALSE);
				$this->m_signup_bengkel->insertTable('bengkel', $data);
	
				$data2 = array(
					'id_user' => $id,
					'email' => $email,
					'password' => md5($pass), 
				);
		
				$this->m_user->insertTable('user', $data2);
				redirect('Upload');
				
				/*public function Editprofile()
				{
					$data['nav'] = "User";
					$this->load->model('M_user');
					$data['user'] = $this->m_user->tampilkanData()->result();
					$data['pengguna'] = $this->m_signup_pengguna->tampilkanData()->result();
					$this->head();
					$this->load->view("LandingPage/Template/profile-css");
					$this->load->view('LandingPage/Template/nav', $data);
					$this->load->view("LandingPage/Home/V_Editprofile");
					//$this->load->view("User/V_profile", $data);
					$this->foot();
	
					
				}*/
			}
			
		}

		public function awal()
		{
			$this->load->view('v_signup_pengguna1');
		}

		function signUpSuccess(){
			$this->load->view('v_signupsuccess');
		}
		
}	
?>