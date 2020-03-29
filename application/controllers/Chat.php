<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_barang');
		$this->load->model('m_notif');
		$this->load->model('m_pesanan');
		$this->load->model('m_pesan');
	}
	function checkChatBarang($idSaya,$idDia)
	{
		
		$data['chat'] = $this->m_pesan->tampilkanPesan($idSaya,$idDia)->result();
		$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();

		$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();
        $data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
        
        $data['idsaya'] = $idSaya;
        $data['iddia'] = $idDia;

		$this->load->view('v_chat_barang',$data);
    }

    function sendChat($idSaya,$idDia)
    {
        $count = $this->m_pesan->tampilkanData()->num_rows()+1;
        $id_pesan = "PESAN-".$count;
        
        $pesan = $this->input->post('input_pesan');

		$data = [
			'id_pesan' => $id_pesan, 
			'id_pengirim' => $idSaya,
			'id_penerima' => $idDia,
			'pesan' => $pesan
			 
		];

		$this->db->set('waktu_kirim', 'NOW()', FALSE);
		$this->m_pesan->insertTable('pesan', $data);

		redirect('Chat/checkChatBarang/'.$idSaya.'/'.$idDia);

	}
	
	function sendChatAdmin()
    {
        $count = $this->m_pesan->tampilkanData()->num_rows()+1;
        $id_pesan = "PESAN-".$count;
		
		$idSaya = $this->session->userdata('id_user');
		$idDia = 'ADMIN';
        $pesan = $this->input->post('input_pesan');

		$data = [
			'id_pesan' => $id_pesan, 
			'id_pengirim' => $idSaya,
			'id_penerima' => $idDia,
			'pesan' => $pesan
			 
		];

		$this->db->set('waktu_kirim', 'NOW()', FALSE);
		$this->m_pesan->insertTable('pesan', $data);

		echo json_encode(['success' => 'berhasil kirim']);

    }
}
?>