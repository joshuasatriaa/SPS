<?php
class After_service_notification extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_after_service_notification');
	}
	
	function index(){
		
		
		
		$this->load->view('v_after_service_notification');
	}
	
		
	
	function email(){
		
		$date1 = $this->input->post('waktu_pesanan');
		$date2 = date("Y-m-d");
		$diff = date_diff($date1,$date2);
		
		if($diff > '3'){
		
		$to = $this->input->post('email_pengguna');;
		$from = "bengcool@gmail.com"
		$subject = "After Service Notification";
		$message = "Dari Bengcool";
		$headers = "From:". $from;


		mail($to,$subject,$message,$headers);
		}
		
		
		
		
	}
	
	
}
?>