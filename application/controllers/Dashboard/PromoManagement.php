<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PromoManagement extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model(array('m_admin'));
	}
	
	public function head(){
		$this->load->view('Dashboard/Template/head-open');
		$this->load->view('Dashboard/Template/css');
		$this->load->view('Dashboard/Template/head-close');
		/*if($this->session->admindata('tipe_akun')== 2){
			$data2['dosen'] = $this->M_Dosen->getRecord($this->session->admindata('adminname'))->row_array();
		}else{
			$data2['admin'] = $this->M_Admin->getRecord($this->session->admindata('adminname'))->row_array();
		}
		*/
		$this->load->view('Dashboard/Template/left');
	}
	
	public function foot(){
		$this->load->view('Dashboard/Template/js');
		$this->load->view('Dashboard/Template/body-close');

	}
	
	public function index()
	{
        $data['chatUser'] = $this->m_admin->tampilkanDataChat()->result();
        $arr = [];
        foreach($data['chatUser'] as $a){
            $where = $a->id_pengirim;
            $test = $this->m_admin->ambilDataUser($where)->row_array();

            $arr = [
                'nama_pengguna' => $test['nama_pengguna'],
                'nama_bengkel' => $test['nama_bengkel'],
            ];
        }

        $data['listUser'] = $arr;
		$this->head();
		$this->load->view('Dashboard/v_chat_user',$data);
		$this->foot();
	}
}
?>