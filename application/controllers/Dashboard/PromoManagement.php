<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PromoManagement extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model(array('m_promo'));
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
	
	public function History()
	{
        $data['promo'] = $this->m_promo->tampilkan_semua_data()->result();
        $data['count'] = $this->m_promo->tampilkan_semua_data()->num_rows();
		$this->head();
		$this->load->view('Dashboard/v_history_promo',$data);
		$this->foot();
    }
    
    public function Current()
    {
        $data['promo'] = $this->m_promo->tampilkan_data_sekarang()->result();
        $data['count'] = $this->m_promo->tampilkan_semua_data()->num_rows();
		$this->head();
		$this->load->view('Dashboard/v_current_promo',$data);
		$this->foot();
    }

    public function updateData()
    {
        $statusdelete = "0";
        $data= array(
            'jenis_promo' => $this->input->post('jenispromo'), 
            'tanggal_mulai' => $this->input->post('tanggalmulai'), 
            'tanggal_selesai' => $this->input->post('tanggalselesai'),
            'status_delete' => $statusdelete
        );

        $where = array(
            'id_promo' => $this->input->post('idpromo'),
        );
        $this->m_promo->updateRecord($where,$data,'promo');
        redirect('Dashboard/PromoManagement/History');
    }

    public function insertData()
    {
        $statusdelete = "0";
        $data= array(
            'id_promo' => $this->input->post('idpromo'),
            'jenis_promo' => $this->input->post('jenispromo'), 
            'tanggal_mulai' => $this->input->post('tanggalmulai'), 
            'tanggal_selesai' => $this->input->post('tanggalselesai'),
            'status_delete' => $statusdelete
        );

        $this->m_promo->insertTable('promo',$data);
		redirect('Dashboard/PromoManagement/History');
    }

    public function updateData1()
    {
        $statusdelete = "0";
        $data= array(
            'jenis_promo' => $this->input->post('jenispromo'), 
            'tanggal_mulai' => $this->input->post('tanggalmulai'), 
            'tanggal_selesai' => $this->input->post('tanggalselesai'),
            'status_delete' => $statusdelete
        );

        $where = array(
            'id_promo' => $this->input->post('idpromo'),
        );
        $this->m_promo->updateRecord($where,$data,'promo');
        redirect('Dashboard/PromoManagement/Current');
    }

    public function insertData1()
    {
        $statusdelete = "0";
        $data= array(
            'id_promo' => $this->input->post('idpromo'),
            'jenis_promo' => $this->input->post('jenispromo'), 
            'tanggal_mulai' => $this->input->post('tanggalmulai'), 
            'tanggal_selesai' => $this->input->post('tanggalselesai'),
            'status_delete' => $statusdelete
        );

        $this->m_promo->insertTable('promo',$data);
		redirect('Dashboard/PromoManagement/Current');
    }

    public function deleteData($id)
    {
        $this->m_promo->deleteRecord($id);
        redirect('Dashboard/PromoManagement/Current');
    }
}
?>