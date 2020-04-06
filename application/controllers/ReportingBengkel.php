<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportingBengkel extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->model('m_pesan');
        $this->load->model('m_pesanan');
        $this->load->model('m_barang');
        $this->load->model('m_notif');
	}
	public function index()
	{
        $data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
		$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();	
		$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
		$data['countChat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->num_rows();

        $data['chat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->result();
        
        //Reporting
        $data['r1'] = $this->m_pesanan->reporting1($this->session->userdata('id_user'))->num_rows();
        $data['r2'] = $this->m_pesanan->reporting2($this->session->userdata('id_user'))->num_rows();
        $data['r3'] = $this->m_pesanan->reporting3($this->session->userdata('id_user'))->num_rows();
		$this->load->view('v_reporting_bengkel',$data);
	}
	
}
