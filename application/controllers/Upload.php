<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Upload extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
        }

        public function index()
        {
        	$this->load->view('upload', array('error' => ' ' ));
        }

        public function upload_file()
        {
                $config['upload_path']          = './uploads/profile/bengkel';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1300;
                $config['max_height']           = 1024;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        
                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('upload', $error);
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());

                    $this->load->view('success', $data);
                }
        }
}