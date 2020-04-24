<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model(array('m_barang','m_user'));
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
		$data['barang'] = $this->m_barang->tampilkanData1()->result();
		$data['user'] = $this->m_user->tampilkanData()->result();
		$this->head();
		$data['count']=$this->m_barang->tampilkanData()->num_rows();
		$this->load->view('Dashboard/v_barang',$data);
		$this->foot();
	}


	public function insertData()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('id_barang', 'ID Barang', 'required|trim|is_unique[barang.id_barang]');
		$this->form_validation->set_rules('nama_barang', 'Name', 'required|trim');
		$this->form_validation->set_rules('id_user', 'ID Seller', 'required|trim');
		$this->form_validation->set_rules('harga_barang', 'Price', 'required|trim');
		$this->form_validation->set_rules('stok_barang', 'Stock', 'required|trim');
		$this->form_validation->set_rules('keterangan_barang', 'Keterangan', 'required|trim');

		
		if($this->form_validation->run() == false){
			echo validation_errors();
		}
		else{
			$data_barang = array(
				'id_barang' => htmlspecialchars($this->input->post('id_barang')), 
				'nama_barang' => htmlspecialchars($this->input->post('nama_barang')), 
				'id_penjual' => htmlspecialchars($this->input->post('id_user')), 
				'keterangan_barang' => htmlspecialchars($this->input->post('keterangan_barang')),
				'harga_barang' => htmlspecialchars($this->input->post('harga_barang')), 
				'stok_barang' => htmlspecialchars($this->input->post('stok_barang')),
				'user_add' => htmlspecialchars($this->input->post('id_user')),  
				'user_edit' => '',  
				'user_delete' => '',
				'status_delete' => 1
			);

			$this->m_barang->insertTable('barang',$data_barang);
			redirect('Dashboard/Barang/index');

		}

	}

	function editData($id_barang) {
		$this->load->model('m_barang');
		$where = array('id_barang' => $id_barang);
		$data['BarangEdit'] = $this->m_barang->editRecord($where,'barang')->result();
		$this->load->view('Dashboard/V_Edit_Barang',$data);
	}

	function updateData(){
		//$this->load->library('form_validation');
		
		//$this->form_validation->set_rules('nama_barang', 'Name', 'required|trim');
		//$this->form_validation->set_rules('id_user', 'ID Seller', 'required|trim');
		//$this->form_validation->set_rules('harga_barang', 'Price', 'required|trim');
		//$this->form_validation->set_rules('stok_barang', 'Stock', 'required|trim');
		//$this->form_validation->set_rules('keterangan_barang', 'Keterangan', 'required|trim');

		//if($this->form_validation->run() == false){
			//echo validation_errors();
		//}
		//else{
			$this->load->model('m_barang');
			$data_barang = array(
				'nama_barang' =>  $this->input->post('namabarang'),
				'harga_barang' => $this->input->post('hargabarang'),
				'stok_barang' => $this->input->post('stokbarang'),
				'keterangan_barang' => $this->input->post('keterangan')
			);

			$where = array(
				'id_barang' => $this->input->post('id_barang'),
			);
			$this->m_barang->updateData($where,$data_barang,'barang');
			redirect('Dashboard/Barang/index');

		//}
	}
	
	function hapusData($id_barang){
		$this->load->model('m_barang');
		$where = array('id_barang' => $id_barang);

		$this->m_barang->hapusData($where);
		redirect('Barang/index');
	}

	function hapusData1($id_barang){
		$this->load->model('m_barang');
		$where = array('id_barang' => $id_barang);

		$this->m_barang->hapusData($id_barang);
		redirect('Dashboard/Barang/index');
	}

	function exportPDF()
	{
		$this->load->model('m_barang');
		$data['barang1'] = $this->m_barang->tampilkanDataAdmin()->result();
		$this->load->view('Dashboard/E_barang',$data);
	}
}
?>