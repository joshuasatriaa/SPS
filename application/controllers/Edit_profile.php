<?php
    class Edit_profile extends CI_Controller
    {
		function __construct(){
		parent::__construct();		
		$this->load->model('m_signup_pengguna');
		$this->load->model('m_user');
		}
		
        function index()
        {
            $data['user'] = $this->m_user->tampilkanData()->result();
            $where1 = $this->session->userdata('id_user');
            $data['pengguna'] = $this->m_signup_pengguna->tampilkanRecordProfile($where1)->result();
            $this->load->view('v_editprofile',$data);
        }
        function updateData(){
            
            /*$this->load->library('form_validation');
            
            $this->form_validation->set_rules('user_name', 'Name', 'required|trim');
            $this->form_validation->set_rules('user_gender', 'Sex', 'required|trim');
            $this->form_validation->set_rules('user_email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('user_birthplace', 'Place of Birth', 'required|trim');
            $this->form_validation->set_rules('user_birthdate', 'Date of Birth', 'required|trim');
            $this->form_validation->set_rules('user_address', 'Address', 'required|trim');
            $this->form_validation->set_rules('user_phonenumber', 'Telephone Number', 'required|trim|numeric');
    
            if($this->form_validation->run() == false){
                echo validation_errors();
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
                );*/
                $namapengguna = $this->input->post('user_name');
                $jeniskelamin = $this->input->post('user_gender');
                $tanggallahir = $this->input->post('user_birthdate');
                $tempatlahir = $this->input->post('user_birthplace');
                $alamat = $this->input->post('user_address');
                $telepon = $this->input->post('user_phonenumber');
                $useredit = $this->input->post('user_name');
                $data=array(
                    'nama_pengguna' => $namapengguna,
                    'jenis_kelamin' => $jeniskelamin,
                    'tanggal_lahir' => $tanggallahir,
                    'tempat_lahir' => $tempatlahir,
                    'alamat' => $alamat,
                    'telepon' => $telepon,
                    'user_edit' => $useredit
                );
                $where = array(
                    'id_pengguna' => $this->input->post('id_pengguna'),
                );
                $this->m_signup_pengguna->updateRecord($where,$data,'pengguna');
                redirect('Edit_profile');
    }
}
    
			
?>