<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model(array('m_service','m_bengkel'));
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
        $data['bengkel'] = $this->m_bengkel->tampilkanData()->result();
        $data['service'] = $this->m_service->tampilkanData()->result();
        $data['count']=$this->m_service->tampilkanData()->num_rows();
		$this->head();
		$this->load->view('Dashboard/v_service',$data);
		$this->foot();
	}


	public function insertData()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('id_service', 'ID service', 'required|trim|is_unique[service.id_service]');
		$this->form_validation->set_rules('id_bengkel', 'Workshop Name', 'required|trim');
		$this->form_validation->set_rules('nama_service', 'Service Name', 'required|trim');
		$this->form_validation->set_rules('harga_service', 'Service Price', 'required|trim');
		$this->form_validation->set_rules('gambar', 'Picture', 'required|trim');
		
		if($this->form_validation->run() == false){
			echo validation_errors();
		}
		else{
			$data_service = array(
				'id_service' => htmlspecialchars($this->input->post('id_service')), 
				'id_bengkel' => htmlspecialchars($this->input->post('id_bengkel')), 
				'nama_service' => htmlspecialchars($this->input->post('nama_service')), 
				'harga_service' => htmlspecialchars($this->input->post('harga_service')),  
                'gambar' => htmlspecialchars($this->input->post('gambar')),
				'user_add' => htmlspecialchars($this->input->post('id_user')),  
				'user_edit' => '',  
				'user_delete' => '',
				'status_delete' => 1
			);

			$this->m_service->insertTable('service',$data_service);
			redirect('Dashboard/Service/index');

		}

	}

	function editData($id_service) {
		$this->load->model('m_service');
		$where = array('id_service' => $id_service);
		$data['serviceEdit'] = $this->m_service->editRecord($where,'service')->result();
		$this->load->view('Dashboard/V_Edit_Service',$data);
	}

	function updateData(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('id_bengkel', 'Workshop Name', 'required|trim');
		$this->form_validation->set_rules('nama_service', 'Service Name', 'required|trim');
		$this->form_validation->set_rules('harga_service', 'Service Price', 'required|trim');
		$this->form_validation->set_rules('gambar', 'Picture', 'required|trim');

		if($this->form_validation->run() == false){
			echo validation_errors();
		}
		else{
			$data_service = array(
				'id_service' => htmlspecialchars($this->input->post('id_service')), 
				'id_bengkel' => htmlspecialchars($this->input->post('id_bengkel')), 
				'nama_service' => htmlspecialchars($this->input->post('nama_service')), 
				'harga_service' => htmlspecialchars($this->input->post('harga_service')),  
                'gambar' => htmlspecialchars($this->input->post('gambar')),
				'user_add' => htmlspecialchars($this->input->post('id_user')),  
				'user_edit' => $this->session->userdata('id_user'),  
			);

			$where = array(
				'id_service' => $this->input->post('id_service'),
			);
			$this->m_service->updateRecord($where,$data_service,'service');
			redirect('Dashboard/Service/index');

		}
	}
	
	function hapusData($id_service){
		$this->load->model('m_service');
		$where = array('id_service' => $id_service);

		$this->m_service->hapusRecord($where,'service');
		redirect('Service/index');
	}

	function exportPDF()
	{
		$data['service'] = $this->m_service->tampilkanData()->result();
		$this->load->view('Dashboard/E_Service',$data);
	}
}
?>