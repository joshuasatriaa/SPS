<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membership extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model(array('m_member','m_pengguna'));
	}
	
	public function head(){
		$this->load->view('Dashboard/Template/head-open');
		$this->load->view('Dashboard/Template/css');
		$this->load->view('Dashboard/Template/head-close');
		/*if($this->session->userdata('tipe_akun')== 2){
			$data2['dosen'] = $this->M_Dosen->getRecord($this->session->userdata('username'))->row_array();
		}else{
			$data2['admin'] = $this->M_Admin->getRecord($this->session->userdata('username'))->row_array();
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
        $data['membership'] = $this->m_member->dataAdmin()->result();
        $data['pengguna'] = $this->m_member->dataAdmin1()->result();
		//$data['count']=$this->m_service->tampilkanData()->num_rows();
		//$data['member'] = $this->m_member->checkMembership($this->session->userdata('id_user'))->row_array();
		$this->head();
		$this->load->view('Dashboard/V_Membership',$data);
		$this->foot();
	}


	public function insertData()
	{
        $count = $this->m_member->dataAdmin()->num_rows()+1;
        $id1 = "MBR-".$count;
		
			$data_member = array(
				'id_membership' => $id1,
				'id_user' => $this->input->post('iduser'),
				'jenis_membership' => 1,
                'status_membership' => 1,
                'tanggal_mulai' => $this->input->post('mulai'),
                'tanggal_selesai' => $this->input->post('selesai')
			);

			$this->m_member->insertTable('membership',$data_member);
			redirect('Dashboard/Membership/index');
	}

	function updateData(){
		
			$data_member = array(
				//'id_service' => htmlspecialchars($this->input->post('id_service')), 
				//'id_bengkel' => htmlspecialchars($this->input->post('id_bengkel')), 
                'status_membership' => $this->input->post('status'),
                'tanggal_selesai' => $this->input->post('mulai'),
                'tanggal_mulai' => $this->input->post('selesai')
                //'gambar' => htmlspecialchars($this->input->post('gambar')),
				//'user_add' => htmlspecialchars($this->input->post('id_user')),  
				//'user_edit' => $this->session->userdata('id_user')
			);

			$where = array(
				'id_membership' => $this->input->post('idm'),
			);
			$this->m_member->update('membership',$data_member,$where);
			redirect('Dashboard/Membership/index');
	}
	
	function hapusData($id){
		$this->m_member->remove($id);
		redirect('Dashboard/Membership/index');
	}

	function exportPDF()
	{
		$data['membership'] = $this->m_member->dataAdmin()->result();
		$this->load->view('Dashboard/E_Member',$data);
	}
}
?>