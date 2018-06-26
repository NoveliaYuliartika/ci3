<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatables extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Artikel');
	}

	public function index()
	{
		// Dapatkan data artikel dari model
		$Artikel['title'] = $this->Artikel->get_all_artikel();

		$limit_per_page = 6;

		// URI segment untuk mendeteksi "halaman ke berapa" dari URL
		$start_index = ( $this->uri->segment(3) ) ? $this->uri->segment(3) : 0;

		// Dapatkan jumlah data 
		$total_records = $this->Blog_model->get_total();
		
		if ($total_records > 0) {
			// Dapatkan data pada halaman yg dituju
			$data["all_artikel"] = $this->Blog_model->get_all_artikel($limit_per_page, $start_index);
			
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
	}

		//$this->load->view("templates/header");
		$this->load->view('blogger/tampil_blog', $data);
		//$this->load->view("templates/footer");
	}

	public function get_json()
	{
		$Artikel['title'] = $this->Artikel->get_all_artikel();
		
		// Tampilkan dalam bentuk format
		echo json_encode($Artikel);
	}

	public function view_json()
	{
		//$this->load->view("templates/header");
		$this->load->view('blogger/tampil_blog');
		//$this->load->view("templates/footer");
	}

}
