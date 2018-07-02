<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

<?php
Class Home extends CI_Controller{

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('loggIn')){
			$session_data=$this->session->userdata("loggIn");
			// $session_level=$this->session->userdata("level");
			$data['username']=$session_data['username'];
			$data['level']=$session_data['level'];
		}else{
			redirect('Login', 'refresh');
		}
	}

	function index(){
		$this->load->view('home');
	}
	function index2(){
		$this->load->view('home1');
	}
	function index3(){
		$this->load->view('home2');
	}

}
?>