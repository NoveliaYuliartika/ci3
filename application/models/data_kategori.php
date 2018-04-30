<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class data_kategori extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function get_data_category(){
		return $this->db->get('kategori');
	}
	public function dropdown(){
		$data = $this->db->select('id_kategori, nama')->from('kategori')->get();
		$data_select[''] = "Pilih kategori";
		foreach ($data->result() as $row) {
			$data_select[$row->id_kategori] = $row->nama;
		}
		return $data_select;
	}
}