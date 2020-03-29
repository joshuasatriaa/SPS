<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChatUser extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model(array('m_admin', 'm_pesan', 'm_pengguna'));
	}
	
	public function head_open(){
		$this->load->view('Dashboard/Template/head-open');
		$this->load->view('Dashboard/Template/css');
		
		/*if($this->session->admindata('tipe_akun')== 2){
			$data2['dosen'] = $this->M_Dosen->getRecord($this->session->admindata('adminname'))->row_array();
		}else{
			$data2['admin'] = $this->M_Admin->getRecord($this->session->admindata('adminname'))->row_array();
		}
		*/
	}

	public function head_close(){
		$this->load->view('Dashboard/Template/head-close');
		$this->load->view('Dashboard/Template/left');
	}

	public function head_close2(){
		$this->load->view('Dashboard/Template/head-close2');
		$this->load->view('Dashboard/Template/left');
	}

	public function foot(){
		$this->load->view('Dashboard/Template/js');
		$this->load->view('Dashboard/Template/body-close');

	}
	
	public function index()
	{
		$data['listChatUser'] = $this->m_admin->tampilkanDataChat()->result();
		$i = 0;
		foreach($data['listChatUser'] as $a){
			$data['chatUser'][$i] = $this->m_admin->ambilDataUser($a->id_pengirim)->result();
			$i++;
		}
		
		$this->head_open();
		$this->head_close();
		$this->load->view('Dashboard/v_chat_user',$data);
		$this->foot();
	}

	function chatPersonal($id){
        

        
        $text = substr($id,0,4);
		if($text == "USER"){
			$data['id'] = $this->m_pengguna->getData(['id_pengguna' => $id], 'pengguna')->result_array();
		}else{
			$data['id'] = $this->m_pengguna->getData(['id_bengkel' => $id], 'bengkel')->result_array();
		}
        $data['chatAdmin'] = $this->m_pesan->cekPesanAdmin($id)->result();
        $data['chatAdminCount'] = $this->m_pesan->cekPesanAdmin($id)->num_rows();
        $data['id_penerima'] = $id;
        $this->load->view('Dashboard/v_chat_personal', $data);
    }

    function process(){
        $function = $_POST['function'];
        $log = array();
        
        switch($function) {
        
            case('getState'):
                $id = $_POST['receiver'];
                $lines = $this->m_pesan->cekPesanAdmin($id)->num_rows();
                $log['state'] = $lines; 
                break;	
            case('update'):
                $function = $_POST['function'];
                $id = $_POST['receiver'];
                $state = $_POST['state'];
                $lines = $this->m_pesan->cekPesanAdmin($id)->num_rows();
                $log = array();
                $count =  $lines;

                if($state == $count){
                    $log['state'] = $state;
                    $log['text'] = false;
                    
                }else{
                        $text= array();
                        $log['state'] = $state + $lines - $state;
                        $pesan = $this->m_pesan->cekPesanAdmin($id)->result();
                        
                        $log['text'] = $pesan; 
                }

                break;
            case('send'):
                $message = htmlentities(strip_tags($_POST['message']));
                if(($message) != "\n"){
                
                    
                    $count = $this->m_pesan->tampilkanData()->num_rows()+1;
                    $data = [
                        'id_pesan' => 'PESAN-'.$count,
                        'id_pengirim' => 'ADMIN',
                        'id_penerima' => $_POST['receiver'],
                        'pesan' => $_POST['message'],
                    ];
                    $this->db->set('waktu_kirim', 'NOW()', FALSE);
                    $this->m_pesan->insertTable('pesan', $data);
    
                }
                break;
            
        }
        //var_dump($log);
        echo json_encode($log);
    }
}
?>