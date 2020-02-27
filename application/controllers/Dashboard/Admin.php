<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$data['admin'] = $this->m_admin->tampilkanData()->result();
		$this->head();
		$this->load->view('Dashboard/v_admin',$data);
		$this->foot();
	}


	public function insertData()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('id_admin', 'ID admin', 'required|trim|is_unique[admin.id_admin]');
        $this->form_validation->set_rules('nama_admin', 'Name', 'required|trim');
        $this->form_validation->set_rules('level_admin', 'Level Admin', 'required|trim');
		
		if($this->form_validation->run() == false){
			echo validation_errors();
		}
		else{
			$data_admin = array(
				'id_admin' => htmlspecialchars($this->input->post('id_admin')), 
                'nama_admin' => htmlspecialchars($this->input->post('nama_admin')),
                'level_admin' => htmlspecialchars($this->input->post('level_admin')),
				'user_add' => htmlspecialchars($this->input->post('id_admin')),  
				'user_edit' => '',  
				'user_delete' => '',
				'status_delete' => 1
			);

			$this->m_admin->insertTable('admin',$data_admin);
			redirect('Dashboard/Admin/index');

		}

	}

	function editData($id_admin) {
		$this->load->model('m_admin');
		$where = array('id_admin' => $id_admin);
		$data['adminEdit'] = $this->m_admin->editRecord($where,'admin')->result();
		$this->load->view('Dashboard/V_Edit_Admin',$data);
	}

	function updateData(){
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('id_admin', 'ID admin', 'required|trim|is_unique[admin.id_admin]');
        $this->form_validation->set_rules('nama_admin', 'Name', 'required|trim');
        $this->form_validation->set_rules('level_admin', 'Level Admin', 'required|trim');

		if($this->form_validation->run() == false){
			echo validation_errors();
		}
		else{
			$data_admin = array(
				'id_admin' => htmlspecialchars($this->input->post('id_admin')), 
                'nama_admin' => htmlspecialchars($this->input->post('nama_admin')),
                'level_admin' => htmlspecialchars($this->input->post('level_admin')),
				'user_add' => htmlspecialchars($this->input->post('id_user')),  
				'user_edit' => $this->session->userdata('id_user'),  
			);

			$where = array(
				'id_amin' => $this->input->post('id_admin'),
			);
			$this->m_admin->updateRecord($where,$data_admin,'admin');
			redirect('Dashboard/Admin/index');

		}
	}
	
	function hapusData($id_admin){
		$this->load->model('m_admin');
		$where = array('id_admin' => $id_admin);

		$this->m_admin->hapusRecord($where,'admin');
		redirect('Admin/index');
	}

	function exportPDF()
	{
		$data['admin'] = $this->m_admin->tampilkanData()->result();
		$this->load->view('Dashboard/E_Admin',$data);
	}
}
?>