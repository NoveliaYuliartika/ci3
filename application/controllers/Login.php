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
			// 'level' => $this->model_user->get_user_level($idUser)
			$this->session->set_userdata('loggIn', $sess_array);
		}
		return true;
	}else{
		$this->form_validation->set_message('cekDB', "Login Gagal!");
		return false;
	}
}

// public function cekLogin(){
// 	$this->form_validation->set_rules('username', 'username', 'trim|required');
// 	$this->form_validation->set_rules('password', 'password', 'trim|required|callback_cekDB');
// 	if($this->form_validation->run()==false){
// 		$this->load->view('login');
// 	}else{
// 		redirect('Home', 'refresh');
// 	}
// }

public function cekLogin(){
	// $this->session->set_userdata('loggIn'); 
	// $this->session->set_userdata('level'); 
	// $this->form_validation->set_rules('username', 'username', 'trim|required');
	// $this->form_validation->set_rules('password', 'password', 'trim|required|callback_cekDB');
	// if($this->form_validation->run()==false){
	// 	$this->load->view('login');
	// }else if($this->session->userdata('loggIn')&& $this->session->userdata('level') === "admin"){
	// 	redirect('Home', 'refresh');
	// } else {
	// 	redirect('Home/index2', 'refresh');
	// }
	// public function login(){

		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required|callback_cekDB');

			if($this->form_validation->run() === FALSE){
				$this->load->view('login');
			} else {
				
				$username = $this->input->post('username');
				$password = md5($this->input->post('password'));
				// $password = $this->input->post('password');
				$id = $this->user->loginn($username, $password);

				if($id){
					// Buat session
					$user_data = array(
						'id' => $id,
						'username' => $username,
						'logged_in' => true,
						'level' => $this->user->get_user_level($id)
					);

					$this->session->set_userdata($user_data);

					// Set message
					// $this->session->set_flashdata('user_loggedin', 'Selamat datang, '.$username);

					// redirect('home');
						if($this->session->userdata('logged_in') && $this->session->userdata('level') == "admin")
							redirect('home');
						else if($this->session->userdata('logged_in') && $this->session->userdata('level') == "user1")
							redirect('home/index2');
						else
							redirect('home/index3');

				} else {
					// Set message
					// $this->session->set_flashdata('login_failed', 'Login invalid');

					redirect('login');
				}		
			}
		// }
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