<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

<?php
Class Home extends CI_Controller{

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('loggIn')){
			$session_data=$this->session->userdata("loggIn");
			$data['username']=$session_data['username'];
		}else{
			redirect('Login', 'refresh');
		}
	}

	function index(){
		$this->load->view('home');
	}

}
?>