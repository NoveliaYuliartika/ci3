<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

<?php
Class Login extends CI_Controller{
	function index(){
		$this->load->view('login');
	}

public function cekDB($password){
	$this->load->model('user');
	$username=$this->input->post('username');
	$result=$this->user->LogIn($username, $password);
	if($result){
		$sess_array = array();
		foreach ($result as $rows) {
			$sess_array = array(
				'id'=>$rows->id,
				'username'=>$rows->username,
				'level'=>$rows->level);
			$this->session->set_userdata('loggIn', $sess_array);
		}
		return true;
	}else{
		$this->form_validation->set_message('cekDB', "Login Gagal!");
		return false;
	}
}

public function cekLogin(){
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required|callback_cekDB');
	if($this->form_validation->run()==false){
		$this->load->view('login');
	}else{
		redirect('Home', 'refresh');
	}
}

public function signup(){
		$this->load->view('signUp');
}

public function logout(){
	$this->session->unset_userdata('loggIn');
	$this->session->sess_destroy();
	redirect('Login', 'refresh');
}

public function insert()
	{
		$this->form_validation->set_rules('username','username','trim|required');
		$this->form_validation->set_rules('password','password','trim|required');
		

		if($this->form_validation->run()==FALSE){
			$this->load->view('signUp');
		}else{
			$this->load->model('User');
			$this->User->daftar();
			$this->load->view('login');
			
		}
	}

}
?>