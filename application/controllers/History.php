<?php 
class History extends CI_Controller {
    function __construct(){
		parent::__construct();
		$this->load->model('m_history');
	}
	
    function index(){
        $data['pesanan']=$this->m_history->tampil_history()->result(); 
		$this->load->view('v_history', $data);
		
    }
	 
	
	
	
	
?>