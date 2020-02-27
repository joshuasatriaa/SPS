<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bengkel extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model(array('m_bengkel'));
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
        $data['count']=$this->m_bengkel->tampilkanData()->num_rows();
		$this->head();
		$this->load->view('Dashboard/v_bengkel',$data);
		$this->foot();
	}


	public function insertData()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('id_bengkel', 'ID Bengkel', 'required|trim|is_unique[bengkel.id_bengkel]');
		$this->form_validation->set_rules('nama_bengkel', 'Name', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Address', 'required|trim');
		$this->form_validation->set_rules('telepon', 'Telephone', 'required|trim');
		$this->form_validation->set_rules('tanggal_registrasi', 'Registration Date', 'required|trim');
        $this->form_validation->set_rules('gambar', 'Picture', 'required|trim');
        $this->form_validation->set_rules('jam_buka', 'Open Time', 'required|trim');
        $this->form_validation->set_rules('jam_tutup', 'Close Time', 'required|trim');
		
		if($this->form_validation->run() == false){
			echo validation_errors();
		}
		else{
			$data_bengkel = array(
				'id_bengkel' => htmlspecialchars($this->input->post('id_bengkel')), 
				'nama_bengkel' => htmlspecialchars($this->input->post('nama_bengkel')), 
				'alamat' => htmlspecialchars($this->input->post('alamat')), 
				'telepon' => htmlspecialchars($this->input->post('telepon')),  
                'tanggal_registrasi' => htmlspecialchars($this->input->post('tanggal_registrasi')),
                'gambar' => htmlspecialchars($this->input->post('gambar')),
                'jam_buka' => htmlspecialchars($this->input->post('jam_buka')),
                'jam_tutup' => htmlspecialchars($this->input->post('jam_tutup')),
				'user_add' => htmlspecialchars($this->input->post('id_user')),  
				'user_edit' => '',  
				'user_delete' => '',
				'status_delete' => 1
			);

			$this->m_bengkel->insertTable('bengkel',$data_bengkel);
			redirect('Dashboard/bengkel/index');

		}

	}

	function editData($id_bengkel) {
		$this->load->model('m_bengkel');
		$where = array('id_bengkel' => $id_bengkel);
		$data['BengkelEdit'] = $this->m_bengkel->editRecord($where,'bengkel')->result();
		$this->load->view('Dashboard/V_Edit_Bengkel',$data);
	}

	function updateData(){
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nama_bengkel', 'Name', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Address', 'required|trim');
		$this->form_validation->set_rules('telepon', 'Telephone', 'required|trim');
		$this->form_validation->set_rules('tanggal_registrasi', 'Registration Date', 'required|trim');
        $this->form_validation->set_rules('gambar', 'Picture', 'required|trim');
        $this->form_validation->set_rules('jam_buka', 'Open Time', 'required|trim');
        $this->form_validation->set_rules('jam_tutup', 'Close Time', 'required|trim');

		if($this->form_validation->run() == false){
			echo validation_errors();
		}
		else{
			$data_bengkel = array(
				'id_bengkel' => htmlspecialchars($this->input->post('id_bengkel')), 
				'nama_bengkel' => htmlspecialchars($this->input->post('nama_bengkel')), 
				'alamat' => htmlspecialchars($this->input->post('alamat')), 
				'telepon' => htmlspecialchars($this->input->post('telepon')),  
                'tanggal_registrasi' => htmlspecialchars($this->input->post('tanggal_registrasi')),
                'gambar' => htmlspecialchars($this->input->post('gambar')),
                'jam_buka' => htmlspecialchars($this->input->post('jam_buka')),
                'jam_tutup' => htmlspecialchars($this->input->post('jam_tutup')),
				'user_add' => htmlspecialchars($this->input->post('id_user')),  
				'user_edit' => $this->session->userdata('id_user'),  
			);

			$where = array(
				'id_bengkel' => $this->input->post('id_bengkel'),
			);
			$this->m_bengkel->updateRecord($where,$data_bengkel,'bengkel');
			redirect('Dashboard/Bengkel/index');

		}
	}
	
	function hapusData($id_bengkel){
		$this->load->model('m_bengkel');
		$where = array('id_bengkel' => $id_bengkel);

		$this->m_bengkel->hapusRecord($where,'bengkel');
		redirect('Bengkel/index');
	}

	function exportPDF()
	{
		$data['bengkel'] = $this->m_bengkel->tampilkanData()->result();
		$this->load->view('Dashboard/E_Bengkel',$data);
	}
}
?>