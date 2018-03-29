<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

<?php
Class Home extends CI_Controller{
	function index(){
		$this->load->view('home');
	}
}
?>