<?php
Class Blog extends CI_Controller{

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('loggIn')){
			$session_data=$this->session->userdata("loggIn");
			$data['username']=$session_data['username'];
			$data['level']=$session_data['level'];
		}else{
			redirect('Login', 'refresh');
		}
	}

	function index(){
		$this->load->view('blog');
	}
}
?>