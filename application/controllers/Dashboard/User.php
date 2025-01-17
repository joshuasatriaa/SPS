<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model(array('m_user'));
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
        $data['user'] = $this->m_user->tampilkanData1()->result();
        $data['count']=$this->m_user->tampilkanData()->num_rows();
		$this->head();
		$this->load->view('Dashboard/v_user',$data);
		$this->foot();
	}


	public function insertData()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('id_user', 'ID user', 'required|trim|is_unique[user.id_user]');
		$this->form_validation->set_rules('email', 'Name', 'required|trim|valid_email');
		
		if($this->form_validation->run() == false){
			echo validation_errors();
		}
		else{
			$data_user = array(
				'id_pengguna' => htmlspecialchars($this->input->post('id_user')), 
				'nama_pengguna' => $this->input->post('nama'),
				'jenis_kelamin' => $this->input->post('jk'),
				'tanggal_lahir' => $this->input->post('tanggal'),
				'tempat_lahir' => $this->input->post('tempat'),
				'alamat' => $this->input->post('alamat'),
				'email' => $this->input->post('email'),
				'telepon' => $this->input->post('telepon'), 
				'user_add' => $this->session->userdata('id_user'),
				'status_delete' => 0
			);

			$data_user1 = array(
				'id_user' => htmlspecialchars($this->input->post('id_user')), 
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password1')
			);

			$this->m_user->insertTable('pengguna',$data_user);
			$this->m_user->insertTable('user',$data_user1);
			redirect('Dashboard/User/index');

		}

	}

	function editData($id_user) {
		$this->load->model('m_user');
		$where = array('id_user' => $id_user);
		$data['userEdit'] = $this->m_user->editRecord($where,'user')->result();
		$this->load->view('Dashboard/V_Edit_User',$data);
	}

	function updateData(){
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email', 'Name', 'required|trim|valid_email');

		if($this->form_validation->run() == false){
			echo validation_errors();
		}
		else{
			$data_user = array(
				//'id_user' => htmlspecialchars($this->input->post('id_user')), 
				'nama_pengguna' => $this->input->post('nama'),
				'jenis_kelamin' => $this->input->post('jk'),
				'tanggal_lahir' => $this->input->post('tanggal'),
				'tempat_lahir' => $this->input->post('tempat'),
				'alamat' => $this->input->post('alamat'),
				'email' => $this->input->post('email'),
				'telepon' => $this->input->post('telepon'), 
				'user_edit' => $this->session->userdata('id_user')
			);

			$where = array(
				'id_pengguna' => $this->input->post('id_user'),
			);
			$this->m_user->updateRecord($where,$data_user,'pengguna');
			redirect('Dashboard/User/index');

		}
	}
	
	function hapusData($id_user){
		$this->load->model('m_user');
		$where = array('id_user' => $id_user);

		$this->m_user->hapusRecord($where,'user');
		redirect('User/index');
	}

	function hapusData1($id_user){
		$this->load->model('m_user');
		//$where = array('id_user' => $id_user);

		$this->m_user->hapusData1($id_user);
		redirect('Dashboard/User/index');
	}

	function exportPDF()
	{
		$data['user'] = $this->m_user->tampilkanData1()->result();
		$this->load->view('Dashboard/E_User',$data);
	}
}
?>