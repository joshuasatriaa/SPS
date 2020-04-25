<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model(array('m_pesanan','m_barang','m_pengguna'));
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
        $data['barang'] = $this->m_barang->tampilkanData()->result();
        $data['pengguna'] = $this->m_pengguna->tampilkanData()->result();
        $data['pesanan'] = $this->m_pesanan->tampilkanData()->result();
        $data['count']=$this->m_pesanan->tampilkanData()->num_rows();
		$this->head();
		$this->load->view('Dashboard/v_pesanan',$data);
		$this->foot();
	}


	public function insertData()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('id_pesanan', 'ID Pesanan', 'required|trim|is_unique[pesanan.id_pesanan]');
		$this->form_validation->set_rules('id_pengguna', 'ID Buyer', 'required|trim');
		$this->form_validation->set_rules('id_barang', 'ID Item', 'required|trim');
		$this->form_validation->set_rules('status_pesanan', 'Status Order', 'required|trim');
        $this->form_validation->set_rules('waktu_pesanan', 'Time Order', 'required|trim');
		
		if($this->form_validation->run() == false){
			echo validation_errors();
		}
		else{
			$data_pesanan = array(
				'id_pesanan' => htmlspecialchars($this->input->post('id_pesanan')), 
				'id_pembeli' => htmlspecialchars($this->input->post('id_pengguna')), 
				'id_barang' => htmlspecialchars($this->input->post('id_barang')),  
                'status_pesanan' => htmlspecialchars($this->input->post('status_pesanan')),
                'waktu_pesanan' => htmlspecialchars($this->input->post('waktu_pesanan')),
			);

			$this->m_pesanan->insertTable('pesanan',$data_pesanan);
			redirect('Dashboard/Pesanan/index');

		}

	}

	function editData($id_pesanan) {
		$this->load->model('m_pesanan');
		$where = array('id_pesanan' => $id_pesanan);
		$data['pesananEdit'] = $this->m_pesanan->editRecord($where,'pesanan')->result();
		$this->load->view('Dashboard/V_Edit_Pesanan',$data);
	}

	function updateData(){
		$this->load->library('form_validation');
		
		//$this->form_validation->set_rules('id_pengguna', 'ID Buyer', 'required|trim');
		//$this->form_validation->set_rules('id_barang', 'ID Item', 'required|trim');
		$this->form_validation->set_rules('status_pesanan', 'Status Order', 'required|trim');
        //$this->form_validation->set_rules('waktu_pesanan', 'Time Order', 'required|trim');

		if($this->form_validation->run() == false){
			echo validation_errors();
		}
		else{
			$data_pesanan = array(
				//'id_pesanan' => htmlspecialchars($this->input->post('id_pesanan')), 
				//'id_pembeli' => htmlspecialchars($this->input->post('id_pengguna')),  
				//'id_barang' => htmlspecialchars($this->input->post('id_barang')),  
				'jumlah_barang' => $this->input->post('jumlahbarang'),
                'status_pesanan' => $this->input->post('status_pesanan')
                //'waktu_pesanan' => htmlspecialchars($this->input->post('waktu_pesanan'))
			);

			$where = array(
				'id_pesanan' => $this->input->post('id_pesanan'),
			);
			$this->m_pesanan->updateData($where,$data_pesanan,'pesanan');
			redirect('Dashboard/Pesanan/index');

		}
	}
	
	function hapusData($id_pesanan){
		$this->load->model('m_pesanan');
		$where = array('id_pesanan' => $id_pesanan);

		$this->m_pesanan->hapusRecord($where,'pesanan');
		redirect('pesanan/index');
	}

	function exportPDF()
	{
		$data['barang'] = $this->m_barang->tampilkanData()->result();
        $data['pengguna'] = $this->m_pengguna->tampilkanData()->result();
        $data['pesanan'] = $this->m_pesanan->tampilkanData()->result();
		$this->load->view('Dashboard/E_Pesanan',$data);
	}
}
?>