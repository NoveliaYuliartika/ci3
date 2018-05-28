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
		$this->db->select('id,username,password');
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
}
?>