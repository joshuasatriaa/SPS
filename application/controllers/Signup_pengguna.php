<?php
	class Signup_pengguna extends CI_Controller{
		function __construct(){
		parent::__construct();		
		$this->load->model('m_signup_pengguna');
		$this->load->model('m_user');
		$this->load->library('form_validation');
		}
		
		function index(){	
			$data['count']=$this->m_signup_pengguna->tampilkanData()->num_rows();
			$data['gender'] = $this->input->get('user_gender');
			$this->load->view('v_signup_pengguna',$data);
		}
		 
		function insertData(){
			
            $this->form_validation->set_rules('user_name', 'Name', 'required|trim');
            $this->form_validation->set_rules('user_gender', 'Sex', 'required|trim');
            $this->form_validation->set_rules('user_email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
            $this->form_validation->set_rules('user_birthplace', 'Place of Birth', 'required|trim');
            $this->form_validation->set_rules('user_birthdate', 'Date of Birth', 'required|trim');
            $this->form_validation->set_rules('user_address', 'Address', 'required|trim');
            $this->form_validation->set_rules('user_phonenumber', 'Telephone Number', 'required|trim|numeric');
			$this->form_validation->set_rules('user_password', 'Password', 'required|trim|min_length[6]|matches[user_password2]');
			$this->form_validation->set_rules('user_password2', 'Confirm Password', 'required|trim|min_length[6]|matches[user_password]');

			if($this->form_validation->run() == FALSE){
				$data['count']=$this->m_signup_pengguna->tampilkanData()->num_rows();
				$data['gender'] = $this->input->get('user_gender');
				$this->load->view('v_signup_pengguna',$data);
			}
			else{
				$id = htmlspecialchars($this->input->post('user_id'), TRUE);
				$nama = htmlspecialchars($this->input->post('user_name'), TRUE);
				$kelamin = htmlspecialchars($this->input->post('user_gender'), TRUE);
				$tglLahir = htmlspecialchars($this->input->post('user_birthdate'), TRUE);
				$tmpLahir = htmlspecialchars($this->input->post('user_birthplace'), TRUE);
				$alamat = htmlspecialchars($this->input->post('user_address'), TRUE);
				$email = htmlspecialchars($this->input->post('user_email'), TRUE);
				$pass = htmlspecialchars($this->input->post('user_password'), TRUE);
				$telp = htmlspecialchars($this->input->post('user_phonenumber'), TRUE);
				$gambar = 'default.jpg';
				
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
				redirect('Signup_pengguna/signUpSuccess');
				
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

		function awal()
		{
			$this->load->view('v_signup_pengguna1');
		}

		function signUpSuccess(){
			$this->load->view('v_signupsuccess');
		}
		
}	
?>