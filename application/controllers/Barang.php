<?php
class Barang extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_barang');
		$this->load->library('form_validation');
	}
	function index(){
		$data['count'] = $this->m_barang->tampilkanBarang()->num_rows();
		$this->load->view('v_shop_add_item', $data);
		
		//$data['barang'] = $this->m_barang->tampilkan_barang()->result();
		//$this->load->view('v_test', $data);
		
	}
	function insertData(){
		$id_barang = $this->input->post('id_barang');
		$nama = $this->input->post('nama_barang');
		$id_penjual = $this->input->post('id_penjual');
		//$gambar = $this->input->post('gambar_barang');
		$gambar = $this->upload_file();
		$harga = $this->input->post('harga_barang');
		$stok = $this->input->post('stok_barang');
		$user_add = $this->input->post('id_penjual');
		//$waktu_add = $this->input->post('waktu_add');
		


		$gambarUpload = $this->upload->data();			
		$imgdata = file_get_contents($gambarUpload['full_path']);//get the content of the image using its path

		$data = array(
			'id_barang' => $id_barang,
			'nama_barang' => $nama,
			'id_penjual' => $id_penjual,
			'harga_barang' => $harga,
			'stok_barang' => $stok,
			'user_add' => $user_add,
			'status_delete' => "0"
		);
		
		$this->db->set('waktu_add', 'NOW()', FALSE);
		$this->m_barang->insertTable('barang', $data);

		$count_foto = $this->m_barang->tampilkanBarang()->num_rows()+1;
		
		$data = array(
			'id_foto_barang' => 'FOTO_'.$id_barang.'_'.$count_foto,
			'id_barang' => $id_barang,
			'gambar_barang' => $imgdata,
		);
		redirect('Shop');
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
		
}
?>