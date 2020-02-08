<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_service');
        $this->load->model('m_signup_bengkel');
        $this->load->model('m_booking');
	}
	public function index()
	{
		$data['bengkel'] = $this->m_signup_bengkel->tampilkanData()->result();
		$this->load->view('v_service', $data);
	}
	public function Booking()
	{
        $data['bengkel'] = $this->m_signup_bengkel->tampilkanData()->result();
        $data['service'] = $this->m_service->tampilkan_service()->result();
		$data['count'] = $this->m_booking->tampilkan_booking()->num_rows();
		$this->load->view('v_booking', $data);
	}

	function insertData(){
		$id_booking = $this->input->post('id_booking');
		$id = $this->input->post('id_pengguna');
		$id_service = $this->input->post('service');
		$waktu = $this->input->post('waktu_booking');
		
		$data = array(
			'id_booking' => $id_booking,
			'id_pengguna' => $id,
			'id_service' => $id_service,
            'waktu_service' => $waktu,
            'status_booking' => '0'
		);
		
		$this->m_service->insertTable('booking', $data);
		redirect('Booking');
	}

	function CheckBooking()
	{
		$data['databooking'] = $this->m_booking->tampilkan_bookingku($this->session->userdata('id_user'))->result();
		$this->load->view('v_cek_booking',$data);
	}

	function ConfirmBooking($id)
	{
		$this->m_booking->confirm($id);
		redirect('Booking/CheckBooking');
	}

	function RejectBooking($id)
	{
		$this->m_booking->reject($id);
		redirect('Booking/CheckBooking');
	}
}
