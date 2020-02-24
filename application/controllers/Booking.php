<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_service');
        $this->load->model('m_signup_bengkel');
		$this->load->model('m_booking');
		$this->load->model('m_pesanan');
		$this->load->model('m_notif');
	}
	public function index()
	{
		$data['bengkels'] = $this->m_signup_bengkel->tampilkanData1()->result();
		$data['jumlah'] = $this->m_signup_bengkel->tampilkanData()->num_rows();
		$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
		$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();
			
			$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
		$this->load->view('v_service', $data);
	}
	public function Booking($id)
	{
        //$data['bengkel'] = $this->m_signup_bengkel->tampilkanData()->result();
        //$data['service'] = $this->m_service->tampilkan_service()->result();
		$data['count'] = $this->m_booking->tampilkan_booking()->num_rows();
		$data['service'] = $this->m_booking->cek_service($id)->result();
		$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
		$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();
			
			$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
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
		redirect('StatusBooking/CurrentBooking');
	}

	function CheckBooking()
	{
		$data['databooking'] = $this->m_booking->tampilkan_bookingku($this->session->userdata('id_user'))->result();
		
		$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
		$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();
			
			$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
			
		$this->load->view('v_cek_booking',$data);
	}

	function ConfirmBooking($id)
	{
		$this->m_booking->confirm($id);
		$pengguna = $this->m_notif->getPenggunaViaBooking($id)->row_array();
		$countNotif = $this->m_notif->tampilkan_notifku($pengguna['id_pengguna'])->num_rows()+1;
		$data = [
			'id_notifikasi' => 'NTF-'.$pengguna['id_pengguna'].'-'.$countNotif,
			'id_user' => $pengguna['id_pengguna'],
			'id_tipe_notifikasi' => 1,
			'isi_notifikasi' => "Hi, ".$pengguna['nama_pengguna']."! <br>Your request is accepted! <br>Please bring your car to the garage/workshop of your choice for the service",
			'status_notifikasi' => 0,
		];

		$this->db->set('waktu_notifikasi', 'NOW()', FALSE);
		$this->m_notif->insertTable('notifikasi', $data);

		redirect('Booking/CheckBooking');
	}

	function RejectBooking($id)
	{
		$this->m_booking->reject($id);
		redirect('Booking/CheckBooking');
	}

	function DoneBooking($id)
	{
		$this->m_booking->done($id);
		$pengguna = $this->m_notif->getPenggunaViaBooking($id)->row_array();
		$countNotif = $this->m_notif->tampilkan_notifku($pengguna['id_pengguna'])->num_rows()+1;
		$data = [
			'id_notifikasi' => 'NTF-'.$pengguna['id_pengguna'].'-'.$countNotif,
			'id_user' => $pengguna['id_pengguna'],
			'id_tipe_notifikasi' => 2,
			'isi_notifikasi' => "Hi, ".$pengguna['nama_pengguna']."! <br> How is our service? <br> Please rate our service by clicking this notifications!",
			'status_notifikasi' => 0,
		];

		$this->db->set('waktu_notifikasi', 'NOW()', FALSE);
		$this->m_notif->insertTable('notifikasi', $data);
		redirect('Booking/CheckBooking');
	}

	function CurrentBooking()
	{
		$data['databooking1'] = $this->m_booking->tampilkan_bookingku1($this->session->userdata('id_user'))->result();
		$this->load->model('m_pesanan');
		$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
		$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();
			
			$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
		$this->load->view('v_cek_booking1',$data);
	}

	function ProfileBengkel($id)
	{
		$data['databengkel'] = $this->m_signup_bengkel->tampilkan_profile($id)->result();
		$data['datarating'] = $this->m_signup_bengkel->tampilkan_rating($id)->result();
		$data['dataservice'] = $this->m_service->tampilkan_serviceku($id)->result();
		$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
		$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();	
		$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();

		$this->load->view('v_bengkel_profile',$data);
	}

	function RateBengkel($angka,$id,$idS)
	{
		$count=$this->m_booking->hitung_jumlah_rating()->num_rows()+1;

		$idB = 'RATE-'.$count;
		$data = array(
			'id_rating' => $idB,
			'id_pemberi' => $this->session->userdata('id_user'),
			'id_penerima' => $id,
			'id_transaksi' => $idS,
			'rating_bengkel' => $angka
			);
			
		$this->db->set('waktu_rating', 'NOW()', FALSE);
		$this->m_booking->insertTable('rating', $data);
		//$this->m_booking->rate($angka,$id);
		redirect('Booking');
	}
}
