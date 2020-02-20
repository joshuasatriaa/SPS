<?php
class Barang extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_barang');
		$this->load->library('form_validation');
	}
	function index(){
		$data['count'] = $this->m_barang->tampilkanBarang()->num_rows();
		$data['error'] = '';

		$this->load->model('m_pesanan');
		if($this->session->userdata('id_user')){
			$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
		}
		else
		{
			$data['countCart'] = 0;
		}
		$this->load->view('v_shop_add_item', $data);
		
		//$data['barang'] = $this->m_barang->tampilkan_barang()->result();
		//$this->load->view('v_test', $data);
		
	}
	function insertData(){

		$this->form_validation->set_rules('nama_barang', 'Item Name', 'required|trim');
		$this->form_validation->set_rules('keterangan_barang', 'Item Description', 'required|trim');
		$this->form_validation->set_rules('harga_barang', 'Price', 'required|trim');
		$this->form_validation->set_rules('stok_barang', 'Item Stock', 'required|trim|numeric');

		if (empty($_FILES['userfile']['name']))
		{
			$this->form_validation->set_rules('userfile[]', 'Item Image', 'required');
		}

		if($this->form_validation->run() == FALSE){
			$data['count'] = $this->m_barang->tampilkanBarang()->num_rows();
			$data['error'] = '';
			$this->load->view('v_shop_add_item', $data);
		}
		else{
			$count = $this->m_barang->tampilkanBarang()->num_rows()+1;
			$id_barang = "BARANG-".$count;
	
			$nama = htmlspecialchars($this->input->post('nama_barang'), TRUE);
			$ket = htmlspecialchars($this->input->post('keterangan_barang'), TRUE);
			$harga = htmlspecialchars($this->input->post('harga_barang'), TRUE);
			$stok = htmlspecialchars($this->input->post('stok_barang'), TRUE);
			$id_penjual = htmlspecialchars($this->input->post('id_penjual'),TRUE);
	
			$data = array(
				'id_barang' => $id_barang,
				'nama_barang' => $nama,
				'id_penjual' => $id_penjual,
				'harga_barang' => $harga,
				'stok_barang' => $stok,
				'keterangan_barang' => $ket,
				'user_add' => $this->session->userdata('id_user'),
				'status_delete' => "0"
			);
			
			$this->db->set('waktu_add', 'NOW()', FALSE);
			$this->m_barang->insertTable('barang', $data);
	
			$filesCount = count($_FILES['userfile']['name']);

			for($i = 0; $i < $filesCount; $i++){
				$_FILES['userfiles']['name']     = $_FILES['userfile']['name'][$i];
				$_FILES['userfiles']['type']     = $_FILES['userfile']['type'][$i];
				$_FILES['userfiles']['tmp_name'] = $_FILES['userfile']['tmp_name'][$i];
				$_FILES['userfiles']['error']     = $_FILES['userfile']['error'][$i];
				$_FILES['userfiles']['size']     = $_FILES['userfile']['size'][$i];
				
				// File upload configuration
				$config['upload_path']          = './uploads/';
				$config['allowed_types']        = 'gif|jpg|jpeg|png';
				$config['max_size']             = 1000;
				$config['max_width']            = 1300;
				$config['max_height']           = 1024;
				
				// Load and initialize upload library
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				
				// Upload file to server
				if($this->upload->do_upload('userfiles')){
					// Uploaded file data
					$fileData = $this->upload->data();
					
					$data1 = [
						'id_foto_barang' => 'FOTO-'.$id_barang.'-'.($i+1),
						'id_barang' => $id_barang,
						'gambar_barang' => file_get_contents($fileData['full_path'])
					];
					$this->m_barang->insertTable('foto_barang', $data1);
				}else{
					$data['count'] = $this->m_barang->tampilkanBarang()->num_rows();
					$data['error'] = $this->upload->display_errors();
					$this->load->view('v_shop_add_item', $data);
				}
	
				
			}
			redirect('Shop');
		}
	}

	public function upload_file()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1300;
                $config['max_height']           = 1024;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        
                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());

                    return $error;
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());

                    return $data;
                }
		}
		
		function MyItem()
		{
			
		}
		
}
?>