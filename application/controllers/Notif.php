<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notif extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_notif');
    }

	function CurrentBooking($id)
	{
        $data = [
            'status_notifikasi' => 1
        ];
        $this->m_notif->updateNotif('notifikasi', $data, array('id_notifikasi' => $id));
        redirect('StatusBooking/CurrentBooking');
    }
    
    function notifyCustomerMembership(){
        $countNotif = $this->m_notif->tampilkan_notifku($pengguna['id_pengguna'])->num_rows()+1;
		$data = [
			'id_notifikasi' => 'NTF-'.$this->session->userdata('id_user').'-'.$countNotif,
			'id_user' => $this->session->userdata('id_user'),
			'id_tipe_notifikasi' => 3,
			'isi_notifikasi' => "Hi, ".$this->session->userdata('id_user').", <br> Your membership is over today! <br> Please renew your membership as soon as possible!",
			'status_notifikasi' => 0,
		];

		$this->db->set('waktu_notifikasi', 'NOW()', FALSE);
		$this->m_notif->insertTable('notifikasi', $data);
    }

}