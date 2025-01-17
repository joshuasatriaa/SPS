<?php
	class Signup_bengkel extends CI_Controller{
		function __construct(){
		parent::__construct();		
		$this->load->model('m_signup_bengkel');
        $this->load->model('m_user');
        $this->load->library('form_validation');
		}
		
		function index(){	
			$this->load->view('v_signup_bengkel', array('error' => ''));
			
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
				$this->load->view('v_signup_bengkel', array('error' => ''));
			}
			else{
				$count=$this->m_signup_bengkel->tampilkanData()->num_rows()+1;

				$id = 'BID-'.$count;
				$nama = htmlspecialchars($this->input->post('user_name'), TRUE);
				$jamBuka = htmlspecialchars($this->input->post('user_opentime'), TRUE);
				$jamTutup = htmlspecialchars($this->input->post('user_closetime'), TRUE);
				$alamat = htmlspecialchars($this->input->post('user_address'), TRUE);
				$email = htmlspecialchars($this->input->post('user_email'), TRUE);
				$pass = htmlspecialchars($this->input->post('user_password'), TRUE);
				$telp = htmlspecialchars($this->input->post('user_phonenumber'), TRUE);
				$gambar = $this->upload_file();
				
				if($gambar['error']){
					$this->load->view('v_signup_bengkel', $gambar);
				}else{
					$gambarUpload = $this->upload->data();
					
					$imgdata = file_get_contents($gambarUpload['full_path']);//get the content of the image using its path
					$data = array(
						'id_bengkel' => $id,
						'nama_bengkel' => $nama,
						'jam_buka' => $jamBuka,
						'jam_tutup' => $jamTutup,
						'email' => $email,
						'telepon' => $telp,
						'gambar' => $imgdata,
						'user_add' => $id,
						'status_delete' => "0"
						);
						
					$this->db->set('tanggal_registrasi', 'NOW()', FALSE);
					$this->db->set('waktu_add', 'NOW()', FALSE);
					$this->m_signup_bengkel->insertTable('bengkel', $data);

					$countLokasi=$this->m_signup_bengkel->tampilkanDataLokasi()->num_rows()+1;
					$idLokasi = 'LOC-'.$countLokasi;

					$data1 = array(
						'id_lokasi_bengkel' => $idLokasi,
						'id_bengkel' => $id,
						'alamat' => $alamat
					);

					$this->m_signup_bengkel->insertTable('lokasi_bengkel', $data1);
		
					$data2 = array(
						'id_user' => $id,
						'email' => $email,
						'password' => md5($pass), 
					);
			
					$this->m_user->insertTable('user', $data2);
					redirect('Signup_bengkel/signUpSuccess');
					
				}
			
			}
			
		}

		public function awal()
		{
			$this->load->view('v_signup_pengguna1');
		}

		function signUpSuccess(){
			$this->load->view('v_signupsuccess');
		}

		public function upload_file()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1300;
                $config['max_height']           = 1024;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        
                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());

                    return $error;
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());

                    return $data;
                }
        }
		
}	
?>