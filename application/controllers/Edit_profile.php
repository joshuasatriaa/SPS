<?php
    class Edit_profile extends CI_Controller
    {
		function __construct(){
            parent::__construct();		
            $this->load->model('m_signup_pengguna');
            $this->load->model('m_user');
            $this->load->model('m_pesanan');
            $this->load->library('form_validation');
		}
		
        function index()
        {
            $data['user'] = $this->m_user->tampilkanData()->result();
            $where1 = $this->session->userdata('id_user');
            $data['pengguna'] = $this->m_signup_pengguna->tampilkanRecordProfile($where1)->result();
            $data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
            $data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();	
		    $data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
            $this->load->view('v_editprofile',$data);
        }
        function updateData(){
            $this->form_validation->set_rules('user_name', 'Name', 'required|trim');
            $this->form_validation->set_rules('user_gender', 'Sex', 'required|trim');
            $this->form_validation->set_rules('user_email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('user_birthplace', 'Place of Birth', 'required|trim');
            $this->form_validation->set_rules('user_birthdate', 'Date of Birth', 'required|trim');
            $this->form_validation->set_rules('user_address', 'Address', 'required|trim');
            $this->form_validation->set_rules('user_phonenumber', 'Telephone Number', 'required|trim|numeric');
    
            if($this->form_validation->run() == false){
                $data['user'] = $this->m_user->tampilkanData()->result();
                $where1 = $this->session->userdata('id_user');
                $data['pengguna'] = $this->m_signup_pengguna->tampilkanRecordProfile($where1)->result();
                $this->load->view('v_editprofile',$data);
            }
            else{
                $data_pengguna = array(
                    'nama_pengguna' => htmlspecialchars($this->input->post('user_name')), 
                    'jenis_kelamin' => htmlspecialchars($this->input->post('user_gender')), 
                    'email' => htmlspecialchars($this->input->post('user_email')), 
                    'tanggal_lahir' => date('Y-m-d', strtotime(htmlspecialchars($this->input->post('user_birthdate')))),
                    'tempat_lahir' => htmlspecialchars($this->input->post('user_birthplace')), 
                    'alamat' => htmlspecialchars($this->input->post('user_address')), 
                    'telepon' => htmlspecialchars($this->input->post('user_phonenumber')), 
                    'user_edit' => $this->session->userdata('id_user'),  
                );
                $where = array(
                    'id_pengguna' => $this->session->userdata('id_user'),
                );
                $this->db->set('waktu_edit', 'NOW()', FALSE);
                $this->m_signup_pengguna->updateRecord($where,$data_pengguna,'pengguna');
                
                $password = $this->session->userdata('password');
                
                $this->session->set_userdata('nama', htmlspecialchars($this->input->post('user_name')));
                $this->session->set_userdata('email', htmlspecialchars($this->input->post('user_email')));
                $this->session->set_userdata('password', $password);
                
                $this->session->set_flashdata('message', '<div class="alert alert-success text-center p-t-25 p-b-50" role="alert">Your profile have been changed!</div>');
                redirect('Edit_profile/index');
            }
    }
}
    
			
?>