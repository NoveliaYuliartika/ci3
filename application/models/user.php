<?php
/**
* 
*/
class user extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function LogIn($password,$username){
		$this->db->select('id,username,password,level');
		$this->db->from('login');
		$this->db->where('username',$username);
		$this->db->where('password',MD5($password));
		$query = $this->db->get();
		if($query->num_rows()==1){
			return $query->result();
		}else{
			return false;
		}
	}

	public function daftar(){
	
		$object = array(
			'username'=> $this->input->post('username'),
			'password'=>md5($this->input->post('password'))
		);
		$this->db->insert('user',$object);
		
	}

	 public function loginn($username, $password){
        // Validasi
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $result = $this->db->get('login');


        if($result->num_rows() == 1){
            return $result->row(0)->id;
        } else {
            return false;
        }
    }

    public function get_user_level($idUser) {
        $this->db->select('level');
        $this->db->where('id', $idUser); 

        $result = $this->db->get('login');

        if($result->num_rows() == 1){
            return $result->row(0)->level;
        } else {
            return false;
        }
    } 
	
}
?>