<?php
class Barang extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_barang');
		$this->load->model('m_pesanan');
		$this->load->model('m_notif');
		$this->load->model('m_pesan');
		$this->load->model('m_promo');
		$this->load->model('m_rating_barang');
		$this->load->library('form_validation');
	}
	function index(){
		$data['count'] = $this->m_barang->tampilkanBarang()->num_rows();
		$data['error'] = '';

		$this->load->model('m_pesanan');
		if($this->session->userdata('id_user')){
			$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
			$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();
			
			$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
			$data['countChat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->num_rows();

			$data['chat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->result();
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
			$this->form_validation->set_rules('userfile', 'Profile Picture', 'required');
		}

		if($this->form_validation->run() == FALSE){
			$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
			$data['countChat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->num_rows();
			$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();
			$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
			$data['count'] = $this->m_barang->tampilkanBarang()->num_rows();
			$data['error'] = '';
			$this->load->view('v_shop_add_item', $data);
		}
		else{
			$count = $this->m_barang->tampilkanSemuaBarang()->num_rows()+1;
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
				'status_delete' => "0",
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
					if($i == $filesCount-1){
						redirect('Shop');
					}
				}else{
					$data['count'] = $this->m_barang->tampilkanBarang()->num_rows();
					$data['error'] = $this->upload->display_errors();
					$this->load->view('v_shop_add_item', $data);
				}
	
				
			}
				
			
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
			$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
			$data['barangku'] = $this->m_barang->tampilkanBarangKu($this->session->userdata('id_user'))->result();

			$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();
			$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
			$data['countChat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->num_rows();
			$data['jumlahDiscountCodes'] = $this->m_promo->cekKodeDiskon($this->session->userdata('id_user'))->num_rows();
			$data['chat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->result();

			$this->load->view('v_user_myitem',$data);
		}

		function History()
		{
			$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
			$data['barangkusemua'] = $this->m_barang->tampilkanBarangKuSemua($this->session->userdata('id_user'))->result();
			$data['jumlahDiscountCodes'] = $this->m_promo->cekKodeDiskon($this->session->userdata('id_user'))->num_rows();
			$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();
			$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
			$data['countChat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->num_rows();

			$data['chat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->result();

			$this->load->view('v_user_history_barang',$data);
		}
		
		function updateData(){
			$this->form_validation->set_rules('nama', 'Item Name', 'required|trim');
			$this->form_validation->set_rules('keterangan_barang', 'Item Description', 'required|trim');
			$this->form_validation->set_rules('harga', 'Item Price', 'required|trim');
			$this->form_validation->set_rules('stok_barang', 'Item Stock', 'required|trim|numeric');
			//$this->form_validation->set_rules('userfile', 'Item Picture', 'required');
			if (empty($_FILES['userfile']['name']))
			{
				$this->form_validation->set_rules('userfile', 'Profile Picture', 'required');
			}

			if($this->form_validation->run() == FALSE){
				$where = array('id_barang' => $this->input->post('id_barang'));
				$data['barangEdit'] = $this->m_barang->editData($where,'barang')->result();
				$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
				$data['countChat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->num_rows();
				$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();
				$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
				$data['error'] = '';
				$this->load->view('v_edit_barang',$data);

			}else{
				$id = $this->input->post('id_barang');
				$nama = $this->input->post('nama');
				$harga = $this->input->post('harga');
				$stok = $this->input->post('stok_barang');
				$keterangan = $this->input->post('keterangan_barang');
				
				$data = array(
					'nama_barang' => $nama,
					'harga_barang' => $harga,
					'stok_barang' => $stok,
					'keterangan_barang' => $keterangan,
					'user_edit' => $this->session->userdata('id_user'),
				);
				
				$where = array(
					'id_barang' => $id
				);
				
				$this->db->set('waktu_edit', 'NOW()', FALSE);
				$this->m_barang->updateData($where,$data,'barang');

				
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
						$this->m_barang->delete($where, 'foto_barang');
						// Uploaded file data
						$fileData = $this->upload->data();
						
						$data1 = [
							'id_foto_barang' => 'FOTO-'.$id.'-'.($i+1),
							'id_barang' => $id,
							'gambar_barang' => file_get_contents($fileData['full_path'])
						];
						$this->m_barang->insertTable('foto_barang', $data1);
						if($i == $filesCount-1){
							$where = array('id_barang' => $id);
							$data['barangEdit'] = $this->m_barang->editData($where,'barang')->result();
							$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();

							$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();
							$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();

							$this->session->set_flashdata('message', '<div class="alert alert-success text-center p-t-25 p-b-50" role="alert">Your item information has changed!</div>');

							$this->load->view('v_edit_barang',$data);
						}
					}else{
						$data['count'] = $this->m_barang->tampilkanBarang()->num_rows();
						$data['error'] = $this->upload->display_errors();
						$data['barangEdit'] = $this->m_barang->editData($where,'barang')->result();
						$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
						$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();
						$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
						$data['countChat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->num_rows();
						$this->load->view('v_edit_barang',$data);
					}
				}	
			}
		}
		
		function deleteItem($id){
			
			$this->m_barang->hapusData($id);
			redirect('Barang/MyItem');
		}

		function EditItem($id)
		{
			$where = array('id_barang' => $id);
			$data['barangEdit'] = $this->m_barang->editData($where,'barang')->result();
			$data['countCart'] = $this->m_pesanan->searchCart($this->session->userdata('id_user'))->num_rows();
			$data['gambar'] = $this->m_barang->tampilkanSatuFotoBarang($id)->row_array();

			$data['notif'] = $this->m_notif->tampilkan_notifku($this->session->userdata('id_user'))->result();
			$data['countNotif'] = $this->m_notif->tampilkan_notif_belum_dilihat($this->session->userdata('id_user'))->num_rows();
			$data['countChat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->num_rows();
			$data['jumlahDiscountCodes'] = $this->m_promo->cekKodeDiskon($this->session->userdata('id_user'))->num_rows();
			$data['chat'] = $this->m_pesan->cekPesan($this->session->userdata('id_user'))->result();
			$data['error'] = '';
			$this->load->view('v_edit_barang',$data);
		}
	
		function ratingBarang()
		{
			$count = $this->m_rating_barang->tampilkanData()->num_rows()+1;
			$id_rating_barang = "RBAR-".$count;

			$data = array(
				'id_rating_barang' => $id_rating_barang,
				'id_barang' => $this->input->post('idbarang'),
				'rating_barang' => $this->input->post('ratingbarang'),
				'id_pemberi_rating' => $this->session->userdata('id_user'),
				'keterangan' => $this->input->post('keterangan')
			);

			$this->db->set('waktu_rating', 'NOW()', FALSE);
			$this->m_rating_barang->insertTable('rating_barang', $data);

			redirect('Shop');
		}
}
?>