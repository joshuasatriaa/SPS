<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StatusBooking extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_service');
        $this->load->model('m_signup_bengkel');
        $this->load->model('m_booking');
	}
    function index()
	{
		$data['databooking'] = $this->m_booking->tampilkan_mybooking($this->session->userdata('id_user'))->result();
		$this->load->view('v_status_booking',$data);
	}

	function CurrentBooking()
	{
		$data['databooking'] = $this->m_booking->tampilkan_booking_sekarang($this->session->userdata('id_user'))->result();
		$this->load->view('v_user_current_booking',$data);
	}
}