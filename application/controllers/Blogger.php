<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogger extends CI_Controller {

	public function __construct()
	{
		//Membuat kelas parent agar bisa digunakan di semua fungsi
		parent::__construct();
		if($this->session->userdata('loggIn')){
			$session_data=$this->session->userdata("loggIn");
			$data['username']=$session_data['username'];
		}else{
			redirect('Login', 'refresh');
		}
		//Load model dan helper
		$this->load->model('Artikel');
		$this->load->model('data_kategori');
		$this->load->model('Blog_model');
		$this->load->helper('url_helper');
		$this->load->helper(array('form', 'url'));
		date_default_timezone_set('Asia/Jakarta');
	}
 
	public function index()
	{
		// $Artikel['title'] = $this->Artikel->get_all_artikel();
		$Artikel['title'] = $this->Blog_model->get_all_artikel();

		$limit_per_page = 6;

		// URI segment untuk mendeteksi "halaman ke berapa" dari URL
		$start_index = ( $this->uri->segment(3) ) ? $this->uri->segment(3) : 0;

		// Dapatkan jumlah data 
		$total_records = $this->Blog_model->get_total();
		
		if ($total_records > 0) {
			// Dapatkan data pada halaman yg dituju
			$data["artikel"] = $this->Blog_model->get_all_artikel($limit_per_page, $start_index);
			
			// Konfigurasi pagination
			$config['base_url'] = base_url() . 'Blog/index';
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config["uri_segment"] = 3;
			
			$this->pagination->initialize($config);
				
			// Buat link pagination
			$data["links"] = $this->pagination->create_links();
		}

		$this->load->view("blogger/header");
		// Passing data ke view
		$this->load->view('blogger/tampil_blog', $data);
		$this->load->view("blogger/footer");
	

		//$this->load->view("templates/header");
		// $this->load->view('blogger/tampil_blog', $data);
		//$this->load->view("templates/footer");
	
	}

	public function view(){
		$id = $this->uri->segment(3); //mengambil variabel dari url
		$data['show_article'] = $this->Artikel->get_article_by_id($id);//menyimpan hasil dari filtering data
		// Jika data tidak ditemukan akan di arahkan ke page 404
		if(empty($data['show_article'])){
			show_404();
		}
		//Menyimpan kolom tabel ke array
		$data['title'] = $data['show_article']['title'];
		$data['artikel'] = $data['show_article']['artikel'];
		//Meload View
		$this->load->view('blogger/header');
		$this->load->view('blogger/view', $data);
		$this->load->view('blogger/footer');
	}

	public function create(){
		$data['dropdown'] = $this->data_kategori->dropdown();
		$config['upload_path'] = './image/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$this->load->library('upload', $config);

		//Meload helper form dan form valudasi
		$this->load->helper('form');
		$this->load->library('form_validation');
		//validasi inputan yang masuk
		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('artikel', 'artikel', 'required');
		//Jika validasi belum berjalam
		if ($this->form_validation->run() == FALSE) {
			//Meload View tambah artikel
			$this->load->view('blogger/header');
			$this->load->view('blogger/create',$data);
			$this->load->view('blogger/footer');
		} else {
			if ( ! $this->upload->do_upload('gambar')){
                $data['upload_error'] = $this->upload->display_errors();
    	        	// Kita passing pesan error upload ke view supaya user mencoba upload ulang
    	            $this->load->view('blogger/header');
    	            $this->load->view('blogger/create',$data);
    	            $this->load->view('blogger/footer');
            }else{
            	$data = array('upload_data' => $this->upload->data());
                 $data['input'] = array(
                 	'title' => $this->input->post('title'),
                 	'id_kategori' => $this->input->post('kategori'),
                 	'artikel' => $this->input->post('artikel'),
                 	'gambar' => $this->upload->data('file_name'),
                 	'tanggal' => date("Y/m/d")
                 );
              	 //query tambah data
				 $this->Artikel->set_article(0,$data['input']);
				 //kembali ke home
				 redirect('blogger');
            }

			
		}
	}

	public function edit(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		//validasi inputan yang masuk
		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('artikel', 'artikel', 'required');
		//Mengambil data dari model untuk di edit 

		//Mendapatkan key id dati Route
		$id = $this->uri->segment(3);
		//Mengambil data dari model dan di filter dan ditambahkan ke dalam array
		$data['dropdown'] = $this->data_kategori->dropdown();
		$data['show_article'] = $this->Artikel->get_article_by_id($id);
		$data['id'] = $data['show_article']['id'];
		$data['title'] = $data['show_article']['title'];
		$data['artikel'] = $data['show_article']['artikel'];
		//Jika validasi belum berjalam
		if ($this->form_validation->run() == FALSE) {
			//Meload View tambah artikel
			$this->load->view('blogger/header');
			$this->load->view('blogger/edit',$data);
			$this->load->view('blogger/footer');
		} else {
			 $data['input'] = array(
                 	'title' => $this->input->post('title'),
                 	'artikel' => $this->input->post('artikel'),
                 	'id_kategori' => $this->input->post('kategori')
                 );
			//query Edit data
			$this->Artikel->set_article($id,$data['input']);
			//kembali ke home
			redirect('blogger');
		}	
	}
	public function delete(){
		$id = $this->uri->segment(3);
		$this->Artikel->delete_article($id);
		redirect('blogger','refresh');
	}

}

/* End of file database_controller.php */
/* Location: ./application/controllers/database_controller.php */
