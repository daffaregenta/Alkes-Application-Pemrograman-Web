<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('mhome');
	}

	public function index(){
		if($this->session->userdata('authenticated')) 
			redirect('home/indeks'); 

		$this->render_login('login'); 

	}
	public function indeks(){
		
			$dataproduk = $this->mhome->get_produk_all();
			$datakategori = $this->mhome->get_kategori_all();
			
		$this->render_backend('list_produk',['data'=>$dataproduk,'dataJ'=>$datakategori]);
	}
	public function registerr(){
		if($this->session->userdata('authenticated')) 
			redirect('home/indeks'); 


			$this->render_register('register'); 
		
	}
	
	public function loginn(){
		if($this->session->userdata('authenticated')) 
			redirect('home/indeks'); 

		
		$this->render_login('login'); 
	}

	public function login(){
		$username = $this->input->post('username'); 
		$password = $this->input->post('password'); 
		$user = $this->mhome->get($username); 

		if(empty($user)){ 
			$this->session->set_flashdata('message', 'Username tidak ditemukan'); 
			redirect('home/loginn'); 
		}else{
			if($password == $user->password){
				$session = array(
					'authenticated'=>true,
					'username'=>$user->username,  
					'nama'=>$user->nama, 
					'role'=>$user->role, 
					'alamat'=>$user->alamat, 
					'nohp'=>$user->nohp,
					'nid'=>$user->nid,
					'id'=>$user->id 
				);

				$this->session->set_userdata($session); 
				redirect('home/indeks'); 
			}else{
				$this->session->set_flashdata('message', 'Password salah'); 
				redirect('home/loginn'); 
			}
		}
	}
	public function register(){
		$username = $this->input->post('username');
		$pass = $this->input->post('password');
		$repass = $this->input->post('re-password');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$nohp = $this->input->post('nohp');
		if ($pass != $repass){
			$this->session->set_flashdata('message', 'Password tidak cocok'); 
			redirect('home/registerr');
		}else if($this->mhome->check_username($username)){
			$this->session->set_flashdata('message', 'Username sudah ada'); 
			redirect('home/registerr');
		}else{
				$data = array(
					'username' => $username,
					'password' => $pass,
					'nama' => $nama,
					'nohp' => $nohp,
					'alamat' => $alamat
				);
				$result = $this->mhome->insert_new_profle($data);
				if($result){
					$this->session->set_flashdata('message', 'Register Berhasil'); 
					redirect('home/registerr');
				} else {
					$this->session->set_flashdata('message', 'Register Gagal'); 
					redirect('home/registerr');
				}
			}
		}

	public function logout(){
		$this->session->sess_destroy(); 
		redirect('home'); 
	}

		public function tentang(){
		$this->render_backend('tentang'); 
	}
	public function produk()
	{
		if($this->session->userdata('role') != 'Admin')
	    show_404(); 

		$dataproduk = $this->mhome->get_produk_all();
		$datakategori = $this->mhome->get_kategori_all();
		$this->render_backend('admin/produk',['data'=>$dataproduk,'dataJ'=>$datakategori]);
	}
    public function hapusproduk($nip)
	{
		$this->mhome->hapus_produk($nip);
		redirect('home/produk');
	}
	public function tambahproduk()
	{
		$initialize = $this->upload->initialize(array(
				"upload_path" => './assets/images/',
				"allowed_types" => "gif|jpg|jpeg|png|bmp",
				"remove_spaces" => TRUE
				
				
			));
		$this->load->library('upload', $initialize);
			if (!$this->upload->do_upload('foto')) {
				$error = array('error' => $this->upload->display_errors());
				$data['error_message'] = $this->upload->display_errors();
				echo 'anda gagal upload';
			} else {
				$data = $this->upload->data();
				$gambar = $data['file_name'];
			$input_data = [
			'nama_produk' => $this->input->post('nama', true),
			'deskripsi' => $this->input->post('deskripsi', true),
			'harga' => $this->input->post('harga', true),
			'kategori' => $this->input->post('kategori', true),
			'gambar' => $gambar
		];
		$this->mhome->tambah_produk($input_data);
		redirect('home/produk');

	}
}

	public function editproduk()
	{
		$initialize = $this->upload->initialize(array(
				"upload_path" => './assets/images/',
				"allowed_types" => "gif|jpg|jpeg|png|bmp",
				"remove_spaces" => TRUE
				
				
			));
		$this->load->library('upload', $initialize);
			if (!$this->upload->do_upload('foto')) {
				$error = array('error' => $this->upload->display_errors());
				$data['error_message'] = $this->upload->display_errors();
				echo 'anda gagal upload';
			} else {
				$data = $this->upload->data();
				$gambar = $data['file_name'];															

				$nip = $this->input->post('nip');
				$nama = $this->input->post('nama');
				$deskripsi = $this->input->post('deskripsi');
				$harga = $this->input->post('harga');
				$kategori = $this->input->post('kategori');
				$data = array(
			'nama_produk' => $nama,
			'deskripsi' => $deskripsi,
			'harga' => $harga,
			'kategori' => $kategori,
			'gambar' =>$gambar
		);
		$this->mhome->edit_produk($nip,$data);

		redirect('home/produk');	
	}
}
	public function detail_produk()
	{
		$id=($this->uri->segment(3))?$this->uri->segment(3):0;
		$data_kategori = $this->mhome->get_kategori_all();
		$data_detail = $this->mhome->get_produk_id($id)->row_array();
		
		$this->render_backend('detail_produk',['data'=>$data_kategori,'dataJ'=>$data_detail]);
	}
	function tambah()
	{
		$data_produk= array('id' => $this->input->post('id'),
							 'name' => $this->input->post('nama'),
							 'price' => $this->input->post('harga'),
							 'gambar' => $this->input->post('gambar'),
							 'qty' =>$this->input->post('qty')
							);
		$this->cart->insert($data_produk);
		redirect('home/indeks');
	}

	public function tampil_cart()
	{
		$data_kategori = $this->mhome->get_kategori_all();
		$this->render_backend('tampil_cart',['data'=>$data_kategori]);
	}
	function hapus($rowid) 
	{
		if ($rowid=="all")
			{
				$this->cart->destroy();
			}
		else
			{
				$data = array('rowid' => $rowid,
			  				  'qty' =>0);
				$this->cart->update($data);
			}
		redirect('home/tampil_cart');
	}
	function ubah_cart()
	{
		$cart_info = $_POST['cart'] ;
		foreach( $cart_info as $id => $cart)
		{
			$rowid = $cart['rowid'];
			$price = $cart['price'];
			$gambar = $cart['gambar'];
			$amount = $price * $cart['qty'];
			$qty = $cart['qty'];
			$data = array('rowid' => $rowid,
							'price' => $price,
							'gambar' => $gambar,
							'amount' => $amount,
							'qty' => $qty);
			$this->cart->update($data);
		}
		redirect('home/tampil_cart');
	}
	public function check_out()
	{
		$data_kategori = $this->mhome->get_kategori_all();
		$this->render_backend('check_out',['data'=>$data_kategori]);
	}
	public function proses_order()
	{
		
		$data_pelanggan = array('nama' => $this->input->post('nama'),
							'email' => $this->input->post('email'),
							'alamat' => $this->input->post('alamat'),
							'telp' => $this->input->post('telp'));
		$id_pelanggan = $this->mhome->tambah_pelanggan($data_pelanggan);
		
		$data_order = array('tanggal' => date('Y-m-d'),
					   		'pelanggan' => $id_pelanggan);
		$id_order = $this->mhome->tambah_order($data_order);
		
		if ($cart = $this->cart->contents())
			{
				foreach ($cart as $item)
					{
						$data_detail = array('order_id' =>$id_order,
										'produk' => $item['id'],
										'qty' => $item['qty'],
										'harga' => $item['price']);			
						$proses = $this->mhome->tambah_detail_order($data_detail);
					}
			}
		
		$this->cart->destroy();
		$data_kategori = $this->mhome->get_kategori_all();
		$this->render_backend('sukses',['data'=>$data_kategori]);
	}
}
