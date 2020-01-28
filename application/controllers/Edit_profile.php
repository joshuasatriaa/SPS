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
            $data['pengguna'] = $this->m_signup_pengguna->tampilkanData()->result();
			$this->load->view('v_editprofile',$data);
		}

	}
			
?>