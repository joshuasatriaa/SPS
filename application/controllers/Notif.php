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

}